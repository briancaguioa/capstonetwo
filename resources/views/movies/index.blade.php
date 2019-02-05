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
            <a href="/categories/{{$category->id}}" class="btn btn-primary">{{ $category->name }}</a>
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
                                <p>{{\App\Category::find($movie->category_id)->name}}</p>

                                @if (Auth::user()->roles_id == "1" )
                                    <input type="hidden" name="quantity" id="quantity_{{$movie->id}}" class="form-control" value="1">

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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

    <script>
        function addToCart(id) {
            let quantity = $("#quantity_"+id).val();
            // alert(quantity);
            // console.log("Item Ordered: " + id + " Quantity Order: " + quantity);
            $.ajax({
                "url" : "/addToCart/"+id,
                "type" : "POST",
                "data" : {
                    '_token': "{{csrf_token()}}",
                    'quantity' : quantity
                },
                "success": function(data) {
                    alert("Movie successfuly added");
                }
            })


        }
    </script>
@endsection



