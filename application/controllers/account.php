<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Controller {
    
    public function __construct()
	{
		parent::__construct();
		$this->load->model('AccountService', '', TRUE);
		
		$this->masterpage->setMasterPage('masters/main');
	}
    
	
	public function logOn() 
	{
		$model = new stdClass();
		$model->error = FALSE;
		$this->masterpage->content('account/logOn', 'Content', $model)->show();
	}
	
	
	public function logOnCommit()
	{
		$auth = $this->modelbinder->bind($this->input->post());
		
		if ($this->AccountService->authenticateUser($auth->username, $auth->password)) {
			$this->AccountService->loginUser($auth->username);
			redirect(site_url('membership'));
			return;
		}
		
		$model = new stdClass();
		$model->error = TRUE;
		$this->masterpage->content('account/logOn', 'Content', $model)->show();
	}
	
	
    public function logOff()
	{
		$this->AccountService->logoutUser();
		redirect(site_url('/'));
	}
}
