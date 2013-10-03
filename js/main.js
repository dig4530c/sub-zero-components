
$(document).ready(function() {

	//search bar
	$(".sbar").click(function() {
			if ($(".sbar").val() == "Search"){
				$(".sbar").val(""); 
			}
		});
		
	//slider
	$(".rslides").responsiveSlides({
			auto: true,
			 pager: true,
			speed:800,
			//maxwidth:800,
			namespace: "centered-btns"
		});	
		

	//user dashboard
	var account = "<h1>Your Account</h1><h2>Account Info</h2><div><p><span>Username: </span>Student</p><p><span>Account Number: </span>#00001</p><p><span>Account Level: </span><a href='admin.php'>Administrator</a></p><p><span>Total Number of Orders: </span>250</p></div>";
		
	$("#user").html(account); 
	
		$(".order").click(function() {
				$("#user").html("<h1>Track Orders</h1><p>No orders available.</p>");
			});
		$(".orderh").click(function() {
				$("#user").html("<h1>Order History</h1><p>No order history available.<p>");
			});
		$(".dash").click(function() {
		//console.log('dash click');
				$("#user").html(account);
				
			});
		
		
	//admin dashboard
	var admin ="<h1>Welcome, Administrator UCFStudent</h1><div id='superuser'><ul><li><a href='#' class='mpro' >Manage Products</a></li><li><a  href='#' class='morder' >Manage Orders</a></li><li><a class='muser'  href='#'>Manage Users</a></li><li><a class='mpay' href='#'>Change Payment Methods</a></li></ul></div>";
	
	$("#admin").html(admin); 
		
		$(".mpro").click(function() {
				$("#admin").html("<h1>Manage Products</h1><p> </p>");
			});
		$(".morder").click(function() {
				$("#admin").html("<h1>Manage Orders</h1><p></p>");
			});
		$(".muser").click(function() {
				$("#admin").html("<h1>Manage Users</h1>");
			});
		$(".mpay").click(function() {
				$("#admin").html("<h1>Change Payment Methods</h1>");
			});
		$(".apanel").click(function() {
				$("#admin").html(admin); 
			});
		
});