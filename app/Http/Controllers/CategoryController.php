<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show($id){
        $category=Category::find($id);
        $categoryName=Category::all();
        return view('categories.show',[
            'pictures'=>$category->pictures,
            'categoryName'=>$category->name
        ]);
    }
}
