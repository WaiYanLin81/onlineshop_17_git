@extends('backend.backendtemplate')

@section('content')


		<div class="container-fluid">
		 	<div class="d-sm-flex align-items-center justify-content-between mb-4">
           <div class="row">
           	<div class="col-md-12">
           		 <h1 class="h3 mb-0 text-gray-800">Show All Subcategories  Here!</h1>
           	</div>
           </div>
           <a class="btn btn-primary" href="{{ route('subcategories.create')}}">Add New</a>
       </div>
       		 <table class="table  table-bordered">
           		 	<thead class="text-center">
 						

           		 		<tr>
           		 			<th scope="col" >No</th>
           		 			
           		 			<th scope="col">Subcategory Name</th>
           		 	
           		 			<th scope="col">Actions</th>
           		 		</tr>
           		 	</thead>
           		 	<tbody>
           		 		@php $i=1; @endphp
           		 		@foreach($subcategories as $subcategory)
           		 		<tr>
           		 			<td class="text-center">{{$i++}}</td>
           		 		
           		 			<td>{{$subcategory->name}}</td>
           		 		
           		 			<td class="text-center">
           		 			<a href="" class="btn btn-success">Detail</a>
           		 			<a href="{{ route('subcategories.edit',$subcategory->id)}}" class="btn btn-warning">Edit</a>
           		 			<a href="" class="btn btn-danger">Delete</a></td>
           		 			
           		 		</tr>
           		 		@endforeach
           		 	</tbody>
           		 </table>


   </div>



@endsection