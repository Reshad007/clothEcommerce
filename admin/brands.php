<?php 
	require_once'../core/init.php';
	include 'includes/head.php';
	include 'includes/navigation.php';
	// Get brands from database
	$sql = "SELECT * FROM brand ORDER BY brand";
	$results = $db->query($sql);
	$errors = array();

	// Edit Brand                            'edit' - is taken from form
	if (isset($_GET['edit']) && !empty($_GET['edit'])) {
		$edit_id = (int)$_GET['edit'];
		$edit_id = sanitize($edit_id);
		$sql2 = "SELECT * FROM brand WHERE id ='$edit_id'";
		$edit_result = $db->query($sql2);
		$eBrand = mysqli_fetch_assoc($edit_result);
	}

	// Delete Brand                            'delete' is taken from form
	if (isset($_GET['delete']) && !empty($_GET['delete'])) {
		$delete_id = (int)$_GET['delete'];
		$delete_id = sanitize($delete_id);
		$sql = "DELETE FROM brand WHERE id ='$delete_id'";
		$db->query($sql);
		header('Location: brands.php');
	}

	// If add form is submitted            'add_submit' - is taken from form bellow
	if (isset($_POST['add_submit'])) {
		$brand = sanitize($_POST['brand']);

		// Check if brand is blank
		if ($_POST['brand'] == '') {
			$errors[] .= ' You must enter a brand!';
		}
		// Check if brand exists in database
		$sql = "SELECT * FROM brand WHERE brand = '$brand'";
		if (isset($_GET['edit'])) {
			$sql = "SELECT * FROM brand WHERE brand = '$brand' AND id != '$edit_id'";
		}
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
			if (isset($_GET['edit'])) {
				$sql = "UPDATE brand SET brand = '$brand' WHERE id = '$edit_id'";
			}
			$db->query($sql);
			header('Location: brands.php'); 
		}
	}
 ?>

<h2 class = "text-center">Brands</h2><hr>
<!-- Brand Form -->
<div class = "text-center">
	<form class = "form-inline" action="brands.php<?php echo ((isset($_GET['edit']))?'?edit='.$edit_id:''); ?>" method="post">
		<div class = "form-group">
			<?php 
			$brand_value = '';
			if (isset($_GET['edit'])) {
				$brand_value = $eBrand['brand'];
			}else{
				if (isset($_POST['brand'])) {
					$brand_value = sanitize($_POST['brand']);
				}
			}
			 ?>
			<label for="brand"><?php echo ((isset($_GET['edit']))?'Edit':'Add A') ?> Brand</label>
			<input type="text" name="brand" id="brand" class="form-cntrol" value = "<?php echo $brand_value ?>">
			
			<!-- Cancels the edit -->
			<?php if (isset($_GET['edit'])): ?>
				<a href="brands.php" class="btn btn-default">Cancel</a>
			<?php endif; ?>

			<input type="submit" name="add_submit" value="<?php echo ((isset($_GET['edit']))?'Edit ':'Add ') ?>Brand" class="btn btn-success">
		</div>
	</form>
</div><hr>
<!-- End of Brand Form -->

<table class="table table-bordered table-striped table-auto table-condensed">
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