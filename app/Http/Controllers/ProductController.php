<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;

class ProductController extends Controller
{
    function __construct(){
        $this->middleware('auth');
    }



    function show(){
        $list = Product::all();//Select * from products
        return view('products/list',['products'=>$list]);
    }

    function form($id=null){
        $product= new product();
        $brands= Brand::all();
        $categories= Category::all();
        
        if($id!=null){
            $product= Product::findOrfail($id);
        }
        return view('products/form',[
            'product'=> $product,
            'brands'=> $brands,
            'categories'=> $category

        ]);
    }

    function save(Request $request){
        
        $request->validate([
            "name"=> 'required',
            "cost"=>'required|numeric',
            "price"=>'required|numeric',
            "quantity"=>'required|numeric',
            "brand"=>'required',
            "category"=>'required|max:100'
        ]);


        $product = new product();
        if($request->id>0){
            $product = Product::findOrfail($request->id);
        }
        $product -> name = $request->name;
        $product -> cost = $request->cost;
        $product -> price = $request->price;
        $product -> quantity = $request->quantity;
        $product -> brand_id = $request->brand;
        $product ->category_id = $request->category;

        $product->save();
        return redirect('/products')->with('message','Producto guardado');

    }

    function delete($id){
        //select*from products where id=$id;
        $product = Product::findOrFail($id);
        $product->delete();
        //Product::destroy([1,2,3,4])
        return redirect('/products')->with('message','Producto eliminado');

    }
}