<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class RegistrationTermService extends CI_Model {
	
	public function __construct() 
	{
		parent::__construct();
	}
	
	
	
	public function getAll()
	{
		$query = $this->db->get('registrationterms');
		return $query->result();
	}
		
		
	public function get($id)
	{
		$query = $this->db->where('id', $id)->get('registrationterms');
		$result = $query->result();
		if (sizeof($result) !== 1) {
			return NULL;
		}

		return $result[0];
	}
	
	public function create() 
	{
		$date = new DateTime();
		$term = new stdClass();
		$term->id = 0;
		$term->termname = '';
		$term->startdate = $date->format('Y-m-d');
		$term->enddate = $date->format('Y-m-d');
		return $term;
	}
	
	public function saveOrUpdate($term)
	{
		if ($term->id) {
			$this->update($term);
		}
		else {
			$this->save($term);
		}
	}
	
	
	public function update($term)
	{
		$this->db
			->where('id', $term->id)
			->update('registrationterms', $term);
	}
	
	public function save($term)
	{
		$id = $term->id;
		unset($term->id);
		$this->db
			->set($term)
			->insert('registrationterms');
		$term->id = $id;
	}
	
	
	public function delete($term)
	{
		$this->db
			->where('id', $term->id)
			->delete('registrationterms');
	}
}
