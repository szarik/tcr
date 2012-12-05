<html>
<head>
    <meta charset='utf-8'>
</head>	<body>
<?php
//RRS do zrobienia
/*
Zamiana znaków &oacute; na znaki polskie np ó
*/


function zamiana($str)
{
	    $Chars 		= array('&#261;', '&#263;', '&#281;', '&#322;', '&#324;', '&oacute;', '&#347;', '&#380;', '&#378;',
							'&#260;', '&#262;', '&#280;', '&#321;', '&#323;', '&Oacute;', '&#346;', '&#379;', '&#377;'); 
	    $replace    = array('ą', 'ć', 'ę', 'ł', 'ń', 'ó', 'ś', 'ż', 'ź',
							'Ą', 'Ć', 'Ę', 'Ł', 'Ń', 'Ó', 'Ś', 'Ż', 'Ź');
	    return str_replace($Chars, $replace, $str);
}

 
require_once 'rss_php.php';    
	
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
	
		
	
	
	function analiza_xml($xml)
	{
		if($xml)
		{
		$rss = new rss_php;
		$rss->load($xml);
		$items = $rss->getItems();
		
			foreach($items as $index => $item) 
			{
				
				$link = $item['link'];
				$link_foto =$item['zdjecie'];
				$link_film = $item['film'];
				$name = zamiana($item['nazwa']);
				$place_id = $item['id'];
				$date_start = $item['start'];
				$date_end = $item['koniec'];
				//$street = $item['ulica'];
				$preference = 'sam,para,grupa';
				//$city = $item['miasto'];
				//$code = $item['kod'];
				$description = zamiana($item['opis']);
				$category = $item['kategoria'];
				
	
				$check_category = mysql_query("SELECT name FROM categories WHERE name= '$category' ");
								
				if(mysql_num_rows($check_category)<1)
				{
				$create_category= mysql_query("INSERT INTO categories(name) VALUES ('$category')");	
				$error .= 'Dodano nową kategorię - <strong>'.$category.'</strong><br />';
				}
				
					 $get_category_id = mysql_query("SELECT id FROM categories WHERE name= '$category' LIMIT 1 ");
					 while($r = mysql_fetch_assoc($get_category_id))
					 {
						$category_id = $r['id'];
					 }
				
				$check_event = mysql_query("SELECT id, name FROM events WHERE name= '$name' AND date_start= '$date_start' ");
				
				if(mysql_num_rows($check_event)<1)
				{		 
					$event_insert_sql = mysql_query("INSERT INTO events(place_id, name, description, date_end, preferences, date_start, link, link_photo, link_movie, category_id) VALUES ('$place_id', '$name', '$description', '$date_end', '$preference', '$date_start', '$link', '$link_foto', '$link_film', '$category_id')"); 
					
					$error .= 'Dodano nowe wydarzenie - <strong>'.$name.'</strong><br />';
					
					
					$get_event_id = mysql_query("SELECT id FROM events WHERE name= '$name' LIMIT 1");
					while($r = mysql_fetch_assoc($get_event_id))
					 {
						$event_id = $r['id'];
					 }
							 
					$event2category =  mysql_query("INSERT INTO events2categories(event_id, category_id) VALUES ('$event_id', '$category_id')");
					
				}
				else
				{
					$error .= 'Wydarzenie <strong>'.$name.'</strong> znajduje się już w naszej bazie.<br />';
				}
			}	
		}
		else
		{
			$error = 'Proszę podać adres pliku<br>Przykład:  <strong>http://example.com/file.xml</strong>';
		}
		
	echo $error; 
	}
	
	
	$xml = "http://www.jazzda.pl/tcr_xml.php";
	analiza_xml($xml);
	$xml = "http://www.prl.wroc.pl/tcr_xml.php";
	analiza_xml($xml); 
	?>


	
		
	</body>
</html>