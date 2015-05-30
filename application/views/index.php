	<?php
	setlocale(LC_MONETARY, 'en_US');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Products</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/css/index.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="header">
			<h3 id="brand">Dojo eCommerce</h3>
			<p id="cart_number">Shopping Cart (5)</p>
		</div>
		<div class="side_nav">
			<form action="/products/search/0/1" method="post">
			<!-- Default search option is to search among all products -->
				<input type="text" name="product_name" placeholder="product name">
				<button>Search</button>
			</form>
			<h4>Categories</h4>
			
			<!-- Beginning of category display -->
			<?php
				foreach ($categories as $category){
			?>

			<a class="nav_category" href="/products/search/<?= $category['id']; ?>/1">
				<?php


					echo 
						$category['name'] . 
					" (" . 
						$category['category_count'] . 
					")";
				?>
			</a>				

			<?php 
				}
			?>
			<a class="nav_category" href="/products/search/0/1"><i><strong>Show All</strong></i></a>
			<!-- End of category display -->
		</div> <!-- End of side_nav -->
		<div class="main">
			<div class="title">
				<div id="selected_category"><h3>Show All (page<p class='title_number'>1</p>)</h3></div>
				<div id="category_nav">
					<div id="page">
						<?php
							$items_per_row = 5;
							$num_rows = 3;
							$items_per_page = $items_per_row * $num_rows;
							$num_pages = ceil(count($products) / ($num_rows * $items_per_row));
						?>
						<a href="/products/search/0/1">first</a> | 
						<a href="/products/search/0/1">prev</a> | <p class="page_number">1</p> | 
						<a href="/products/search/0/2">next</a> | 
						<a href="/products/search/0/<?= $num_pages; ?>">last</a>
					</div>
					<div id="sort">
						<p id="sorted_by">Sorted by</p>
						<form id="dropdown" action="/products/browse/1/1" method="post">
							<select name="sort">
								<option>Most Popular</option>
								<option>Price: Highest - Lowest</option>
								<option>Price: Lowest - Highest</option>
							</select>
							<button>Sort</button>
						</form>
					</div>
				</div>
			</div>
				<?php
					$row1 = array_slice($products, 0, $items_per_row);
					$row2 = array_slice($products, 5, $items_per_row);
					$row3 = array_slice($products, 10, $items_per_row);
					$row4 = array_slice($products, 15, $items_per_row);
					$rows=[$row1, $row2, $row3, $row4];
					// var_dump($page);
			for ($i = 0; $i < $num_rows; $i++){
				echo
			'<div class="products">';
					foreach ($rows[$i] as $product) {
						echo '
				<div class="product">
					<a href="/products/show/' . $product['id'] . '">								
						<img src="' . $product['image_link'] . '" alt="prod_image">
						<p>' . $product['name'] . '</p>
						<p>' . money_format('%(#10n', $product['price']) . "\n" . '</p>						
						<p>Rating: ';
						if ($product['rating'] == null){
							echo 'N/A';
						} else {
							echo $product['rating'];
						}
						echo '</p>
					</a>
				</div>
							';
					}
				echo
			'</div>';
			}
				?>
			<div id="pages">
				<?php
					echo "
						PREV | 
						<p class='current_number'>1</p>";
						for ($i = 2; $i < 11; $i++){
							echo ' | <a href="/products/search/0/' . $i . '"><p class="page_number">' . $i . '</p></a>';
						}
				echo " | <a href='/products/search/0/11'>NEXT</a>"
				?>
			</div> 
		</div> <!-- End of main division -->
	</div>
</body>
</html>