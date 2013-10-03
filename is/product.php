<?php
	ini_set('display_errors','On');
	 error_reporting(E_ALL);
	 

	 
	 $id = $_GET['id'];
	 
	include ('dash.php');
	
	//echo $id;
	
	$query='SELECT * FROM products WHERE id='.$id;
					
					$result=$mysqli->query($query)
						or die ($mysqli->error);
						
		while ($row=$result->fetch_assoc())
		{
			$product=$row['Product Name'];
			$cost=$row['Cost'];
			$img=$row['Image'];				
			$desc=$row['Description'];				
					


						echo '   
						<div class="row">
						<div class="ninecol "> <!--products col-->
							<div><h2>'.$product.'</h2></div>
							<div id="pic"><img src='.$img.' alt='.$product.' /></div>

						</div>
						<div class="threecol last "><!--sidebar col-->
							<div id="sidebar2">
								<div>$'.$cost.'</div>
								<div class="rate">
									<ul>
										<li><i class="icon-star"></i></li>
										<li><i class="icon-star"></i></li>
										<li><i class="icon-star"></i></li>
										<li><i class="icon-star"></i></li>
										<li><i class="icon-star"></i></li>
									</ul>
								</div>
								<a href="is/add2.php?id='.$id.'&amp;name='.$product.'" class="btn">Add to Cart</a>
							</div>
						</div>
						</div><!--end row-->
						<div class="row">
							<div class="twelevecol last">
								<div id="info">
									<p>'.$desc.'</p>
								</div>
							</div>
						</div>
						';
		}
						
	?>					

					
	
			