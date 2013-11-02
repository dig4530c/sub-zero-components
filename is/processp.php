<?php 

ini_set('display_errors','On');
 error_reporting(E_ALL);

 include ('dash.php');
 
 
//This is the directory where images will be saved
/*$img = "img/products/";
$path = $img.basename( $_FILES['image']['name']);*/



$img=basename($_FILES['image']['name']);
$path ='/../img/products/'.$img;
 
	
    $name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$image = ($_FILES['image']['name']);
	$cost = mysqli_real_escape_string($mysqli, $_POST['cost']);
	$stock = mysqli_real_escape_string($mysqli, $_POST['stock']);
	$description = mysqli_real_escape_string($mysqli, $_POST['description']);
	$category = $_POST['category'];
	
	/*$sql = mysql_query("SELECT ID FROM products WHERE product='$name' LIMIT 1");
	$productMatch = mysql_num_rows($sql); 
    if ($productMatch > 0) {
		echo 'Sorry you tried to place a duplicate "name" into the system.';
		exit();
	}*/
	
	$query="INSERT INTO products (product, description, category, stock, cost, image) VALUES('$name','$description','$category','$stock','$cost','$image')";
	
	$result=$mysqli->query($query)
		or die ($mysqli->error);
		
		//if($result){
		
		//$mysqli->insert_id;
		//echo $name.' added to database';
		//}
	
	/*$sql = mysql_query("INSERT INTO products (product, description, category, stock, cost, image) 
        VALUES('$name','$description',$category','$stock','$cost','$image',now())") or die (mysql_error());
     $pid = mysql_insert_id();*/
	//header("location: inventory_list.php"); 
	
	move_uploaded_file($_FILES['image']['tmp_name'], getcwd().$path);
	
	//Writes the photo to the server
if(move_uploaded_file($_FILES['image']['tmp_name'], getcwd().$path))
{

//Tells you if its all ok
echo "The file ". basename( $_FILES['uploadedfile']['name']). " has been uploaded, and your information has been added to the directory";
}
else {

//Gives and error if its not
echo "Sorry, there was a problem uploading your file.  The cureent working directory is ".getcwd();
}


    exit();

?>