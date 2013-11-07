<?php
	ini_set('display_errors','On');
	 error_reporting(E_ALL);
	 

	 
	 $id = $_GET['id'];
	 
	include_once ('dash.php');
	
	//echo $id;
	
	$query='SELECT * FROM products WHERE id='.$id;
					
					$result=$mysqli->query($query)
						or die ($mysqli->error);
						
		while ($row=$result->fetch_assoc())
		{
			$product=$row['product'];
			$cost=$row['cost'];
			$img=$row['image'];				
			$desc=$row['description'];	
			$desc = str_replace(chr(146), "&#39;", $desc); 		
			$rating=$row['rating'];	
					


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
									<ul style="display:none;">
										<li><i class="icon-star"></i></li>
										<li><i class="icon-star"></i></li>
										<li><i class="icon-star"></i></li>
										<li><i class="icon-star"></i></li>
										<li><i class="icon-star"></i></li>
									</ul>';
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
						echo '<button class="thumbdown" onClick="voteDown(\'' . $id . '\')"></button>
						<button class="thumbup" onClick="voteUp(\'' . $id . '\')"></button>

								</div>
								<a href="is/add2.php?id='.$id.'&amp;name='.$product.'" class="generic-btn">Add to Cart</a>
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