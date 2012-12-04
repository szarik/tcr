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

function ustawFiltr(filter, value) {
	href =window.location.href.split('?'); 
	url = href[0];
	filters = href[1];
	
	if(filters == null && value == null) {
		window.location.href = url;
	}
	else if(filters == null) {
		window.location.href = url + '?' + filter + '=' + value;
	}
	else {
		filters = filters.split('&');
		result_filters = '';
		
		filter_existed = false;
		for(f=0; f<filters.length; f++) {
			filter_name = filters[f].split('=')[0];
			filter_value = filters[f].split('=')[1];
			
			if(filter_name !== filter) {
				result_filters += (result_filters.split('=')[1] ? '&' : '') + filters[f];
			}
			else if(filter_name === filter && value == null ) {
				filter_existed = true;
				continue;
			}
			else {
				filter_existed = true;
				
				filter_values = filter_value.split(',');
				new_filter_values = '';
				removed = false;
				
				for(v=0; v<filter_values.length; v++) {
					if(filter_values[v] !== value) {
						new_filter_values += (new_filter_values !== '' ? ',' : '') + filter_values[v];
					}
					else {
						removed = true;
					}
				}
				
				if(!removed) {
					new_filter_values += (new_filter_values !== '' ? ',' : '') + value;
				}
				
				if(new_filter_values !== '')
				{
					result_filters += (result_filters.split('=')[1] ? '&' : '') + filter_name + '=' + new_filter_values;
				}
			}
		}
		
		if( !filter_existed && value != null )
		{
			result_filters += (result_filters.split('=')[1] ? '&' : '') + filter + '=' + value;
		}
		
		window.location.href = url + (result_filters.split('=')[1] ? '?' + result_filters : '');
	}
}