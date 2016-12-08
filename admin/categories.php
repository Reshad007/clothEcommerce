<?php 
	require_once $_SERVER['DOCUMENT_ROOT'].'/clothEcommerce/core/init.php';
	include 'includes/head.php';
	include 'includes/navigation.php';

	$sql = "SELECT * FROM categories WHERE parent = 0";
	$result = $db->query($sql);
	$errors = array();

	// Process Form
	if (isset($_POST) && !empty($_POST)) {
		// Sanitizing data (it means only html entities can be passed)
		$parent = sanitize($_POST['parent']);
		$category = sanitize($_POST['category']);
		$sqlForm = "SELECT * FROM categories WHERE category = '$category' AND parent = '$parent'";
		$fresult = $db->query($sqlForm);
		$count = mysqli_num_rows($fresult);
		// If category is blank
		if ($category == '') {
			$errors[].='The category cannot be left blank.';
		}
		// If exists in the database
		if ($count > 0) {
			$errors[].=$category.' already exists. Please choose a new category.';
		}

		// Display Errors or Update Database
		if (!empty($errors)) {
			// Display errors
			$display = display_errors($errors); ?>
			<script>
				jQuery('document').ready(function(){
					jQuery('#errors').html('<?php echo $display; ?>')
				});
			</script>
		<?php		}else{
			// Update database
			$updatesql = "INSERT INTO categories(category,parent) VALUES ('$category','$parent')";
			$db->query($updatesql);
			header('Location: categories.php');
		}
	}
 ?>

 <h2 class = "text-center">Categories</h2><hr>
 <div class = "row">

 	<!-- Form -->
 	<div class = "col-md-6">
 		 <form class = "form" action="categories.php" method = "post">
 		 	<legend class="text-center">Add A Category</legend>
 		 	<div id = "errors"></div>
 			<div class = "form-group">
 				<label for="parent">Parent</label>
 				<select class = "form-control" name="parent" id="parent">
 					<option value="0">Parent</option>
 					<?php while ($parent = mysqli_fetch_assoc($result)): ?>
 						<option value="<?php echo $parent['id']; ?>"><?php echo $parent['category']; ?></option>
 					<?php endwhile; ?>
 				</select>
 			</div>
 			<div class = "form-group">
 				<label for="category">Category</label>
 				<input type="text" class = "form-control" id="category" name="category">
 			</div>
 			<div class = "form-group">
 				<input type="submit" value="Add Category" class="btn btn-success">
 			</div>
 		</form>
 	</div>

 	<!-- Category Table -->
 	<div class = "col-md-6">
 		<table class = "table table-bordered">
 			<thead>
 				<th>Category</th><th>Parent</th><th></th>
 			</thead>
 			<tbody>
 				<?php 
 					$sql = "SELECT * FROM categories WHERE parent = 0";
					$result = $db->query($sql);

 				while($parent = mysqli_fetch_assoc($result)): // This while displays our categories
 					$parent_id = (int)$parent['id'];
 					$sql2 = "SELECT * FROM categories WHERE parent = '$parent_id'";
 					$cresult = $db->query($sql2);
 				?>
 				<tr class = "bg-primary">
 					<td><?php echo $parent['category']; ?></td>
 					<td>Parent</td>
 					<td>
 						<a href="categories.php?edit=<?php echo $parent['id']; ?>" class = "btn btn-xs btn-default"><span class = "glyphicon glyphicon-pencil"></span></a>
 						<a href="categories.php?delete=<?php echo $parent['id']; ?>" class = "btn btn-xs btn-default"><span class = "glyphicon glyphicon-remove-sign"></span></a>
 					</td>
 				</tr>
	 				<?php while ($child = mysqli_fetch_assoc($cresult)): ?> <!-- This while displays our childs -->
						<tr class = "bg-info">
							<td> <?php echo $child['category'];?> </td>
							<td> <?php echo $parent['category'];?> </td>
							<td>
								<a href="categories.php?edit=<?php echo $child['id']; ?>" class = "btn btn-xs btn-default"><span class = "glyphicon glyphicon-pencil"></span></a>
								<a href="categories.php?delete=<?php echo $child['id']; ?>" class = "btn btn-xs btn-default"><span class = "glyphicon glyphicon-remove-sign"></span></a>
							</td>
						</tr>	

	 				<?php endwhile; ?>
 				<?php endwhile; ?>
 			</tbody>
 		</table>
 	</div>
 </div>

 <?php 
 	include 'includes/footer.php';

  ?>