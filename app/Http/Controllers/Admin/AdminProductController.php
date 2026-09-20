<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductVariation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class AdminProductController extends Controller
{
    public function product_index()
    {
        $products = Product::orderBy('name', 'asc')->get();
        return view('admin.product.index', compact('products'));
    }

    public function product_create()
    {
        $product_categories = ProductCategory::all();
        return view('admin.product.create', compact('product_categories'));
    }

    public function product_submit(Request $request)
    {
        $request->validate([
            'name'              => 'required|string|unique:products,name',
             'seo_title'              => 'nullable|string',
             'seo_description'              => 'nullable|string',
            'slug'              => 'nullable|string|regex:/^[a-z0-9-]+$/|unique:products,slug',
            'short_description' => 'required',
            'photo'             => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'show_on_home'      => 'nullable|boolean'
        ]);

        $product = new Product();

        if ($request->hasFile('photo')) {
            $photo_name = 'product_' . time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('uploads'), $photo_name);
            $product->photo = $photo_name;
        }

        $product->name                = $request->name;
        $product->product_category_id = $request->product_category_id;
        $product->slug                = $request->slug ? Str::slug($request->slug) : Str::slug($request->name);
        $product->short_description   = $request->short_description;
        $product->description         = $request->description;
         $product->seo_title         = $request->seo_title;
         $product->seo_description         = $request->seo_description;
        $product->show_on_home        = $request->boolean('show_on_home');
        $product->save();

        return redirect()->route('admin_product_index')->with('success', 'Product Created Successfully.');
    }

    public function product_edit(string $id)
    {
        $product = Product::findOrFail($id);
        $product_categories = ProductCategory::all();
        return view('admin.product.edit', compact('product', 'product_categories'));
    }

    public function product_update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name'              => ['required', 'string', Rule::unique('products', 'name')->ignore($product->id)],
            'slug'              => ['nullable', 'string', 'regex:/^[a-z0-9-]+$/', Rule::unique('products', 'slug')->ignore($product->id)],
            'short_description' => 'required',
            'photo'             => 'nullable|image|mimes:jpeg,png,jpg,webp,svg,gif|max:2048',
            'show_on_home'      => 'nullable|boolean'
        ]);

        if ($request->hasFile('photo')) {
            if ($product->photo && file_exists(public_path('uploads/' . $product->photo))) {
                unlink(public_path('uploads/' . $product->photo));
            }

            $photo_name = 'product_' . time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('uploads'), $photo_name);
            $product->photo = $photo_name;
        }

        $product->name                = $request->name;
        $product->product_category_id = $request->product_category_id;
        $product->slug                = $request->slug ? Str::slug($request->slug) : Str::slug($request->name);
        $product->short_description   = $request->short_description;
        $product->description         = $request->description;
         $product->seo_title         = $request->seo_title;
         $product->seo_description         = $request->seo_description;
        $product->show_on_home        = $request->boolean('show_on_home');
        $product->save();

        return redirect()->route('admin_product_index')->with('success', 'Product Updated Successfully.');
    }

    public function product_delete(string $id)
    {
        $product = Product::findOrFail($id);

        if ($product->photo && file_exists(public_path('uploads/' . $product->photo))) {
            unlink(public_path('uploads/' . $product->photo));
        }

        $product->delete();

        return redirect()->route('admin_product_index')->with('success', 'Product Deleted Successfully.');
    }

    public function product_variations(string $id)
    {
        $product = Product::findOrFail($id);
        $product_variations = ProductVariation::where('product_id', $id)->get();

        return view('admin.product.variation', compact('product', 'product_variations'));
    }

    public function product_variation_submit(Request $request, string $id)
    {
        $request->validate([
            'label'         => 'required|string|max:255',
            'sale_price'    => 'required|numeric|min:0',
            'regular_price' => 'required|numeric|min:0',
            'stock'         => 'required|integer|min:0',
            'sort_order'    => 'nullable|integer',
        ]);

        $product_variation = new ProductVariation();
        $product_variation->product_id    = $id;
        $product_variation->label         = $request->label;
        $product_variation->sale_price    = $request->sale_price;
        $product_variation->regular_price = $request->regular_price;
        $product_variation->stock         = $request->stock;
        $product_variation->sort_order    = $request->sort_order ?? 0;
        $product_variation->save();

        return redirect()->back()->with('success', 'Product variation added Successfully.');
    }

    public function product_variation_update(Request $request, string $id)
    {
        $request->validate([
            'label'         => 'required|string|max:255',
            'sale_price'    => 'required|numeric|min:0',
            'regular_price' => 'required|numeric|min:0',
            'stock'         => 'required|integer|min:0',
            'sort_order'    => 'nullable|integer',
        ]);

        $product_variation = ProductVariation::findOrFail($id);

        if ($request->filled('product_id')) {
            $product_variation->product_id = $request->product_id;
        }

        $product_variation->label         = $request->label;
        $product_variation->sale_price    = $request->sale_price;
        $product_variation->regular_price = $request->regular_price;
        $product_variation->stock         = $request->stock;
        $product_variation->sort_order    = $request->sort_order ?? 0;
        $product_variation->save();

        return redirect()->back()->with('success', 'Product variation Updated Successfully.');
    }

    public function product_variation_delete(string $id)
    {
        $product_variation = ProductVariation::findOrFail($id);
        $product_variation->delete();

        return redirect()->back()->with('success', 'Product variation Deleted Successfully.');
    }
}