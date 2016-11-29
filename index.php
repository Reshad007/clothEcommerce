<!DOCTYPE html>
<html>
<head>
	<!-- Title of the page -->
	<title>Shaunta's Boutique</title>
	<!-- Links bootsrtrap css file -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Links my own css file -->
	<link rel="stylesheet" href="css/main.css">
	<!-- Makes it dynamic for all kind of screen resolutions -->
	<meta name="viewport" content="width=device-width, initial-scale=1, 
	 user - scalabble=no">
	 <!-- Links Ajax javascript directory -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<!-- Links javascript bootstrap file-->
	<script src="js/bootstrap.min.js"></script>
</head>

<body>

<!-- Navbar starts here -->
<nav class="navbar navbar-default navbar-fixed-top">
	<!-- Container starts here -->
	<div class="container">
		<!-- Adds home button to the main page -->
		<a href="index.php" class="navbar-brand">Shaunta's Boutiqe</a>
		<!-- Navigation bar starts here -->
		<ul class="nav navbar-nav">
			<!-- Drop down menue starts here -->
			<li class="dropdown">
				<!-- Dropdown menue button --> 								   <!-- Sign after "menue" -->
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Menu<span class="caret"></span></a>
				<ul class="dropdown-menu" role="menu">
					<li><a href="#">Shirts</a></li>
					<li><a href="#">Pants</a></li>
					<li><a href="#">Shoes</a></li>
					<li><a href="#">Accessories</a></li>
				</ul>
			<!-- Drop down menue finishes here -->	
			</li>
		<!-- Navigation bar finishes here -->	
		</ul>
	</div>
	<!-- container finishes here -->
</nav>
<!-- Navbar finishes here -->


<!-- Header -->
<div id="headerWrapper">
	<div id="back-flower"></div>
	<div id="logotext"></div>
	<div id="fore-flower"></div>
</div>

<!-- Content -->
<div class="container-fluid">
	<!-- Left Side Bar -->
	<div class="col-md-2">Left Side Bar</div>

	<!-- Main Content -->
	<div class="col-md-8">
		<div class="row">
			<h2 class="text-center">Feature Products</h2>

			<div class="col-md-3">
				<h4>Levis Jeans</h4>
				<img src="images/products/men4.png" alt="Levis Jeans" class="img-thumb"/>
				<p class="list-price text-danger">List Price: <s>54.99</s></p>
				<p class="price">Our Price: $19.99</p>
				<button type="button" class="btn btn-sm btn-success" data-toggle="modal" 
				data-target="#details-1">Details</button>
			</div>

			<div class="col-md-3">
				<h4>Women's Shirt</h4>
				<img src="images/products/women7.png" alt="Women's Shirt" class="img-thumb"/>
				<p class="list-price text-danger">List Price: <s>45.99</s></p>
				<p class="price">Our Price: $38.99</p>
				<button type="button" class="btn btn-sm btn-success" data-toggle="modal" 
				data-target="#details-1">Details</button>
			</div>

			<div class="col-md-3">
				<h4>Hollister Shirt</h4>
				<img src="images/products/men1.png" alt="Hollister Shirt" class="img-thumb"/>
				<p class="list-price text-danger">List Price: <s>25.99</s></p>
				<p class="price">Our Price: $19.99</p>
				<button type="button" class="btn btn-sm btn-success" data-toggle="modal" 
				data-target="#details-1">Details</button>
			</div>	
			
			<div>
				<div class="col-md-3">
				<h4>Fancy Shoes</h4>
				<img src="images/products/women6.png" alt="Fancy Shoes" class="img-thumb"/>
				<p class="list-price text-danger">List Price: <s>69.99</s></p>
				<p class="price">Our Price: $49.99</p>
				<button type="button" class="btn btn-sm btn-success" data-toggle="modal" 
				data-target="#details-1">Details</button>
			</div>

			<div class="col-md-3">
				<h4>Boys Hoodie</h4>
				<img src="images/products/boys1.png" alt="Boys Hoodie" class="img-thumb"/>
				<p class="list-price text-danger">List Price: <s>24.99</s></p>
				<p class="price">Our Price: $18.99</p>
				<button type="button" class="btn btn-sm btn-success" data-toggle="modal" 
				data-target="#details-1">Details</button>
			</div>

			<div class="col-md-3">
				<h4>Girls Dress</h4>
				<img src="images/products/girls3.png" alt="Girls Dress" class="img-thumb"/>
				<p class="list-price text-danger">List Price: <s>54.99</s></p>
				<p class="price">Our Price: $19.99</p>
				<button type="button" class="btn btn-sm btn-success" data-toggle="modal" 
				data-target="#details-1">Details</button>
			</div>

			<div class="col-md-3">
				<h4>Women's Skirt</h4>
				<img src="images/products/women3.png" alt="Women's Skirt" class="img-thumb"/>
				<p class="list-price text-danger">List Price: <s>29.99</s></p>
				<p class="price">Our Price: $17.99</p>
				<button type="button" class="btn btn-sm btn-success" data-toggle="modal" 
				data-target="#details-1">Details</button>
			</div>

			<div class="col-md-3">
				<h4>Purse</h4>
				<img src="images/products/women5.png" alt="Purse" class="img-thumb"/>
				<p class="list-price text-danger">List Price: <s>49.99</s></p>
				<p class="price">Our Price: $39.99</p>
				<button type="button" class="btn btn-sm btn-success" data-toggle="modal" 
				data-target="#details-1">Details</button>
			</div>
			</div>
		</div>
	</div>

	<!-- Right Side Bar -->
	<div class="col-md-2">Right Side Bar</div>
</div>

<!-- Footer -->
<footer class="text-center" id="footer" >&copy; Copyrigt 2013-2015 Shaunta's Boutique</footer>

<!-- Details Modal -->
<div class="modal fade details-1" id="details-1" tabindex="-1" role="dialog" aria-labelledby="details-1" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button class="close" type="button" data-dismiss="modal" aria-label="close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title text-center">levis Jeans</h4>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<div class="row">
						<div class="col-sm-6">
							<div class="center-block">
								<img src="images/products/men4.png" alt="Levis Jeans" class="details img-responsive">
							</div>
						</div>
						<div class="col-sm-6">
							<h4>Details</h4>
							<p>This jeans are amazing! They are straight leg, fit great and look sexy. Get a pair while last</p>	
							<hr>
							<p>Price: 34.99</p>
							<p>Brand: Levis</p>

						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-default" data-dismiss="modal">Close</button>
				<!-- Submit Button -->
				<button class="btn btn-warning" type="submit"><span class="glyphicon glyphicon-shopping-cart"></span>Add To Cart</button>
			</div>
		</div>
	</div>
</div>	

<script>
	jQuery(window).scroll(function(){
		// Adds scroll animation to logo
		var vscroll = jQuery(this).scrollTop();
		jQuery('#logotext').css({
			"transform" : "translate(0px, "+vscroll/2+"px)"
		});

		// Adds scroll animation to blurry flower
		var vscroll = jQuery(this).scrollTop();
		jQuery('#back-flower').css({
			"transform" : "translate("+vscroll/5+"px, "+vscroll/12+"px)"
		});

		// Adds scroll animation to sharp flower
		var vscroll = jQuery(this).scrollTop();
		jQuery('#fore-flower').css({
			"transform" : "translate(0px, -"+vscroll/2+"px)"
		});
	});
</script>		
</body>
</html>







