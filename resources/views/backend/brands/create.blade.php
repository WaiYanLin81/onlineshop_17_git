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
       <form action="{{ route('brands.store')}}" method="post" enctype="multipart/form-data">
           			@csrf
           			<div class="form-group row">
           				<label for="brand_name" class="col-sm-2 col-form-label">Name</label>
           				<div class="col-sm-5">
           					<input type="text" class="form-control" id="brand_name" name="name">
                    @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name')}}</span>
                    @endif
           				</div>
           			</div>

           			
           			<div class="form-group row">
           				<label for="photo" class="col-sm-2 col-form-label">Photo</label>
           				<div class="col-sm-5">
           					<input type="file"  id="photo" name="photo">
                    @if ($errors->has('photo'))
                    <span class="text-danger">{{ $errors->first('photo')}}</span>
                    @endif
           				</div>
           			</div>


           			<div class="form-group row ">
    					<div class="col-sm-5">
      						<button type="submit" class="btn btn-primary " >Create</button>
    					</div>
 					</div>
        </form>

</div>



@endsection