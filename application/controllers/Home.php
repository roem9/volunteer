<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

    public function index(){
        // navbar and sidebar
        $data['title'] = "Dashboard";
        
        // javascript 
        $data['js'] = [
            "ajax.js", 
            "function.js", 
            "helper.js", 
        ];

        $data['transaksi'] = COUNT($this->home->get_all("transaksi_sewa", ["status" => "Belum Lunas"]));
        $data['penagihan'] = COUNT($this->home->get_all("sewa", ["tagihan" => "1"]));

        $saldo = $this->home->dataRekap();
        $data['saldo'] = 0;
        foreach ($saldo as $saldo) {
            $data['saldo'] += $saldo['total'];
        }

        $this->load->view("pages/dashboard", $data);
    }

    public function load($rowno=0){
        $output = $this->pelanggan->dataTable();
        echo json_encode($output);
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

/* End of file Home.php */
