<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Auth_model", "auth");
    }
    

    public function index(){
        if($_POST){
            $this->login();
        } else {
            // ambil cookie
            $cookie = get_cookie('bendahara');
            // cek session
            if ($this->session->userdata('username')) {
                redirect(base_url("home"));
            } else if($cookie <> '') {
                
                $row = $this->auth->get_one("admin", ["cookie" => $cookie]);
    
                if ($row) {
                    $this->_daftarkan_session($row);
                } else {
                    $data['title'] = 'Login';
                    $this->load->view("pages/auth/sign-in", $data);
                }
            } else {
                $data['title'] = 'Login';
                $this->load->view("pages/auth/sign-in", $data);
            }
        }
    }

    public function login(){
        $this->auth->login();
    }

    public function _daftarkan_session($row) {
        $this->auth->_daftarkan_session($row);
    }

    public function logout(){
        // delete cookie dan session
        delete_cookie('bendahara');
        $this->session->sess_destroy();
        redirect(base_url("auth"));
    }
    

}

/* End of file Auth.php */
