<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends MY_Controller {

    public function index(){
        // navbar and sidebar
        $data['menu'] = "Pelanggan";
        $data['title'] = "List Pelanggan";

        // for modal 
        $data['modal'] = ["modal_pelanggan"];
        
        // javascript 
        $data['js'] = [
            "ajax.js", 
            "function.js", 
            "helper.js", 
            "pelanggan_reload.js",
            "pelanggan.js",
        ];

        $this->load->view("pages/pelanggan", $data);
    }

    public function kartu($id){
        $akad['qrcode'] = $id;
        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P', 'margin_top' => '0', 'margin_left' => '0', 'margin_right' => '0', 'margin_bottom' => '0']);

        $mpdf->WriteHTML($this->load->view('pages/id', $akad, TRUE));
        $mpdf->Output("Kartu.pdf", "I");
    }

    public function load($rowno=0){
        header('Content-Type: application/json');
        $output = $this->pelanggan->dataTable();
        echo $output;
    }

    public function loadMobile($rowno=0){
        $output = $this->pelanggan->dataMobile($rowno);
        echo json_encode($output);
    }

    public function add(){
        $data = $this->pelanggan->add();
        if($data) echo json_encode(1);
        else echo json_encode(0);
    }

    public function add_langganan(){
        $data = $this->pelanggan->add_langganan();
        if($data) echo json_encode(1);
        else echo json_encode(0);
    }

    public function get(){
        $data = $this->pelanggan->get();
        echo json_encode($data);
    }

    public function get_langganan(){
        $data = $this->pelanggan->get_langganan();
        echo json_encode($data);
    }

    public function edit(){
        $data = $this->pelanggan->edit();
        if($data) echo json_encode(1);
        else echo json_encode(0);
    }

}

/* End of file Pelanggan.php */
