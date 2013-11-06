<?php

ini_set('display_errors','On');
 error_reporting(E_ALL);
 

//include ('dash.php');
//included in cart.php instead to prevent it from being called twice by cartf.php and total.php

	if(isset($_GET['action']) && $_GET['action'] == 'removed'){
			echo "<div class='message'>" . $_GET['name'] . " was removed from cart.</div>";
		}
		
		if(isset($_SESSION['cart'])){
                $ids = "";
				//echo	 "<div>" . $ids . " are in ids.</div>";
                foreach($_SESSION['cart'] as $id){
                        $ids = $ids . $id . ",";
                }
                
                // remove the last comma
                $ids = rtrim($ids, ',');
					//echo	 "<div>" . $ids . " are in ids.</div>";

		
		
				if (($ids=="")||($ids == null)){
					echo "<div>Your cart is empty. Start shopping!</div>";
					}

				//id, `Product Name`, Cost, Image
				else{
					$query='SELECT * FROM products WHERE id IN (' .$ids.')'; 
					
					$result=$mysqli->query($query)
						or die ($mysqli->error);
						

					$num=$result->num_rows;

					//echo "there are .$num. of rows";


					if ($num>0){
						echo"
						<table class='cart-table'>
							<tr>
								<th class='heading' width='400'>Product Name</th>
								<th class='heading' width='50'>Price</th>
								<th class='heading' width='40'>Qty</th>
								<th class='heading'>Remove </th>
							</tr>";
						
						while ($row=$result->fetch_assoc()){
						
								$product=$row['product'];
								$cost=$row['cost'];
								$img=$row['image'];
								$id=$row['id'];
							
								//$subtotal += $cost;
								
								/*echo "
								<div class='catalog'>
									<div class='list'>
										<h2>$product</h2>
										<p>$$cost</p><a href='is/remove.php?id={$id}&name={$product}' class='btn'>Remove</a>
									</div>
									<img src='$img' alt='$product' />
								</div>
								
								
								
								";*/
								
								//MY ATTEMPT
								// <td class='unit'><img src='$img' alt='$product' /></td>
								//Unit is the heading for the table Image - Cost -
								echo "
								<tr>
									<td class='unit' width='400'>$product</td>
									<td class='unit' width='50'>$cost</td>
									<td class='unit' width='40'>qty</td>
									<td class='unit'><a href='is/remove.php?id={$id}&name={$product}' class='btn'>Remove</a></td>
								 </tr>
								";
								}
								echo "</table>";
							}
							
							
							echo "<a href='is/empty.php' class='btn'>Empty Cart</a>";
				}
			
		}
		else{	echo "<div class='message'>Your cart is empty. Start shopping!</div>";}							
										
?>
										