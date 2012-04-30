<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class RegistrationTerm extends CI_Controller {
    
    public function __construct()
	{
		parent::__construct();
		if (!in_array('Admin', $this->session->userdata('roles'))) {
			redirect('/account/logOn');
		}
		
		$this->load->model('RegistrationTermService', '', TRUE);
		$this->masterpage->setMasterPage('masters/main');
	}
    
    public function index()
	{
		$model = new stdClass();
        $model->registrationTerms = $this->RegistrationTermService->getAll();
		
		$this->masterpage->content('registrationTerm/index', 'Content', $model)->show();
    }
    
    
    public function create() 
	{
		$model = $this->RegistrationTermService->create();
		
        $this->masterpage->content('registrationTerm/edit', 'Content', $model)->show();
    }
	
    
    public function edit($id) {
		$model = $this->RegistrationTermService->get($id);
		
        if ($model === NULL) {
            redirect(site_url('/registrationTerm/index'));
			return;
        }

        $this->masterpage->content('/registrationTerm/edit', 'Content', $model)->show();
    }
    
    
	public function commit() 
	{    
		$term = $this->modelbinder->bind($this->input->post());
        $this->RegistrationTermService->saveOrUpdate($term);
		$this->masterpage
			->contentString("Registration Term '" . $term->termname . "' saved.", "Message");
		$this->index();
    }
    
	
    public function deleteConfirm($id) 
	{
		$model = $this->RegistrationTermService->get($id);
        
        if ($model === NULL) {
            redirect(site_url('/registrationTerm/index'));
			return;
        }
		
		$this->masterpage->content('registrationTerm/deleteConfirm', 'Content', $model)->show();
    }
    
	
    public function delete($id) 
	{
		$term = $this->RegistrationTermService->get($id);
		
        if ($term != null) {
            $this->RegistrationTermService->delete($term);
            $this->masterpage->contentString("Registration Term '" . $term->termname. "' removed.", "Message");
        }
        
        $this->index();
    }
}
