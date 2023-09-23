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

    // DB methods;
    public function store(Request $request) {

        $category = Category::findOrFail($request->category_id);

        $subcategory = SubCategory::findOrFail($request->subcat_id);

        $output = new \Symfony\Component\Console\Output\ConsoleOutput();
        $output->writeln("<info>$category</info>");
        $output->writeln("<info>$subcategory</info>");

        // $request->validate([
        //     'name' => 'required|image|mimes:jpeg, png, jpg, webp, gif',
        //     'short_desc' => 'required',
        //     'brief_desc' => 'required',
        //     'price' => 'required',
        //     'stock' => 'required'
        // ]);
    }
}
