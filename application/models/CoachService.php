<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CoachService extends CI_Model {
	
	public function __construct() 
	{
		parent::__construct();
	}
	
	
	
	public function getAll()
	{
		$query = $this->db->get('coaches');
		return $query->result();
	}
		
		
	public function get($id)
	{
		$query = $this->db->where('id', $id)->get('coaches');
		$result = $query->result();
		if (sizeof($result) !== 1) {
			return NULL;
		}

		return $result[0];
	}
	
	public function create() 
	{
		$coach = new stdClass();
		$coach->id = 0;
		$coach->name = '';
		$coach->primaryinfo = '';
		$coach->secondaryinfo = '';
		return $coach;
	}
	
	public function saveOrUpdate($coach)
	{
		if ($coach->id) {
			$this->update($coach);
		}
		else {
			$this->save($coach);
		}
	}
	
	
	public function update($coach)
	{
		$this->db
			->where('id', $coach->id)
			->update('coaches', $coach);
	}
	
	public function save($coach)
	{
		unset($coach->id);
		$this->db
			->set($coach)
			->insert('coaches');
	}
	
	
	public function delete($coach)
	{
		$this->db
			->where('id', $coach->id)
			->delete('coaches');
	}
}
