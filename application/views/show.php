<!DOCTYPE html>
<html>
<head>
	<title>Products</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/assets/css/show.css">
</head>
<body>
	<div class="container">
		<div class="header">
			<h3 id="brand">Dojo eCommerce</h3>
			<p id="cart_number">Shopping Cart (4)</p>
		</div>
		<div class="main">
			<div id="product_name">
				<a href="/">Go Back</a>
				<h2><?= $product['name']; ?></h2>
			</div>    
			<div id="product_detail">
				<div id="images">
<?php
	echo '
					<img id="main_image" src="' . $product['image_link'] . '" alt="product_image">
					<div class="thumb_nails">
						<a href=""><img src="' . $product['image_link'] . '" alt="thumb_nails"></a>
						<a href=""><img src="' . $product['image_link'] . '" alt="thumb_nails"></a>
						<a href=""><img src="' . $product['image_link'] . '" alt="thumb_nails"></a>
						<a href=""><img src="' . $product['image_link'] . '" alt="thumb_nails"></a>
						<a href=""><img src="' . $product['image_link'] . '" alt="thumb_nails"></a>
					</div>';
?>
				</div>
				<div id="description">
					<p><?= $product['description']; ?></p>
				</div>
				<form id="buy" action="" method="post">
					<input type="number" min=0 value=1 name="quantity">
					<input type="submit" value="Buy">
				</form>
			</div>
			<div id="similar_products">
				<h2>Similar Items</h2>
				<?php
				for ($j = 1; $j < 9; $j++){
				echo 
				'<div class="product">
					<a href="/products/show">								
						<img src="' . base_url() . '/assets/image/iWatch.png" alt="similar_products">
						<p>Apple Watch</p>
					</a>
				</div>';
				}
				?>
			</div>
		</div>
	</div>
</body>
</html>