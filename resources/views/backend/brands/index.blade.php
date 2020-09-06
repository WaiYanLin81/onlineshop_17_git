@extends('backend.backendtemplate')

@section('content')


		<div class="container-fluid">
		 	<div class="d-sm-flex align-items-center justify-content-between mb-4">
           <div class="row">
           	<div class="col-md-12">
           		 <h1 class="h3 mb-0 text-gray-800">Show All Brand Here!</h1>
                <form class="form-inline" action="{{ route('brands.index') }} " method="get">
                  <input class="form-control mr-sm-2" type="search" placeholder="Search Brand here!" name="brandsname" aria-label="Search">
                  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
           	</div>
           </div>
           <a class="btn btn-primary" href="{{ route('brands.create')}}">Add New</a>
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
       			@foreach($brands as $brand)
       			<tr>
       				
       				<td>{{$i++}}</td>
       				<td>{{$brand->name}}</td>
       				<td><img src="{{ asset($brand->photo)}}" class="img-fluid " width="200" height="150"> </td>
       				<td><a href="{{ route('brands.edit',$brand->id)}}" class="btn btn-warning">Edit</a>
       				<form action="{{ route('brands.destroy',$brand->id)}}" method="POST" onsubmit="return confirm('Are you sure?')" class="d-inline-block" >
                      @csrf
                      @method('DELETE')
                   <input type="submit" class="btn btn-danger" value="Delete">
                
              </form>
       				</td>
       			</tr>
       			@endforeach
       		</tbody>
       	</table>
       	<div>
 @endsection