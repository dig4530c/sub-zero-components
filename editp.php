<?php
ini_set('display_errors','On');
error_reporting(E_ALL);

require('./is/config.inc.php');
require ('is/dash.php'); 
if(isset($_SERVER['HTTP-HOST'])){
	$host = $_SERVER['HTTP-HOST'];
	}
$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');

if (!headers_sent()){
		redirect_non_super();
		}
else {
	include_once('./is/header.php');
	trigger_error('You do not have permission to access this page. Please log in and try
		again.');
	include_once('./is/footer.php');
	} //Redirects invalid users
	
$page_title = "SubZero Components - Manage Users";

//Edit product validation
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	
	//See which product they chose (id)
	$productq = "
		SELECT id, product FROM products;
		";
	if ($r = mysqli_query($mysqli, $productq)){
		while ($row = mysqli_fetch_array($r)){
			if (array_key_exists($row[0], $_POST)){
				$pid = $row[0];
				$pname = $row[1];
				} 
			}
		}
	}
include ('is/header.php'); 
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
									<?php
									if (isset($_SESSION['user_admin'])){
										echo "<li><a href='users.php' class='see' id='users'>Manage Users</a></li>";
										}
									?>		
								</ul>
							</div>
						</div>
					</div>
					<div class="ninecol last"> <!--user info col-->
						<div id="mmake" class='show'>
							<h2 class="cpanel">Edit Product: <?php if(isset($pname)) echo $pname ?>	</h2>
							<form action="manage.php" method="post" accept-charset="utf-8">								
								<fieldset>
									<legend>Fill out the form to add a product to the catalog. All fields are required.</legend>
									<ul>
										<li class="field">
											<label for="cost"><strong>Cost (No dollar sign)</strong></label><br />
											<input name="cost" type="text" id="cost" />
										</li>
										<li class="field">
											<label for="stock"><strong>Stock</strong></label><br />
											<input name="stock" type="text" id="stock" />
										</li>
										<li class="field">
											<label for="description"><strong>Description</strong></label><br />
											<textarea cols="64" rows="5" name="description"></textarea>
										</li>
										<li class="field">
											<br />
											<br />
											<input type="submit" name="<?php if(isset($pid)) echo $pid ?>" value="Finish Editing" class="button" />
										</li>
									</ul>
								</fieldset>
							</form>
						</div>
					</div>
				</div><!--end row-->
				
				</div>
		</div>
<?php include ('is/footer.php'); ?>