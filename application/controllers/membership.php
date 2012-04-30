<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Membership extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('username')) {
			redirect('/account/logOn');
		}
		$this->masterpage->setMasterPage('masters/main');
	}
	
	public function index()
	{
		$this->masterpage->content('membership/index', 'Content')->show();
	}
}