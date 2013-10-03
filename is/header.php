<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<?php
session_start();
?>	
		
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	
	<!-- 1140px Grid styles for IE -->
	<!--[if lte IE 9]><link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" /><![endif]-->

	<!-- The 1140px Grid - http://cssgrid.net/ -->
	<link rel="stylesheet" href="css/1140.css" type="text/css" media="screen" />
	
	<!-- Font Awesome -->
	<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet" />
	<!-- Your styles -->
	<!--<link rel="stylesheet" href="css/styles.css" type="text/css" media="screen" />-->
	<style type="text/css">@import url("css/styles.css");</style>
	
	<!--css3-mediaqueries-js - http://code.google.com/p/css3-mediaqueries-js/ - Enables media queries in some unsupported browsers-->
	<script type="text/javascript" src="js/css3-mediaqueries.js"></script>
		<title>SubZero Components - Arissa Brown</title>
</head> 

<body>
<?php
	// to count items in the cart
	$cartCount = count($_SESSION['cart']);
?>
<div class="wrap">
	<div class="container topnav">
		<div class="row">
			<div class="twelevecol last">
				<div id="topnav">
					<ul>
						<li>Hello,</li>
						<li><span id="name"><a href="client.php">UCFStudent</a></span></li>
						<li>|</li> 
						<li><a href="cart.php">View Cart <?php echo "({$cartCount})"; ?></a></li>
						<li>|</li> 
						<li><a href="client.php">My Account</a></li>
						<li>|</li> 
						<li><a href="#">Sign Out</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="container header"> <!-- header container-->
		<div class="row  ">
			<div class="fourcol mclear">
				<div id="logo"><a href="home.php">SubZero Components</a></div>
			</div>
			<div class="eightcol mclear last">
				<div id="hnav">
					<ul>
						<li><a href="catalog.php">Parts</a></li>
						<li><a href="#">Brands</a></li>
						<li><a href="#">Deals</a></li>
						<li><a href="#">Trade</a></li>
					</ul>
					<div id="scontain">
						<form id="search" method="get" action="post">
							<div class="test"><!--id='sbar' class="sbar" class="sbtn"-->
								<input type="text"  size="45" maxlength="120" value="Search" class="sbar" />
								<input type="button" value="Search"  />
							</div>
						</form>
					</div>
				</div>
			</div>
			
		</div>
	</div><!-- end container -->