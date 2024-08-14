<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index(Request $request) {
        //Recibe los parámetros de búsqueda
        $search = isset($request['category']) ? $request['category'] : [];

        //Hace las llamadas a la base de datos
        $categories = Category::get()->toArray();
        $products = Product::search($search)->with('category')->get()->toArray();

        return view("web.index", compact('categories', 'products', 'search'));
    }

    public function show(Product $product) {
        $product->load('category');
        return view("web.showProduct",compact('product'));
    }
}
