@extends('backend.backendtemplate')

@section('content')


		<div class="container">
		 	<div class="d-sm-flex align-items-center justify-content-between mb-4">
           <div class="row">
           	<div class="col-md-12">
           		 <h1 class="h3 mb-0 text-gray-800">Show All Item  Here!</h1>
           	</div>
           </div>
           <a class="btn btn-primary" href="{{ route('items.create')}}">Add New</a>
       </div>
        <div class="row"> 
          <div class="col-md-12">
       		 <table class="table">
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
                    <a href="{{ route('items.show',$item->id) }}" class="btn btn-success">Detail</a>
           		 			<a href="{{ route('items.edit',$item->id)}}" class="btn btn-warning">Edit</a>
           		 			<form action="{{ route('items.destroy',$item->id)}}" method="POST" onsubmit="return confirm('Are you sure?')" class="d-inline-block" >
                      @csrf
                      @method('DELETE')
                   <input type="submit" class="btn btn-danger" value="Delete">
                  </form>
                  </td>
           		 		</tr>
           		 		@endforeach
           		 	</tbody>
           		 </table>
          </div>
        </div>


   </div>



@endsection