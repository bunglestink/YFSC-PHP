<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('AnnouncementService', '', TRUE);
		$this->load->model('CoachService', '', TRUE);
		
		$this->masterpage->setMasterPage('masters/main');
	}
	
	public function index()
	{
		$model = new stdClass();
		$model->announcements = $this->AnnouncementService->getCurrentAnnouncements();
		
		$this->masterpage->content('home/index', 'Content', $model)->show();
	}
	
	public function program()
	{
		$this->masterpage->content('home/program', 'Content')->show();
	}
	
	
	public function calendar()
	{
		$this->masterpage->content('home/calendar', 'Content')->show();
	}
	
	
	public function clubCoaches($id = NULL)
	{
		$model = new stdClass();
		
		if ($id === NULL) {
			$model->coaches = $this->CoachService->getAll();
			$this->masterpage->content('home/coaches', 'Content', $model)->show();
			return;
		}
		
		$model->coach = $this->CoachService->get($id);
		if ($model->coach === NULL) {
			redirect(site_url('home/clubCoaches'));
			return;
		}
			
		$this->masterpage->content('home/coach', 'Content', $model->coach)->show();
	}
	
	
	public function membership()
	{
		$this->masterpage->content('home/membership', 'Content')->show();
	}
	
	public function brochure()
	{
		$this->masterpage->content('home/brochure', 'Content')->show();
	}
	
	public function byLaws()
	{
		$this->masterpage->content('home/byLaws', 'Content')->show();
	}
	
	public function contactInformation()
	{
		$this->masterpage->content('home/contactInformation', 'Content')->show();
	}
}