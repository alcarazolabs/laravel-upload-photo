<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller{
    


    public function index(){
        $products = Product::orderBy('id','desc')->get();

        return view('product.index', compact('products'));
    }

    public function store(Request $request){
        $data = $request->all();
        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $name = 'products/'. uniqid() . '.' . $file->extension();
            $file->storePubliclyAs('public', $name);
            $data['photo'] = $name;
        }
        $product = Product::create($data);

        return $product;
    }

    public function create(){
        return view("product.create");
    }
}
