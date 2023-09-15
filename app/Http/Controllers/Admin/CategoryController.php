<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // view controllers;
    public function index () {
        $categories = Category::latest()->get();
        return view('admin.category.all', compact('categories'));
    }

    public function add () {
        return view('admin.category.add');
    }

    public function edit($id) {
        $category = Category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }


    // db controllers;
    public function store (Request $request) {
        $request->validate([
            'name' => 'required | unique:categories'
        ]);

        Category::insert([
            'name' => $request->name,
            'slug' => strtolower(str_replace(' ', '-', $request->name))
        ]);

        return redirect()->route('allCategory')->with('message', 'Successfully created a new category!');
    }

    public function update(Request $request) {

        $id = $request->id;

        $request->validate([
            'name' => 'required | unique:categories'
        ]);

        Category::findOrFail($id)->update([
            'name' => $request->name,
            'slug' => strtolower(str_replace(' ', '-', $request->name))
        ]);

        return redirect()->route('allCategory')->with('message', 'Category Updated Successfully');
    }

    public function delete($id) {
        Category::findOrFail($id)->delete();

        return redirect()->route('allCategory')->with('message', 'Category Deleted Successfully');
    }
}
