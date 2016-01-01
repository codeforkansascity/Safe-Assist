$(document).ready(function() {
	
	// hide dialogs
	$('dialog').hide();
		
	// set up dialog pop-up buttons
	$('.triggersDialog').click( function() { 
		var dialog = $('#'+$(this).attr('data-dialog'));
		$('body').append($('<div class="shadowbox"></div>')); 
		$('.shadowbox').hide();
		$('.shadowbox').fadeIn();
		$('.shadowbox').click(function () { 
			$('.shadowbox').remove();
			dialog.hide();
		});
		
		dialog.fadeIn(); 
	});
    
	// show error messages (briefly)
	$('.error_message').delay(3000).fadeOut();
});
