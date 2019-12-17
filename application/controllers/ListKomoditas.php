<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ListKomoditas extends CI_Controller {

	function __construct() {
        parent::__construct();
    }

	public function index()
	{
		$data['tittle']="list komoditas";
		$data['komoditas_data']=$this->m_crud->read('komoditas');
		$this->load->view('include/v_headerB',$data);
		$this->load->view('listkomoditas');
		$this->load->view('include/v_footerB');
	}

	public function acc($id)
	{
		if($this->m_crud->update('komoditas',array('komoditas_id'=>$id),array('komoditas_acc'=>1))){
			$this->session->set_flashdata('message','Sukses update data');
		}else{
			$this->session->set_flashdata('error',true);
			$this->session->set_flashdata('message','Gagal update data');
		}
		redirect(site_url('/listkomoditas'));
	}

	public function recject($id)
	{
		if($this->m_crud->update('komoditas',array('komoditas_id'=>$id),array('komoditas_acc'=>2))){
			$this->session->set_flashdata('message','Sukses update data');
		}else{
			$this->session->set_flashdata('error',true);
			$this->session->set_flashdata('message','Gagal update data');
		}
		redirect(site_url('/listkomoditas'));
	}

}
