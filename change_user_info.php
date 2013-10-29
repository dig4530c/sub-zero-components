<?php
$page_title = "Change User Info";
include ('./is/header.php');
require ('./is/form_functions.inc.php');

//Errors array
$user_info_errors = array();

//Changed Fields array
$changed_fields = array();

//Validation
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	if (!empty($_POST['first_name'])){
		$fn = mysqli_real_escape_string($mysqli, $_POST['first_name']);
		}
	if (!empty($_POST['last_name'])){
		$ln = mysqli_real_escape_string($mysqli, $_POST['last_name']);
		}	
	if (!empty($_POST['email'])){
		$e = mysqli_real_escape_string($mysqli, $_POST['email']);
		}		
	if (!empty($_POST['pass'])){
		$p = mysqli_real_escape_string($mysqli, $_POST['pass']);
		}
	else {
		$user_info_errors['pass'] = 'The password you have entered is incorrect.';
		}
		
	if (empty($user_info_errors)){
		$update_q = "
			UPDATE users ".
			if (isset($fn)) echo "SET first_name = '$fn' WHERE pass='".get_password_hash($p)."' AND id={$_SESSION['user_id']};";
			if (isset($ln)) echo "SET last_name = '$ln' WHERE pass='".get_password_hash($p)."' AND id={$_SESSION['user_id']};";
			if (isset($e)) echo "SET email = '$e' WHERE pass='".get_password_hash($p)."' AND id={$_SESSION['user_id']};";
			."
			";
		if ($update_r = mysqli_query($mysqli, $update_q)){
			$update_message['user_info'] = "You have successfully updated your information.";
			}
		}
	}
?>
<!-- stuff -->
<div class="container  "><!--  container-->
	<div class="row space">
		<div class="row">
			<div class="threecol "><!--sidebar col-->
				<?php include ('./is/client_sidebar.php'); ?>
			</div>
			<div class="ninecol last"> <!--user info col-->
				<div id="user-account">
					<h3>Change User Info</h3>
					<ul class="current-info">
						<li><h4>Current Info</h4></li>
						<?php
						$info_q = "SELECT first_name, last_name, email FROM users WHERE id={$_SESSION['user_id']};";
						$info_r = mysqli_query($mysqli, $info_q);
						if (mysqli_num_rows($info_r) == 1){
							$row = mysqli_fetch_array($info_r, MYSQLI_NUM);
							echo "
								<li>First Name: ".$row[0]."</li>
								<li>Last Name: ".$row[1]."</li>
								<li>Email: ".$row[2]."</li>
								";
							}
						?>
					</ul>
					<ul class="change-info">
						<form action="change_user_info.php" method="post" accept-charset="utf-8">
							<li><h4>Please enter your password in order to edit your information.</h4></li>
							<li>
								<label for="first-name"><strong>First Name</strong></label><br />
								<?php create_form_input('first_name', 'text', $user_info_errors); ?>
							</li>
							<li>
								<label for="last-name"><strong>Last Name</strong></label><br />
								<?php create_form_input('last_name', 'text', $user_info_errors); ?>
							</li>
							<li>
								<label for="email"><strong>Email</strong></label><br />
								<?php create_form_input('email', 'text', $user_info_errors); ?>
							</li>
							<li>
								<label for="pass"><strong>Current Password</strong></label><br />
								<?php create_form_input('pass', 'password', $user_info_errors); ?>
							</li>
							<li>
								<input type="submit" name="submit_button" value="Change &rarr;" id="submit_button" class="formbutton" />
							</li>
						</form>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
include ('./is/footer.php');
?>