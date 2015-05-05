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
			<p id="cart_number">Shopping Cart (5)</p>
		</div>
		<div class="main">
			<div id="product_name">
				<a href="/">Go Back</a>
				<h2>Apple Watch</h2>
			</div>
			<div id="product_detail">
				<div id="images">
					<img src="<?= base_url(); ?>/assets/image/iWatch.png" alt="product_image">
					<div class="thumb_nails">
						<img src="<?= base_url(); ?>/assets/image/iWatch1.png" alt="thumb_nails">
						<img src="<?= base_url(); ?>/assets/image/iWatch2.png" alt="thumb_nails">
						<img src="<?= base_url(); ?>/assets/image/iWatch3.png" alt="thumb_nails">
						<img src="<?= base_url(); ?>/assets/image/iWatch4.png" alt="thumb_nails">
						<img src="<?= base_url(); ?>/assets/image/iWatch5.png" alt="thumb_nails">
					</div>
				</div>
				<div id="description">
					<p>High-quality watches have long been defined by their ability to keep unfailingly accurate time, and Apple Watch is no exception. In conjunction with your iPhone, it keeps time within 50 milliseconds of the definitive global time standard. It even lets you customize your watch face to present time in a more meaningful, personal context that’s relevant to your life and schedule. Apple Watch makes all the ways you’re used to communicating more convenient. And because it sits right on your wrist, it can add a physical dimension to alerts and notifications. For example, you’ll feel a gentle tap with each incoming message. Apple Watch also lets you connect with your favorite people in fun, spontaneous ways — like sending a tap, a sketch, or even your heartbeat.</p>
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