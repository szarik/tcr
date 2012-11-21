<script type="text/javascript">

	function drawCircle() {
		var radius = 1000;
		var center = new google.maps.LatLng(51.107885,17.038538);
		var circle = new google.maps.Circle({
			radius: radius,
			center: center,
			map: map_<?php echo $id ?>,
			strokeColor: "#f00",
			strokeOpacity: 0.8,
			strokeWeight: 2,
			fillColor: "#f00",
			fillOpacity: 0.35,
			editable: true
		});
		//map_<?php echo $id ?>.fitBounds(circle.getBounds());
		//map_<?php echo $id ?>.circleRadius = radius;
		console.log(map_<?php echo $id ?>.getCenter());
		console.log(circle);
		console.log(map_<?php echo $id ?>);
	}

	drawCircle();
</script>