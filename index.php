<?php 
	require_once 'core/init.php';
	include 'includes/head.php'; 
	include 'includes/navigation.php';
	include 'includes/headerfull.php';  
	include 'includes/leftbar.php';

	// SQL statement
	$sql = "SELECT * FROM products WHERE featured = 1";
	// Runs that sql statement 
	$featured = $db->query($sql);
?>

	<!-- Main Content -->
	<div class="col-md-8">
		<div class="row">
			<h2 class="text-center">Feature Products</h2>
			<?php while ($product = mysqli_fetch_assoc($featured)) : ?>
				<!-- <?php var_dump($product); ?> Let's you see what's being stored in that variable -->

				<div class="col-md-3">
					<!-- $product is an associative array, which has a key 'title' that stores the value for that key. -->
					<h4> <?php echo $product['title']; ?> </h4>
					<!-- Image displayed dinamicly through database -->
					<img src="<?php echo $product['image']; ?>" alt="<?php echo $product['title']; ?>" class="img-thumb"/>
					<!-- Listed price is displayed dinamicly through database -->
					<p class="list-price text-danger">List Price: <s><?php echo $product['list_price']; ?></s></p>
					<!-- Price is displayed dinamicly through database -->
					<p class="price">Our Price: $<?php echo $product['price']; ?></p>
					<!-- Details button -->
					<button type="button" class="btn btn-sm btn-success" data-toggle="modal" 
					data-target="#details-1">Details</button>
				</div>

			<?php endwhile; ?>
			</div>
		</div>
	</div>

	<!-- Image displayed dinamicly through database -->

<?php 
	include 'includes/detailsmodal.php';
	include 'includes/rightbar.php';
	include 'includes/footer.php';
 ?>








