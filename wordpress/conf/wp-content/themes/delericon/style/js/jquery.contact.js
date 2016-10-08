$.validator.setDefaults({
	submitHandler: function() {
	
		$('#contactForm').append('<div id="loader" style="margin:10px"></div>');
		$('#loader').empty().append("<img src='" + path + "/style/img/loader.gif' style='border:none' />");
				
			var path = $("meta[name=temp_url]").attr('content');
				
		var name = $("#name").val();  
		var email = $("#email").val(); 
		var message = $("#message").val();
		var to = $("#to").val();
						
		var dataString = 'name='+ name + '&email=' + email + '&message=' + message + '&to=' + to;  
					
			$.ajax({
										 
			url: path + "/mail.php",
			data: dataString,
			type: "GET",
			success: function(responseText) {
				$('#loader').empty()
					$('#contactForm').append('<h3>'+ responseText + '</h3>');
						
					}
			});
	}
});

		
$(document).ready(function(){								 
  $("#contactForm").validate();
});