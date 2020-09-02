@extends('backend.backendtemplate')


@section('content')
		<div class="container-fluid">
		 	<div class="d-sm-flex align-items-center justify-content-between mb-4">
           <div class="row">
           	<div class="col-md-12">
           		 <h1 class="h3 mb-0 text-gray-800">Item Edit Form</h1>
           	</div>
           </div>
       </div>
           		<form action="{{ route('items.update',$item->id)}}" method="post" enctype="multipart/form-data">
           			@csrf
           			@method('PUT')
           			<div class="form-group row">
           				<label for="codeno" class="col-sm-2 col-form-label">Code No</label>
           				<div class="col-sm-5">
           					<input type="text" class="form-control" id="codeno" name="codeno" value="{{$item->codeno}}" readonly="readonly">
           				</div>
           			</div>

           			<div class="form-group row">
           				<label for="name" class="col-sm-2 col-form-label">Name</label>
           				<div class="col-sm-5">
           					<input type="text" class="form-control" id="name" name="name" value="{{$item->name}}">
           				</div>
           			</div>


           			<div class="form-group row">
           				<label for="photo" class="col-sm-2 col-form-label">Photo</label>
           				<div class="col-sm-5">
           					<input type="file"  id="photo" name="photo">
           					<img src="{{ asset($item->photo)}}" class="img-fluid w-5">
           					<input type="hidden" name="oldphoto" value="{{$item->photo}}">
           				</div>
           			</div>

           			<div class="form-group row">
           				<label for="price" class="col-sm-2 col-form-label">Price</label>
           				<div class="col-sm-5">
           					<input type="number" class="form-control" id="price" name="price" value="{{$item->price}}">
           				</div>
           			</div>

           			<div class="form-group row">
           				<label for="discount" class="col-sm-2 col-form-label">Discount</label>
           				<div class="col-sm-5">
           					<input type="number" class="form-control" value="0" id="discount" name="discount" value= "{{$item->discount}}">
           				</div>
           			</div>

           			<div class="form-group row">
           				<label for="description col-form-label" class="col-sm-2">Description</label>
           				<div class="col-sm-5">
           					<textarea class="form-control" id="de" name="description" >
								{{$item->description}}
           						
           					</textarea>
           				</div>
           			</div>

           			<div class="form-group row">
           					<label for="description" class="col-sm-2">Brand</label>
           				<select class="form-control-md" id="inputBrand" name="brand">
           					<optgroup label="Choose Brand">
           						@foreach($brands as $brand)
           						<option value="{{$brand->id}}">{{$brand->name}}</option>
           						@endforeach
           						
           					</optgroup>
           				</select>
           			</div>


           			<div class="form-group row">
           				<label for="description" class="col-sm-2">Subcategory</label>
           				<select class="form-control-md" id="inputBrand" name="subcategory">
           					<optgroup label="Choose Subcategory">
           						@foreach($subcategories as $subcategory)
           						<option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
           						@endforeach
           						
           					</optgroup>
           				</select>
           			</div>


           			 <div class="form-group row">
    					<div class="col-sm-5">
      						<button type="submit" class="btn btn-primary" >Update</button>
    					</div>
 					</div>

           			
           		</form>
           	</div>
           



@endsection