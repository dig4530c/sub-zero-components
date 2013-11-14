<?php
require('./is/config.inc.php');
$page_title = 'Sub Zero Components - Forgot Password';
include ('./is/header.php');
require (MYSQL);

//Error array
$pass_errors = array();

//Notice array
$forgot_notice = array();

//Validate email address
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){ // If it's a valid email address
		$q = 'SELECT id FROM users WHERE email="'.mysqli_real_escape_string($mysqli, $_POST['email']).'"';
		$r = mysqli_query($mysqli, $q);
		if (mysqli_num_rows($r) == 1){ //Retrieve the user ID
			list($uid) = mysqli_fetch_array($r, MYSQLI_NUM);
			}
		else { // No database match made.
			$pass_errors['email'] = '';
			$forgot_notice['email'] = 'The submitted email address does not match those on file.';
			}
		}
	else { // No valid address submitted.
		$pass_errors['email'] = 'Please enter a valid email address!';
		} // End of $_POST['email'] IF.
	
	//Generate new random password
	if (empty($pass_errors)){ // If everything is OK.
		$p = substr(md5(uniqid(rand(), true)), 10, 15);
		
		//Add password to database
		$q = "UPDATE users SET pass='".get_password_hash($p)."'WHERE id=$uid LIMIT 1";
		if (mysqli_affected_rows($mysqli) == 1){ // If it ran well.
			$body = "
				Your password to log into Sub Zero Components has been temporarily changed to '$p'. Please
				log in using that password and this email address. Then you may change you password to something more familiar.
				";
			mail($_POST['email'], 'Your temporary password.', $body, 'From: admin@subzerocomponents.com');
			echo "
				<h2>Your password has been changed.</h2>
				<p class='vmargin'>You will receive the new, temporary password via email. Once you have logged in with this new password,
 				 you may change it by clicking on the 'Change Password' link.</p>
				";
			include('./is/footer.php');
			exit();
			}
		else { // If it didn't run well.
			trigger_error('Your password could not be changed due to a system error. We apologyze for any incovenience.');
			}
		} // End of $uid IF.
	} // End of the main Submit conditional
	
// Create the form:
require('./is/form_functions.inc.php');
?>
<div class="container  "><!--  container-->
	<div class="row space">
		<div class="row">
			<div class="fourcol">
			</div>
			<div class="threecol">
				<div class='space'></div>
				<div class='space'></div>
				<div class="title forgotp">
					<h2>Reset Your Password</h2>
					<form action="forgot_password.php" method="post" accept-charset="utf-8">
						<ul>
							<li>Enter your email address below to reset your password.</li>
							<li>							
								<label for="email"><strong>Email Address</strong></label>
								<?php create_form_input('email', 'text', $pass_errors); ?>
							</li>
							<li>
								<input type="submit" name="submit_button" value="Reset" id="submit_button" class="generic-btn" />
							</li>
						</ul>
						<?php 
						if (isset($forgot_notice['email'])){
							echo "
								<div class='notice'>".$forgot_notice['email']."</div>
								";
							}
						?>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
include ('./is/footer.php');
?>