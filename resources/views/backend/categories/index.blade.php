@extends('backend.backendtemplate')

@section('content')


		<div class="container-fluid">
		 	<div class="d-sm-flex align-items-center justify-content-between mb-4">
           <div class="row">
           	<div class="col-md-12">
           		 <h1 class="h3 mb-0 text-gray-800">Show All Categories  Here!</h1>
           	</div>
           </div>
           <a class="btn btn-primary" href="{{ route('categories.create')}}">Add New</a>
       		</div>
       	
       	<table class="table  table-bordered">
    
       		<thead>
       			<tr>
       				<td>No</td>
       				<td>Name</td>
       				<td>Phorto</td>
       				<td>Actions</td>
       			</tr>
       		</thead>
       		<tbody>
       			@php $i=1; @endphp
       			@foreach($categories as $category)
       			<tr>
       				
       				<td>{{$i++}}</td>
       				<td>{{$category->name}}</td>
       				<td><img src="{{ asset($category->photo)}}" class=" " width="200" height="150"> </td>
       				<td><a href="{{ route('categories.edit',$category->id)}}" class="btn btn-warning">Edit</a>
       				<form action="{{ route('categories.destroy',$category->id)}}" method="POST" onsubmit="return confirm('Are you sure?')" class="d-inline-block" >
                      @csrf
                      @method('DELETE')
                   <input type="submit" class="btn btn-danger" value="Delete">
       				</td>
       			</tr>
       			@endforeach
       		</tbody>
       	</table>
       	<div>
 @endsection