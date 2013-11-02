<?php
/*
ini_set('display_errors','On');
 error_reporting(E_ALL);


// For storing errors:
$add_product_errors = array();

// Check for a form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {	

	// Check for a category:
	if (!isset($_POST['category']) || !filter_var($_POST['category'], FILTER_VALIDATE_INT, array('min_range' => 1))) {
		$add_product_errors['category'] = 'Please select a category!';
	}

	// Check for a price:
	if (empty($_POST['cost']) || !filter_var($_POST['cost'], FILTER_VALIDATE_FLOAT) || ($_POST['cost'] <= 0)) {
		$add_product_errors['cost'] = 'Please enter a valid price!';
	}

	// Check for a stock:
	if (empty($_POST['stock']) || !filter_var($_POST['stock'], FILTER_VALIDATE_INT, array('min_range' => 1))) {
		$add_product_errors['stock'] = 'Please enter the quantity in stock!';
	}

	// Check for a name:
	if (empty($_POST['product'])) {
		$add_product_errors['product'] = 'Please enter the name!';
	}
	
	// Check for a description:
	if (empty($_POST['description'])) {
		$add_product_errors['description'] = 'Please enter the description!';
	}

	// Check for an image:
	if (is_uploaded_file ($_FILES['image']['tmp_name']) && ($_FILES['image']['error'] == UPLOAD_ERR_OK)) {
		
		$file = $_FILES['image'];
		
		$size = ROUND($file['size']/1024);

		// Validate the file size:
		if ($size > 512) {
			$add_product_errors['image'] = 'The uploaded file was too large.';
		} 

		// Validate the file type:
		$allowed_mime = array ('image/gif', 'image/pjpeg', 'image/jpeg', 'image/JPG', 'image/X-PNG', 'image/PNG', 'image/png', 'image/x-png');
		$allowed_extensions = array ('.jpg', '.gif', '.png', 'jpeg');
		$image_info = getimagesize($file['tmp_name']);
		$ext = substr($file['name'], -4);
		if ( (!in_array($file['type'], $allowed_mime)) 
		||   (!in_array($image_info['mime'], $allowed_mime) ) 
		||   (!in_array($ext, $allowed_extensions) ) 
		) {
			$add_product_errors['image'] = 'The uploaded file was not of the proper type.';
		} 
		
		// Move the file over, if no problems:
		if (!array_key_exists('image', $add_product_errors)) {

			// Create a new name for the file:
			$new_name = (string) sha1($file['product'] . uniqid('',true));

			// Add the extension:
			$new_name .= ((substr($ext, 0, 1) != '.') ? ".{$ext}" : $ext);
			
			//Get the category
			$cat=$row['category'];

			// Move the file to its proper folder but add _tmp, just in case:
			$dest =  "../products/$new_name";
			
			if (move_uploaded_file($file['tmp_name'], $dest)) {
				
				// Store the data in the session for later use:
				$_SESSION['image']['new_name'] = $new_name;
				$_SESSION['image']['file_name'] = $file['product'];
				
				// Print a message:
				echo '<h4>The file has been uploaded!</h4>';
				
			} else {
				trigger_error('The file could not be moved.');
				unlink ($file['tmp_name']);				
			}

		} // End of array_key_exists() IF.
		
	} elseif (!isset($_SESSION['image'])) { // No current or previous uploaded file.
		switch ($_FILES['image']['error']) {
			case 1:
			case 2:
				$add_product_errors['image'] = 'The uploaded file was too large.';
				break;
			case 3:
				$add_product_errors['image'] = 'The file was only partially uploaded.';
				break;
			case 6:
			case 7:
			case 8:
				$add_product_errors['image'] = 'The file could not be uploaded due to a system error.';
				break;
			case 4:
			default: 
				$add_product_errors['image'] = 'No file was uploaded.';
				break;
		} // End of SWITCH.

	} // End of $_FILES IF-ELSEIF-ELSE.
	
	if (empty($add_product_errors)) { // If everything's OK.

		// Add the product to the database:
		$query = 'INSERT INTO products (id, product, description, stock, cost, image) VALUES (null, ?, ?, ?, ?, ?)';

		// Prepare the statement:
		$stmt = mysqli_prepare($mysqli, $query);
		
		// For debugging purposes:
		// if (!$stmt) echo mysqli_stmt_error($stmt);

		// Bind the variables:
		mysqli_stmt_bind_param($stmt, 'isssdi', $name, $desc, $_POST['category'], $_POST['stock'], $_POST['cost'], $_SESSION['image']['new_name'] );
		
		// Make the extra variable associations:
		$name = strip_tags($_POST['product']);
		$desc = strip_tags($_POST['description']);

		// Execute the query:
		mysqli_stmt_execute($stmt);
		
		if (mysqli_stmt_affected_rows($stmt) == 1) { // If it ran OK.
			
			// Print a message:
			echo '<h4>The product has been added!</h4>';
		
			// Clear $_POST:
			$_POST = array();
			
			// Clear $_FILES:
			$_FILES = array();
			
			// Clear $file and $_SESSION['image']:
			unset($file, $_SESSION['image']);
					
		} else { // If it did not run OK.
			trigger_error('The product could not be added due to a system error. We apologize for any inconvenience.');
			unlink ($dest);
		}
				
	} // End of $errors IF.
	
} else { // Clear out the session on a GET request:
	unset($_SESSION['image']);	
} // End of the submission IF.

// Need the form functions script, which defines create_form_input():
require ('form_functions.inc.php');
?><h3>Add a Product</h3>

<form enctype="multipart/form-data" action="" method="post" accept-charset="utf-8">

	<input type="hidden" name="MAX_FILE_SIZE" value="524288" />
	
	<fieldset><legend>Fill out the form to add a  to the catalog. All fields are required.</legend>
		<div class="field"><label for="category"><strong>Category</strong></label><br /><select name="category"<?php if (array_key_exists('category', $add_product_errors)) echo ' class="error"'; ?>>
			<option>Select One</option>
			<?php // Retrieve all the categories and add to the pull-down menu:
			$q = 'SELECT id, category FROM products ORDER BY category ASC';		
			$result=$mysqli->query($q)
		or die ($mysqli->error);
				while ($row = mysqli_fetch_array ($result, MYSQLI_NUM)) {
					echo "<option value=\"$row[0]\"";
					// Check for stickyness:
					if (isset($_POST['category']) && ($_POST['category'] == $row[0]) ) echo ' selected="selected"';
					echo ">$row[1]</option>\n";
				}
			?>
			</select><?php if (array_key_exists('category', $add_product_errors)) echo ' <span class="error">' . $add_product_errors['category'] . '</span>'; ?></div>
		
			<div class="field"><label for="name"><strong>Name</strong></label><br /><?php create_form_input('product', 'text', $add_product_errors); ?></div>
		
			<div class="field"><label for="price"><strong>Price (No dollar sign)</strong></label><br /><?php create_form_input('cost', 'text', $add_product_errors); ?> </div>
	
			<div class="field"><label for="stock"><strong>Initial Quantity in Stock</strong></label><br /><?php create_form_input('stock', 'text', $add_product_errors); ?></div>
			
			<div class="field"><label for="description"><strong>Description</strong></label><br /><?php create_form_input('description', 'textarea', $add_product_errors); ?></div>

			<div class="field"><label for="image"><strong>Image</strong></label><br /><?php
		
			// Check for an error:
			if (array_key_exists('image', $add_product_errors)) {
				
				echo '<span class="error">' . $add_product_errors['image'] . '</span><br /><input type="file" name="image" class="error" />';
				
			} else { // No error.

				echo '<input type="file" name="image" />';

				// If the file exists (from a previous form submission but there were other errors),
				// store the file info in a session and note its existence:		
				if (isset($_SESSION['image'])) {
					echo "<br />Currently '{$_SESSION['image']['file_name']}'";
				}

			} // end of errors IF-ELSE.
			
			<!--</div>
	
	<br clear="all" />
	
	<div class="field"><input type="submit" value="Add This Product" class="button" /></div>
	
	
	</fieldset>

</form> -->
			*/
		 ?>

<?php 
/*
ini_set('display_errors','On');
 error_reporting(E_ALL);

if (isset($_POST['product'])) {
	
    $name = mysqli_real_escape_string($_POST['product']);
	$image =  $_POST['image'];
	$cost = mysqli_real_escape_string($_POST['cost']);
	$stock = mysqli_real_escape_string($_POST['stock']);
	$description = mysqli_real_escape_string($_POST['description']);
	$category = $_POST['category'];
	
	/*$sql = mysql_query("SELECT ID FROM products WHERE product='$name' LIMIT 1");
	$productMatch = mysql_num_rows($sql); 
    if ($productMatch > 0) {
		echo 'Sorry you tried to place a duplicate "name" into the system.';
		exit();
	}*/
	
	/*$query="INSERT INTO products (product, description, category, stock, cost, image) VALUES('$name','$description',$category','$stock','$cost','$image')";
	
	$result=$mysqli->query($query)
		or die ($mysqli->error);
		
		if($result){
		
		$mysqli->insert_id;
		echo $name.' added to database';
		}
	
	/*$sql = mysql_query("INSERT INTO products (product, description, category, stock, cost, image) 
        VALUES('$name','$description',$category','$stock','$cost','$image',now())") or die (mysql_error());
     $pid = mysql_insert_id();*/
	//header("location: inventory_list.php"); 
   // exit();
//}
?>

<form enctype="multipart/form-data" action="is/processp.php" method="post" accept-charset="utf-8">

	<input type="hidden" name="MAX_FILE_SIZE" value="524288" />
	
	<fieldset><legend>Fill out the form to add a  to the catalog. All fields are required.</legend>
		<div class="field">
			<label for="category"><strong>Category</strong></label><br />
			<select name="category">
				<option>Select One</option>
				<option value = "Case Fan">Case Fan</option>
				<option value = "Heatsink">Heatsink</option>
				<option value = "Laptop Cooling">Laptop Cooling</option>
				<option value = "Water / Liquid Cooling">Water / Liquid Cooling</option>
			</select>
		</div>
		<div class="field"><label for="name"><strong>Name</strong></label><br /><input name="name" type="text" id="name" size="64"/></div>
		<div class="field"><label for="cost"><strong>Cost (No dollar sign)</strong></label><input name="cost" type="text" id="cost" size="64"/><br /></div>
		<div class="field"><label for="stock"><strong>Stock</strong></label><br /><input name="stock" type="text" id="stock" size="64"/></div>
		<div class="field"><label for="description"><strong>Description</strong></label><br /><textarea cols="64" rows="5" name="description"></textarea></div>
		<div class="field"><label for="image"><strong>Image</strong></label><br /><input type="file" name="image" /></div>
		<div class="field"><input type="submit" value="Add This Product" class="button" /></div>
		
	</fieldset>

</form>
