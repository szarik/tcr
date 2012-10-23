<?php
class Model_Event extends \Orm\Model
{
	//protected static $_table_name = 'tcr.events';
	
	protected static $_properties = array(
      'id',
      'place_id' => array(
         'data_type' => 'int',
         'label' => 'Id miejsca',
         'validation' => array('required', 'valid_integer')
      ),
	  'name' => array(
         'data_type' => 'string',
         'label' => 'Nazwa wydarzenia',
         'validation' => array('required', 'max_length'=>array(255), 'min_length'=>array(3))
      ),
      'description' => array(
         'data_type' => 'string',
         'label' => 'Opis'
      ),
	  'date_start' => array(
         'data_type' => 'date',
         'label' => 'Pocz¹tek',
		 'validation' => array()
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
         'data_type' => 'int',
         'label' => 'Powtarzalnoœæ (w dniach)',
      ),
	  'coordinates' => array(
         'data_type' => 'string',
         'label' => 'Po³o¿enie',
      )
   );
}
?>