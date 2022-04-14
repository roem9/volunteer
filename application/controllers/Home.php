<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {
    
    public function index(){

        // js 
        $data['js'] = [
            "ajax.js",
            "function.js",
            "helper.js",
            "load_data/volunteer_reload.js",
        ];

        $this->load->view("volunteer", $data);
    }
}
/* End of file Transaksi.php */
