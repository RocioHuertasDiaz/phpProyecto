<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    function __construct(){
        $this->middleware('auth');
    }
        
    function show(){

        $list = category::all();//Select * from brands
        return view('categories/list', ['categories' => $list]);

    }
    function form($id = null){
        $category = new Category();
        if($id!=null){
            $category = Category::findOrFail($id);
            
        }

        return view('categories/form',['category'=>$category]);
    }

    function save(Request $request){
        
        $request->validate([
            "name"=>'required|max:50',
            "description"=>'required|max:50',

        ]);


        $category = new category();
            if($request->id > 0){
                $category = Category::findOrFail($request->id);
            }
        
        $category->name = $request->name;
        $category->description = $request->description;

        $category->save();

        return redirect('/categories')->with('message', 'Categoria guardada');;
}

        function delete($id){
        $category = category::findOrFail($id);
        $category->delete();

        return redirect('/categories')->with('message', 'Categoria eliminada');;

}

}