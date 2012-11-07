<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>Gmap example</title>

	<?php
	echo \Fuel\Core\Asset::render('_default_');
	echo \Fuel\Core\Asset::render('external');
	?>

	<?php
	echo $map1_javascript;
	echo $map2_javascript;
	?>

</head>
<body>

<?php
echo $map1_html;
echo '<hr/>';
echo $map2_html;
?>

</body>
</html>