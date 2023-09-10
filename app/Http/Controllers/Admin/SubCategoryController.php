<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index () {
        return view('admin.subcategory.all');
    }

    public function add () {
        return view('admin.subcategory.add');
    }
}
