<?php
class Model_Place extends \Orm\Model
{
	
	protected static $_table_name = 'places';
	protected static $_properties = array(
      'id',
	  'name' => array(
         'data_type' => 'string',
         'label' => 'Nazwa miejsca',
         'validation' => array('required', 'max_length'=>array(255), 'min_length'=>array(3))
      ),
      'description' => array(
         'data_type' => 'string',
         'label' => 'Opis',
		 'validation' => array('required', 'max_length'=>array(255), 'min_length'=>array(3)),
		 'form' => array('type' => 'textarea') 
      ),
	  'address_street_name' => array(
         'data_type' => 'string',
         'label' => 'Ulica',
		 'validation' => array('required', 'max_length'=>array(255), 'min_length'=>array(3)) 
      ),
	  'address_flat_number' => array(
         'data_type' => 'string',
         'label' => 'Numer lokalu',
		 'validation' => array('required', 'max_length'=>array(255), 'min_length'=>array(1))	 
      ),
	  'address_city' => array(
         'data_type' => 'string',
         'label' => 'Miasto',
		 'validation' => array('required', 'max_length'=>array(255), 'min_length'=>array(3)),
      ),
	  'address_post_code' => array(
         'data_type' => 'string',
         'label' => 'Kod pocztowy',
		 'validation' => array('required', 'max_length'=>array(255), 'min_length'=>array(3))
      ),
	  'map_lat' => array(
         'data_type' => 'string',
         'label' => 'lat',
		 'validation' => array('required', 'max_length'=>array(255), 'min_length'=>array(3))
      ),
	  'map_lng' => array(
         'data_type' => 'string',
         'label' => 'lng',
		 'validation' => array('required', 'max_length'=>array(255), 'min_length'=>array(3))
      ),
	  'open_time' => array(
         'data_type' => 'time',
         'label' => 'Godziny otwarcia',
		 'validation' => array('required', 'max_length'=>array(255), 'min_length'=>array(3))
      ),
	  'phone' => array(
         'data_type' => 'string',
         'label' => 'Nr telefonu',
		 'validation' => array('required', 'max_length'=>array(255), 'min_length'=>array(3))
      ),
	  'website' => array(
         'data_type' => 'string',
         'label' => 'Strona wwww',
		 'validation' => array('required', 'max_length'=>array(255), 'min_length'=>array(3))
      ),
	  'email' => array(
         'data_type' => 'string',
         'label' => 'Email',
		 'validation' => array('required', 'max_length'=>array(255), 'min_length'=>array(3))
      ),
	   'photo' => array(
         'data_type' => 'string',
         'label' => 'Logo',
		 'validation' => array('required', 'max_length'=>array(255), 'min_length'=>array(3))
      )
   );
}
?>