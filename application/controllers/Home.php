<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public $status;
    public $aturan;
   
    function __construct(){
        parent::__construct();
        $this->load->model('Auth_model', 'auth_model', TRUE);
        $this->load->model('Pengunjung_model');        
        $this->load->library('form_validation');
        $this->load->helper('encript');
        $this->load->helper('tgl_indo');    
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        
        $this->status = $this->config->item('status');
        $this->aturan = $this->config->item('aturan');
    }
    public function index() {        
        $user_ip=$_SERVER['REMOTE_ADDR'];
        if ($this->agent->is_browser()){
            $agent = $this->agent->browser();
        }elseif ($this->agent->is_robot()){
            $agent = $this->agent->robot(); 
        }elseif ($this->agent->is_mobile()){
            $agent = $this->agent->mobile();
        }else{
            $agent='Other';
        }
        $cek_ip=$this->Pengunjung_model->cek_ip($user_ip);
        $cek=$cek_ip->num_rows();
        if($cek > 0){
            $this->template->load('frontend', 'frontend/index');
        }else{
            $this->Pengunjung_model->simpan_user_agent($user_ip,$agent);
            $this->template->load('frontend', 'frontend/index');
        }        
    }

    public function register() {
        $this->form_validation->set_rules('full_name', 'Name', 'required');    
        $this->form_validation->set_rules('phone', 'Phone', 'required'); 
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');    
        $this->form_validation->set_rules('password', 'Password', 'required');    
        
        if ($this->form_validation->run() == FALSE) { 
            $this->template->load('frontend', 'frontend/index',$data);
        }else{                
            if($this->auth_model->isDuplicate($this->input->post('email'))){
                $this->session->set_flashdata('flash_message', 'Email Telah digunakan..!!');
                $this->template->load('frontend', 'frontend/index',$data);
            }else{
                $this->load->library('password');                
	            $post = $this->input->post(NULL, TRUE);               
	            $cleanPost = $this->security->xss_clean($post);               
	            $hashed = $this->password->create_hash($cleanPost['password']);                
	            $cleanPost['password'] = $hashed;
	            unset($cleanPost['passconf']);
				$id = $this->auth_model->insertUser($cleanPost);
				redirect(site_url().'auth'); 
            }             
        }
    }
}
