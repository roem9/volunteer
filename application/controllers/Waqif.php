<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Waqif extends MY_Controller {
    
    public function index(){
        // for if statement navbar fitur
        $data['menu'] = "Waqif";

        // for title and header 
        $data['title'] = "List Waqif";

        // for modal 
        $data['modal'] = [
            "modal_waqif",
        ];
        
        // for js 
        $data['js'] = [
            "ajax.js",
            "function.js",
            "helper.js",
            "modules/waqif.js",
            "load_data/waqif_reload.js",
        ];

        $this->load->view("waqif/list", $data);
    }

    public function load_waqif(){
        header('Content-Type: application/json');
        $output = $this->waqif->load_waqif();
        echo $output;
    }

    public function add_waqif(){
        $data = $this->waqif->add_waqif();
        echo json_encode($data);
    }

    public function get_waqif(){
        $data = $this->waqif->get_waqif();
        echo json_encode($data);
    }

    public function edit_waqif(){
        $data = $this->waqif->edit_waqif();
        echo json_encode($data);
    }
}

/* End of file Audio.php */
