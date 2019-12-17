<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class register extends CI_Controller {

	function __construct() {
        parent::__construct();
    }

	public function index()
	{
        $data_u = $this->session->userdata('data_user');
        if ($data_u){
            redirect(site_url('home'));
        } else {
            $data['tittle']="Web Survey - Register";
            $this->load->view('include/v_headerA',$data);
            $this->load->view('register');
            $this->load->view('include/v_footerA');
        }
    }
       
    public function create()
    {
        $this->form_validation->set_rules('email', 'Email','is_unique[user.user_email]');
        $this->form_validation->set_rules('password','Password','max_length[40]');
        $this->form_validation->set_rules('repassword','Konfirmasi Password','matches[password]');

        $this->form_validation->set_message('matches','Konfirmasi Password tidak sama!');
        $this->form_validation->set_message('is_unique','Email sudah terdaftar!');
        $this->form_validation->set_message('max_length','Maksimal %i karakter!');

        if($this->form_validation->run() == FALSE) {
            $data['tittle']="Web Survey - Register";
            $this->load->view('include/v_headerA', $data);
            $this->load->view('register');
            $this->load->view('include/v_footerA');
        } else {
            $data['user_nama'] = $this->input->post('nama');
            $data['user_email'] = $this->input->post('email');
            $data['user_password'] = sha1($this->input->post('password'));
            $data['user_role']=2;

            if($this->m_crud->save('user',$data)){
                $user=$this->m_crud->selectBy('user',array('user_email'=>$data['user_email']));
                unset($user[0]->user_password);
                $this->session->set_userdata('data_user', $user[0]);
            }
            // redirect(site_url('/register'));
        }

    }   

    public function createAdminAcc()
    {
        $admin=array(
            'user_nama' => "admin",
            'user_email' => "admin@websurvey.com",
            'user_password' => sha1("admin"),
            'user_role' => 1
        );
        
        if($this->m_crud->save('user',$admin)){
            echo "sukses";
        }else{
            echo "gagal";
        }
    }

}
