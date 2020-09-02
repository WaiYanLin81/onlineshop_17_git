@extends('backend.backendtemplate')

@section('content')


		<div class="container-fluid">
		 	<div class="d-sm-flex align-items-center justify-content-between mb-4">
           <div class="row">
           	<div class="col-md-12">
           		 <h1 class="h3 mb-0 text-gray-800">Show All Item  Here!</h1>
           	</div>
           </div>
           <a class="btn btn-primary" href="{{ route('items.create')}}">Add New</a>
       </div>
       		 <table class="table table-dark table-bordered">
           		 	<thead>
 						

           		 		<tr>
           		 			<th scope="col">No</th>
           		 			<th scope="col">Codeno</th>
           		 			<th scope="col">Name</th>
           		 			<th scope="col">Price</th>
           		 			<th scope="col">Actions</th>
           		 		</tr>
           		 	</thead>
           		 	<tbody>
           		 		@php $i=1; @endphp
           		 		@foreach($items as $item)
           		 		<tr>
           		 			<td>{{$i++}}</td>
           		 			<td>{{$item->codeno}}</td>
           		 			<td>{{$item->name}}</td>
           		 			<td>{{$item->price}}</td>
           		 			<td>
           		 			<a href="" class="btn btn-success">Detail</a>
           		 			<a href="{{ route('items.edit',$item->id)}}" class="btn btn-warning">Edit</a>
           		 			<a href="" class="btn btn-danger">Delete</a></td>
           		 			
           		 		</tr>
           		 		@endforeach
           		 	</tbody>
           		 </table>


   </div>



@endsection