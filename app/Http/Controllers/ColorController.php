<?php

namespace App\Http\Controllers;

use App\Http\Requests\ColorFormRequest;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $colors=Color::orderBy('id','DESC')->paginate(10);
        return view('admin.color.index',compact('colors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $color =new Color();
        return view('admin.color.create',compact('color'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ColorFormRequest $request)
    {
        $validatedData=$request->validated();
        $color=Color::create($validatedData);
        return redirect('admin/color')->with('message','Color Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Color $color)
    {
        return view('admin.color.show',compact('color'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Color $color)
    {
        return view('admin.color.edit',compact('color'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ColorFormRequest $request, Color $color)
    {
        $validatedData=$request->validated();
        $color->update($validatedData);
        return redirect('admin/color')->with('message','Color Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Color $color)
    {
        $color->delete();
        return redirect('admin/color')->with('message','Color Deleted Successfully');
    }
}
