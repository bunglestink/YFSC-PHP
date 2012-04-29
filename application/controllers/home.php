<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('AnnouncementService', '', TRUE);
		$this->load->model('CoachService', '', TRUE);
		$this->load->helper('url');
		$this->load->library('masterpage');
		
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
		$this->load->content('home/program', 'Content')->show();
	}
	
	
	public function calendar()
	{
		$this->load->content('home/calendar', 'Content')->show();
	}
	
	
	public function clubCoahes($id = NULL)
	{
		$model = new stdClass();
		
		if ($id === NULL) {
			$model->coaches = $this->CoachService->getAll();
			$this->load->content('home/coaches', 'Content')->show();
			return;
		}
		
		$model->coach = $this->CoachService->get($id);
		if (coach === NULL) {
			redirect(site_url('home/clubCoaches'));
			return;
		}
			
		$this->load->content('home/coach', 'Content')->show();
	}
}