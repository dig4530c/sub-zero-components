
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
	var myurl = 'http://sulley.cah.ucf.edu/~ar400093/dig4530c/group3/cpanel.php?action=processp';
			var currenturl = window.location;
			if(myurl == currenturl) {
				console.log('fired');
				$('#mmake').show();
				$('#superuser').hide();
			}
			else{
			$('#mpro').hide();
			$('#musers').hide();
			$('#mmake').hide(); //Add products form 
			}

			$('.see').click(function () {
				console.log('fired');
				$('#superuser').hide();
				$('.show').hide();
				$('#m' + $(this).attr('id')).show();
			});

			$('.super').click(function () {
				$('#mpro').hide();
				$('#musers').hide();
				$('#mmake').hide();
				$('#superuser').show();
			});
			
			/*var myurl = 'http://sulley.cah.ucf.edu/~ar400093/dig4530c/group3/cpanel.php?action=processp';
			var currenturl = window.location;
			if(myurl == currenturl) {
				console.log('fired');
				$('#mmake').show();
				$('#superuser').hide();
			}
			*/
		//cart
		
	/*	if (('#cart') == 'Your cart is empty. Start shopping!') {
			$('#cbtn').hide();
		}
		else {
			$('#cbtn').show();
		}*/
		
		$("#submitReview").click(function(){
			$("#loader").html("&nbsp;<img src='img/gear.gif' />");
  			// alert("button press!");

			var id = $('#pid').val();
			var authorName = $('#author-name').val();
			var review = $('#review').val();
			// alert(id+"\n"+authorName+"\n"+review);

			$.ajax({
			type: "POST",
			url: "is/review.php",
			data: { id: id, name: authorName, review: review }
			})
			.done(function( msg ) {
			$( "#data-response" ).html( msg );
			$("#loader").html(" ");
			$("#reviewLeft").fadeIn(400).delay(2000).fadeOut(400);
			$('#author-name').val("");
			$('#review').val("");
			});
		}); //end submit function
		
});