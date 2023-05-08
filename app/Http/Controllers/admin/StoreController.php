<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stores = Store::orderByDesc('id')->get();
        return view('admin.stores.index',compact('stores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.stores.create');
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
            'name'=>"required",
            'address'=>"required",
            'logo'=>"required",
        ]);


        $logo = rand().rand().time().$request->file('logo')->getClientOriginalName();
        $request->file('logo')->move(public_path('uploads/images/stores'),$logo);

        Store::create([
            "name"=>$request->name,
            "address"=>$request->address,
            "logo"=>$logo
        ]);

        return redirect()->route('admin.store.index')->with('msg', 'Store added successfully')->with('type', 'success');

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
        $stores = Store::findOrFail($id);
        return view('admin.stores.edit',compact('stores'));
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
            'name' => 'required',
            'address' => 'required',
            'logo' => 'nullable',
        ]);



        $stores = Store::findOrFail($id);
        $logo = $stores->logo;
        if($request->hasFile('logo')) {
            // upload the file
            $logo = rand().rand().time().$request->file('logo')->getClientOriginalName();
            $request->file('logo')->move(public_path('uploads/images/stores/'), $logo);
        }

        // Save data to database
        $stores->update([
            'name' => $request->name,
            'address' => $request->address,
            'logo' => $logo,
        ]);

        return redirect()->route('admin.store.index')->with('msg', 'Store Updated')->with('type', 'info');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stores = Store::findOrFail($id);
        $stores->delete();

        return redirect()->route('admin.store.index')->with('msg', 'Store Deleted')->with('type', 'danger');
    }

    public function trashed()
    {
        $stores = Store::onlyTrashed()->get();
        return view('admin.stores.trash',compact('stores'));
    }

    public function trashedDelete($id){
        $store = Store::onlyTrashed()->findOrFail($id);
        $store->forceDelete();

        return redirect()->back()->with('msg', 'Store Deleted')->with('type', 'danger');

    }

    public function trashedRestore($id){
        $store = Store::onlyTrashed()->findOrFail($id);
        $store->restore();

        return redirect()->back()->with('msg', 'Store Restore')->with('type', 'success');
    }
}
