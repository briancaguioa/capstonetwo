<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    // public function findItems($id) {
    //     $category = Category::find($id);
    //     $movies = $category->movies; //this enables us to select all movies for that category

    //     // dd($category);

    //     return view('movies.index', compact('movies'));
        
    // }

    public function saveCategory(Request $request){
        // dd($request);
        $rules = array(
        "name"=> "required"
        );

        $this->validate($request, $rules);

        $category = new Category;
        $category->name = $request->name;
        $category->save();
       
        // Session::flash("success_message", "Item added successfully");
        return redirect('/home');
        // var_dump($category);
    }

}
