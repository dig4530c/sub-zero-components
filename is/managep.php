<h3>Add Inventory</h3>
<form action="manage.php" method="post" accept-charset="utf-8">
<fieldset><legend>Update stock</legend>

<?php
ini_set('display_errors','On');
 error_reporting(E_ALL);

//include ('dash.php');


$query="SELECT * FROM products";
	
	$result=$mysqli->query($query)
		or die ($mysqli->error);

echo"<table border=1><tr><th>Id</th><th>Product Name</th><th>Category</th><th>Cost</th><th>Current Stock</th><th>Add Stock</th></tr>";		
		
while ($row=$result->fetch_assoc())
{
			$product=$row['product'];
			$cost=$row['cost'];
			$stock=$row['stock'];
			$cat=$row['category'];
			$id=$row['id'];
			
			//$id = $_GET['id'];

			
echo "<tr><td>$id</td><td>$product</td><td>$cat</td><td>$cost</td><td>$stock</td><td><input type='text' name='add[".$stock."]' id='add[".$stock."]' size='5' class='small' /></td></tr>";

}

echo "</table> <br />";

?>
<div class="field"><input type="submit" value="Update Inventory" class="button" /></div>
</fieldset>
</form>
<?php

ini_set('display_errors','On');
 error_reporting(E_ALL);

///*

// Check for a form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {	

	// Check for a added inventory:
	if (isset($_POST['add']) && is_array($_POST['add'])) {
		
		
		
		// Define the query:
		$query2 = 'UPDATE products SET stock=stock+? WHERE id=?';
		
		$result=$mysqli->query($query)
			or die ($mysqli->error);
		
		// Loop through each submitted value:
		foreach ($_POST['add'] as $sku => $stock) { //foreach update, do query
			
			// Validate the added quantity:
			if (filter_var($stock, FILTER_VALIDATE_INT, array('min_range' => 1))) {

				// Parse the SKU:
				//list($type, $id) = parse_sku($sku);
				
				
			} // End of IF.

		} // End of FOREACH.
		
		// Print a message:
		echo "<h4> Items(s) Were Updated!</h4>";

	} // End of $_POST['add'] IF.

} // End of the submission IF.
//*/
?>




<!--<h3>Add Inventory</h3>

<form action="addp.php" method="post" accept-charset="utf-8">

	<fieldset><legend>Indicate how many additional quantity of each product should be added to the inventory.</legend>
	
		<table border="0" width="100%" cellspacing="4" cellpadding="4">
		<thead>
			<tr>
		    <th align="right">Item</th>
		    <th align="right"> Price</th>
		    <th align="right">Quantity in Stock</th>
		    <th align="center">Add</th>
		  </tr></thead>
		<tbody>		-->
		<?php
		/*
		// Fetch every product:
		$query=  'SELECT * FROM products';
		$result=$mysqli->query($query)
		or die ($mysqli->error);
		
		// Display form elements for each product:
		while ($row = $result->fetch_assoc()) {
			echo '<tr>
		    <td align="right">' . $row['category'] . '::' . $row['product'] . '</td>
		    <td align="center">' . $row['cost'] .'</td>
		    <td align="center">' . $row['stock'] .'</td>
		    <td align="center"><input type="text" name="add[' . $row['id'] . ']"  id="add[' . $row['id'] . ']" size="5" class="small" /></td>
		  </tr>';
		}
		*/
?>

	<!--</tbody></table>
	<div class="field"><input type="submit" value="Add The Inventory" class="button" /></div>	
	</fieldset>
</form> -->