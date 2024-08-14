<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category')->get();

        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();
        return view('admin.product.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'unit_price'=> 'required',
            'price'=> 'required',
            'stock'=> 'required',
            'brand'=> 'required',
            'img_url' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id'=> 'required',
        ]);

        //Guarda la imagen en un carpeta local del proyecto
        $imagePath = $request->file('img_url')->store('products', 'public');

        try {
            Product::create([
                'name'=>$request->name,
                'description'=>$request->description,
                'unit_price'=>$request->unit_price,
                'price'=>$request->price,
                'stock'=>$request->stock,
                'brand'=>$request->brand,
                'img_url'=>$imagePath,
                'category_id'=>$request->category_id,
            ]);
    
            return redirect('/product')->with('success',"Producto guardado con éxito!");
        } catch (\Throwable $th) {

            return redirect('/product')->with('error',"No se pudo guardar el producto!");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::get();
        return view('admin.product.edit',compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'unit_price' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'brand' => 'required',
            'img_url' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required',
        ]);

        if ($request->hasFile('img_url')) {
            $imagePath = $request->file('img_url')->store('products', 'public');
            // Eliminar la imagen antigua si existe
            if ($product->img_url) {
                Storage::disk('public')->delete($product->img_url);
            }

            $product->img_url = $imagePath;
        }

        try {
            $product->update([
                'name'=>$request->name,
                'description'=>$request->description,
                'unit_price'=>$request->unit_price,
                'price'=>$request->price,
                'stock'=>$request->stock,
                'brand'=>$request->brand,
                'category_id'=>$request->category_id,
            ]);
    
            return redirect('/product')->with('success',"Producto actualizado con éxito!");
        } catch (\Throwable $th) {

            return redirect('/product')->with('error',"No se pudo actualizar el producto!");
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        try {
            
            $product->delete();
    
            return redirect('/product')->with('success',"Producto eliminado con éxito!");
        } catch (\Throwable $th) {
            return redirect('/product')->with('error',"No se pudo eliminar el producto!");
        }
    }
}
