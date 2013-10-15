

<?php
ini_set('display_errors','On');
 error_reporting(E_ALL);


//include ('dash.php');
//included in home.php instead to prevent it from being called twice by cartf.php and total.php

$query="SELECT * FROM products ORDER BY rand() LIMIT 1 ";
	
	$result=$mysqli->query($query)
		or die ($mysqli->error);

	
while ($row=$result->fetch_assoc())
{
			$product=$row['Product Name'];
			$cost=$row['Cost'];
			$img=$row['Image'];
			$id=$row['id'];
		
			echo "
			<div class='text'>
				<h2><a href='shop.php?id={$id}'>$product</a></h2>
				<div class='rate'>
						<ul>
							<li><i class='icon-star'></i></li>
							<li><i class='icon-star'></i></li>
							<li><i class='icon-star'></i></li>
							<li><i class='icon-star'></i></li>
							<li><i class='icon-star'></i></li>
						</ul>
					</div>
				<p>$$cost</p>
				<a href='shop.php?id={$id}' class='btn'>Shop</a>
			</div>
			<img src='$img' alt='$product' />";
			
	}

?>
