<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Toastr;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $products = Product::all();

        return view('products.products', [
            'product' => $products,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'sku' => 'required',
            'name' => 'required',
            'description' => 'required',
            'image_path' => 'required|mimes:jpg,png,jpeg|max:5048'
        ]);

        $newImageName = uniqid() . '-' . $request->title . '.' . $request->image_path->extension();

        $request->image_path->move(public_path('images'), $newImageName);

        Product::create([
            'sku' => $request->input('sku'),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'image_path' => $newImageName,
        ]);
        
        Toastr::success('Product added successfully :)','Success');
        return redirect('/products');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = (Product::find($id));
        return view('products.edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Product::where('id', $id)
            ->update([
                'sku' => $request->input('sku'),
                'name' => $request->input('name'),
                'description' => $request->input('description'),
            ]);

        Toastr::success('Product updated successfully :)','Success');
        return redirect('/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = (Product::find($id));
        $product->delete();

        Toastr::success('Product deleted successfully :)','Success');
        return redirect('/products');
    }
}
