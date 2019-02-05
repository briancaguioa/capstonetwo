@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-3">
                <p class=""><h2>Movie Name: {{ $movie->name }}</h2></p>
                <p><h4>Movie Description: {{ $movie->description }}</h4></p>
                <p>
                   Category: {{$category->name}} {{-- getting single value --}}
                </p>
                @if(!Auth::guest())
                    @if (Auth::user()->roles_id == "2" )
                        <a href="/movies/{{$movie->id}}/edit" class="btn btn-primary"><i class="fas fa-edit"></i> Edit</a>
                        <button class="btn btn-danger" data-toggle="modal" data-target="#confirmDelete"><i class="far fa-trash-alt"></i> Delete</button>
                    @endif
                @endif
                <a href="/movies" class="btn btn-outline-primary"><i class="fas fa-chevron-left"></i> Back to Movies</a>

                <div class="modal fade" id="confirmDelete" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h4>Confirm Delete</h4>
                            </div>
                            <div class="modal-body">
                                <p>Are you sure you want to delete this movie?</p>
                            </div>
                            <din class="modal-footer">
                                <button type="button" class="btn btn-white" data-dismiss="modal">Cancel</button>

                                {!!Form::open(['action' => ['MoviesController@destroy', $movie->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                    {{Form::hidden('_method', 'DELETE')}}
                                    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                {!!Form::close() !!}
                            </din>
                        </div>
                    </div>
                </div>
                 <img src="/{{ $movie->image_path }}" class="img-fluid d-block mt-3 rounded">
               
            </div>

            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    </div>
</div>       

   
@endsection