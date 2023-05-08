<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('store')->orderByDesc('id')->get();
        return view('admin.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stores = Store::all();
        return view('admin.products.create',compact('stores'));
    }

    /**
     * Product a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name'=>'required',
            'photo'=>'required',
            'description'=>'required',
            'base_price'=>'required',
            'discount_price'=>'nullable',
            'falg'=>'required',
            'store_id'=>'required'
        ]);


        $photo = rand().rand().time().$request->file('photo')->getClientOriginalName();
        $request->file('photo')->move(public_path('uploads/images/products'),$photo);

        Product::create([
            "name"=>$request->name,
            "photo"=>$photo,
            "description"=>$request->description,
            "base_price"=>$request->base_price,
            "discount_price"=>$request->discount_price,
            "falg"=>$request->falg,
            "store_id"=>$request->store_id
        ]);

        return redirect()->route('admin.product.index')->with('msg', 'Product added successfully')->with('type', 'success');

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
        $products = Product::findOrFail($id);
        return view('admin.products.edit',compact('products'));
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
        $request->validate([
            'name'=>'required',
            'photo'=>'nullable',
            'description'=>'required',
            'base_price'=>'required',
            'discount_price'=>'nullable',
            'falg'=>'required',
            'store_id'=>'required'
        ]);



        $products = Product::findOrFail($id);
        $photo = $products->photo;
        if($request->hasFile('photo')) {
            // upload the file
            $photo = rand().rand().time().$request->file('photo')->getClientOriginalName();
            $request->file('photo')->move(public_path('uploads/images/products/'), $photo);
        }

        // Save data to database
        $products->update([
            "name"=>$request->name,
            "photo"=>$photo,
            "description"=>$request->description,
            "base_price"=>$request->base_price,
            "discount_price"=>$request->discount_price,
            "falg"=>$request->falg,
            "store_id"=>$request->store_id
        ]);

        return redirect()->route('admin.product.index')->with('msg', 'Product Updated')->with('type', 'info');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = Product::findOrFail($id);
        $products->delete();

        return redirect()->route('admin.product.index')->with('msg', 'Product Deleted')->with('type', 'danger');
    }

    public function trashed()
    {
        $products = Product::onlyTrashed()->get();
        return view('admin.products.trash',compact('products'));
    }

    public function trashedDelete($id){
        $product = Product::onlyTrashed()->findOrFail($id);
        $product->forceDelete();

        return redirect()->back()->with('msg', 'Product Deleted')->with('type', 'danger');

    }

    public function trashedRestore($id){
        $product = Product::onlyTrashed()->findOrFail($id);
        $product->restore();

        return redirect()->back()->with('msg', 'Product Restore')->with('type', 'success');
    }
}
