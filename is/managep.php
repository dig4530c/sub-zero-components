<?php
ini_set('display_errors','On');
 error_reporting(E_ALL);

include ('dash.php');


$query="SELECT * FROM products";
	
	$result=$mysqli->query($query)
		or die ($mysqli->error);

echo"<table border=1><tr><th>Id</th><th>Product Name</th><th>Category</th><th>Cost</th><th>Image</th></tr>";		
		
while ($row=$result->fetch_assoc())
{
			$product=$row['product'];
			$cost=$row['cost'];
			$cat=$row['category'];
			$img=$row['image'];
			$id=$row['id'];
			
			
			
echo "<tr><td>$id</td><td>$product</td><td>$cat</td><td>$cost</td><td>$img</td></tr>";

}

echo "</table> <br />";

?>