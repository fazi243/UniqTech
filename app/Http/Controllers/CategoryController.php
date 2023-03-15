<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryFormRequest;
use App\Models\Category;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{

    public function index()
    {
        $categories=Category::orderBy('id','DESC')->paginate(10);
        return view('admin.category.index',compact('categories'));
    }
    public function create()
    {
        $category =new Category();
        return view('admin.category.create',compact('category'));
    }
    public function store(CategoryFormRequest $request)
    {
        $validatedData=$request->validated();
        $category=Category::create($validatedData);
        $this->storeImage($category);
        return redirect('admin/category')->with('message','Category Added Successfully');
    }
    public function show(Category $category)
    {
        return view('admin.category.show',compact('category'));
    }
    public function edit(Category $category)
    {
        return view('admin.category.edit',compact('category'));
    }
    public function update(CategoryFormRequest $request, Category $category)
    {
        if ($request->hasFile('image'))
        {
            unlink(public_path('storage/'.$category->image));
        }
        $validatedData=$request->validated();
        $category->update($validatedData);
        $this->storeImage($category);
        return redirect('/admin/category')->with('message','Category updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if ($category->image)
        {
            unlink(public_path('storage/'.$category->image));
        }
        $category->delete();
        return redirect('/admin/category')->with('message','Category deleted Successfully');
    }
    public function storeImage($category)
    {
        if(request()->has('image'))
        {
            $category->update([
                'image'=>request()->file('image')->store('category','public'),
                'slug'=>Str::slug($category->slug)
            ]);
            $image=Image::make(public_path('storage/'.$category->image))->resize(150,150);
            $image->save();
        }
    }

}
