@extends('master')

@section('content')
  <!-- Subcategory Title -->
  <div class="jumbotron jumbotron-fluid subtitle">
      <div class="container">
        <h1 class="text-center text-white"> {{$item->codeno}} </h1>
      </div>
  </div>
  
  <!-- Content -->
  <div class="container">

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb ">
        <ol class="breadcrumb bg-transparent">
           <li class="breadcrumb-item">
            <a href="{{route('mainpage')}}" class="text-decoration-none secondarycolor"> Home </a>
          </li>
          <li class="breadcrumb-item">
            <a href="{{route('itemsbycategorypage',$item->subcategory->category->id)}}" class="text-decoration-none secondarycolor"> {{$item->subcategory->category->name}} </a>
          </li>
          <li class="breadcrumb-item">
            <a href="{{route('fliteritemspage',$item->subcategory->id)}}" class="text-decoration-none secondarycolor"> {{$item->subcategory->name}} </a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">
            {{$item->name}}
          </li>
        </ol>
    </nav>

    <div class="row mt-5">
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
        <img src="{{ asset($item->photo)}}" class="img-fluid">
      </div>  


      <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
        
        <h4> {{$item->name}} </h4>

        <div class="star-rating">
          <ul class="list-inline">
            <li class="list-inline-item"><i class='bx bxs-star' ></i></li>
            <li class="list-inline-item"><i class='bx bxs-star' ></i></li>
            <li class="list-inline-item"><i class='bx bxs-star' ></i></li>
            <li class="list-inline-item"><i class='bx bxs-star' ></i></li>
            <li class="list-inline-item"><i class='bx bxs-star-half' ></i></li>
          </ul>
        </div>

        <p>
          {{$item->description}}
        </p>

        <p> 
          <span class="text-uppercase "> Current Price : </span>
          @php $discount = $item->price-$item->discount @endphp
          <span class="maincolor ml-3 font-weight-bolder">{{number_format($discount)}} Ks</span>
        </p>

        <p> 
          <span class="text-uppercase "> Price : </span>
          <span class="maincolor ml-3 font-weight-bolder">({{number_format($item->price)}} 
            -{{number_format($item->discount)}})Ks</span>
        </p>


        <p> 
          <span class="text-uppercase "> Brand : </span>
          <span class="ml-3"> <a href="" class="text-decoration-none text-muted"> {{$item->brand->name}} </a> </span>
        </p>


        <a href="#" class="addtocartBtn text-decoration-none" data-id="{{$item->id}}" data-name="{{$item->name}}" data-price="{{$item->price}}" data-discount="{{$item->discount}}" data-photo="{{ asset($item->photo)}}">
          <i class="icofont-shopping-cart mr-2"></i> Add to Cart
        </a>
        
      </div>
    </div>

    <div class="row mt-5">
      <div class="col-12">
        <h3> Related Item </h3>
        <hr>
      </div>
      

      
      @foreach($items as $item)
      <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
        <a href="{{ route('itemdetailpage',$item->id)}}">
          
          <img src="{{ asset($item->photo)}}" class="" width="200" height="150">
        </a>
      </div>
      @endforeach

     
    
  </div>
</div>
@endsection