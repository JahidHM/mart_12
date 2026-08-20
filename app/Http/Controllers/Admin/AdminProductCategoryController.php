<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class AdminProductCategoryController extends Controller
{
    
    public function product_category_index()
    {
        
        $product_categories = ProductCategory::orderBy('name','asc')->get();
        return view('admin.product_category.index', compact('product_categories'));
    }

    public function product_category_create()
    {
        return view('admin.product_category.create');
    }

    
    public function product_category_submit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:product_categories,name',
            'show_on_home' => 'required',
            
        ]);

        $product_category = new ProductCategory();
        $product_category->name = $request->name;
        $product_category->slug = $request->slug;
         $product_category->show_on_home = $request->show_on_home;
        $product_category->save();

        return redirect()->route('admin_product_category_index')->with('success', 'Product Category Created Successfully.');
    }

    public function product_category_edit(string $id)
    {
        $product_category = ProductCategory::findOrFail($id);
        return view('admin.product_category.edit', compact('product_category'));
    }

    public function product_category_update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|unique:product_categories,name,' . $id,
            'show_on_home' => 'required',
            'slug' => 'nullable|string|max:255',
        ]);

        $product_category = ProductCategory::findOrFail($id);
        $product_category->name = $request->name;
        $product_category->slug = $request->slug;
        $product_category->show_on_home = $request->show_on_home;
        $product_category->save();

        return redirect()->route('admin_product_category_index')->with('success', 'Product Category Updated Successfully.');
    }

    public function product_category_delete(string $id)
    {
        $product_category = ProductCategory::find($id);

        if (!$product_category) {
            return redirect()->route('admin_product_category_index')->with('error', 'Product Category Not Found.');
        }

        $product_category->delete();

        return redirect()->route('admin_product_category_index')->with('success', 'Product Category Deleted Successfully.');
    }
}