<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Volunteer extends MY_Controller {
    public function load_volunteer(){
        header('Content-Type: application/json');
        $output = $this->volunteer->load_volunteer();
        echo $output;
    }

    public function add_waqif(){
        $data = $this->volunteer->add_waqif();
        echo json_encode($data);
    }

    public function get_waqif(){
        $data = $this->volunteer->get_waqif();
        echo json_encode($data);
    }

    public function edit_waqif(){
        $data = $this->volunteer->edit_waqif();
        echo json_encode($data);
    }
}

/* End of file Audio.php */
