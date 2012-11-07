<script type="text/javascript">

    // inesGmap required jquery!
    if (jQuery || typeof jQuery != 'undefined') {


        $(function () {

            var map_<?php echo $id ?>;
            var bounds_<?php echo $id ?> = new google.maps.LatLngBounds();

            function gmap_<?php echo $id ?>() {
                var wspolrzedne = new google.maps.LatLng(53.41935400090768, 14.58160400390625);
                var options = {
                    zoom: <?php echo $zoom ?>,
                    center:wspolrzedne,
                    mapTypeId:google.maps.MapTypeId.ROADMAP
                };
                map_<?php echo $id ?> = new google.maps.Map(document.getElementById("<?php echo $container ?>"), options);

				<?php
				if (isset($geocodes)) {
					foreach ($geocodes as $_id => $_data) {
						echo "var geocode" . $_id . " =  new google.maps.Geocoder(); \n";
						echo "geocode" . $_id . ".geocode({" .
							((isset($_data['address'])) ? "address: '" . $_data['address'] . "'," : "") .
							((isset($_data['location'])) ? "location: '" . $_data['location'] . "'," : "") .
							((isset($_data['bounds'])) ? "bounds: '" . $_data['bound'] . "'," : "") .
							((isset($_data['region'])) ? "region: '" . $_data['location'] . "'," : "") .
							"}, " . (is_array($_data['callback']) ? $_data['callback']['callback'] : $_data['callback']) . ");  \n";
					}
				}
				?>

            }

		  <?php
		  if (isset($geocodes)) {
			  foreach ($geocodes as $_id => $_data) {
				  if (isset($_data['callback_default'])) {
					  ?>

                  function <?php echo $_data['callback'] ?> (results, status)
						{
                      if (status == google.maps.GeocoderStatus.OK) {
                          map_<?php echo $id ?>.setCenter(results[0].geometry.location);
                          var marker = new google.maps.Marker({
                              map:map_<?php echo $id ?>,
                              position:results[0].geometry.location
                          });
                          console.log(results[0].geometry.location);
                      } else {
                          alert('Geocode was not successful for the following reason: ' + status  +' in callback: <?php echo $_data['callback'] ?>');
                      }
                  }

					  <?php
				  } else if (isset($_data['callback']['code'])) {
					  echo $_data['callback']['code'];
				  }

			  }
		  }
		  ?>

            // run map
            gmap_<?php echo $id ?>();
        });

    } else {
        alert('inesGmap required jQuery!');
    }
</script>