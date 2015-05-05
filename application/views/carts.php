<!DOCTYPE html>
<html>
<head>
	<title>(Carts Page) Shopping Cart | Dojo eCommerce</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="assets/css/index.css">
	<style type="text/css">
		p {
			text-align: right;
		}
		#shop {
			text-align: right;
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
					<td>1 
						<a href="">update</a>
						<a href="Products/remove_from_cart"><img src="http://www.londonbiopackaging.com/wp-content/uploads/2014/01/Tidyman.png" width="15"></a></td>
					<td>Total</td>
				</tbody>
			</table>
			<p>Total: $49.95</p>
			<div id="shop">
				<button>Continue Shopping</button>
			</div>	
		</div>
		<div>
			<h4>Shipping Information:</h4>
			<form action="" method="post" class="form-horizontal">
				<label class="control-label">First Name:</label><input type="text" name="fname" class="form-control">
				<label class="control-label">Last Name:</label><input type="text" name="lname" class="form-control">
				<label class="control-label">Address:</label><input type="text" name="shipping_street" class="form-control">
				<label class="control-label">Address 2:</label><input type="text" name="shipping_street2" class="form-control">
				<label class="control-label">City:</label><input type="text" name="shipping_city" class="form-control">
				<label class="control-label">State:</label><input type="text" name="shipping_state" class="form-control">
				<label class="control-label">Zipcode:</label><input type="text" name="shipping_zip" class="form-control">
				<h4>Billing Information:</h4>
				<input type="checkbox" name="check"> Same as shipping information:
				<label class="control-label">First Name:</label><input type="text" name="fname" class="form-control">
				<label class="control-label">Last Name:</label><input type="text" name="lname" class="form-control">
				<label class="control-label">Address:</label><input type="text" name="billing_street" class="form-control">
				<label class="control-label">Address 2:</label><input type="text" name="billing_street2" class="form-control">
				<label class="control-label">City:</label><input type="text" name="billing_city" class="form-control">
				<label class="control-label">State:</label><input type="text" name="billing_state" class="form-control">
				<label class="control-label">Zipcode:</label><input type="text" name="billing_zip" class="form-control">
				<br>
				<label class="control-label">Card:</label><input type="text" name="card" class="form-control">
				<label class="control-label">Security Code:</label><input type="text" name="seccode" class="form-control">
				<label>Expiration:</label>
			</form>
			
		</div>

		
		
	</div>
</body>
</html>