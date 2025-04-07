<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    function index()
    {
        $latestProducts = Product::orderBy('created_at', 'desc')->limit(4)->get();
        $products = Product::limit(4)->get();

        $topProducts = Product::orderBy('sold', 'desc')->limit(4)->get();
        return response()->json(['products' => $products, 'topProducts' => $topProducts, 'latestProducts' => $latestProducts]);
    }
    function detail($id)
    {

        $products = product::find($id);
        $data = [
            'id' => $products->id,
            "name" => $products->name,
            "price" => $products->price,
            "sale" => $products->sale,
            "sold" => $products->sold,
            "image" => $products->image,
            "rating" => $products->rating,
            'quantity' => $products->stock_quantity
        ];
        /*   dd($data); */
        return response()->json($data);
    }


    function searchProduct(Request $request)
    {

        try {
            $key = $request->textsearch;

            $products = Product::where('name', 'LIKE', '%' . $key . '%')->get();
            $cate = DB::table('categories')
                ->where('name', 'LIKE', '%' . $key . '%')
                ->get();
            return response()->json(['products' => $products, 'category' => $cate]);
        } catch (\Throwable $th) {
            dd($th);
        }
    }


    function getcatepr(Request $request)
    {

        try {
            $categoryId = (int) $request->id;
            $products = Product::where('category_id', $categoryId)->get();
            $cate = DB::table('categories')->get();

            return response()->json(['products' => $products, 'category' => $cate]);
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}
