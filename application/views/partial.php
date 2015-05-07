<!DOCTYPE html>
<html>
<head>
	<title>Products</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/index.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="header">
			<h3 id="brand">Dojo eCommerce</h3>
			<p id="cart_number">Shopping Cart (5)</p>
		</div>
		<div class="side_nav">
			<form action="/products/search_by_keyword/1" method="post">
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
			<a class="nav_category" href="/products/pagination/1"><i><strong>Show All</strong></i></a>
			<!-- End of category display -->
		</div> <!-- End of side_nav -->
		<div class="main">
			<div class="title">
				<div id="selected_category"><h3><?= $selected_category['name']; ?> (page<?= "<p class='title_number'>" . $current_page . "</p>"; ?>)</h3></div>
				<div id="category_nav">
					<div id="page">
						<a href="/products/search/<?= $categories_id; ?>/1">first</a> | 
						<a href="/products/search/<?= $categories_id; ?>/
							<?php
							$items_per_row = 5;
							$num_rows = 3;
							$items_per_page = $items_per_row * $num_rows;
							$num_pages = ceil(count($products) / ($num_rows * $items_per_row));
							if ($current_page - 1 < 1){
									echo 1;
								} else {
									echo $current_page - 1; 	
								}
							?>
						">prev</a> | <?= "<p class='page_number'>" . $current_page . "</p>"; ?> | 
						<a href="/products/search/<?= $categories_id; ?>/
						<?php
							if ($current_page + 1 > $num_pages){
								echo $num_pages;
							} else {
								echo $current_page + 1;
							}
						?>
							">next</a>
						 | <a href="/products/search/<?= $categories_id . "/" . $num_pages ?>">last</a>
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
<?php
	for ($i = 0; $i < $num_pages * $num_rows; $i++){
		$rows[] = array_slice($products, (($current_page - 1) * $items_per_page) + ($items_per_row * $i), $items_per_row);
	}
	for ($i = 0; $i < $num_rows; $i++){
		echo '
			<div class="products">
			';
					foreach ($rows[$i] as $product) {
		echo '
				<div class="product">
					<a href="/products/show/' . $product['id'] . '">								
						<img src="' . $product['image_link'] . '" alt="prod_image">
						<p>' . $product['id'] . '</p>
						<p>' . $product['name'] . '</p>
					</a>
				</div>
			';
					}
		echo
			'</div>';
			}
?>
			<div id="pages"> <!-- Page navigation buttons at the bottom -->
<?php
				if ($num_pages == 1){
						echo "
					PREV | 
					<p class='current_number'>" . $current_page . " </p> | NEXT";
				} else if ($current_page == 1 && $num_pages < 10){
						echo "
					PREV | 
					<p class='current_number'>" . $current_page . " </p>";
					for ($i = $current_page + 1; $i < $num_pages; $i++){
						echo ' | <a href="' . $i . '"><p class="page_number">' . $i . '</p></a>';
					}
						echo "
					 | <a href='/products/search/" . $categories_id . "/" . $num_pages . "'>NEXT</a>";
				} else if ($current_page == 1 && $num_pages > 10){
						echo "
					PREV | 
					<p class='current_number'>" . $current_page . " </p>";
					for ($i = $current_page + 1; $i < 11; $i++){
						echo ' | <a href="' . $i . '"><p class="page_number">' . $i . '</p></a>';
					}
						echo "
					 | <a href='/products/search/" . $categories_id . "/" . "11'>NEXT</a>";
				} else if ($current_page - 6 < 0){
					$next = $current_page + 10;
					// Set NEXT link equal to current_page + 10
						echo "
					<a href='/products/search/" . $categories_id . "/" . "1'>PREV</a> | ";
					for ($i = 1; $i < $current_page; $i++){
						echo ' <a href="' . $i . '"><p class="page_number">' . $i . '</p></a> | ';
					}
						echo "
						<p class='current_number'>" . $current_page . " </p>";
					for ($i = $current_page + 1; $i < 11; $i++){
						echo ' | <a href="' . $i . '"><p class="page_number">' . $i . '</p></a>';
					}
						echo "
						 | <a href='/products/search/" . $categories_id . "/" . $next . "'>NEXT</a>";
				} else if ($current_page == $num_pages){
					$prev = $current_page - 10;
					// Setting PREV link equal to current_page - 10
						echo "
					<a href='/products/search/" . $categories_id . "/" . $prev . "'>PREV</a>";
					for ($i = $current_page - 10; $i < $num_pages; $i++){
						echo ' | <a href="' . $i . '"><p class="page_number">' . $i . '</p></a>';
					}				
						echo " | <p class='current_number'>" . $current_page . " </p> | ";
						echo "NEXT";
				} else if ($current_page + 4 > $num_pages){
					$prev = $current_page - 10;
						echo "
					<a href='/products/search/" . $categories_id . "/" . $prev . "'>PREV</a> | ";
					for ($i = $num_pages - 9; $i < $current_page; $i++){
						echo ' <a href="' . $i . '"><p class="page_number">' . $i . '</p></a> | ';
					}
						echo "<p class='current_number'>" . $current_page . " </p>";
					for ($i = $current_page + 1; $i <= $num_pages; $i++){
						echo ' | <a href="' . $i . '"><p class="page_number">' . $i . '</p></a>';
					}
						echo " | <a href='/products/search/" . $categories_id . "/" . $num_pages . "'>NEXT</a>";					
				} else {
					if ($current_page - 10 <= 0){
						$prev = 1;
					} else {
						$prev = $current_page - 10;
					}
					if ($current_page + 10 > $num_pages){
						$next = $num_pages;
					} else {
						$next = $current_page + 10;
					}
						echo "					
					<a href='/products/search/" . $categories_id . "/" . $prev . "'>PREV</a> | ";
					for ($i = $current_page - 5; $i < $current_page; $i++){
						echo '<a href="' . $i . '"><p class="page_number">' . $i . '</p></a> | ';						
					}
					echo "<p class='current_number'>" . $current_page . "</p>";
					for ($i = $current_page + 1; $i < $current_page + 5; $i++){
						echo ' | <a href="' . $i . '"><p class="page_number">' . $i . '</p></a>';						
					}
					echo " | <a href='/products/search/" . $categories_id . "/" . $next . "'>NEXT</a>";					
				}
				?>
			</div> 
		</div> <!-- End of main division -->
		<!-- <a href=""><p>Hello</p></a> -->
	</div>
</body>
</html>