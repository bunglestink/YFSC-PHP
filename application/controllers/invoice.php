<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Invoice extends CI_Controller {
    
    public function __construct()
	{
		parent::__construct();
		$this->load->model('InvoiceService', '', TRUE);
		
		$this->masterpage->setMasterPage('masters/main');
	}
    

	
	public function index()
	{
		$model = new stdClass();
		$model->invoices = $this->InvoiceService->getSummary();
		
		$this->masterpage->Content('invoice/index', 'Content', $model)->show();
	}
	
	
	public function view($id)
	{
		$invoice = $this->InvoiceService->getFullDetail($id);
		if ($invoice === NULL) {
			redirect(site_url('/invoice/index'));
			return;
		}
		
		$this->masterpage->Content('invoice/view', 'Content', $invoice)->show();		
	}
	
	
	
	public function addPayment()
	{
		$payment = $this->modelbinder->bindJson();
		
		$invoiceById = $payment->invoice;
		if ($invoiceById === NULL) {
			echo json_encode(FALSE);
			return;
		}
		
		$invoice = $this->InvoiceService->get($invoiceById->id);
		if ($invoice === NULL) {
			return json_encode(FALSE);
		}
		
		$date = new DateTime();
		$payment->invoiceid = $invoice->id;
		$payment->datereceived = $date->format('Y-m-d');
		$id = $this->InvoiceService->savePayment($payment);
		
		echo $payment->id;
	}
	
	public function deletePayment($id)
	{
		$payment = $this->InvoiceService->getPayment($id);
		
		if ($payment === NULL) {
			echo json_encode(FALSE);
			return;
		}
		
		$this->InvoiceService->deletePayment($payment);
		echo json_encode(TRUE);
	}
}
