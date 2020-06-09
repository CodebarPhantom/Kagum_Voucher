<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Voucher extends CI_Controller {

	
	function __construct(){
		parent::__construct();
		
		  //$this->contoller_name = $this->router->class;
		  //$this->function_name = $this->router->method;
		  $this->load->model('Voucher_hotels_model');	
		  $this->load->helper('mydate');

		 // $this->load->library('form_validation');
		  //$this->load->library('pagination');
		  //$this->load->library('session');
		  //$this->load->library('uploadfile');
		 
		  //$this->load->helper('form');
		  //$this->load->helper('url');
		  //$this->load->helper('mydate');
		  //$this->load->helper('text');
		  
	  }

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function getIdVoucher() {
		if (isset($_POST['voucher'])) {
			$idVoucher = $_POST['voucher'];
			$results = $this->Voucher_hotels_model->getIdVoucher($idVoucher);
			if ($results === TRUE) {
				echo '<span class="label-input100 text-success">Voucher is valid</span>';
			} else {
				echo '<span class="label-input100 text-danger">Voucher is invalid or Has Been Redeem</span>';
			}
		} else {
			echo '<span class="form-text text-danger">Voucher is Required</span>';
		}
	}

	public function bookingVoucher(){
		$stay_date = date_php_to_mysql($this->input->post('stayDate'));
		$email = $this->input->post('emailvoucher',TRUE);   
		$data = array(        
			'fk_idhotels' => $this->input->post('hotelName',TRUE),
			'lock_at' => date("Y-m-d H:i:s"),
			'stay_date' =>$stay_date,
			'fk_idtyperoom' => $this->input->post('roomType',TRUE),
			//'fk_iduser_lock'=>'',
			'status_voucher' => 2
        );  
     
        $this->Voucher_hotels_model->update_data_voucher('smartreport_voucherhotels', $data, $this->input->post('voucher', TRUE),$this->input->post('emailvoucher',TRUE));
		$this->session->set_flashdata('input_success','message');   
		//redirect(site_url('smartreport/competitor-hotel'));
        redirect('voucher');
	}

	public function getIdVoucherEmail() {
		if (isset($_POST['voucher'])) {
			$idVoucher = $_POST['voucher'];
			$emailVoucher = $_POST['emailvoucher'];
			$results = $this->Voucher_hotels_model->getIdVoucherEmail($idVoucher, $emailVoucher);
			if ($results === TRUE) {
				echo '<span class="label-input100 text-success">Email is valid</span>';
			} else {
				echo '<span class="label-input100 text-danger">Email is not valid</span>';
			}
		} else {
			echo '<span class="form-text text-danger">Email is Required</span>';
		}
	}

	public function search_voucher(){
		$idVoucher = $this->input->post('idvoucher',TRUE);
		$page_data['voucher_datas'] = $this->Voucher_hotels_model->get_data_voucher($idVoucher);
		$count_voucher = $this->Voucher_hotels_model->get_data_voucher_count($idVoucher);

		
		if($count_voucher->count_idvoucher == 0){
			$this->session->set_flashdata('search_notfound','message');   
			redirect('voucher');

		}else{
		$this->load->view('welcome_message2',$page_data);

		}

        

	}
}
