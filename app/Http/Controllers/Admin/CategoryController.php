<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // view controllers;
    public function index () {
        return view('admin.category.all');
    }

    public function add () {
        return view('admin.category.add');
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
}
