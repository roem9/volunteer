<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Penyewaan extends MY_Controller {

    public function index(){
        // navbar and sidebar
        $data['menu'] = "Penyewaan";
        $data['title'] = "List Penyewaan";

        // for modal 
        $data['modal'] = ["modal_penyewaan"];
        
        // javascript 
        $data['js'] = [
            "ajax.js", 
            "function.js", 
            "helper.js", 
            "penyewaan_reload.js",
            "penyewaan.js",
        ];

        $this->load->view("pages/penyewaan", $data);
    }

    public function load($rowno=0){
        header('Content-Type: application/json');
        $output = $this->penyewaan->dataTable();
        echo $output;
    }

    public function add(){
        $data = $this->penyewaan->add();
        if($data) echo json_encode(1);
        else echo json_encode(0);
    }

    public function get(){
        $data = $this->penyewaan->get();
        echo json_encode($data);
    }

    public function edit(){
        $data = $this->penyewaan->edit();
        if($data) echo json_encode(1);
        else echo json_encode(0);
    }

}

/* End of file Penyewaan.php */
