$(document).ready(function(){
	shownoticount();
	showdata();
	 emptycart();
	 totalplus();

	 $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
	});
		$('.addtocartBtn').click(function(){
		var id=$(this).data('id');
		var name=$(this).data('name');
		var photo=$(this).data('photo');
		var price=$(this).data('price');
		var discount=$(this).data('discount');


		data={

			id:id,
			name:name,
			price:price,
			photo:photo,
			discount:discount,
			qty:1
		};

		console.log(data);

	
		var mycart = localStorage.getItem('item');
		


		if(!mycart){
			var myitem = new Array();

		}
		else{
			var myitem = JSON.parse(mycart);
		}






		var hasid = false;
		$.each(myitem,function(i,v){
			if(v.id == id){
				hasid = true;
				v.qty++;
			}
		})

		// console.log(id);


		if(!hasid){
			myitem.push(data);
		}
		// console.log(data));
		

		localStorage.setItem('item', JSON.stringify(myitem));
		shownoticount();
		showdata();
		emptycart();
		totalplus();
		

	});


	function showdata(){
		var mycart = localStorage.getItem('item');
		if(mycart){
			var mycart_item=JSON.parse(mycart);;
			var showtable="";
			var j=1;var total=0;
			$.each(mycart_item,function(i,v){
				var name =v.name;
				var price=v.price-v.discount;
				var photo=v.photo;
				var qty  =v.qty;
				var subtotal =price*qty;

				var discount =v.discount;






				total+=subtotal;
				showtable +=`
						<tr>
						<td>${j++}</td>
						<td>${name}</td>
						<td><img src='${photo}'' width='200' height = '150'> </td>
						<td>${price}</td>
						<td><button class="btn btn-danger plus_btn btn-sm" data-id="${i} " >+</button>
						<span class="qty">${qty}</span>
						<button class="btn btn-success minus_btn btn-sm" data-id="${i}">-</button></td>
						<td>${qty*price}</td>
						
						<td>
						<button class="btn btn-danger delete_btn" data-id="${i}">Delete</button
						</td>

						
						</tr>



				`;
			})
			showtable+=`<tr>
						<td colspan="6">Total</td>
						<td>${total}</td>

					</tr>`
			$("#shoppingcart_table").html(showtable);

		}else{
			$("#shoppingcart_table").html('');
			


		}
	}


	$('#shoppingcart_table').on('click','.plus_btn',function(){
		var id = $(this).data('id');
		// console.log(id);

		var mycart = localStorage.getItem('item');
		if(mycart)
		{
			var mycart_item = JSON.parse(mycart);
			$.each(mycart_item,function(i,v){
				
				if (i == id) {
					v.qty++;
				}
			});

			// console.log(id);
			// console.log();
			localStorage.setItem('item',JSON.stringify(mycart_item));
			showdata();
			shownoticount();
			emptycart();
			totalplus();
		}

	});


	// qty minus

	$('#shoppingcart_table').on('click','.minus_btn',function(){
		var id = $(this).data('id');
		var mycart = localStorage.getItem('item');
		if(mycart)
		{
			var mycart_item = JSON.parse(mycart);
			$.each(mycart_item,function(i,v){
				if (i == id) {
					v.qty--;

					if(v.qty==0)
					{
						var ans = confirm("Are you sure to reduce?");
						if(ans){
							mycart_item.splice(i,1);
						}else{
							v.qty=1;
						}
					}

				}

			});
			localStorage.setItem('item',JSON.stringify(mycart_item));
			showdata();
			shownoticount();
			emptycart();
			totalplus();
		}
	})


	// delete data
	$('#shoppingcart_table').on('click','.delete_btn',function(){
		var id = $(this).data('id');
		var mycart = localStorage.getItem('item');
		if(mycart)
		{
			var mycart_item = JSON.parse(mycart);
			$.each(mycart_item,function(i,v){
				if (i == id) {
					var ans = confirm("Are you sure to reduce?");
					if(ans){
						mycart_item.splice(i,1);

					}else{
						v.qty=1;
					}
				}

			});
			localStorage.setItem('item',JSON.stringify(mycart_item));
			showdata();
			shownoticount();
			emptycart();
			totalplus();
		}
	})



	// show count noti

	function shownoticount(){
		var mycart = localStorage.getItem('item');
		if(mycart){
			var noti =0;
			var mycart_obj = JSON.parse(mycart);
			$.each(mycart_obj,function(i,v){
				noti+=v.qty;
			
				
			});
			$('.cartNoti').html(noti);
			
		}
	}


	function totalplus(){
		var mycart = localStorage.getItem('item');
		if(mycart){
			var totalplus =0;
			var mycart_obj = JSON.parse(mycart);
			$.each(mycart_obj,function(i,v){
				totalplus+= v.qty*(v.price-v.discount);
			
				
			});
			$('.total_plus').html(totalplus);
			
		}
	}

	function emptycart(){
		var mycart = localStorage.getItem('item');
		var empty ='';
		if(!mycart){
			empty="Your Cart is empty &#128549;";
			$('#p_text').html(empty);
			$('.buynow_btn').hide();
			$('.notes').hide();



			
		}else{
			var mycart_item = JSON.parse(mycart);
			if(mycart_item.length == true){
				empty="Thank For Shopping  &#128525;"; 
			$('#p_text').html(empty);
			$('.buynow_btn').show();
			$('.notes').show();


				
				

			}
			if(mycart_item.length == 0){
			empty="Your Cart is empty &#128549;"; 
			$('#p_text').html(empty);
			$('.buynow_btn').hide();
			$('.notes').hide();

				
				

			}

		}
	}

	$('.buynow_btn').on('click',function(){

		var notes =$('.notes').val();

		var mycart=localStorage.getItem('item');
		if(mycart){

		$.post('/orders',{shop_data:mycart,note:notes},function(response){
			if(response) {
				alert(response);
				localStorage.clear();
				showdata();
				location.href="/";
			}
			})

		}
			
		})
})
