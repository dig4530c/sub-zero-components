<?php include ('is/header.php'); ?>

		<!-- stuff -->
		<div class="container  "><!--  container-->
			<div class="row space clear">
				<div class="row">
			
					<div class="ninecol "> <!--cart col-->
						<h1>Checkout</h1>
						
							<div>
								<h3>Shipping Address</h3>
								<div id="sfbox">  
								<form id='ship' action="post">
									<fieldset>
										  <div class="field name">
												<label for="fname">First Name</label>
												<input type="text" id="fname" />
										  </div>
										  <div class="field name">
												<label for="lname">Last Name</label>
												<input type="text" id="lname" />
										  </div>
									</fieldset>
									<fieldset>
										<div class="field loc">
												<label for="address">Address</label>
												<input type="text" id="address" />
										  </div>
										  <div class="field loc">
												<label for="address2">Address 2</label>
												<input type="text" id="address2" />
										  </div>
									</fieldset>
									<fieldset>
										<div class="field name">
												<label for="city">City</label>
												<input type="text" id="city" />
										  </div>
										  <div class="field">
												<label for="state">State</label>
												<select id="state">
													<option>Alaska</option>
													<option>Done</option>
												</select>	
										  </div>
										  <div class="field name">
												<label for="zip">Zip Code</label>
												<input type="text" id="zip" />
										  </div>
									</fieldset>
									<fieldset>
										<div class="field name">
												<label for="phone">Phone</label>
												<input type="text" id="phone" />
										  </div>
										  <div class="field name">
												<label for="city">Email</label>
												<input type="text" id="email" />
										  </div>
									</fieldset>
								</form>
								</div>
							</div>
						<div id="pbtn"><span><a href="#">Continue</a></span></div>
					</div>
					<div class="threecol last">
						<div >
							<!-- img box? -->
						
						</div>
					</div>
				</div><!--end row-->
				
				</div>
		</div>
		<?php include ('is/footer.php'); ?>