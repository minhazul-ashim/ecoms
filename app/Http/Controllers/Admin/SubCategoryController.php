<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Brick\Math\BigInteger;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index () {
        $subcats = SubCategory::latest()->get();
        return view('admin.subcategory.all', compact('subcats'));
    }

    public function add () {
        $categories = Category::latest()->get();
        return view('admin.subcategory.add', compact('categories'));
    }

    public function edit($id) {
        $subcat = SubCategory::findOrFail($id);
        $categories = Category::latest()->get();
        return view('admin.subcategory.edit', compact(['subcat', 'categories']));
    }

    // database controller methods;
    public function store(Request $request) {
        $request->validate([
            'name' => 'required | unique:sub_categories',
            'category_id' => 'required'
        ]);

        $category = Category::find($request->category_id);

        SubCategory::insert([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'slug' => strtolower(str_replace(' ', '-', $request->name)),
            'category_name' => $category->name,
        ]);

        $category = Category::find($request->category_id)->increment('subcat_count', 1);

        return redirect()->route('allSubCategory')->with('message', 'Successfully created a new subcategory');
    }

    public function update(Request $request) {
        $request->validate([
            'name' => 'required | unique:sub_categories'
        ]);

        SubCategory::findOrFail($request->id)->update([
            'name' => $request->name
        ]);

        return redirect()->route('allSubCategory')->with('message', 'Successfully updated the subcategory.');
    }

    public function delete($id) {
        $subcat = SubCategory::findOrFail($id);
        Subcategory::findOrFail($id)->delete();
        Category::findOrFail($subcat->category_id)->decrement('subcat_count', 1);

        return redirect()->route('allSubCategory')->with('message', 'Successfully Deleted the Subcategory');
    }
}
