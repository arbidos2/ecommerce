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
	<link rel="stylesheet" type="text/css" href="assets/css/index.css">
</head>
<body>
	<div class="container">
		<div class="header">
			<h3 id="brand">Dojo eCommerce</h3>
			<p id="cart_number">Shopping Cart (5)</p>
		</div>
		<div class="side_nav">
			<form action="" method="post">
				<input type="text" name="prodcut_name" placeholder="product name">
			</form>
			<h4>Categories</h4>
			<a class="nav_category" href="t_shirts.php">T shirts (25)</a>
			<a class="nav_category" href="shoes.php">Shoes (35)</a>
			<a class="nav_category" href="cups.php">Cups (5)</a>
			<a class="nav_category" href="fruits.php">Fruits (105)</a>
			<a class="show_all" href="show_all.php"><i>Show All</i></a>
		</div>
		<div class="main">
			<div class="title">
				<div id="selected_category"><h3>T shirts (page 2)</h3></div>
				<div id="category_nav">
					<div id="page">
						<a href="first.php">first</a> | 
						<a href="prev.php">prev</a> | 2 | 
						<a href="next.php">next</a>
					</div>
					<div id="sort">
						<p id="sorted_by">Sorted by</p>
						<form id="dropdown" action="" method="post">
							<select name="sort">
								<option>Most Popular</option>
								<option>Price: Highest - Lowest</option>
								<option>Price: Lowest - Highest</option>
							</select>
						</form>
					</div>
				</div>
			</div>
			<div class="products">
<<<<<<< HEAD
				<div id="row_1">
					<div class="product">
						<img src="http://betanews.com/wp-content/uploads/2014/09/iWatch-004-angle-2.jpg" alt="prod_image">
						<p>iWatch</p>
					</div>
					<div class="product">
						<img src="" alt="prod_image">
						<p>iWatch</p>
					</div>
					<div class="product">
						<img src="" alt="prod_image">
						<p>iWatch</p>
					</div>
					<div class="product">
						<img src="" alt="prod_image">
						<p>iWatch</p>
					</div>
					<div class="product">
						<img src="" alt="prod_image">
						<p>iWatch</p>
					</div>
				</div>
				<div id="row_2">
					<div class="product">
						<img src="" alt="prod_image">
						<p>iWatch</p>
					</div>
					<div class="product">
						<img src="" alt="prod_image">
						<p>iWatch</p>
					</div>
					<div class="product">
						<img src="" alt="prod_image">
						<p>iWatch</p>
					</div>
					<div class="product">
						<img src="" alt="prod_image">
						<p>iWatch</p>
					</div>
					<div class="product">
						<img src="" alt="prod_image">
						<p>iWatch</p>
					</div>
				</div>
				<div id="row_3">
					<div class="product">
						<img src="" alt="prod_image">
						<p>iWatch</p>
					</div>
					<div class="product">
						<img src="" alt="prod_image">
						<p>iWatch</p>
					</div>
					<div class="product">
						<img src="" alt="prod_image">
						<p>iWatch</p>
					</div>
					<div class="product">
						<img src="" alt="prod_image">
						<p>iWatch</p>
					</div>
					<div class="product">
						<img src="" alt="prod_image">
						<p>iWatch</p>
					</div>
				</div>
=======
				<?php
					for ($i = 1; $i < 4; $i++){
						echo
						'<div id="row_' . $i . '">';
						for ($j = 1; $j < 6; $j++){
							echo 
							'<div class="product">
								<a href="/products/show">								
									<img src="assets/image/iWatch.png" alt="prod_image">
									<p>iWatch</p>
								</a>
							</div>';
						}
						echo '</div>';
					}
				?>
>>>>>>> 67dedfc05531887abc626ed70f4a0e4446fd4a1f
			</div>
			<div id="pages">
				<?php
					for ($i = 1; $i < 11; $i++){
						echo '<a href="' . $i . '.php">' . $i . '</a> | ';
					}
				?>
				<a href="next.php">-></a>
			</div> 
		</div> <!-- End of main division -->
	</div>
</body>
</html>