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
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\ProductController as UserProductController;
use App\Http\Controllers\User\ProductDetailsController;
use App\Http\Controllers\User\SearchController;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\AdminCategoriesComponent;
use App\Http\Livewire\Admin\AdminProductsComponent;
use App\Http\Livewire\Admin\AdminAddCategoryComponent;
use App\Http\Livewire\Admin\AdminAddProductsComponent;
use App\Http\Livewire\AdminComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\User\UserDashboardComponent;
use App\Mail\ConfirmEmail;
use App\Models\Brand;
use App\Models\Feedback;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Events\SendMailConfirmEvent;
use App\Http\Controllers\Admin\StatisticalController;

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
Route::get('/shop', ShopComponent::class)->name('shop');
Route::get('/user/shop', [App\Http\Controllers\User\ProductController::class,'index'])->name('user.shop');
Route::get('/about', [HomeController::class, 'contact'])->name('user.about');
//Route::get('/product/{id}', DetailsComponent::class)->name('product.details');
Route::get('/product-details/{product}',[ProductDetailsController::class, 'show'])->name('user.product-details');
//cart
Route::get('/user/cart', [App\Http\Controllers\User\ProductController::class, 'cart'])->name('user.cart');
Route::get('/user/add-to-cart/{id}', [App\Http\Controllers\User\ProductController::class, 'addToCart'])->name('add_to_cart');
Route::patch('/user/update-cart', [App\Http\Controllers\User\ProductController::class, 'update'])->name('update_cart');
Route::delete('/user/remove-from-cart', [App\Http\Controllers\User\ProductController::class, 'remove'])->name('remove_from_cart');
Route::post('/user/home/search', [SearchController::class,'getSearch'])->name('user.search');
Route::get('add-to-cart/{id}', [UserProductController::class, 'addToCart'])->name('add-to-cart');
// Route::get('/shop/{categoryId}', 'ProductController@showByCategory')->name('user.shop');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware(['auth'])->group(function(){
    Route::group(['prefix' => '/user', 'as' => 'user.'], function () {
        Route::get('/dasboard', UserDashboardComponent::class)->name ('user.dasboard');
        Route::resource('/feedback', FeedbackController::class);
        Route::resource('/checkout', CheckoutController::class);
        Route::post('/add-to-favorites/{productId}', [App\Http\Controllers\User\ProductController::class,'addToFavorites'])->name('addToFavorites');
      //  Route::get('/thanks', [CheckoutController::class, 'thanks'])->name('thanks');
        Route::get('/favorite', [App\Http\Controllers\User\ProductController::class,'favorites'])->name('favorites');
        Route::get('/suggestion', [HomeController::class, 'getProductSuggestion'])->name('suggestion');

        Route::get('/sendmail', function() {
            $data = [
                'user_name' => 'Danh'
            ];
            SendMailConfirmEvent::dispatch(
                $data
            );
        });
    });
});

Route::middleware(['auth','authadmin'])->group(function(){
    Route::group(['prefix' => '/admin', 'as' => 'admin.'], function () {
        Route::get('/dasboard',AdminDashboardComponent::class)->name ('dasboard');
        Route::resource('/categories', CategoryController::class);
        Route::resource('/products', ProductController::class);
        Route::resource('/brands', BrandController::class);
        Route::resource('/orders', OrderController::class);
        Route::resource('/users', UserController::class);
        Route::resource('/order_details', OrderDetailsController::class);
        Route::resource('/feedback', AdFeedbackController::class);
        Route::get('/feedback/change-status/{feedback}', [AdFeedbackController::class, 'changeStatus'])->name('feedback.changeStatus');
        Route::resource('/profile', AdProfileController::class);
        Route::resource('/statistical', StatisticalController::class);
        Route::post('/statistical/search', [StatisticalController::class, 'search'])->name('statistical.search');
        // Route::get('/statistical',[StatisticalController::class,'getQuantityOrder'])->name('statistical.getQuantityOrder');
    });
});
// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
