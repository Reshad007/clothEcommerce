<?php 
require_once $_SERVER['DOCUMENT_ROOT'].'/clothEcommerce/core/init.php';
include 'includes/head.php';
include 'includes/navigation.php';
if (isset($_GET['add'])) {
	// PHP
	$brandQuery = $db->query("SELECT * FROM brand ORDER BY brand");
	$parentQuery = $db->query("SELECT * FROM categories WHERE parent = 0 ORDER BY category");

	?>
	<!-- HTML -->
	<h2 class="text-center">Add A New Product</h2><hr>
	<form action="products.php?add=1" method="POST" enctype="multipart/form-data">
		<!-- TITLE ADD -->
		<div class="form-group col-md-3">
			<label for="title">Title*:</label>
			<input type="text" name="title" class="form-control" id="title" value="<?php echo ((isset($_POST['title']))?sanitize($_POST['title']):''); ?>">
		</div>
		<!-- BRAND -->
		<div class="form-group col-md-3">
			<label for="brand">Brand*:</label>
			<select class="form-control" name="brand" id="brand">
				<option value="<?php echo ((isset($_POST['brand']) && $_POST['brand'] == '')?' selected':'') ?>"></option>
				<?php while ($brand = mysqli_fetch_assoc($brandQuery)): ?>
					<option value="<?php echo $brand['id']; ?>"<?php echo((isset($_POST['brand']) && $_POST['brand'] == $brand['id'])?' selected':''); ?>><?php echo $brand['brand']; ?></option>
				<?php endwhile ?>
			</select>
		</div>
		<!-- PARENT CATEGORY -->
		<div class="form-group col-md-3">
			<label for="parent">Parent Category*</label>
			<select class="form-control" name="parent" id="parent">
				<option value="<?php echo ((isset($_POST['parent']) && $_POST['parent'] == ''?' selected':'')); ?>"></option>
				<?php while ($parent = mysqli_fetch_assoc($parentQuery)): ?>
					<option value="<?php echo $parent['id']; ?>"<?php echo ((isset($_POST['parent']) && $_POST['parent'] == $parent['id'])?' select':''); ?>><?php echo $parent['category']; ?></option>
				<?php endwhile ?>
			</select>
		</div>
		<!-- CHILD CATEGORY -->
		<div class="form-group col-md-3">
			<label for="child">Child Category*</label>
			<select name="child" id="child" class="form-control">
			</select>
		</div>
		<!-- PRICE -->
		<div class="form-group col-md-3">
			<label for="price">Price*</label>
			<input type="text" id="price" name="price" class="form-control" value="<?php echo ((isset($_POST['price']))?sanitize($_POST['price']):''); ?>">
		</div>
		<!-- LIST PRICE -->
		<div class="form-group col-md-3">
			<label for="">List Price*</label>
			<input type="text" id="list_price" name="list_price" class="form-control" value="<?php echo ((isset($_POST['list_price']))?sanitize($_POST['list_price']):''); ?>">
		</div>
		<!-- QTY & SIZES BUTTON -->
		<div class="form-group col-md-3">
			<label>Quantity & Sizes*:</label>
			<button class="btn btn-default form-control" onclick"jQuery('#sizesModal').modal('toggle');return false;">Quantity & Sizes</button>
		</div>
		<!-- SIZES -->
		<div class="form-group col-md-3">
			<label for="sizes">Sizes & Qty Preview</label>
			<input type="text" name="sizes" id="sizes" class="form-control" value="<?php echo ((isset($_POST['sizes']))?$_POST['sizes']:''); ?>" readonly>
		</div>
		<!-- PRODUCT PHOTO -->
		<div class="form-group col-md-6">
			<label for="photo">Product Photo:</label>
			<input type="file" name="photo" id="photo" class="form-control">
		</div>
		<!-- DESCRIPTION -->
		<div class="form-group col-md-6">
			<label for="description">Description</label>
			<textarea name="description" id="description" class="form-control" rows="6"> <?php echo ((isset($_POST['description']))?sanitize($_POST['desciption']):'');?> </textarea>
		</div>
		<!-- SUBMIT BUTTON -->
		<div class="form-group pull-right">
			<input type="submit" value="Add Product" class="form-control btn btn-success">
		</div><div class="clearfix"></div>
	</form>

<?php }else{
$sql = "SELECT * FROM products WHERE deleted = 0";
$presults = $db->query($sql);

if (isset($_GET['featured'])) {
	$id = (int)$_GET['id'];
	$featured = (int)$_GET['featured'];
	$featuredSql = "UPDATE products SET featured = '$featured' WHERE id = '$id'";
	$db->query($featuredSql);
	header('Location: products.php');
}
 ?>
<h2 class="text-center">Products</h2><hr>
<!-- TABLE -->
<table class="table table-bordered table-condensed table-striped">
	<thead><th></th><th>Product</th><th>Price</th><th>Category</th><th>Featured</th><th>Sold</th></thead>
	<tbody>
		<?php while ($product = mysqli_fetch_assoc($presults)):
			$childID = $product['categories'];
			$catSql = "SELECT * FROM categories WHERE id = '$childID'";
			$result = $db->query($catSql);
			$child = mysqli_fetch_assoc($result);
			$parentID = $child['parent'];
			// Parent sql
			$pSql = "SELECT * FROM categories WHERE id = '$parentID'";
			$presult = $db->query($pSql);
			$parent = mysqli_fetch_assoc($presult);
			$category = $parent['category'].'~'.$child['category'];
		 ?>
			<tr>
				<td>
					<a href="products.php?edit=<?php echo $product['id'] ?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-pencil"></span></a>
					<a href="products.php?delete=<?php echo $product['id'] ?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-remove"></span></a>
				</td>
				<td><?php echo $product['title']; ?></td>
				<td><?php echo money($product['price']); ; ?></td>
				<td><?php echo $category; ?></td>
				<td><a href="products.php?featured=<?php echo (($product['featured'] == 0)?'1':'0'); ?>&id=<?php echo $product['id']; ?>" class="btn btn-xs btn-default">
					<span class="glyphicon glyphicon-<?php echo (($product['featured']==1)?'minus':'plus') ?>"></span>
				</a>&nbsp <?php echo (($product['featured'] == 1)?'Feautured Product':''); ?></td>
				<td>0</td>
			</tr>
		<?php endwhile; ?>
	</tbody>
</table>

<!-- ADD PRODUCT BUTTON -->
<a href="products.php?add=1" class="btn btn-success pull-right" id="add-product-btn">Add Product</a><div class="clearfix"></div>

 <?php } include 'includes/footer.php';
