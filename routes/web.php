<?php

use App\Http\Controllers\Admin\AdFeedbackController;
use App\Http\Controllers\Admin\AdProfileController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\OrderDetailsController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\FeedbackController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\LocationController;
use App\Http\Controllers\User\OrderHistoryController;
use App\Http\Controllers\User\ProductController as UserProductController;
use App\Http\Controllers\User\ProductDetailsController;
use App\Http\Controllers\User\SearchController;
use App\Http\Livewire\User\UserDashboardComponent;
use Illuminate\Support\Facades\Route;
use App\Events\SendMailConfirmEvent;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\SkinController;
use App\Http\Controllers\Admin\StatisticalController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Admin\WarehousReceiptController;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\User\UsProfileController;
use App\Http\Controllers\User\ViewHistoryController;
use Barryvdh\DomPDF\Facade as PDF;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/', HomeComponent::class)->name('home.index');
Route::resource('/', HomeController::class);
//Route::get('/admin', AdminComponent::class)->name('admin.index');
// Route::get('/shop', ShopComponent::class)->name('shop');
Route::get('/user/shop', [App\Http\Controllers\User\ProductController::class, 'index'])->name('user.shop');
Route::get('/products/{categoryId}', [HomeController::class, 'showProductsByCategory']);
Route::get('/about', [HomeController::class, 'contact'])->name('user.about');
//Route::get('/product/{id}', DetailsComponent::class)->name('product.details');
Route::get('/product-details/{product}', [ProductDetailsController::class, 'show'])->name('user.product-details');
//cart
Route::get('/user/cart', [App\Http\Controllers\User\ProductController::class, 'cart'])->name('user.cart');
Route::post('/user/add-to-cart/{id}', [App\Http\Controllers\User\ProductController::class, 'addToCart'])->name('add_to_cart');
Route::get('/user/add-to-cart/{id}', [App\Http\Controllers\User\ProductController::class, 'addToCartGet'])->name('add_to_cart_get');
Route::patch('/user/update-cart', [App\Http\Controllers\User\ProductController::class, 'update'])->name('update_cart');
Route::delete('/user/remove-from-cart', [App\Http\Controllers\User\ProductController::class, 'remove'])->name('remove_from_cart');
Route::post('/user/home/search', [SearchController::class, 'getSearch'])->name('user.search');
Route::get('/user/home/search', [SearchController::class, 'searchView'])->name('user.search-view');
Route::get('add-to-cart/{id}', [UserProductController::class, 'addToCart'])->name('add-to-cart');
// Route::get('/shop/{categoryId}', 'ProductController@showByCategory')->name('user.shop');

Route::prefix('locations')->namespace('Locations')->name('locations.')->group(function () {
    Route::post('/get-district-by-province', [LocationController::class, 'getDistrict'])->name('get-district');
    Route::post('/get-ward-by-district', [LocationController::class, 'getWard'])->name('get-ward');
});


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware(['auth'])->group(function () {
    Route::group(['prefix' => '/user', 'as' => 'user.'], function () {
        Route::get('/dasboard', UserDashboardComponent::class)->name('user.dasboard');
        Route::resource('/feedback', FeedbackController::class);
        Route::resource('/checkout', CheckoutController::class);
        Route::get('/check-coupon', [CheckoutController::class, 'checkCoupon'])->name('check-coupon');
        Route::get('/delivery-fee/{id}', [CheckoutController::class, 'deliveryFee'])->name('delivery-fee');
        Route::resource('/user-profile', UsProfileController::class);
        // Route::resource('/order-history', OrderHistoryController::class);
        Route::delete('/order-history/cancel/{id}', [OrderHistoryController::class, 'destroy'])->name('order-history.destroy');
        Route::get('/order-history/{status}', [OrderHistoryController::class, 'findOrderStatus'])->name('order-history');
        Route::get('/add-to-favorites/{productId}', [App\Http\Controllers\User\ProductController::class, 'addToFavorites'])->name('add_to_favorites');
        Route::get('/favorite', [App\Http\Controllers\User\ProductController::class, 'favorites'])->name('favorites');
        Route::get('/suggestion', [HomeController::class, 'getProductSuggestion'])->name('suggestion');
        Route::get('/sendmail', function () {
            $data = [
                'user_name' => 'Danh'
            ];
            SendMailConfirmEvent::dispatch(
                $data
            );
        });
    });
});

Route::middleware(['auth', 'authadmin'])->group(function () {
    Route::group(['prefix' => '/admin', 'as' => 'admin.'], function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('dasboard');
        Route::resource('/categories', CategoryController::class);
        Route::resource('/products', ProductController::class);
        Route::resource('/brands', BrandController::class);
        Route::resource('/skins', SkinController::class);
        Route::resource('/suppliers', SupplierController::class);
        Route::resource('/profile', AdProfileController::class);
        Route::resource('/orders', OrderController::class);
        Route::resource('/order_details', OrderDetailsController::class);
        Route::resource('/warehouse-receipt', WarehousReceiptController::class);
        Route::resource('/feedback', AdFeedbackController::class);
        Route::resource('/client', ClientController::class);
        Route::post('/admin/orders/search', [OrderController::class, 'getSearchOrder'])->name('orders.search');
        Route::get('/feedback/change-status/{feedback}', [AdFeedbackController::class, 'changeStatus'])->name('feedback.changeStatus');
        Route::resource('/statistical', StatisticalController::class);
        Route::post('/statistical/search', [StatisticalController::class, 'search'])->name('statistical.search');
        Route::group(['prefix' => '/discounts','as' => 'discounts.'], function () {
            Route::get('/', [DiscountController::class,'index'])->name('list');
            Route::get('/add-new', [DiscountController::class,'showFormAddDiscount'])->name('new-discount-form');
            Route::post('/add-new', [DiscountController::class,'addDiscountCode'])->name('handle-new-discount');
            Route::delete('/destroy/{id}', [DiscountController::class,'destroyDiscountCode'])->name('destroy');
        });
        // Route::get('/statistical',[StatisticalController::class,'getQuantityOrder'])->name('statistical.getQuantityOrder');
    });
});
// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::get('/test', [CheckoutController::class, 'test']);

Route::get('auth/{provider}/redirect', [SocialiteController::class, 'redirect'])->name('socialite.redirect');
Route::get('auth/{provider}/callback', [SocialiteController::class, 'callback'])->name('socialite.callback');
Route::get('payments/vnpay/callback', [CheckoutController::class, 'paymentCallback'])->name('vnpay.payment-callback')->middleware('auth');
Route::get('user/view-histories', [ViewHistoryController::class, '__invoke'])->name('user.view-histories');

Route::get('checkExpiredDay', [DiscountController::class, 'updateStatus'])->name('discount.updateStatus');

require __DIR__ . '/auth.php';
