<?php
$page_title = "Sub Zero Components - Register";
include ('is/header.php'); 
require ('is/dash.php');
?>

		<!-- stuff -->
		<div class="container  "><!--  container-->
			<div class="row space">
				<div class="row">
					<div class="twelvecol user registration"> <!--registration col-->
					<?php 
					$reg_errors = array();
					if ($_SERVER['REQUEST_METHOD'] == 'POST'){
						//Check first name
						if (preg_match('/^[A-Z\'.-]{2,20}$/i', $_POST['first_name'])){
							$fn = mysqli_real_escape_string($mysqli, $_POST['first_name']);
							}
						else {
							$reg_errors['first_name'] = 'Please enter your first name!';
							}
						
						//Check last name
						if (preg_match('/^[A-Z\'.-]{2,40}$/i', $_POST['last_name'])){
							$ln = mysqli_real_escape_string($mysqli, $_POST['last_name']);
							}
						else {
							$reg_errors['last_name'] = 'Please enter your last name!';
							}
							
						//Check username
						if (preg_match('/^[A-Z0-9]{2,30}$/i', $_POST['username'])){
							$u = mysqli_real_escape_string($mysqli, $_POST['username']);
							}
						else {
							$reg_errors['username'] = 'Please enter a desired name!';
							}
							
						//Check Email
						if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){ 
							$e = mysqli_real_escape_string($mysqli, $_POST['email']);
							}
						else {
							$reg_errors['email'] = 'Please enter a valid email address!';
							}
							
						//Check Password
						if (preg_match('/^[a-zA-Z0-9\!\@\#\$\&\*\^\~]{6,20}$/', $_POST['pass1'])){
							if($_POST['pass1'] == $_POST['pass2']){
								$p = mysqli_real_escape_string($mysqli, $_POST['pass1']);
								}
							else {
								$reg_errors['pass2'] = 'Your password did not match the confirmed password!';
								}
							}
						else {
							$reg_errors['pass1'] = 'Please enter a valid password!';
							}
						
						//Check email availability
						if (empty($reg_errors)){
							$q = "SELECT email, username FROM users WHERE email='$e' OR username='$u'";
							$r = mysqli_query($mysqli, $q);
							$rows = mysqli_num_rows($r);
							if ($rows == 0) { //No problems!
								$q = "INSERT INTO users (username, email, pass, first_name, last_name) VALUES('$u',
								 '$e', '".get_password_hash($p)."', '$fn', '$ln')";
								$r = mysqli_query($mysqli, $q); 
								}
							else {
								if ($rows == 2){ //Both are taken.
									$reg_errors['email'] = 'This email address has already been registered. If you have 
									 forgotten your password, use the link at right to have your password sent to you.';
									$reg_errors['username'] = 'This username has already been registered. Please try another.';
									}
								else { //One or both may be taken.
									$row = mysqli_fetch_array($r, MYSQLI_NUM);
									if (($row[0] == $_POST['email']) && ($row[1] == $_POST['username'])) { //Both match.
										$reg_errors['email'] = 'This email address has already been registered. If you have 
										 forgotten your password, use the link at right to have your password sent to you.';
										$reg_errors['username'] = 'This username has already been registered. If you have 
										 forgotten your password, use the link at right to have your password sent to you.';
										}
									elseif ($row[0] == $_POST['email']){ //Email match.
										$reg_errors['email'] = 'This email address has already been registered. If you have 
										 forgotten your password, use the link at right to have your password sent to you.';
										}
									elseif ($row[1] == $_POST['username']){ //Email match.
										$reg_errors['username'] = 'This username has already been registered. Please try another.';
										}
									} 
								} // End of $rows == 2 ELSE.
							} // End of empty($reg_errors) IF.
							
						//If successful, thank new customer and send out email
						if (mysqli_affected_rows($mysqli) == 1){
							header("Location: ./registration_complete.php");
							exit();
							}
						else {
							trigger_error('You could not be registered due to a system error. We apologize for any inconvenience.');
							}
						 } // End of the main form submission conditional.
					
					//Required for creating forms
					require ('./is/form_functions.inc.php'); 
					?>
						<div>
							<h3>Register</h3>
						</div>
						<div>
							<!--Registration Form-->
							<form action="register.php" method="post" accept-charset="utf-8">
								<p><label for="first_name"><strong>First Name</strong></label>
								 <br /><?php create_form_input('first_name', 'text', $reg_errors); ?></p>
								 
								<p><label for="last_name"><strong>Last Name</strong></label>
								 <br /><?php create_form_input('last_name', 'text', $reg_errors); ?></p>
								 
								<p><label for="username"><strong>Desired Username</strong></label>
								 <br /><?php create_form_input('username', 'text', $reg_errors); ?>
								 <small>Only letters and numbers are allowed.</small></p>
								 
								<p><label for="email"><strong>Email Address</strong></label>
								 <br /><?php create_form_input('email', 'text', $reg_errors); ?></p>
								 
								<p><label for="pass1"><strong>Password</strong></label>
								 <br /><?php create_form_input('pass1', 'password', $reg_errors); ?>
								 <small>Must be between 6 and 20 characters long.</small></p>
								 
								<p><label for="pass2"><strong>Confirm Password</strong></label>
								 <br /><?php create_form_input('pass2', 'password', $reg_errors); ?></p>
								 
								<input type="submit" name="submit_button" value="Next &rarr;" id="submit_button"
								 class="form-button" />
							</form>
						</div>
					</div>
				</div><!--end row-->	
			</div>
		</div>
<?php 
include ('is/footer.php');
exit();
?>