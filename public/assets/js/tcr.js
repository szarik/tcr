$(function(){
    $(".colorbox").colorbox({inline:true, width:"50%"});
	
	$(".footer-link").hover(function() {
		$(this).stop().animate({color: 'black'}, 600);
	}, function() {
		$(this).stop().animate({color: 'rgb(190,190,190)'}, 300);
	});
});

function show_events_popup() {
	$("a[href='#form-event']").colorbox({open:true});
}

function show_places_popup() {
	$("a[href='#form-place']").colorbox({open:true});
}