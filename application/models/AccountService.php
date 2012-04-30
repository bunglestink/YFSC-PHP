<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AccountService extends CI_Model {
	
	public function __construct() 
	{
		parent::__construct();
	}
	
	
	public function authenticateUser($username, $password)
	{
		$query = $this->db
			->where('username', $username)
			->where('password', $password)
			->get('users');
		
		return 1 === sizeof($query->result());
	}
	
	
	public function loginUser($username)
	{
		$this->session->set_userdata('username', $username);
		$this->session->set_userdata('roles', $this->getRoles($username));
	}
	
	
	public function logoutUser()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('roles');
	}
	
	
	private function getRoles($username)
	{
		$query = $this->db
			->where('username', $username)
			->get('roles');
		
		$roles = array();
		foreach ($query->result() as $role) {
			$roles[] = $role->role;
		}
		return $roles;
	}
}
