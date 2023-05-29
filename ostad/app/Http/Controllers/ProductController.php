<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index', [
            'products'=>$products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->title == null || $request->description == null || $request->image == null){
            return response("please insert title, discription, image");
        }else{

        
        $slug = Str::slug($request->title,'-');
        $image = $request->file('image');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('upload'), $imageName);

        Product::insert([
            'title'=> $request->title,
            'slug'=> $slug,
            'description'=> $request->description,
            'image'=> $imageName,
            'created_at'=>Carbon::now(),

        ]);
        return response('Data submited successfully!');
    }
       
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);
        return view('products.edit', [
            'product'=> $product,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if($request->title == null || $request->description == null || $request->image == null){
            return response("please insert title, discription, image");
        }
        $slug = Str::slug($request->title,'-');
        $image = $request->file('image');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('upload'), $imageName);

        Product::find($id)->update([
            'title'=> $request->title,
            'slug'=> $slug,
            'description'=> $request->description,
            'image'=> $imageName,
            'created_at'=>Carbon::now(),

        ]);
        return response('Data updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::find($id)->delete();
        return response('Data deleted successfully!');
    }
}
