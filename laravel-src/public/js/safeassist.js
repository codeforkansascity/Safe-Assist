$(document).ready(function() {
	
	// hide dialogs
	$('dialog').hide();
		
	// set up dialog pop-up buttons
	$('.triggersDialog').click( function() { 
		var dialog = $('#'+$(this).attr('data-dialog'));
		
		dialog.wrap($('<div class="shadowbox"></div>')); 
		
		$('.shadowbox').click(function () { 
				dialog.unwrap();
				dialog.hide();
		});
		
		dialog.show(); 
	});
    
	// show error messages (briefly)
	$('.error_message').delay(3000).fadeOut();
});
