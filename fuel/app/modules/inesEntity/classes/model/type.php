<?php
namespace InesEntity\Model;

class Type extends \Model
{

	/**
	 * Get type informations about $_eid
	 *
	 * @param $_eid
	 * @return array|null
	 */
	public static function get($_eid)
	{

		if (!is_array($_eid)) {
			$_eids[] = $_eid;
		} else {
			$_eids = $_eid;
		}

		if (is_array($_eids) && !empty($_eids)) {

			$_return = \DB::select('tid', 'name')->from('types')->where('tid', 'IN', $_eids)->as_object()->execute();

			if (isset($_return)) {
				return $_return;
			} else {
				return null;
			}

		} else {
			return null;
		}

	}
}