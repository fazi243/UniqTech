<?php

namespace App\Http\Controllers;

use App\Http\Requests\BrandFormRequest;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands=Brand::orderBy('id','DESC')->paginate(10);
        $emptyBrand=new Brand();
        return view('admin.brand.index',compact('brands','emptyBrand'));
    }

    public function store(BrandFormRequest $request)
    {
        $validatedData=$request->validated();
        $brand=Brand::create($validatedData);
        return redirect('/admin/brand')->with('message','Brand stored Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function update(BrandFormRequest $request, Brand $brand)
    {
        $validatedData=$request->validated();
        $brand->update($validatedData);
        return redirect('/admin/brand')->with('message','Brand updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect('/admin/brand')->with('message','Brand deleted Successfully');
    }
}
