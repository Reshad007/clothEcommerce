<?php 
	
	// Assigns all parent categories from database to variable
	$sql = "SELECT * FROM categories WHERE parent = 0";
	// Calls that variable
	$pquery = $db->query($sql);


 ?>



<!-- Navbar starts here -->
<nav class="navbar navbar-default navbar-fixed-top">
	<!-- Container starts here -->
	<div class="container">
		<!-- Adds home button to the main page -->
		<a href="index.php" class="navbar-brand">Shaunta's Boutiqe</a>
		<!-- Navigation bar starts here -->
		<ul class="nav navbar-nav">

			<!-- Loops through categories and displays all parent categories -->
			<?php while ($parent = mysqli_fetch_assoc($pquery)) :  ?>
				<?php $parent_id = $parent['id']; 
				"<span class='glyphicon glyphicon-align-justify'> ldflfvdf</span>";
				$sql2 = "SELECT * FROM categories WHERE parent = '$parent_id'";
				$cquery = $db->query($sql2);
				?>

			<!-- Menue Items-->
			<li class="dropdown">
				<!-- Dropdown menue button --> 								   								 <!-- Sign after "menue" -->
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $parent['category']; ?><span class="caret"></span></a>
				<ul class="dropdown-menu" role="menu">
					<?php while ($child = mysqli_fetch_assoc($cquery)) :  ?>
			
					<li><a href="#"><?php echo $child['category']; ?></a></li>
			
					<?php endwhile; ?>
				</ul>	
			</li>
			<!-- Drop down menue finishes here -->
	
		<?php endwhile; ?>

		</ul> 
		<!-- Navigation bar finishes here -->
	</div>
	<!-- container finishes here -->
</nav>
<!-- Navbar finishes here -->