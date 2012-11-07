$(function () {
	//	showing popup form
	$('.dropdown-toggle').click(function() {
		$('#popup-form').show();
		$('#popup-form').animate({
			top: '200px',
			opacity: 1.0
		}, 600);
	});
	
	//	hiding popup form when click outside it
	mouse_on_popup = false;
	$('#popup-form').hover(function() { 
        mouse_on_popup=true; 
    }, function() { 
        mouse_on_popup=false; 
    });

    $('body').mouseup(function() { 
        if(!mouse_on_popup) {
			$('#popup-form').fadeOut('fast', function() {
				$('#popup-form').css({
					top: '-500px',
					opacity: 0.0
				});
			});
		}
    });
});