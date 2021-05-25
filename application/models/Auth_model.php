<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends MY_Model {
    public function login(){
        $username = $this->input->post('username');
        $password = $this->input->post("password", TRUE);
        $remember = $this->input->post('remember');
        $row = $this->get_one("admin", ["username" => $username, "password" => MD5($password)]);

        if ($row) {
            // login berhasil
            // 1. Buat Cookies jika remember di check
            if ($remember) {
                $key = random_string('alnum', 64);
                set_cookie('bendahara', $key, 3600*24*365); // set expired 30 hari kedepan
                // simpan key di database
                
                $this->edit_data("admin", ["id_admin" => $row['id_admin']], ["cookie" => $key]);
            }
            $this->_daftarkan_session($row);
        } else {

            $this->session->set_flashdata('pesan', '
                <div class="alert alert-important alert-danger alert-dismissible" role="alert">
                <div class="d-flex">
                <div>
                    <svg width="24" height="24" class="alert-icon">
                        <use xlink:href="'.base_url().'assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-alert-circle" />
                    </svg>
                </div>
                <div>
                    Kombinasi username dan password salah
                </div>
                </div>
                <a class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="close"></a>
            </div>
            ');
            
            $data['title'] = 'Login';
            $this->load->view("pages/auth/sign-in", $data);
        }
    }

    public function _daftarkan_session($row) {
        // 1. Daftarkan Session
        $sess = array(
            'bendahara' => $row['username'],
        );

        $this->session->set_userdata($sess);

        // 2. Redirect ke home
        redirect(base_url("home"));
    }

}

/* End of file Auth_model.php */
