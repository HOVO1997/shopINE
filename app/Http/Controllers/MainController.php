<?php

namespace App\Http\Controllers;


use App\Cat;
use App\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{

    public function index(){
        $products = Product::get();
        return view('index',compact('products'));
    }

    public function categories(){
        $categories = Cat::get();
        return view('categories', compact('categories'));
    }

    public function category($code){
        $category = Cat::where('code', $code)->first();
//        $products = Product::where('category_id',$category->id)->get();
        return view('category', compact('category'));
    }

    public function product($category, $prod = null){
        $product = Product::where('code',$prod)->first();
        return view('product', compact('product','category'));
    }


}
