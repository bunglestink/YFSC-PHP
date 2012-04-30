<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Coach extends CI_Controller {
    
    public function __construct()
	{
		parent::__construct();
		
		$this->load->model('CoachService', '', TRUE);
		$this->masterpage->setMasterPage('masters/main');
	}
    
    public function index() 
	{
		$model = new stdClass();
        $model->coaches = $this->CoachService->getAll();
		
		$this->masterpage->content('coach/index', 'Content', $model)->show();
    }
    
    
    public function create() 
	{
		$model = $this->CoachService->create();
        $this->masterpage->content('coach/edit', 'Content', $model)->show();
    }
	
    
    public function edit($id) {
		$model = $this->CoachService->get($id);
		
        if ($model === NULL) {
            redirect(site_url('/coach/index'));
			return;
        }

        $this->masterpage->content('/coach/edit', 'Content', $model)->show();
    }
    
    public function commit() 
	{    
		$coach = $this->modelbinder->bind($this->input->post());
        $this->CoachService->saveOrUpdate($coach);
		$this->masterpage
			->contentString("Coach '" . $coach->name . "' saved.", "Message");
		$this->index();
    }
    
    public function deleteConfirm($id) 
	{
		$model = $this->CoachService->get($id);
        
        if ($model === NULL) {
            redirect(site_url('/coach/index'));
			return;
        }
		
		$this->masterpage->content('coach/deleteConfirm', 'Content', $model)->show();
    }
    
	
    public function delete($id) 
	{
		$coach = $this->CoachService->get($id);
		
        if ($coach != null) {
            $this->CoachService->delete($coach);
            $this->masterpage->contentString("Coach '" . $coach->name. "' removed.", "Message");
        }
        
        $this->index();
    }
}
