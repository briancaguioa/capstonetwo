<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Movie; //reference the model Movie
use DB;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $movies = Movie::all();
        //object relational mapper
        // return Post::where('title', 'Avengers')->get()
        // $movies = Movie::orderBy('created_at', 'desc')->take(1)->get();
        // $movies = Movie::orderBy('created_at', 'desc')->get(); //eloquent that fetch all data in this date or in this table
        $categories = Category::all();
        $movies = Movie::all();
        return view('movies.index', compact('categories', 'movies'));
        // return view('movies.index')->with('movies', $movies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('movies.create')->with('categories', $categories);

        // $categories = Category::lists('name');
        // $categories = Category::all();
        // return view('movies.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $rules = array(
        "name"=> "required",
        "description"=> "required",
        "image"=> "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048"
        );

        $this->validate($request, $rules);

        $movie = new Movie;
        $movie->name = $request->name;
        $movie->description = $request->description;
        $movie->category_id = $request->category;

        $image = $request->file('image');
        $image_name = time().".". $image->getClientOriginalExtension();
        $destination = "images/";
        $image->move($destination, $image_name);

        $movie->image_path = $destination.$image_name;
        $movie->save();
        // Session::flash("success_message", "Item added successfully");
        return redirect('/movies')->with('success', 'Movie created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $category = Movie::find($id) //Category::find($id);// $categories = Category::find($id); //passing one parameter
        $movie =  Movie::find($id); //movie because it returns a single movie
        $category = Category::find($movie->category_id);
        return view('movies.showMovieDetails', compact('category','movie')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $movie =  Movie::find($id); //movie because it returns a single movie
        return view('movies.edit', compact('categories','movie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $rules = array(
        "name"=> "required",
        "description"=> "required",
        "image"=> "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048"
        );

        $this->validate($request, $rules);

        $movie = Movie::find($id);
        $movie->name = $request->name;
        $movie->description = $request->description;
        $movie->category_id = $request->category;

        $image = $request->file('image');
        $image_name = time().".". $image->getClientOriginalExtension();
        $destination = "images/";
        $image->move($destination, $image_name);

        $movie->image_path = $destination.$image_name;
        $movie->save();
        // Session::flash("success_message", "Item added successfully");
        return redirect('/movies')->with('success', 'Movie Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie = Movie::find($id);
        $movie->delete();
        return redirect('/movies')->with('success', 'Post Remove');
    }
}
