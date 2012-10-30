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
	  'address' => array(
         'data_type' => 'string',
         'label' => 'Adres',
		 'validation' => array('required', 'max_length'=>array(255), 'min_length'=>array(3)),
		 'form' => array('type' => 'textarea') 
      ),
	  'open_time' => array(
         'data_type' => 'time',
         'label' => 'Godziny otwarcia',
		 'validation' => array('required', 'max_length'=>array(255), 'min_length'=>array(3))
      ),
	  'coordinates' => array(
         'data_type' => 'string',
         'label' => 'Po³o¿enie',
		 'validation' => array('required', 'max_length'=>array(255), 'min_length'=>array(3))
      )
   );
}
?>