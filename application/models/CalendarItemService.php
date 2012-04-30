<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CalendarItemService extends CI_Model {
	
	public function __construct() 
	{
		parent::__construct();
	}
	
	
	
	public function getAll($registrationtermid)
	{
		$query = $this->db
			->where('registrationtermid', $registrationtermid)
			->get('calendaritems');
		return $query->result();
	}
		
		
	public function get($id)
	{
		$query = $this->db->where('id', $id)->get('calendaritems');
		$result = $query->result();
		if (sizeof($result) !== 1) {
			return NULL;
		}

		return $result[0];
	}
	
	public function create($registrationtermid) 
	{
		$item = new stdClass();
		$item->id = 0;
		$item->registrationtermid = $registrationtermid;
		$item->days = '';
		$item->saturdaynotes = '';
		$item->sundaynotes = '';
		return $item;
	}
	
	public function saveOrUpdate($item)
	{
		if ($item->id) {
			$this->update($item);
		}
		else {
			$this->save($item);
		}
	}
	
	
	public function update($item)
	{
		$this->db
			->where('id', $item->id)
			->update('calendaritems', $item);
	}
	
	public function save($item)
	{
		$id = $item->id;
		unset($item->id);
		$this->db
			->set($item)
			->insert('calendaritems');
		$item->id = $id;
	}
	
	
	public function delete($item)
	{
		$this->db
			->where('id', $item->id)
			->delete('calendaritems');
	}
}
