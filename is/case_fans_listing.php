

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


$query="SELECT * FROM products WHERE category='Case Fan' ";
	
	$result=$mysqli->query($query)
		or die ($mysqli->error);

	
	

	
while ($row=$result->fetch_assoc())
{
			$product=$row['product'];
			$cost=$row['cost'];
			$img=$row['image'];
			$id=$row['id'];
			$rating=$row['rating'];
		
			echo "
			<div class='catalog'>
				<div class='list'>
					<h2><a href='shop.php?id={$id}'>$product</a></h2>
					<div class='rate'>
						<ul style='display:none;'>
							<li><i class='icon-star'></i></li>
							<li><i class='icon-star'></i></li>
							<li><i class='icon-star'></i></li>
							<li><i class='icon-star'></i></li>
							<li><i class='icon-star'></i></li>
						</ul>";
						switch (true) {
							case $rating > 0 && $rating <=10:
						echo "<div class='one-star'></div>";
								break;

								case $rating > 10 && $rating <=20:
						echo "<div class='two-star'></div>";
								break;
							
						case $rating > 20 && $rating <=30:
						echo "<div class='three-star'></div>";
								break;
							
						case $rating > 30 && $rating <=40:
						echo "<div class='four-star'></div>";
								break;

						case $rating > 40 && $rating <=50:
						echo "<div class='five-star'></div>";
								break;

						case $rating > 50:
						echo "<div class='five-star'></div>";
								break;

						case $rating < 0:
						echo "<div class='one-star'></div>";
								break;

							default:
						echo "<div class='one-star'></div>";
								break;
						}
					echo "<button class='thumbdown' onClick='voteDown(\"" . $id . "\")'></button>
						<button class='thumbup' onClick='voteUp(\"" . $id . "\")'></button>
					</div>
					<p>$$cost</p><a href='is/add.php?id={$id}&amp;name={$product}' class='btn'>Add to Cart</a>
				</div>
				<img src='$img' alt='$product' />
				<div class='clear'></div>
			</div>
			
			";
			
	}

?>