<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index');
    }
    public function trash()
    {
        return view('admin.trash');
    }

public function transaction()
{
    $treansaction=Transaction::all();
    return view('admin.purchase.transaction',compact('treansaction'));
}

public function total()
{
    $product = DB::table('transactions')
    ->select('product_name', DB::raw('count(*) as total'))
    ->selectRaw('sum(sale) as sum, product_name')
    ->groupBy('product_name')
    ->get();
    return view('admin.purchase.total',compact('product'));
}


}
