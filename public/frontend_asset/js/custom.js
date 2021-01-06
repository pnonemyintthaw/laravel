$(document).ready(function(){

	showdata();
	count();

	$(".addtocartBtn").click(function(){
    			// alert("ok");
    			var id=$(this).data('id');
    			var name=$(this).data('name');
    			var codeno=$(this).data('codeno');
    			var photo=$(this).data('photo');
    			var price=$(this).data('price');
    			var discount=$(this).data('discount');

    			var item={
    				id:id,
    				codeno:codeno,
    				name:name,
    				price:price,
    				photo:photo,
    				discount:discount,
    				qty:1,
    			}
    			// console.log(item);
    			var itemString=localStorage.getItem('itemlist');
    			var itemArray;
    			if(itemString==null){
    				itemArray=[];
    			} else{
    				itemArray=JSON.parse(itemString);
    			}
    			var status=false;
    			$.each(itemArray,function(i,v){
    				if(v.id==id){
    					v.qty++;
    					status=true;
    				}
    			})
    			if(!status){
    				itemArray.push(item);
    			}
    			var itemString=JSON.stringify(itemArray);
    			localStorage.setItem("itemlist",itemString);
    			showdata();
    			count();

    })

	function showdata(){
		var itemlist=localStorage.getItem('itemlist');
		// console.log(itemlist);
		var itemArray=JSON.parse(itemlist);
		console.log(itemArray);
		var html="";
		var total=0;

		$.each(itemArray,function(i,v){
    				// console.log(v.discount);
    				if(v.discount){
    					var subtotal=v.qty*v.discount;
    					 // console.log(subtotal);
    					}else{
    						var subtotal=v.qty*v.price;

    					}
    					total+=subtotal;
    					html+=`<tr>
    					<td>
    					<button id="remove" class="btn btn-outline-danger remove btn-sm" style="border-radius: 50%"  data-id="${i}"> 
    					<i class="icofont-close-line"></i> 
    					</button> 
    					</td>
    					<td><img src="${v.photo}" class="cartImg"></td>
    					<td><p> ${v.name} </p>
    					<p> ${v.codeno}</p></td>
    					<td><button class="btn btn-outline-secondary plus_btn" id="btnincrease" data-id="${i}"> 
    					<i class="icofont-plus"></i> 
    					</button>
    					</td>
    					<td><span>${v.qty}</span></td>
    					<td><button class="btn btn-outline-secondary minus_btn" id="btndecrease" data-id="${i}"> 
    					<i class="icofont-minus"></i>
    					</button>

    					</td>
    					<td><p class="text-danger"> 
    					${v.discount}
    					</p>
    					<p class="font-weight-lighter"> 
    					<del> ${v.price} </del> 
    					</p>
    					</td>
    					<td>${subtotal}</td>
    					</tr>`
    				})
		// console.log(html);
		html+=`<tr>
		<td colspan="8">
		<h3 class="text-right"> Total : ${total} </h3>
		</td>
		</tr>`
		$("#shoppingcart_table").html(html);

    

	}

	$("#shoppingcart_table").on("click","#remove",function(){
    			// alert("ok");
    			var id=$(this).data("id");
    			// console.log(id);
    			var itemlist=localStorage.getItem("itemlist");
    			var itemArray=JSON.parse(itemlist);

    			itemArray.splice(id,1);

    			var itemstring=JSON.stringify(itemArray);
    			localStorage.setItem("itemlist",itemstring);
    			showdata();
    			count();
    		})

	$("#shoppingcart_table").on("click","#btnincrease",function(){
			// alert("ok");
			var id=$(this).data("id");
			console.log(id);
			console.log(id);
			var itemlist=localStorage.getItem("itemlist");
			var itemArray=JSON.parse(itemlist);
			// console.log(itemArray);

			$.each(itemArray,function(i,v){
				if(i==id){
					v.qty++;
				}
			})

			var itemstring=JSON.stringify(itemArray);
			localStorage.setItem("itemlist", itemstring);
			showdata();
			count();
		})

	$("#shoppingcart_table").on("click","#btndecrease",function(){
		// alert("ok");
		var id=$(this).data('id');
		var itemlist=localStorage.getItem("itemlist");
		var itemArray=JSON.parse(itemlist);
			//console.log(ItemArray);

			$.each(itemArray,function(i,v){
				if(i==id){
					v.qty--;
					if(v.qty==0){
						itemArray.splice(id,1);
					}
				}
				// console.log(itemArray);
			})

			var itemstring=JSON.stringify(itemArray);
			localStorage.setItem("itemlist", itemstring);
			showdata();
			count();
		})
	function count(){
		var totalcount=0;
		var total=0;

		var itemlist=localStorage.getItem("itemlist");
		if(itemlist){
			var itemArray=JSON.parse(itemlist);
			$.each(itemArray,function(i,v){
				totalcount+=v.qty;
				if(v.discount){
					var subtotal=v.qty*v.discount;
    					 // console.log(subtotal);
    					}else{
    						var subtotal=v.qty*v.price;

    					}
    					total+=subtotal;

    				})

		}
		$("#cart").html(totalcount);
		$("#cart_ks").html(total);
	}

})
