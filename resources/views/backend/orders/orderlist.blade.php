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
           <table class="table table-dark table-bordered">
                <thead>
            

                  <tr>
                    <th colspan="">VouchNo</th>
                    <th scope="col">User</th>
                    <th scope="col">Total</th>
                    <th>Action</th>

                  </tr>
                </thead>
                <tbody>
                  
                  @foreach($orders as $order)
                  <tr>
                    
                    <td>{{$order->voucherno}}</td>
                    <td>{{$order->user->name}}</td>
                    <td>{{$order->total}}</td>
                    <td>
                    <a href="{{ route('orders.show',$order->id)}}" class="btn btn-success">Detail</a>
                    </td>
                   
                    
                  </tr>
                  @endforeach
                </tbody>
               </table>


   </div>



@endsection