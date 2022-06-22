<?php
Class Auth extends CI_Controller{
    public $status;
    public $aturan;
   
    function __construct(){
        parent::__construct();
        $this->load->model('Auth_model', 'auth_model', TRUE);
        $this->load->library('form_validation');    
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->status = $this->config->item('status');
        $this->aturan = $this->config->item('aturan');
    }

    function index(){
        $this->form_validation->set_rules('id_user', 'ID User', 'required');    
        $this->form_validation->set_rules('password', 'Password', 'required');
           
        if($this->form_validation->run() == FALSE) {     
            $this->template->load('login', 'auth/login',$data);
        }else{               
            $post = $this->input->post();  
            $clean = $this->security->xss_clean($post);
            $userInfo = $this->auth_model->checkLogin($clean);

            if(!$userInfo){
                $this->session->set_flashdata('flash_message', 'Username atau password salah');
                redirect(site_url().'auth/');
            }
            foreach($userInfo as $key=>$val){
                $this->session->set_userdata($key, $val);
            }

            $sess_data['status_login']        = 'login';
            $this->session->set_userdata($sess_data);
            $this->session->set_flashdata('welcome', 'welcome');
            redirect(site_url().'dashboard');
            
        }
    }

    public function form_login(){
        $this->load->view('auth/login2');
    }

    protected function _islocal(){
        return strpos($_SERVER['HTTP_HOST'], 'local');
    }
    
    function logout(){
        $this->session->sess_destroy();
        $this->session->set_flashdata('status_login','Anda sudah berhasil keluar dari aplikasi');
        redirect('auth');
    }

    
    public function base64url_encode($data) {
      return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
    }
 
    public function base64url_decode($data) {
      return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
    }
}
