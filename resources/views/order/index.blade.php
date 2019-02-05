@extends('layouts.app')

@section('content')
<table class="table">
	<thead>
		<tr>
		    <th scope="col">User Name</th>
		    <th scope="col">Quantity</th>
		    <th scope="col">Status</th>
		    @if(!Auth::guest())  
                @if (Auth::user()->roles_id == "2" )
		  			<th scope="col">Action</th>
		  		@endif
            @endif
		</tr>
	</thead>

    <tbody>
    
  		@foreach($orders as $order)
  		
	    	<tr>
				<td>{{$users->find($order->user_id)->name}}</td>
				{{-- <td>{{$users->get($order->user_id)}}</td> --}}
				{{-- <td>{{$order->user_id}}</td> --}}
				<td>{{$order->quantity}}</td>
				<td>{{$statuses->find($order->status_id)->name}}</td>

				@if(!Auth::guest())  
	       			@if (Auth::user()->roles_id == "2" )
			      		<td>
			                <a href="#" class="btn btn-primary"><i class="fas fa-edit"></i>Aproved</a>
			                <button class="btn btn-danger" data-toggle="modal" data-target="#confirmDelete"><i class="far fa-trash-alt"></i> Decline</button>
			            

			       			<div class="modal fade" id="confirmDelete" role="dialog">
						  		<div class="modal-dialog">
						  			<div class="modal-content">
						  				<div class="modal-header">
						  					<h4>Confirm Decline</h4>
						  				</div>
						  				<div class="modal-body">
						  					<p>Are you sure you want to decline this item?</p>
						  				</div>
						  				<din class="modal-footer">
						  					<button type="button" class="btn btn-white" data-dismiss="modal">Cancel</button>

						  					<form method="POST" action="">
						  						{{ csrf_field() }}
						  						{{ method_field('DELETE') }}
						  						<button type="submit" class="btn btn-danger">Confirm</button>
						  					</form>
						  				</din>
						  			</div>
						  		</div>
						  	</div>
			      		</td>
		      		@endif
   				@endif
   				
	   		</tr>
	   	
    	@endforeach
	    
    </tbody>
</table>
@endsection