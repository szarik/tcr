<?php
class Model_Event extends \Orm\Model
{
	protected static $_has_many = array('event2price'); //'events2metatags', 'events2categories'

	protected static $_properties = array(
      'id',
	  'place_id' => array(
         'data_type' => 'int',
         'label' => 'Id miejsca',
         'validation' => array('required')
      ),
	  'name' => array(
         'data_type' => 'string',
         'label' => 'Nazwa wydarzenia',
         'validation' => array('required', 'min_length'=>array(3), 'max_length'=>array(255))
      ),
      'description' => array(
         'data_type' => 'string',
         'label' => 'Opis',
		 'form' => array('type' => 'textarea') 
      ),
	  'link' => array(
         'data_type' => 'string',
         'label' => 'Link',
		 'validation' => array('valid_url')
      ),
	  'link_photo' => array(
         'data_type' => 'string',
         'label' => 'Link (zdjecie)',
		 'validation' => array('valid_url')
      ),
	  'link_movie' => array(
         'data_type' => 'string',
         'label' => 'Link (film)',
		 'validation' => array('valid_url')
      ),
	  'date_start' => array(
         'data_type' => 'date',
         'label' => 'Poczatek',
		 'validation' => array('required')
      ),
	  'date_end' => array(
         'data_type' => 'date',
         'label' => 'Koniec',
		 'validation' => array('required')
      ),
	  'preferences' => array(
         'data_type' => 'string',
         'label' => 'Preferencje',
		 'form' => array('type' => 'checkbox', 'options' => array('single'=>'Jedna osoba', 'couple'=>'Para', 'group'=>'Grupa'))
      ),
	  'coordinates' => array(
         'data_type' => 'string',
         'label' => 'Polozenie',
		 'validation' => array('required')
      )
   );
   
   public static function _validation_is_int($val)
   {
		if( $val == null )
			return true;
		return ctype_digit($val);
   }
   
   public static function _validation_is_price($val)
   {
		if( $val == null )
			return true;
		return is_numeric($val);
   }
   
   public static function _validation_is_timestamp($d)
   {
	    $ret = false;
	    $re_sep='[\/\-\.]';
	    $re_time='( (([0-1]?\d)|(2[0-3])):[0-5]\d)';
	    $re_d='(0?[1-9]|[12][0-9]|3[01])'; $re_m='(0?[1-9]|1[012])'; $re_y='(19\d\d|20\d\d)';
	 
	    if (!preg_match('!' .$re_sep .'!',$d))
			$d=strftime("%Y-%m-%d %H:%M",(int)$d);  #Convert Unix timestamp to EntryFormat
	 
	    if (preg_match('!^' .$re_y .$re_sep .$re_m .$re_sep .$re_d. $re_time. '$!',$d,$m))  #yyyy-mm-dd
	        $ret = checkdate($m[2], $m[3], $m[1]);
	    
	    return $ret && strtotime($d);
   }
   
   public static function _validation_checkboxes_required($checks)
   {
		if( $checks != null )
		{
			return true;
		}
		return false;
   }
   
   public static function flatten($values)
   {
		if( $values == null  ||  count($values) == 1)
		{
			return $values;
		}
		else
		{
			return implode(',', $values);
		}
   }
}
?>