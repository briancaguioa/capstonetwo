@section('title', 'mycart')

<!DOCTYPE html>
<html>
<head>
	<meta>
	<title>My List</title>

	{{-- fontawesome --}}
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<h1 class="text-center my-3">My List</h1>
	
		@if(count($movie_cart) !=0 )

		<div class="container">
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>Item</th>
						<th>Quantity</th>
						<th class="text-center">Action</th>
					</tr>
				</thead>

				<tbody>
					@foreach($movie_cart as $item)
						<tr>
							<td>{{$item->name}}</td>
							<td>
								<form method="POST" action="/menu/mycart/{{$item->id}}/changeQty">
									{{ csrf_field() }}
									{{ method_field('PATCH') }}
									<div class="input-group">
										<input type="number" name="new_qty" value="{{$item->quantity}}" min=1>
										<div class="input-group-append">
											<button type="submit" class="btn btn-primary"><i class="fas fa-edit"></i> Update Quantity</button>
										</div>
									</div>
								</form>
							</td>
							<td>
								<button class="btn pull-right btn-danger" data-toggle="modal" data-target="#confirmDelete"><i class="far fa-trash-alt"></i> Remove from List</button>
								<div class="modal fade" id="confirmDelete" role="dialog">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<h4>Confirm Remove</h4>
											</div>
											<div class="modal-body">
												<p>Are you sure you want to delete this item?</p>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-white" data-dismiss="modal">Cancel</button>
												<form action="/menu/mycart/{{$item->id}}/delete">
													{{csrf_field()}}
													{{method_field("DELETE")}}
													<button class="btn btn-danger" type="submit">Remove</button>
												</form>
											</div>
										</div>
									</div>
								</div>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
				<a href="/checkout" class="btn btn-success mb-3"> Request</a>
				<a href="/menu/clearcart" class="btn btn-outline-danger mb-3"><i class="far fa-trash-alt"></i> Clear list</a>

			@else
			<div class="container">
				<h4>Your cart is empty</h4>
			</div>
			@endif
			<div class="container">
				<a href="/movies" class="btn btn-primary"><i class="fas fa-chevron-left"></i> Go back to movies</a>
			</div>
		</div> 
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

</body>
</html>


