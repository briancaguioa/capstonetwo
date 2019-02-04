@extends('layouts.app')

@section('content')   
    <div class="jumbotron">
        <h1>Movie Page</h1>
        <hr class="my-4">
    </div>

        {{-- categories --}}
        <a href="#" class="btn btn-primary">All</a>
            {{-- @foreach(\App\Category::all() as $category) --}}
            @foreach(\App\Category::all() as $category)
                <a href="/category/{{$category->id}}" class="btn btn-primary">{{ $category->name }}</a>
            @endforeach

        <hr>

        <div class="row">
        @if(count($movies) > 0)
            @foreach($movies as $movie)
                <div class="col-sm-3 ">
                    <div class="card mb-3">
                        <div class="card" >
                            <img src="/{{ $movie->image_path }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title ">{{ $movie->name }}</h5>
                                <p>{{ $movie->description }}</p>
                                {{-- <p>{{ $category->name }}</p> --}}
                                <p>{{\App\Category::find($movie->category_id)->name}}</p>
                                    {{-- {{dd($category->id)}} --}}
                                @if (Auth::user()->roles_id == "1" )
                                    <input type="number" name="quantity" id="quantity_{{$movie->id}}" class="form-control">

                                    <button type="button" class="btn btn-block btn-outline-success" onclick="addToCart({{$movie->id}})">Add to List</button>
                                @endif
                                <a href="/movies/{{ $movie->id }}/" class="btn btn-block bg-primary text-white"> View Details <i class="fas fa-eye"></i></a>
                          </div>
                        </div>
                    </div>
                </div>
            @endforeach
        <div>
            {{$movies->links()}}
        </div>
        @else
            <p>No movies</p>
        @endif

        </div>
@endsection

