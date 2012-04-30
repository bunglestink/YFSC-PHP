<?php if ( ! defined ( 'BASEPATH' ) ) exit ( 'No direct script access allowed.' );


class ModelBinder {
	
	public function bind($array)
	{
		$object = new stdClass();
		$keys = array_keys($array);
		foreach ($keys as $key) {
			$object->$key = $array[$key];
		}
		return $object;
	}
	
	public function bindJson() 
	{
		return json_decode(file_get_contents('php://input'));
	}
}