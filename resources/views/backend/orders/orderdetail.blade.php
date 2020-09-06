@extends('backend.backendtemplate')

@section('content')


    <div class="container-fluid">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
           <div class="row">
            <div class="col-md-12">
               <h1 class="h3 mb-0 text-gray-800">Order list</h1>
            </div>
           </div>
          {{--  <a class="btn btn-primary" href="{{ route('items.create')}}">Add New</a> --}}
       </div>
           <table class="table  table-bordered">
                <thead class="bg-dark text-white">
            

                  <tr>
                    <th colspan="">No</th>
                    <th scope="col">Item Name</th>
                    <th scope="col">Price</th>
                    <th>Qty</th>
                    <th>Subtotal</th>

                  </tr>
                </thead>
                <tbody>
                  @php $i=1;$total=0; @endphp
                  @foreach($order->items as $item)
                  @php
                  $subtotal = ($item->price-$item->discount) * $item->pivot->qty;
                  $total += $subtotal;
                  $price = $item->price - $item->discount;
                  @endphp
                  <tr>
                    
                    <td>{{ $i++ }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $price }} MMK </td>
                    <td>{{ $item->pivot->qty }}</td>
                    <td>{{ $subtotal }} MMK</td>
                    
                   
                    
                  </tr>
                  @endforeach
                  <tr class="bg-dark text-white">
                    <td colspan="4">Total</td>
                    <td>{{$total}} MMK</td>
                  </tr>
                </tbody>
               </table>


   </div>



@endsection