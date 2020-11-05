<?php
if(!isset($_SESSION)) {session_start();}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Cart</title>
		<meta name='viewport' content='width=device-width, initial-scale=1'>
		<script src="js/jquery.min.js"></script>
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/styles.css" />
		<script src="js/bootstrap.min.js"></script>
		<!--Search box-->


		<script type="text/javascript">

		$(document).ready(function(){
		    $('.search-box input[type="text"]').on("keyup input", function(){
		        /* Get input value on change */
		        var inputVal = $(this).val();
		        var resultDropdown = $(this).siblings(".result");
		        if(inputVal.length){
		            $.get("backend-search.php", {term: inputVal}).done(function(data){
		                // Display the returned data in browser
		                resultDropdown.html(data);
		            });
		        } else{
		            resultDropdown.empty();
		        }
		    });

		    // Set search input value on click of result item
		    $(document).on("click", ".result p", function(){
		        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
		        $(this).parent(".result").empty();
		    });
		});
		//confirm box
		function functionConfirm(msg, myYes, myNo) {
			 var confirmBox = $("#confirm");
			 confirmBox.find(".message").text(msg);
			 confirmBox.find(".yes,.no").unbind().click(function() {
					confirmBox.hide();
			 });
			 confirmBox.find(".yes").click(myYes);
			 confirmBox.find(".no").click(myNo);
			 confirmBox.show();
		}
		</script>
		<style>
		#confirm {
            display: none;
         }
		.popover
		{
		    width: 100%;
		    max-width: 800px;
		}
		/* The flip card container - set the width and height to whatever you want. We have added the border property to demonstrate that the flip itself goes out of the box on hover (remove perspective if you don't want the 3D effect */
.flip-card {
  background-color: transparent;
  width: 100%;
  height: 200px;

  perspective: 1000px; /* Remove this if you don't want the 3D effect */
}

/* This container is needed to position the front and back side */
.flip-card-inner {
  position: relative;
  width: 100%;
  height: 100%;
  text-align: center;
  transition: transform 0.8s;
  transform-style: preserve-3d;
}

/* Do an horizontal flip when you move the mouse over the flip box container */
.flip-card:hover .flip-card-inner {
  transform: rotateY(180deg);
}

/* Position the front and back side */
.flip-card-front, .flip-card-back {
  position: absolute;
  width: 100%;
  height: 100%;
  -webkit-backface-visibility: hidden; /* Safari */
  backface-visibility: hidden;
}

/* Style the front side (fallback if image is missing) */

/* Style the back side */
.flip-card-back {
  color: white;
  transform: rotateY(180deg);
}
		</style>
	</head>
	<body>
		<div class="container">
			<br />
			<h3 align="center"><a>e-Kula Products</a></h3>
			<br />
			<nav class="navbar navbar-default" role="navigation">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Menu</span>
						<span class="glyphicon glyphicon-menu-hamburger"></span>
						</button>
						<a class="navbar-brand" href="#">e-Kula</a>
					</div>

					<div id="navbar-cart" class="navbar-collapse navbar-right collapse">
						<ul class="nav navbar-nav">
							<li>
								<a id="cart-popover" class="btn" data-placement="bottom" title="Shopping Cart">
									<span class="glyphicon glyphicon-shopping-cart"></span>
									<span class="badge"></span>
									<span class="total_price">Ksh. 0.00</span>
								</a>
							</li>
							<li><a>	<?php if (isset($_SESSION['user_name'])) {
									echo 'Logged in as '.$_SESSION["user_name"].'';
								} else {
									echo 'Youre not loggen in';
								}  ?></a></li>
								<li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Action <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="checkout/">Checkout</a>
                  </li>
                  <li><a href="myorders.php">Order History</a>
                  </li>
                  <li role="separator" class="divider"></li>
                  <li><a href="#">Setings</a>
                  </li>
                  <li>
                    <form action="../../logout.php">
											<?php
											if(isset($_SESSION['user_email'])){
													?>
													<button type="button" class="btn btn-link" onclick="functionConfirm('Your cart is not saved. Do you want to save it?', function yes() {
														 alert('Your cart has been saved! Logging out...');

													},
													function no() {
														 alert('Logging out...');
													});" name="logout">Logout</button>
														<?php

											} else{?>
												<button class="btn btn-link" type="submit" onclick="Are you sure you want to Log out?')" name="logout2">Logout</button>
												<?php
											}
											?>
											<li>	<div id="confirm">
									         <div class="message"></div>
									         <button type="submit" name ="save_yes" class="yes">Yes</button>
									         <button  type="submit" name="save_no" class="no">No</button>
									      </div></li>
                    </form>
                  </li>

						</ul>
					</div>

				</div>

			</nav>
			<div id="popover_content_wrapper" style="display: none">
				<span id="cart_details"></span>
				<div align="right">
					<a href="checkout" class="btn btn-primary" id="check_out_cart">
					<span class="glyphicon glyphicon-shopping-cart"></span> Check out
					</a>
					<a href="#" class="btn btn-default" id="clear_cart">
					<span class="glyphicon glyphicon-trash"></span> Clear
					</a>
				</div>
			</div>
   </body>
			<div class="row" style="margin:3px">
			<div style="margin-top:12px" class="search-box">
					<input type="text" autocomplete="off" placeholder="Search item..." />
					<div class="result"></div>
			</div>
			</div>
			<br>
			<hr>
			<div id="display_item">


			</div>

		</div>
	</body>
</html>

<script>
$(document).ready(function(){

	load_product();

	load_cart_data();

	function load_product()
	{
		$.ajax({
			url:"fetch_item.php",
			method:"POST",
			success:function(data)
			{
				$('#display_item').html(data);
			}
		});
	}

	function load_cart_data()
	{
		$.ajax({
			url:"fetch_cart.php",
			method:"POST",
			dataType:"json",
			success:function(data)
			{
				$('#cart_details').html(data.cart_details);
				$('.total_price').text(data.total_price);
				$('.badge').text(data.total_item);
			}
		});
	}

	$('#cart-popover').popover({
		html : true,
        container: 'body',
        content:function(){
        	return $('#popover_content_wrapper').html();
        }
	});

	$(document).on('click', '.add_to_cart', function(){
		var product_id = $(this).attr("id");
		var product_name = $('#name'+product_id+'').val();
		var product_price = $('#price'+product_id+'').val();
		var product_quantity = $('#quantity'+product_id).val();
		var description= $('#description'+product_id).val();
		var action = "add";
		if(product_quantity > 0)
		{
			$.ajax({
				url:"action.php",
				method:"POST",
				data:{product_id:product_id, product_name:product_name, product_price:product_price, product_quantity:product_quantity, action:action},
				success:function(data)
				{
					load_cart_data();
					alert("Item has been Added into Cart");
				}
			});
		}
		else
		{
			alert("lease Enter Number of Quantity");
		}
	});

	$(document).on('click', '.delete', function(){
		var product_id = $(this).attr("id");
		var action = 'remove';
		if(confirm("Are you sure you want to remove this product?"))
		{
			$.ajax({
				url:"action.php",
				method:"POST",
				data:{product_id:product_id, action:action},
				success:function()
				{
					load_cart_data();
					$('#cart-popover').popover('hide');
					alert("Item has been removed from Cart");
				}
			})
		}
		else
		{
			return false;
		}
	});

	$(document).on('click', '#clear_cart', function(){
		var action = 'empty';
		$.ajax({
			url:"action.php",
			method:"POST",
			data:{action:action},
			success:function()
			{
				load_cart_data();
				$('#cart-popover').popover('hide');
				alert("Your Cart has been cleared");
			}
		});
	});

});

</script>
