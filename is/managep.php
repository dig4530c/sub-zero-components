<form action="editp.php" method="post" accept-charset="utf-8">
	<fieldset>

	<?php

	//include ('dash.php');


	$query="SELECT * FROM products";
		
		$result=$mysqli->query($query)
			or die ($mysqli->error);

	echo"<table>
			<tr>
				<th>Id</th>
				<th>Product Name</th>
				<th>Category</th>
				<th>Cost</th>
				<th>Current Stock</th>
				<th>Edit</th>
			</tr>";		
			
	while ($row=$result->fetch_assoc())
	{
				$product=$row['product'];
				$cost=$row['cost'];
				$stock=$row['stock'];
				$cat=$row['category'];
				$id=$row['id'];
				
	echo "
		<tr>
			<td>$id</td>
			<td>$product</td>
			<td>$cat</td>
			<td>$cost</td>
			<td>$stock</td>
			<td>
				<input type='submit' name='$id' value='&rarr;' />
			</td>
		</tr>
		";

	}

	echo "</table><br />";

	?>
	</fieldset>
</form>