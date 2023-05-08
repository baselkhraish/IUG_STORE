<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Store;
use App\Models\Transaction;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        $stores = Store::limit(6)->get();
        $products = Product::orderByDesc('created_at')->limit(8)->get();

        return view('site.index',compact('stores','products'));

    }
    public function search_store()
    {
        if(request()->has('keyword')){
            // return request()->keyword;
            $stores = Store::where('name','like','%'.request()->keyword.'%')->get();
        }else{
            $stores = Store::get();
        }
        return view('site.store',compact('stores'));
    }
    public function search_product()
    {
        if(request()->has('keyword')){
            // return request()->keyword;
            $products = Product::where('name','like','%'.request()->keyword.'%')->get();
        }else{
            $products = Product::get();
        }
        return view('site.shop',compact('products'));
    }

    public function shop()
    {
        $products = Product::orderByDesc('created_at')->get();
        return view('site.shop',compact('products'));
    }

    public function store()
    {
        $stores = Store::orderByDesc('created_at')->get();
        return view('site.store',compact('stores'));
    }

    public function product_single($id)
    {
        $product_s = Product::with('store')->findOrFail($id);
        return view('site.detail',compact('product_s'));
    }

    public function shop_single($id)
    {
        $shop_s = Store::findOrFail($id);
        $stor_id = Store::where('id',$shop_s->id)->pluck('id')->first();
        $pro = Product::orderByDesc('created_at')->where('store_id',$stor_id)->get();
        return view('site.shop_details',compact('pro'));
    }


    public function transactions(Request $request,$id)
    {
        Transaction::create([
            "product_name"=>$request->product_name,
            "store_name"=>$request->store_name,
            "sale"=>$request->sale,
            "product_id"=>$request->product_id
        ]);

        $pr=Product::findOrFail($id);
        return redirect()->route('product.show',$pr->id)->with('msg', 'added in cart successfully')->with('type', 'success');
    }

}
