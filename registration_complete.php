<?php
$page_title = "Sub Zero Components - Registration Complete";
include ('is/header.php'); 
//CONFIRMATION EMAIL
/////$body = "Thank you for registering at Subzerocomponents.com.\n\n";
//Implement email confirmation later.
//--activate.php--
//1.Random code is generated for user, added to users table.
//2.Email is sent with confirmation link:
// example: echo 'https://'.$url.'/activate.php?x=email@example.com&y=CODE';
//3.The page confirms that there is a record in the table with said combination
// then sets code column to NULL.
//4.When user logs in, query must confirm that email and password combination is correct, and
// code column has a NULL value.
/////mail($_POST['email'], 'Registration Confirmation', $body, 'From: admin@subzerocomponents.com');
?>

<!-- stuff -->
<div class="container  "><!--  container-->
	<div class="row space">
		<div class="row">
			<div class="twelvecol user registration">
				<div>
					<h3>Thanks!</h3>
				</div>
				<div>
					<p>Thank you for registering! You will receive an email shortly confirming your registration.</p>
				</div>
			</div>
		</div>
	</div>
</div>

<?php 
include ('is/footer.php');
exit();
?>