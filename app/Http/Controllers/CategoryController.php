<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function show()
    {
        $categories = Category::where('parent_id',$_GET['categoryId'])->get();
        return view('/categories', compact('categories'));
    }


}
