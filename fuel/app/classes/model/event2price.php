<?php
class Model_Event2Price extends \Orm\Model
{
	protected static $_table_name = 'events2prices';
	protected static $_belongs_to = array('event');

	protected static $_properties = array(
      'id',
	  'event_id' => array(
         'data_type' => 'int',
      ),
	  'price_name_id' => array(
         'data_type' => 'int',
      ),
      'value' => array(
         'data_type' => 'double',
      ),
	  'date_from' => array(
         'data_type' => 'timestamp',
      ),
	  'date_to' => array(
         'data_type' => 'timestamp',
      ),
   );
}
?>