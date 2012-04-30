<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AnnouncementService extends CI_Model {
	
	private $currentAnnouncementCount = 0;
	
	public function __construct() 
	{
		parent::__construct();
		$this->currentAnnouncementCount = 5;
	}
	
	
	public function create()
	{
		$announcement = new stdClass();
		$announcement->id = 0;
        $announcement->announcementdate = new DateTime();
		$announcement->announcementdate = $announcement->announcementdate->format('Y-m-d');
		$announcement->title = '';
		$announcement->body = '';
		return $announcement;
	}
	
	public function getCurrentAnnouncements()
	{
		$query = $this->db->get('announcements', $this->currentAnnouncementCount);
		return $query->result();
	}
	
	public function getAll()
	{
		$query = $this->db->get('announcements');
		return $query->result();
	}
	
	public function get($id)
	{
		$query = $this->db
				->where('id', $id)
				->get('announcements');
		
		$result = $query->result();
		
		if (sizeof($result) !== 1) {
			return NULL;
		}
		return $result[0];
	}
	
	public function saveOrUpdate($announcement) 
	{
		if ($announcement->id) {
			$this->update($announcement);
		}
		else {
			$this->save($announcement);
		}
	}
	
	
	public function update($announcement)
	{
		$this->db
			->where('id', $announcement->id)
			->update('announcements', $announcement);
	}
	
	public function save($announcement) 
	{
		$id = $announcement->id;
		unset($announcement->id);
		$this->db
			->set($announcement)
			->insert('announcements');
		$announcement->id = $id;
	}
	
	
	public function delete($announcement)
	{
		$this->db
			->where('id', $announcement->id)
			->delete('announcements');
	}
}
