@extends('frontend_master')

@section("content")


<div class="container mt-5">
		
		<!-- Shopping Cart Div -->
		<div class="row mt-5 shoppingcart_div">
			<div class="col-12">
				<a href="index.php" class="btn mainfullbtncolor btn-secondary float-right px-3" > 
					<i class="icofont-shopping-cart"></i>
					Continue Shopping 
				</a>
			</div>
		</div>

		<div class="row mt-5 shoppingcart_div">
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th colspan="3"> Product </th>
							<th colspan="3"> Qty </th>
							<th> Price </th>
							<th> Total </th>
						</tr>
					</thead>
					<tbody id="shoppingcart_table">
						

					</tbody>
					<tfoot id="shoppingcart_tfoot">
						
						<tr> 
							<td colspan="5"> 
								<textarea class="form-control notes" id="notes" placeholder="Any Request..."></textarea>
							</td>
							<td colspan="3">
								 @role('customer')
								
									<button class="btn btn-secondary btn-block mainfullbtncolor checkout">Check Out</button>  
								 @else

								 <button class="btn btn-secondary btn-block mainfullbtncolor checkout">Sign in Check Out</button>
								 @endrole
								

								
						</tr>
					</tfoot>
				</table>
			</div>
		</div>

		<!-- No Shopping Cart Div -->
		<div class="row mt-5 noneshoppingcart_div text-center">
			
			<div class="col-12">
				<h5 class="text-center"> There are no items in this cart </h5>
			</div>

			<div class="col-12 mt-5 ">
				<a href="index.php" class="btn btn-secondary mainfullbtncolor px-3" > 
					<i class="icofont-shopping-cart"></i>
					Continue Shopping 
				</a>
			</div>

		</div>
		

	</div>

	@endsection()

@section('script')
    <script type="text/javascript" src="{{asset('frontend_asset/js/custom.js')}}"></script>

     <script type="text/javascript">
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      
      $(document).ready(function () {
        $('.checkout').click(function () {
          let notes = $('.notes').val();
          let order = localStorage.getItem('itemlist'); // JSON String
          $.post("{{route('order.store')}}",{order:order,notes:notes},function (response) {
            console.log(response.msg);
          })
        })
      })
    </script>
@endsection
