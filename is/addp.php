
<div id='addp'>
<form enctype="multipart/form-data" action="is/processp.php" method="post" accept-charset="utf-8">

	<input type="hidden" name="MAX_FILE_SIZE" value="524288" />
	
	<fieldset><legend>Fill out the form to add a product to the catalog. All fields are required.</legend>
		<div class="field">
			<label for="category"><strong>Category</strong></label><br />
			<select name="category">
				<option value = "Case Fan">Case Fan</option>
				<option value = "Heatsink">Heatsink</option>
				<option value = "Laptop Cooling">Laptop Cooling</option>
				<option value = "Water / Liquid Cooling">Water / Liquid Cooling</option>
			</select>
		</div>
		<div class="field"><label for="name"><strong>Name</strong></label><br /><input name="name" type="text" id="name" required/></div>
		<div class="field"><label for="cost"><strong>Cost (No dollar sign)</strong></label><br /><input name="cost" type="text" id="cost" required/><br /></div>
		<div class="field"><label for="stock"><strong>Stock</strong></label><br /><input name="stock" type="text" id="stock" required/></div>
		<div class="field"><label for="description"><strong>Description</strong></label><br /><textarea cols="64" rows="5" name="description"></textarea></div>
		<br />
		<div class="field"><label for="image"><strong>Image</strong></label><br /><input type="file" name="image" /></div>
		<br />
		<div class="field"><input type="submit" value="Add This Product" class="button" /></div>
		
	</fieldset>

</form>
</div>