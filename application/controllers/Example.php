<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Example extends MY_Controller {

    public function index(){
        // navbar and sidebar
        $data['menu'] = "Lac";
        $data['title'] = "List LAC";

        // for modal 
        // $data['modal'] = ["modal_lac"];
        
        // javascript 
        $data['js'] = [
            "function.js", 
            "helper.js", 
            "reload_lac.js",
            "lac.js",
        ];

        $this->load->view("pages/lac", $data);
    }

    public function loadLac($rowno=0){
        $output = $this->example->dataTable();
        echo json_encode($output);
    }

    public function loadLacMobile($rowno=0){
        $output = $this->example->dataMobile($rowno=0);
        echo json_encode($output);
    }

    public function add(){
        $data = $this->example->add();
        return $data;
    }

}

/* End of file Example.php */
