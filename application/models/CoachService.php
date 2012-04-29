<?php

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
}
