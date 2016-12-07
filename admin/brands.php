<?php 
	require_once'../core/init.php';
	include 'includes/head.php';
	include 'includes/navigation.php';
	// Get brands from database
	$sql = "SELECT * FROM brand ORDER BY brand";
	$results = $db->query($sql);
	$errors = array();

	// If add form is submitted  'add_submit' - is taken from form bellow
	if (isset($_POST['add_submit'])) {
		$brand = sanitize($_POST['brand']);

		// Check if brand is blank
		if ($_POST['brand'] == '') {
			$errors[] .= ' You must enter a brand!';
		}
		// Check if brand exists in database
		$sql = "SELECT * FROM brand WHERE brand = '$brand'";
		$result = $db->query($sql);
		$count = mysqli_num_rows($result);
		if ($count > 0 ) {
			$errors[] .= $brand.' already exists. Please choose another name...';
		}

		// Display errors
		if (!empty($errors)) {
			echo display_errors($errors);
		}else{
			// Add brand to database
			$sql = "INSERT INTO brand (brand) VALUES('$brand')";
			$db->query($sql);
			header('Location: brands.php'); 
		}
	}
 ?>

<h2 class="text-center">Brands</h2><hr>
<!-- Brand Form -->
<div clsas = "pull-right">
	<form class = "form-inline" action="brands.php" method="post">
		<div class = "form-group">
			<label for="brand">Add A Brand</label>
			<input type="text" name="brand" id="brand" class="form-cntrol" value = "<?php echo ((isset($_POST['brand']))?$_POST['brand']:''); ?>">
			<input type="submit" name="add_submit" value="Add Brand" class="btn btn-success">
		</div>
	</form>
</div><hr>
<!-- End of Brand Form -->

<table class="table table-bordered table-striped table-auto">
	<thead>
		<th></th><th class = "text-center">Brand</th><th></th>
	</thead>
	<tbody>
		<?php while ($brand = mysqli_fetch_assoc($results)) : ?>
			<tr> <!-- It's a static link, that is passing an id of 1 -->
				<td><a href="brands.php?edit=<?php echo $brand['id']; ?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-pencil"></span></a></td>
				<td class = "text-center"><?php echo $brand['brand']; ?></td>
				<td><a href="brands.php?delete=<?php echo $brand['id']; ?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-remove-sign"></span></a></td>
			</tr>
	<?php endwhile; ?>
	</tbody>
</table>

 <?php include 'includes/footer.php'; ?>