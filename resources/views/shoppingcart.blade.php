@extends('master')
@section('content')

	
	<!-- Subcategory Title -->
	<div class="jumbotron jumbotron-fluid subtitle">
  		<div class="container">
    		<h1 class="text-center text-white"> Your Shopping Cart </h1>
  		</div>
	</div>
	
	<!-- Content -->
	<div class="container mt-5">
		
		<!-- Shopping Cart Div -->
		<div class="row mt-5 shoppingcart_div">
			<div class="col-12">
				<a href="{{ route('mainpage')}}" class="btn mainfullbtncolor btn-secondary float-right px-3" > 
					<i class="icofont-shopping-cart"></i>
					Continue Shopping 
				</a>
			</div>
		</div>

		<div class="row mt-5 shoppingcart_div">
			<div class="table-responsive">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>No</th>
							<th>Name</th>
							<th > Photo </th>
							
							<th> Price </th>

							<th> Qty </th>
							
							<th> Total </th>
							<th> Discount </th>
							<th> Action </th>
							
						</tr>
					</thead>
					<tbody id="shoppingcart_table">
					

					</tbody>
					<tfoot id="shoppingcart_tfoot">
						
					</tfoot>
				</table>
			</div>
		</div>

		<!-- No Shopping Cart Div -->
		<div class="row mt-5 noneshoppingcart_div text-center">
			
			<div class="col-12">
				<h5 class="text-center " id="p_text">  </h5>
			</div>
			<div class="col-12">
				<textarea class="notes"></textarea>
			</div>

			@role('Customer')
			<div class="col-12 mt-5 ">
				<button type="button" class="btn btn-secondary mainfullbtncolor px-3 buynow_btn" > 
					<i class="icofont-shopping-cart"></i>
					Buy Now
				</button>
			</div>
			@else

			<a href="{{ route('loginpage')}}" class="btn btn-secondary mainfullbtncolor px-3 buynow_btn" > 
					<i class="icofont-shopping-cart"></i>
					Please Login
				</a>

			@endrole
			{{-- <textarea id="notes"></textarea><bt+R+++
			<button type="button"  class="buy_now btn btn-success" value="checked">Checked</button>
 --}}
		</div>
		

	</div>
	
@endsection
