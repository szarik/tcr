$(function(){
	$('#form_date_start').datetimepicker({timeFormat: 'hh:mm', dateFormat: 'yy-mm-dd'});
	$('#form_date_end').datetimepicker({timeFormat: 'hh:mm', dateFormat: 'yy-mm-dd'});
	$('.datepicker').daterangepicker({format: 'yyyy-MM-dd'});
	
    $(".colorbox").colorbox({inline:true, width:"50%"});
	
	$(".footer_link").hover(function() {
		$(this).stop().animate({color: 'black'}, 600);
	}, function() {
		$(this).stop().animate({color: 'rgb(190,190,190)'}, 300);
	});
	
	$("option:not([value])").attr('disabled', 'true');
	
	if( $('#form_price_free').is(':checked') ) {
		$('#form_price_normal').prop('disabled', true);
		$('#form_price_discount').prop('disabled', true);
	}
	else if( $('#form_price_normal').val() || $('#form_price_discount').val() ) {
		$('#form_price_free').prop('disabled', true);
	}
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
		window.location.href = TCR_BASEURL;
	}
	else if(filters == null) {
		window.location.href = TCR_BASEURL + "?" + filter + '=' + value;
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
				if(filter === 'data') {
					result_filters += (result_filters.split('=')[1] ? '&' : '') + filter_name + "=" + value;
				}
				else if(value !== filter_value) {
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
		
		window.location.href = TCR_BASEURL + (result_filters.split('=')[1] ? '?' + result_filters : '');
	}
}

function getBaseURL() {

	return TCR_BASEURL;

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

function price_free_changed() {
	if( $('#form_price_free').is(':checked') ) {
		$('#form_price_normal').prop('disabled', true);
		$('#form_price_discount').prop('disabled', true);
	}
	else {
		$('#form_price_normal').prop('disabled', false);
		$('#form_price_discount').prop('disabled', false);
	}
}

function price_normal_discount_changed() {
	var price_normal = $('#form_price_normal').val();
	var price_discount = $('#form_price_discount').val();
	
	if( (price_normal == null || price_normal.trim() == '')  &&  (price_discount == null || price_discount.trim() == '') ) {
		$('#form_price_free').prop('disabled', false);
	}
	else {
		$('#form_price_free').prop('disabled', true);
	}
}
