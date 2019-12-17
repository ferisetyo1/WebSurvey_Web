<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {

	function __construct() {
        parent::__construct();
    }

	public function index()
	{
        $data_u = $this->session->userdata('data_user');
        if ($data_u){
            // print_r($data_u);
            redirect(site_url('home'));
        } else {
            $data['tittle']="Web Survey - Login";
            $this->load->view('include/v_headerA',$data);
            $this->load->view('login');
            $this->load->view('include/v_footerA');
        }
    }
    
    public function check()
    {
        $info['email']=$_POST['email'];
        $info['password']=$_POST['password'];
        $user=$this->m_crud->selectBy('user',array('user_email'=>$info['email']));
        if(count($user)>0){
            if($user[0]->user_password==sha1($info['password'])){
                unset($user[0]->user_password);
                if (!$this->session->userdata('data_user')){
                    $this->session->set_userdata('data_user', (array)$user[0]);        
                }
            }else{
                $this->session->set_flashdata('error', "password salah");
            }
        }else{
            $this->session->set_flashdata('error', "email tidak terdaftar");
        }
        redirect(site_url('/login'));
    }

    public function out(){
        $this->session->unset_userdata('data_user');
        redirect(site_url('/login'));
    }
}
