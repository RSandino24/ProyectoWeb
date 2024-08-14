<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::get();

        return view('admin.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        try {

            $category = Category::create(request()->all());
    
            return redirect('/category')->with('success',"Categoría guardada con éxito!");
        } catch (\Throwable $th) {
            return redirect('/category')->with('error',"No se pudo guardar la categoría!");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        
        try {
            $category = $category->update(request()->all());
    
            return redirect('/category')->with('success',"Categoría actualizada con éxito!");
        } catch (\Throwable $th) {

            return redirect('/category')->with('error',"No se pudo actualizar la categoría!");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        try {
            
            $category->delete();
    
            return redirect('/category')->with('success',"Categoría eliminada con éxito!");
        } catch (\Throwable $th) {
            return redirect('/category')->with('error',"No se pudo eliminar la categoría!");
        }
    }
}