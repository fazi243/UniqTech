<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductFormRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id', 'DESC')->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        $colors = Color::where('status', '0')->get();
        return view('admin.products.create', compact('categories', 'brands', 'colors'));
    }

    public function store(ProductFormRequest $request)
    {

        $validatedData = $request->validated();
        $category = Category::findOrFail($validatedData['category_id']);

        $product = $category->products()->create([
            'category_id' => $validatedData['category_id'],
            'name' => $validatedData['name'],
            'slug' => Str::slug($validatedData['slug']),
            'brand' => $validatedData['brand'],
            'small_description' => $validatedData['small_description'],
            'description' => $validatedData['description'],
            'original_price' => $validatedData['original_price'],
            'selling_price' => $validatedData['selling_price'],
            'quantity' => $validatedData['quantity'],
            'trending' => $validatedData['trending'],
            'status' => $validatedData['status'],
            'meta_title' => $validatedData['meta_title'],
            'meta_keyword' => $validatedData['meta_keyword'],
            'meta_description' => $validatedData['meta_description'],
        ]);

//        --------------------------
        if ($request->has('image')) {
            foreach ($request->file('image') as $image) {
                $imageName = $product['name'] . '-image-' . time() . rand(1, 1000) . '.' . $image->extension();
                $image->move(public_path('storage/product_image'), $imageName);
                $product->productImages()->create([
                    'product_id' => $product->id,
                    'image' => $imageName
                ]);
            }
        }
//        -----------------------------
        if ($request->colors) {
            foreach ($request->colors as $key => $color) {
                $product->productColors()->create([
                    'product_id' => $product->id,
                    'color_id' => $color,
                    'color_quantity' => $request->color_quantity[$key] ?? 0
                ]);
            }
        }
        return redirect('admin/products')->with('message', 'New Product Added Successfully');
    }

    public function show(Product $product)
    {
        return view('admin.products.show', compact('product', ));
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        $brands = Brand::all();

       $product_color = $product->productColors()->pluck('color_id')->toArray();
        $colors = Color::whereNotIn('id',$product_color)->get();
        return view('admin.products.edit', compact('product', 'categories', 'brands','colors'));
    }

    public function update(ProductFormRequest $request, int $product)
    {

        $validatedData = $request->validated();
        $product = Category::findOrFail($validatedData['category_id'])->products()->where('id', $product)->first();
        if ($product) {

            $product->update([
                'category_id' => $validatedData['category_id'],
                'name' => $validatedData['name'],
                'slug' => Str::slug($validatedData['slug']),
                'brand' => $validatedData['brand'],
                'small_description' => $validatedData['small_description'],
                'description' => $validatedData['description'],
                'original_price' => $validatedData['original_price'],
                'selling_price' => $validatedData['selling_price'],
                'quantity' => $validatedData['quantity'],
                'trending' => $validatedData['trending'],
                'status' => $validatedData['status'],
                'meta_title' => $validatedData['meta_title'],
                'meta_keyword' => $validatedData['meta_keyword'],
                'meta_description' => $validatedData['meta_description'],
            ]);
//            if ($product->productImages) {
//                foreach ($product->productImages as $image) {
//                    unlink(public_path('storage/product_image/' . $image->image));
//                    $image->delete();
//                }
//
//            }

            if ($request->hasFile('image')) {
                foreach ($request->file('image') as $image) {
                    $imageName = $product['name'] . '-image-' . time() . rand(1, 1000) . '.' . $image->extension();
                    $image->move(public_path('storage/product_image'), $imageName);
                    $product->productImages()->create([
                        'product_id' => $product->id,
                        'image' => $imageName
                    ]);
                }


            }
            if ($request->colors) {
                foreach ($request->colors as $key => $color) {
                    $product->productColors()->create([
                        'product_id' => $product->id,
                        'color_id' => $color,
                        'color_quantity' => $request->color_quantity[$key] ?? 0
                    ]);
                }
            }
            return redirect('admin/products')->with('message', 'Product Updated Successfully');
        } else {
            return redirect('admin/products')->with('message', 'No Such Product ID Found');
        }


    }

    public function destroy(Product $product)
    {
        if ($product->productImages) {
            foreach ($product->productImages as $image) {
                unlink(public_path('storage/product_image/' . $image->image));
            }

        }
        $product->delete();
        return redirect('/admin/products')->with('message', 'Product Deleted Successfully');
    }

    public function deleteImage(int $image)
    {
        $image = ProductImage::findOrFail($image);
        unlink(public_path('storage/product_image/' . $image->image));
        $image->delete();
        return back();
    }
    public function productColorQuantity(Request $request,$product_color_id){
        $productColorData=Product::findOrFail($request->product_id)->productColors()->where('id',$product_color_id);
        $productColorData->update([
            'color_quantity'=>$request->qty
        ]);
return response()->json(['message'=>'Product color quantity updated']);
    }
    public function deleteProductColor($product_color_id){
        $productColorData=ProductColor::findOrFail($product_color_id);
        $productColorData->delete();
        return response()->json(['message'=>'Product color deleted']);
    }

}
