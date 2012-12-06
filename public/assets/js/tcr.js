$(function(){
    $(".colorbox").colorbox({inline:true, width:"50%"});
	
	$(".footer-link").hover(function() {
		$(this).stop().animate({color: 'black'}, 600);
	}, function() {
		$(this).stop().animate({color: 'rgb(190,190,190)'}, 300);
	});
	
	$("option:not([value])").attr('disabled', 'true');
});

function show_events_popup() {
	$("a[href='#form-event']").colorbox({open:true});
}

function show_places_popup() {
	$("a[href='#form-place']").colorbox({open:true});
}

function ustawFiltr(filter, value, singleOption) {
	baseUrl = getBaseURL();
	
	href =window.location.href.split('?');
	url = href[0];
	filters = href[1];
	
	if(filters == null && value == null) {
		window.location.href = baseUrl + "public/";
	}
	else if(filters == null) {
		window.location.href = baseUrl + "public/?" + filter + '=' + value;
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
			}
			else if(filter_name === filter && singleOption) {
				filter_existed = true;
				if(value !== filter_value) {
					result_filters += (result_filters.split('=')[1] ? '&' : '') + filter_name + "=" + value;
				}
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
		
		window.location.href = getBaseURL() + "public/" + (result_filters.split('=')[1] ? '?' + result_filters : '');
	}
}

function getBaseURL() {
    var url = location.href;  // entire url including querystring - also: window.location.href;
    var baseURL = url.substring(0, url.indexOf('/', 14));


    if (baseURL.indexOf('http://localhost') != -1) {
        // Base Url for localhost
        var url = location.href;  // window.location.href;
        var pathname = location.pathname;  // window.location.pathname;
        var index1 = url.indexOf(pathname);
        var index2 = url.indexOf("/", index1 + 1);
        var baseLocalUrl = url.substr(0, index2);

        return baseLocalUrl + "/";
    }
    else {
        // Root Url for domain name
        return baseURL + "/";
    }

}