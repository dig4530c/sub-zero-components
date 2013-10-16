<?php
$page_title = "Sub Zero Components - Shop";
include ('is/header.php'); 

$id = $_GET['id'];
if(isset($_GET['action']) && $_GET['action'] == 'add'){
    echo "<div>" . $_GET['name'] . " was added to your cart.</div>";
}

//if($_GET['action']=='exists')
if(isset($_GET['action']) && $_GET['action'] == 'exists'){
    echo "<div>" . $_GET['name'] . " already exists in your cart.</div>";
}	
 
	?>
		<!-- stuff -->
		<div class="container  "><!--  container-->
			<div class="row clear">
				<div class="twelvecol "><!--nav track -->
					<div id='track'>
						<ul>
							<li><a href='home.php'>Home</a></li>
							<li>/</li>
							<li><a href='#'>Cooling Supplies</a></li>
							<li>/</li>
							<li><a href='catalog.php'>Liquid Cooling</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="row space">
					<?php include ('is/product.php'); ?> 
			</div>
		</div>
		<?php include ('is/footer.php'); ?>
