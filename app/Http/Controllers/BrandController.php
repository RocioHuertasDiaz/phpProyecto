<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    function __construct(){
        $this->middleware('auth');
    }


    function show(){
        $list = Brand::all();//Select * from brands
        return view('brands/list',['brands'=>$list]);
    }

    function form($id=null){
        $brand= new brand();
        if($id!=null){
            $brand= Brand::findOrfail($id);
        }
        return view('brands/form',['brand'=> $brand]);
    }

    function save(Request $request){
        
        $request->validate([
            "name"=> 'required'

        ]);


        $brand = new brand();
        if($request->id>0){
            $brand = Brand::findOrfail($request->id);
        }
        $brand -> name = $request->name;
        

        $brand->save();
        return redirect('/brands')->with('message','Marca guardada');

    }

    function delete($id){
        //select*from brands where id=$id;
        $brand = brand::findOrFail($id);
        $brand->delete();
        return redirect('/brands')->with('message','Marca eliminada');

    }
}
