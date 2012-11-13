$(function(){
    $(".colorbox").colorbox({inline:true, width:"50%"});
});

function show_events_popup() {
	$("a[href='#form-event']").colorbox({open:true});
}

function show_places_popup() {
	$("a[href='#form-place']").colorbox({open:true});
}