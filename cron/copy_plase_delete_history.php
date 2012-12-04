<html>
<head>
    <meta charset='utf-8'>
</head>
<body>
<?php

	$db_hostname="sql.ghggroup.nazwa.pl:3307";
	$db_username="ghggroup_30";
	$db_password="123ToCoRobimy!@#";
	$db_name="ghggroup_30";
	
	$db = mysql_connect($db_hostname,$db_username,$db_password);
	if (!$db)
	{
		die("Nie mozna polaczyc sie z baza: " . mysql_error());
	}
	mysql_query("SET NAMES 'utf8' ");
	mysql_select_db($db_name, $db);
	
   
	$cztery_dni_pozniej = date("Y-m-d H:i:s", strtotime("-4 day"));

	$pola_w_bazie = "`id`, `place_id`, `name`, `description` , `date_end`, `preferences`, `periodicity`, `coordinates`, `visible`, `date_created`, `date_start`, `date_modified`, `link`, `link_photo`, `link_movie`, `category_id`, `pref`";
	
    $zapytanie123 = "
	INSERT INTO events_history ($pola_w_bazie)
    SELECT $pola_w_bazie
    FROM `events`
    WHERE `events`.`date_end` < '$cztery_dni_pozniej';";
	$idzapytania1 = mysql_query($zapytanie123);
	
	$zapytanie0 = "SELECT * FROM `events` WHERE `events`.`date_end` < '$cztery_dni_pozniej';";
	$idzapytania0 = mysql_query($zapytanie0);
	$licznik = 0;
	while ($wiersz0 = mysql_fetch_row($idzapytania0)) 
	{
		$licznik++;
	}
	echo "Zarchiwizowano: $licznik";
	
	$zapytanie = "DELETE FROM `events`  WHERE `events`.`date_end` < '$cztery_dni_pozniej';";
	$idzapytania = mysql_query($zapytanie);
	
	?>	
	</body>
</html>