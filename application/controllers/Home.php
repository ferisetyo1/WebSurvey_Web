<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct() {
        parent::__construct();
    }

	public function index()
	{
		$tanggal7hr=date('Y-m-d', time() - (60 * 60 * 24 * 7));
		$tanggal30hr=date('Y-m-d', time() - (60 * 60 * 24 * 30));
		$data['tittle']="home";
		$data['totalkomoditas']=$this->m_crud->getNumRows('komoditas',array('komoditas_acc'=>1));
		$data['totalkomoditas7hr']=$this->m_crud->getNumRows('komoditas','(komoditas_tanggal BETWEEN "'.$tanggal7hr.'" AND CURRENT_DATE) AND komoditas_acc = 1');
		$data['totalkomoditas30hr']=$this->m_crud->getNumRows('komoditas','(komoditas_tanggal BETWEEN "'.$tanggal30hr.'" AND CURRENT_DATE) AND komoditas_acc = 1');
		$this->load->view('include/v_headerB',$data);
		$this->load->view('dashboard');
		$this->load->view('include/v_footerB');
	}

	public function test()
	{
		echo '7 hari sebelum: ' . date('Y-m-d', time() - (60 * 60 * 24 * 7)) . '<br/>';
	}
}
