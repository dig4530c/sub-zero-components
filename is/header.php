<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php 
	include_once ('is/config.inc.php'); //Starts session and adds helper functions
	
	/* if (!headers_sent()){
		redirect_invalid_user();
		}
	else {
		include_once('./is/header.php');
		trigger_error('You do not have permission to access this page. Please log in and try
			again.');
		include_once('./is/footer.php');
		} //Redirects invalid users */
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
	
		<?php
	if(isset($_COOKIE["Light"])){
		$light = $_COOKIE["Light"];
	}else{ 
		$light = setcookie("Light", "neutral", time()+3600*24,"/");
	}
	
	if($light == "on"){
		echo '<link rel="stylesheet" href="css/night.css" type="text/css"/>';
	}
	?>
	
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
	<script type="text/javascript">
	$(document).ready(function() {
	$('#lights').click(function() {
			var lightsVal = "<?php echo $light; ?>";
			
			$.ajax({
			type: "GET",
			url: "is/lights.php",
			data: { value: lightsVal }
			})

			.done(function( msg ) {
			location.reload();
			});
			});
			});
	</script>
	
	<!--css3-mediaqueries-js - http://code.google.com/p/css3-mediaqueries-js/ - Enables media queries in some unsupported browsers-->
	<script type="text/javascript" src="js/css3-mediaqueries.js"></script>
		<title>
			<?php 
				if(isset($page_title)){
					echo $page_title;
					}
				else {
					echo 'Sub Zero Components';
					}
			?>
		</title>
        
</script>

<!-- KD Adding js -->
<script type="text/javascript">

function copy_ship_info(f) {
  if(billing.checkbilling.checked == true) {
   	billing.billing_firstname.value = shipping.shipping_firstname.value; //(works within same form)
	
	billing.billing_lastname.value=shipping.shipping_lastname.value;
	billing.billing_address.value=shipping.shipping_address.value;
	billing.billing_city.value=shipping.shipping_city.value;
	billing.billing_phone.value=shipping.shipping_phone.value;
	billing.billing_zip.value=shipping.shipping_zip.value;
	
	state_object="document.billing.billing_state";
	document.billing.billing_state.value=document.shipping.shipping_state.value;
	
	console.log('You Checked');
   // f.billing_lastname.value = f.shippingcity.value;
  }
  
  else {
	console.log('You Un Checked');
	document.billing.billing_firstname.value=""; <!--- billing/form name?.input name--->
	document.billing.billing_lastname.value="";
	document.billing.billing_address.value="";
	document.billing.billing_city.value="";
	document.billing.billing_phone.value="";
	document.billing.billing_zip.value="";	
	}

}


</script>
</head> 

<body>
<?php
	// to count items in the cart
	if (isset($_SESSION['cart'])) {
		$cartCount = count($_SESSION['cart']);
		}
	else {
		$cartCount = 0;
		}
?>
<div class="wrap">
	<div class="container topnav">
		<div class="row">
			<div class="twelevecol last">
				<div id="topnav">
					<ul>
						<?php 
							if(isset($_SESSION['username'])){
								echo "
									<li>Hello,</li>
									<li><span id='name'><a href='client.php'>".$_SESSION['username']."</a></span></li>
									<li>|</li> 
									<li><a href='client.php'>My Account</a></li>
									<li>|</li> 
									<li><a href='logout.php'>Sign Out</a></li>
									";
								}
							else {
								echo "
									<li><a href='login.php'>Login</a></li>
									<li>|</li> 
									<li><a href='register.php'>Register</a></li>
									";
								}
						?>
						<li>|</li> 
						<li><a href="cart.php">View Cart <?php echo "({$cartCount})"; ?></a></li>
						<li>|</li> 
						<li><a href="#" id="lights">Toggle Day/Night Mode</a></li>
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
						<form id="search" method="get" action="search.php">
							<div class="test"><!--id='sbar' class="sbar" class="sbtn"-->
								<input type="text" name="keyword" size="45" maxlength="120" value="Search" class="sbar" />
								<input type="submit" value="Search"  />
							</div>
						</form>
					</div>
				</div>
			</div>
			
		</div>
	</div><!-- end container -->