$(document).ready(function() {
	$('dialog').hide();
	$('.shadowbox').hide();
		
	// register event handlers
	$('#login_button').click( function() { 
		$('.shadowbox').show(); 
		$('.login').show(); 
	});
    
	$('#enroll_button').click( function() { 
		$('.shadowbox').show(); 
		$('.register').show(); 
	});
    
	$('.shadowbox').click(function () { 
		$('.shadowbox').hide(); 
		$('.login').hide();
		$('.register').hide();
	});
	
	$('.error_message').delay(3000).fadeOut();
});
