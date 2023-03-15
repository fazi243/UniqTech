<?php

namespace App\Http\Controllers;

use App\Http\Requests\SliderFormRequest;
use App\Models\Slider;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::orderBy('id', 'DESC')->paginate(10);
        return view('admin.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $slider = new Slider();
        return view('admin.slider.create', compact('slider'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SliderFormRequest $request)
    {
        $validatedData = $request->validated();
        $slider = Slider::create($validatedData);
        $this->storeImage($slider);
        return redirect('admin/sliders')->with('message', 'Slider Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Slider $slider)
    {
        return view('admin.slider.show',compact('slider'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        return view('admin.slider.edit',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SliderFormRequest $request, Slider $slider)
    {
        if ($request->hasFile('image'))
        {
            unlink(public_path('storage/'.$slider->image));
        }
        $validatedData=$request->validated();
        $slider->update($validatedData);
        $this->storeImage($slider);
        return redirect('/admin/sliders')->with('message','Slider updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
//        if ($slider->image)
//        {
//            unlink(public_path('storage/'.$slider->image));
//        }
        $slider->delete();
        return redirect('/admin/sliders')->with('message','Slider deleted Successfully');
    }

    public function storeImage($slider)
    {
        if (request()->has('image')) {
            $slider->update([
                'image' => request()->file('image')->store('slider', 'public'),
            ]);
            $image = Image::make(public_path('storage/' . $slider->image))->resize(500, 500);
            $image->save();
        }
    }
}
