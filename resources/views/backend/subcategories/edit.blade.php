@extends('backend.backendtemplate')

@section('content')

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
           <div class="row">
            <div class="col-md-12">
               <h1 class="h3 mb-0 text-gray-800">Subcategories Edit Form</h1>
            </div>
           </div>
       </div>
       <form action="{{ route('subcategories.update',$subcategory->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group row">
                  <label for="subcategories_name" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" id="subcategories_name" name="name" value="{{$subcategory->name}}">
                  </div>
                </div>

                <div class="form-group row">
                    <label for="description" class="col-sm-2">Brand</label>
                  <select class="form-control-md" id="inputBrand" name="category">
                    <optgroup label="Choose Brand">
                      @foreach($categories as $category)
                      <option value="{{$category->id}}">{{$category->name}}</option>
                      @endforeach
                      
                    </optgroup>
                  </select>
                </div>

                


                <div class="form-group row ">
              <div class="col-sm-5">
                  <button type="submit" class="btn btn-primary " >Update</button>
              </div>
          </div>
        </form>

</div>



@endsection