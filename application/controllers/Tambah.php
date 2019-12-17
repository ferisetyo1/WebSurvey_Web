<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tambah extends CI_Controller {

	function __construct() {
        parent::__construct();
    }

	public function index()
	{
		$data['tittle']="tambah komoditas";
		$data_u = $this->session->userdata('data_user');
		if ($data_u){
			if($data_u['user_role']==2){
				$this->load->view('include/v_headerB',$data);
				$this->load->view('tbhkomoditas');
				$this->load->view('include/v_footerB');
			}else{
				$this->load->view('include/v_headerB',$data);
				$this->load->view('403');
				$this->load->view('include/v_footerB');
			}
        } else {
			redirect(site_url('login'));
		}
		
	}

	public function input()
	{
		$data_u = $this->session->userdata('data_user');
		$data=array(
			'komoditas_nama' => $this->input->post('nama'),
			'komoditas_harga' => $this->input->post('harga'),
			'komoditas_tanggal' => date("Y-m-d",strtotime($this->input->post('tanggal'))),
			'komoditas_surveyorid' =>$data_u['user_id'],
			'komoditas_acc' => 3
		);
		if($this->m_crud->save('komoditas',$data)){
			$this->session->set_flashdata('message', 'sukses menambah data');
		}else{
			$this->session->set_flashdata('error', true);
			$this->session->set_flashdata('message', 'gagal menambah data');
		}
		redirect(site_url('/tambah'));
	}
}
