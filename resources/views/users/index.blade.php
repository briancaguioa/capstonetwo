@extends('layouts.app')

@section('content')

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Address</th>
            <th scope="col">Roles_id</th>
            <th scope="col">Action</th>
        </tr>
  </thead>
    @foreach($users as $user)
    <tbody>
        <tr>
             <th scope="row">1</th>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->address}}</td>
            <td>{{$user->roles_id}}</td>
            <td>
                 <a href="/users/{{$user->id}}/edit" class="btn btn-primary"><i class="fas fa-edit"></i> Edit</a>

                 <button class="btn btn-danger" data-toggle="modal" data-target="#confirmDelete"><i class="far fa-trash-alt"></i> Delete</button>
                 <div class="modal fade" id="confirmDelete" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h4>Confirm Delete</h4>
                            </div>
                            <div class="modal-body">
                                <p>Are you sure you want to dealete this movie?</p>
                            </div>
                            <din class="modal-footer">
                                <button type="button" class="btn btn-white" data-dismiss="modal">Cancel</button>

                                {!!Form::open(['action' => ['UsersController@destroy', $user->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                    {{Form::hidden('_method', 'DELETE')}}
                                    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                {!!Form::close() !!}
                            </din>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
    </tbody>
    @endforeach
</table>
@endsection

