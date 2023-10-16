<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function getSearch(Request $request)
    {
        //  $result = $request->result;
        //dd($request->get('keyword'));
        $categories = Category::all();
        $searchTerm = $request->get('keyword'); // Lấy từ request
       // dd($searchTerm);
        $results = Product::where('name', 'like', "%$searchTerm%")
            ->orWhereHas('brand', function ($query) use ($searchTerm) {
                $query->where('name', 'like', "%$searchTerm%");
            })
            ->orWhereHas('category', function ($query) use ($searchTerm) {
                $query->where('name', 'like', "%$searchTerm%");
            })
            ->get();
           // dd($results);
            return view('user.home.search', ['results' => $results], compact('categories'));

    }
//     public function getSearch(Request $request)
// {
//     $searchTerm = $request->get('keyword'); // Lấy từ request
//     $minPrice = $request->get('min_price'); // Lấy giá trị tối thiểu từ request
//     $maxPrice = $request->get('max_price'); // Lấy giá trị tối đa từ request

//     // Bắt đầu truy vấn tìm kiếm
//     $query = Product::query();

//     // Tìm các sản phẩm có tên chứa từ khóa tìm kiếm
//     if ($searchTerm) {
//         $query->where('name', 'like', "%$searchTerm%");
//     }

//     // Tìm các sản phẩm có giá nằm trong khoảng từ $minPrice đến $maxPrice
//     if ($minPrice && $maxPrice) {
//         $query->whereBetween('price', [$minPrice, $maxPrice]);
//     }

//     // Tìm các sản phẩm có thương hiệu hoặc danh mục chứa từ khóa tìm kiếm
//     $query->orWhereHas('brand', function ($query) use ($searchTerm) {
//         $query->where('name', 'like', "%$searchTerm%");
//     })
//     ->orWhereHas('category', function ($query) use ($searchTerm) {
//         $query->where('name', 'like', "%$searchTerm%");
//     });

//     // Thực hiện truy vấn và lấy kết quả
//     $results = $query->get();

//     // Trả về view 'user.home.search' và truyền kết quả tìm kiếm
//     return view('user.home.search', ['results' => $results]);
// }

}
