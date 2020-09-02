@extends('backend.backendtemplate')

@section('content')

<div class="container-fluid">
		<div class="d-sm-flex align-items-center justify-content-between mb-4">
           <div class="row">
           	<div class="col-md-12">
           		 <h1 class="h3 mb-0 text-gray-800">Brand Create Form</h1>
           	</div>
           </div>
       </div>
       <form action="{{ route('categories.update',$category->id)}}" method="post" enctype="multipart/form-data">
           			@csrf
                @method('PUT')
           			<div class="form-group row">
           				<label for="brand_name" class="col-sm-2 col-form-label">Name</label>
           				<div class="col-sm-5">
           					<input type="text" class="form-control" id="brand_name" name="name" value="{{$category->name}}">
           				</div>
           			</div>

           			
           			<div class="form-group row">
           				<label for="photo" class="col-sm-2 col-form-label">Photo</label>
           				<div class="col-sm-5">
           					<input type="file"  id="photo" name="photo">
                      <img src="{{ asset($category->photo)}}" class="img-fluid " width="200" height="150">
                    <input type="hidden" name="oldphoto" value="{{$category->photo}}">
           				</div>
           			</div>


           			<div class="form-group row ">
    					<div class="col-sm-5">
      						<button type="submit" class="btn btn-primary " >Update</button>
    					</div>
 					</div>
        </form>

</div>



@endsection