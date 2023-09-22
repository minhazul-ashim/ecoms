<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index () {
        return view('admin.product.all');
    }

    public function add () {
        $categories = Category::latest()->get();
        $sub_categories = SubCategory::latest()->get();
        return view('admin.product.add', compact([
            "categories", "sub_categories"
        ]));
    }
}
