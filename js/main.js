
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
			
			$('#mpro').hide(); 
            $('#musers').hide();
			
			$('.see').click(function(){
				$('#superuser').hide();
				$('.show').hide();
				$('#m'+$(this).attr('id')).show();
			});
			
			$('.super').click(function(){
				$('#mpro').hide(); 
				$('#musers').hide();
				$('#superuser').show();
			});
			
		//cart
		
	/*	if (('#cart') == 'Your cart is empty. Start shopping!') {
			$('#cbtn').hide();
		}
		else {
			$('#cbtn').show();
		}*/
		
});