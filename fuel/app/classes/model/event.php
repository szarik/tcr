<?php
class Model_Event extends \Orm\Model
{
	//protected static $_table_name = 'tcr.events';
	
	protected static $_properties = array(
      'id',
      'place_id' => array(
         'data_type' => 'integer',
         'label' => 'Id miejsca'
         //'validation' => array('required')
      ),
	  'name' => array(
         'data_type' => 'string',
         'label' => 'Nazwa wydarzenia' //label for the input field
         //'validation' => array('required', 'max_length'=>array(100), 'min_length'=>array(10))
      ),
      'description' => array(
         'data_type' => 'string',
         'label' => 'Opis',
         //'validation' =>  array('required', 'max_length'=>array(65), 'min_length'=>array(2))
      ),
	  'date_start' => array(
         'data_type' => 'date',
         'label' => 'Pocz¹tek',
      ),
	  'date_end' => array(
         'data_type' => 'date',
         'label' => 'Koniec',
      ),
	  'preferences' => array(
         'data_type' => 'string',
         'label' => 'Preferencje',
		 'form' => array('type' => 'select', 'options' => array('single'=>'Jedna osoba', 'couple'=>'Para', 'group'=>'Grupa', 'any'=>'Dowolne'))
      ),
	  'periodicity' => array(
         'data_type' => 'integer',
         'label' => 'Powtarzalnoœæ (w dniach)',
      ),
	  'coordinates' => array(
         'data_type' => 'string',
         'label' => 'Po³o¿enie',
      )
   );
}
?>