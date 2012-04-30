<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class InvoiceService extends CI_Model {
	
	public function __construct() 
	{
		parent::__construct();
	}
	
	
	public function getAll()
	{
		$query = $this->db->get('invoices');
		return $query->result();
	}
	
	public function get($id)
	{
		$query = $this->db->where('id', $id)->get('invoices');
		$result = $query->result();
		if (sizeof($result) !== 1) {
			return NULL;
		}
		return $result[0];
				
	}
	
	public function getSummary()
	{
		$invoices = $this->getAll();
		
		foreach($invoices as $invoice) {
			
			$query = $this->db->where('id', $invoice->registrationid)->get('registrations');
			$registrations = $query->result();
			$invoice->registration = $registrations[0];
			
			$query = $this->db->where('id', $invoice->registration->registrationtermid)->get('registrationterms');
			$terms = $query->result();
			$invoice->registration->term = $terms[0];
			
			$invoice->outstandingbalance = 0;
		}
		
		return $invoices;
	}
	
	public function getFullDetail($id)
	{
		$invoice = $this->get($id);
		$invoice->totalcost = 0;
		$invoice->amountpaid = 0;
		$invoice->outstandingbalance = 0;
		
		$query = $this->db->where('invoiceid', $invoice->id)->get('invoicepayments');
		$invoice->invoicepayments = $query->result();
		foreach ($invoice->invoicepayments as $payment) {
			$invoice->amountpaid += $payment->amount;
		}
		
		$query = $this->db->where('invoiceid', $invoice->id)->get('invoiceitems');
		$invoice->invoiceitems = $query->result();
		foreach ($invoice->invoiceitems as $item) {
			$item->totalcost = $item->quantity * $item->unitcost;
			$invoice->totalcost += $item->totalcost;
		}
		
		$invoice->outstandingbalance = $invoice->totalcost - $invoice->amountpaid;
		
		return $invoice;
	}
	
	
	public function getPayment($id)
	{
		$query = $this->db
			->where('id', $id)
			->get('invoicepayments');
		
		$payments = $query->result();
		if (sizeof($payments) !== 1) {
			return NULL;
		}
		return $payments[0];
	}
	
	public function deletePayment($payment)
	{
		$this->db
			->where('id', $payment->id)
			->delete('invoicepayments');
	}
	
	
	public function savePayment($payment)
	{
		$this->db
			->set($payment)
			->insert('invoicepayments');
		$payment->id = $this->db->insert_id();
	}
}
