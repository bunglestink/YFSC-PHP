<?php

class AnnouncementService extends CI_Model {
	
	private $currentAnnouncementCount;
	
	public function __construct() 
	{
		parent::__construct();
		$this->currentAnnouncementCount = 5;
	}
	
	
	
	public function getCurrentAnnouncements()
	{
		$query = $this->db->get('announcements');
		return $query->result();
	}
}
