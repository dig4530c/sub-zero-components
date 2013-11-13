<?php
require('./is/config.inc.php');
if (!headers_sent()){
		redirect_non_super();
		}
else {
	include_once('./is/header.php');
	trigger_error('You do not have permission to access this page. Please log in and try
		again.');
	include_once('./is/footer.php');
	} //Redirects invalid users
$page_title = "SubZero Components - Manage Products";
include ('is/header.php'); 
include ('is/dash.php'); 
?>

		<!-- stuff -->
		<div class="container  "><!--  container-->
			<div class="row space">
				<div class="row">
			
					<div class="threecol "><!--sidebar col-->
						<div id="sidebar">
							<div><h3><a href="cpanel.php" class='super' id='apanel'>Administrator Panel</a></h3></div>
							<div>
								<ul>
									<li><a href="add.php" class='see' id='make'>Add Products</a></li>
									<li><a href="manage.php" class='see'  id='pro' >Manage Products</a></li>
									<li><a href="users.php"class='see' id='users'>Manage Users</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="ninecol last"> <!--user info col-->
						<div id="admin">
							<h1>Welcome, <?php if(isset($_SESSION['username'])) echo $_SESSION['username'] ?>!</h1>
						</div>
						<div id="mpro" class='show'>
							<h2>Manage Products</h2>
							<?php include ('is/managep.php'); ?>
						</div>
					</div>
				</div><!--end row-->
				
				</div>
		</div>
<?php include ('is/footer.php'); ?>