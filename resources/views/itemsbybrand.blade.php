@extends('master')

@section('content')
  <!-- Subcategory Title -->
  <div class="jumbotron jumbotron-fluid subtitle">
    <div class="container">
      <h1 class="text-center text-white">{{$brand->name}}</h1>
    </div>
  </div>
  
  <!-- Content -->
  <div class="container mt-5">
    <div class="row mt-5">
      <div class="col">
        <div class="bbb_viewed_title_container">
          <h3 class="bbb_viewed_title"> {{$brand->name}}  </h3>
          <div class="bbb_viewed_nav_container">
            <div class="bbb_viewed_nav bbb_viewed_prev"><i class="icofont-rounded-left"></i></div>
            <div class="bbb_viewed_nav bbb_viewed_next"><i class="icofont-rounded-right"></i></div>
          </div>
        </div>
        <div class="bbb_viewed_slider_container">
          <div class="owl-carousel owl-theme bbb_viewed_slider">
            @foreach($brand->items as $item)
            <div class="owl-item">
              <div class="bbb_viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
                <div class="pad15">
                  <a href="{{route('itemdetailpage',$item->id)}}" class="text-dark text-decoration-none">
                    <img src="{{ asset($item->photo)}}" class="img-fluid">
                    <p class="text-truncate my-1">{{$item->name}}</p>
                    <p class="item-price mb-2">
                      @php $discount = $item->price-$item->discount @endphp
                      <span class="d-block">Ks {{number_format($item->price)}}</span>
                      <small>-{{number_format($item->discount)}} Ks </strike>  
                    </p>
                  </a>
                  {{-- <div class="star-rating">
                    <ul class="list-inline">
                      <li class="list-inline-item"><i class='bx bxs-star' ></i></li>
                      <li class="list-inline-item"><i class='bx bxs-star' ></i></li>
                      <li class="list-inline-item"><i class='bx bxs-star' ></i></li>
                      <li class="list-inline-item"><i class='bx bxs-star' ></i></li>
                      <li class="list-inline-item"><i class='bx bxs-star-half' ></i></li>
                    </ul>
                  </div> --}}

                  <button class="addtocartBtn text-decoration-none" data-id="{{$item->id}}" data-name="{{$item->name}}" data-photo="{{$item->photo}}" data-price="{{$item->price}}" data-discount="{{$item->discount}}" data-codeno="{{$item->codeno}}">Add to Cart</button>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection