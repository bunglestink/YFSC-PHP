<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Announcement extends CI_Controller {
    
    public function __construct()
	{
		parent::__construct();
		$this->load->model('AnnouncementService', '', TRUE);
		$this->load->helper('url');
		$this->load->library('masterpage');
		$this->load->library('modelbinder');
		
		$this->masterpage->setMasterPage('masters/main');
	}
    
    public function index() 
	{
		$model = new stdClass();
        $model->announcements = $this->AnnouncementService->getAll();
		
		$this->masterpage->content('announcement/index', 'Content', $model)->show();
    }
    
    
    public function create() 
	{
		$model = $this->AnnouncementService->create();
        $this->masterpage->content('announcement/edit', 'Content', $model)->show();
    }
	
    
    public function edit($id) {
		$model = $this->AnnouncementService->get($id);
		
        if ($model === NULL) {
            redirect(site_url('/announcement/index'));
			return;
        }

        $this->masterpage->content('/announcement/edit', 'Content', $model)->show();
    }
    
    public function commit() 
	{    
		$announcement = $this->modelbinder->bind($this->input->post());
        $this->AnnouncementService->saveOrUpdate($announcement);
		$this->masterpage
			->contentString("Announcement '" . $announcement->title . "' saved.", "Message");
		$this->index();
    }
    
    public function deleteConfirm($id) 
	{
		$model = $this->AnnouncementService->get($id);
        
        if ($model === NULL) {
            redirect(site_url('/announcement/index'));
			return;
        }
		
		$this->masterpage->content('announcement/deleteConfirm', 'Content', $model)->show();
    }
    
	
    public function delete($id) 
	{
		$announcement = $this->AnnouncementService->get($id);
        if ($announcement != null) {
            $this->AnnouncementService->delete($announcement);
            $this->masterpage->contentString("Announcement '" . $announcement->title . "' removed.", "Message");
        }
        
        $this->index();
    }
}
