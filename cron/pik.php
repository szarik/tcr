<?php
set_time_limit(3600);
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
	
	mysql_select_db($db_name, $db);
	
	function html2txt($document){ 
		$search = array('@<script[^>]*?>.*?</script>@si',  // Strip out javascript 
						'@<[\/\!]*?[^<>]*?>@si',            // Strip out HTML tags 
						'@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly 
						'@<![\s\S]*?--[ \t\n\r]*>@'         // Strip multi-line comments including CDATA 
		); 
		$text = preg_replace($search, '', $document); 
		return $text; 
		}
	
	function get_string_between($string, $start, $end){
		$string = " ".$string;
		$ini = strpos($string,$start);
		if ($ini == 0) return "";
		$ini += strlen($start);     
		$len = strpos($string,$end,$ini) - $ini;
		return substr($string,$ini,$len);
		}
	
    $rss = new rss_php;
    $rss->load('http://pik.wroclaw.pl/rss.php');
    $items = $rss->getItems();
	$i=0;
	$x=0;
	$y =0;
  
    foreach($items as $index => $item) 
		{
			
			$link = $item['link'];
			$name = addslashes(iconv( 'UTF-8', 'ISO-8859-2//TRANSLIT',get_string_between($item['description'], "Nazwa</strong>:<br />", "<br /><br /><strong>Miejsce")));
			$miejsce= explode("|", get_string_between($item['description'], "Miejsce</strong>:<br />", "<br /><br /><strong>Adres"));
			$place = iconv( 'UTF-8', 'ISO-8859-2//TRANSLIT',$miejsce[0]);
			
			if(get_string_between($item['description'], "Termin</strong>:<br />", ": 2")=="Start")
				{
				$date_start = get_string_between($item['description'], "Start: ", ", do:");
				$date_end = get_string_between($item['description'], "do: ", ",");
				}
			else
				{
				$date_start = get_string_between($item['description'], "Termin</strong>:<br />", "<br />");
				$date_end = get_string_between($item['description'], "Termin</strong>:<br />", "<br />");
				}
			
			$street = get_string_between($item['description'], "Adres</strong>:<br /><p>", ",");
			$preference = 'single,couple,group';
			$city = 'Wrocław';
			$post_code = get_string_between($item['description'], $street.",", "Wroc");
			$description1 = get_string_between(file_get_contents($link), "<div class=\"tekst\">", "</div>");
			
			
			$description3 =str_replace('<img src="http://pik.wroclaw.pl/projekt/uploaded/kupbiletnew.jpg" alt="" width="152" height="64" /></a></p>
<p style="text-align: center;"><img class="smartticket" src="http://biletin.pl/gfx/content/smartticket.png" alt="" />', ' </a>', $description1);
			$description2 =str_replace('<img src="http://pik.wroclaw.pl/projekt/uploaded/kupbiletnew.jpg" alt="" width="138" height="59" /></a></p>
<p style="text-align: center;"><img class="smartticket" src="http://biletin.pl/gfx/content/smartticket.png" alt="" />', '</a>', $description3);
			$description4 =str_replace ('<img src="uploaded/kupbiletnew.jpg" alt="" width="138" height="59" /></a></p>
<p style="text-align: center;"><img class="smartticket" src="http://biletin.pl/gfx/content/smartticket.png" alt="" />', '</a>', $description2);
			$description5 =str_replace ('<img src="http://pik.wroclaw.pl/projekt/uploaded/kupbiletnew.jpg" alt="" width="135" height="57" /></a></p>
<p style="text-align: center;"><img class="smartticket" src="http://biletin.pl/gfx/content/smartticket.png" alt="" />', '</a>', $description4);
			$link_f = get_string_between($description5, 'src="','" alt');
			$link_fo = substr($link_f, 0, 4);
			if($link_fo == 'http')
			{
			$link_foto = $link_f;
			}
			else
			{
			$link_foto = 'http://pik.wroclaw.pl/'.$link_f.'';
			}
			$description = addslashes(html2txt(iconv( 'UTF-8', 'ISO-8859-2//TRANSLIT',$description5))); 
			$category = get_string_between($item['title'],"[","]");
			$exists_category = "SELECT name FROM categories WHERE name= '" . $category . "'";
			$category_exists = mysql_query($exists_category, $db);
				
				if(mysql_num_rows($category_exists)<1)
					{
					$category_insert_sql = "INSERT INTO categories(name) VALUES ('$category')";
					$insert_item = mysql_query($category_insert_sql, $db);
				
					}
				
					$category_id1 = mysql_query("SELECT id FROM categories WHERE name= '$category' LIMIT 1 ", $db);
					while($r = mysql_fetch_assoc($category_id1))
					 {
						$category_id = $r['id'];
					 }
					
			
			$exists_name_place = "SELECT name FROM places WHERE name= '$place' ";
			$place_exists = mysql_query($exists_name_place, $db);
				
				if(mysql_num_rows($place_exists)<1)
					{
					$x++;
					$place_insert_sql = "INSERT INTO places(name, address_street_name, address_city, address_post_code) VALUES ('$place', '$street', '$city', '$post_code')";
					$insert_item = mysql_query($place_insert_sql, $db);
					
					}
				
					$place_id1 = mysql_query("SELECT id FROM places WHERE name= '$place' LIMIT 1 ", $db);
					while($r = mysql_fetch_assoc($place_id1))
					 {
						$place_id = $r['id'];
					 }
		
			$check_event = mysql_query("SELECT id, name FROM events WHERE name= '$name' AND date_start= '$date_start' ", $db);
			echo mysql_error();
			if(mysql_num_rows($check_event)!=0)
	
			{
			$y++;
			}
			else
			{
			$i++;
	
			$event_insert_sql = "INSERT INTO events(place_id, name, description, date_end, preferences, date_start, link, link_photo, category_id) VALUES ('$place_id', '$name', '$description', '$date_end', '$preference', '$date_start', '$link', '$link_foto', '$category_id')";
			echo mysql_error();
			$insert_item = mysql_query($event_insert_sql, $db);
			echo $name.'<br>';

			}
			

		}
		echo 'Dodano '.$x.' nowych miejsc.';
		echo '<br>';
		echo 'Dodano '.$i.' nowych wydarzeń.';
		echo '<br>';
		echo 'Już istnieje '.$y.' wydarzeń.';

?>
<html>
<body>

</body>
</html>