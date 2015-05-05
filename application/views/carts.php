<!DOCTYPE html>
<html>
<head>
	<title>(Carts Page) Shopping Cart | Dojo eCommerce</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="assets/css/index.css">
	<style type="text/css">
		e {
			text-align: right;
		}
		#shop {
			text-align: right;
		}
		.info {
			width: 200px;
			display: inline-block;
		}
		.info2 {
			width: 200px;
			vertical-align: top;
			display: inline-block;
		}
		.box {
			margin: 2px;
		}
		.short {
			width: 50px;
			margin: 2px;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="header">
			<h3 id="brand">Dojo eCommerce</h3>
			<p id="cart_number">Shopping Cart (5)</p>
		</div>

		<div id="list">
			<table class="table table-striped">
				<thead>
					<th>Item</th>
					<th>Price</th>
					<th>Quantity</th>
					<th>Total</th>
				</thead>

				<tbody class="table table-striped">
					<td>Black Belt for Staff</td>
					<td>$19.99</td>
					<td>1 &nbsp;&nbsp;&nbsp;
						<a href="">update</a>&nbsp;&nbsp;&nbsp;
						<a href="Products/remove_from_cart"><img src="http://www.londonbiopackaging.com/wp-content/uploads/2014/01/Tidyman.png" width="15"></a></td>
					<td>$19.99</td>
				</tbody>
			</table>
			<e>Total: $49.95</e>
			<div id="shop">
				<button>Continue Shopping</button>
			</div>	
		</div>
		<div>
			<h4>Shipping Information:</h4>
			<form action="/Users/" method="post">
				<div class="info">
					<p>First Name:</p>
					<p>Last Name:</p>
					<p>Address:</p>
					<p>Address 2:</p>
					<p>City:</p>
					<p>State:</p>
					<p>Zipcode:</p>
				</div>
				<div class="info2">
					<input type="text" name="fname" class="box"><br>
					<input type="text" name="lname" class="box"><br>
					<input type="text" name="shipping_street" class="box"><br>
					<input type="text" name="shipping_street2" class="box"><br>
					<input type="text" name="shipping_city" class="box"><br>
					<input type="text" name="shipping_state" class="box"><br>
					<input type="text" name="shipping_zip" class="box"><br>
				</div>
				
				<h4><strong>Billing Information:</h4>
				<h6><input type="checkbox" name="check">Same as shipping information:</h6>

				<div class="info">
					<p>First Name:</p>
					<p>Last Name:</p>
					<p>Address:</p>
					<p>Address 2:</p>
					<p>City:</p>
					<p>State:</p>
					<p>Zipcode:</p>
					<p>Card:</p>
					<p>Security code:</p>
					<p>Expiration:</p>
				</div>
				<div class="info2">
					<input type="text" name="fname" class="box"><br>
					<input type="text" name="lname" class="box"><br>
					<input type="text" name="billing_street" class="box"><br>
					<input type="text" name="billing_street2" class="box"><br>
					<input type="text" name="billing_city" class="box"><br>
					<input type="text" name="billing_state" class="box"><br>
					<input type="text" name="billing_zip" class="box"><br>
					<input type="text" name="card" class="box">
					<input type="text" name="seccode" class="box">
					<input type="text" name="month" class="short"> / <input type="text" name="year" class="short"><br><br>
					<input type="submit" value="Pay">
				</div>
			</form>
		</div>
	</div>
</body>
</html>