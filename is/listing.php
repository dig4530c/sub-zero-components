

<?php
ini_set('display_errors','On');
 error_reporting(E_ALL);


 //if($_GET['action']=='add')
if(isset($_GET['action']) && $_GET['action'] == 'add'){
    echo "<div>" . $_GET['name'] . " was added to your cart.</div>";
}

//if($_GET['action']=='exists')
if(isset($_GET['action']) && $_GET['action'] == 'exists'){
    echo "<div>" . $_GET['name'] . " already exists in your cart.</div>";
}	
 
 
include ('dash.php');


$query="SELECT * FROM products ORDER BY Cost ";
	
	$result=$mysqli->query($query)
		or die ($mysqli->error);

	
	

	
while ($row=$result->fetch_assoc())
{
			$product=$row['Product Name'];
			$cost=$row['Cost'];
			$img=$row['Image'];
			$id=$row['id'];
		
			echo "
			<div class='catalog'>
				<div class='list'>
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
					<p>$$cost</p><a href='is/add.php?id={$id}&amp;name={$product}' class='btn'>Add to Cart</a>
				</div>
				<img src='$img' alt='$product' />
			</div>
			
			";
			
	}

?>