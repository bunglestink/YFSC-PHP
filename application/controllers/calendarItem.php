<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CalendarItem extends CI_Controller {
    
    public function __construct()
	{
		parent::__construct();
		$this->load->model('CalendarItemService', '', TRUE);
		
		$this->masterpage->setMasterPage('masters/main');
	}
    
    public function index($id)
	{
		$model = new stdClass();
		$model->registrationTermId = $id;
        $model->calendarItems = $this->CalendarItemService->getAll($id);
		
		$this->masterpage->content('calendarItem/index', 'Content', $model)->show();
    }
    
    
    public function create($id) 
	{
		$model = $this->CalendarItemService->create($id);
		
        $this->masterpage->content('calendarItem/edit', 'Content', $model)->show();
    }
	
    
    public function edit($id) {
		$model = $this->CalendarItemService->get($id);
		
        if ($model === NULL) {
            redirect(site_url('/calendarItem/index'));
			return;
        }

        $this->masterpage->content('/calendarItem/edit', 'Content', $model)->show();
    }
    
    
	public function commit() 
	{    
		$item = $this->modelbinder->bind($this->input->post());
        $this->CalendarItemService->saveOrUpdate($item);
		$this->masterpage
			->contentString("Calendar Item '" . $item->id . "' saved.", "Message");
		$this->index($item->registrationtermid);
    }
    
	
    public function deleteConfirm($id) 
	{
		$model = $this->CalendarItemService->get($id);
        
        if ($model === NULL) {
            redirect(site_url('/calendarItem/index'));
			return;
        }
		
		$this->masterpage->content('calendarItem/deleteConfirm', 'Content', $model)->show();
    }
    
	
    public function delete($id) 
	{
		$item = $this->CalendarItemService->get($id);
		
        if ($item != null) {
            $this->CalendarItemService->delete($item);
            $this->masterpage->contentString("Calendar Item '" . $item->id. "' removed.", "Message");
        }
        
        $this->index($item->registrationtermid);
    }
}
