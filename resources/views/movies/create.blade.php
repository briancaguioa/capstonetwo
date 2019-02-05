@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <h1>Add Movie</h1>
            {!! Form::open(['action' => 'MoviesController@store', 'enctype' => 'multipart/form-data', 'method' => 'POST']) !!}
                <div class="form-group">
                   {{Form::label('name', 'Title')}}
                   {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
                </div>

                <div class="form-group">
                   {{Form::label('description', 'Description')}}
                   {{Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Description'])}}
                </div>

                {{-- <div class="form-group">
                    {!! Form::label('categories', 'Choose a Category') !!}
                    {!! Form::select('categories', $select, null, ['class'=>'form-control']) !!}
                </div> --}}
                <div class="form-group">
                    <label for="category">Category</label>
                    <select name="category" id="category" class="form-control mb-3">
                        @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    {{-- {!! Form::label('image',) !!} --}}
                    {!! Form::file('image', ['type' => 'file', 'class'=>'form-control-file']) !!}
                </div>

                {{Form::submit('Submit', ['class'=>'btn btn-primary' ])}}
            {!! Form::close() !!}
    </div>
</div>       
	
	 
@endsection
