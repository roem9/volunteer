<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends MY_Controller {

    public function pemasukan(){
        // navbar and sidebar
        $data['menu'] = "Pemasukan";
        $data['title'] = "Transaksi Pemasukan";

        // for modal 
        $data['modal'] = ["modal_transaksi"];
        
        // javascript 
        $data['js'] = [
            "ajax.js", 
            "function.js", 
            "helper.js", 
            "pemasukan_reload.js",
            "pemasukan.js",
        ];

        $this->load->view("pages/pemasukan", $data);
    }

    public function pengeluaran(){
        // navbar and sidebar
        $data['menu'] = "Pengeluaran";
        $data['title'] = "Transaksi Pengeluaran";

        // for modal 
        $data['modal'] = ["modal_transaksi"];
        
        // javascript 
        $data['js'] = [
            "ajax.js", 
            "function.js", 
            "helper.js", 
            "pengeluaran_reload.js",
            "pengeluaran.js",
        ];

        $this->load->view("pages/pengeluaran", $data);
    }

    public function penyewaan(){
        // navbar and sidebar
        $data['menu'] = "penyewaan";
        $data['title'] = "Transaksi Penyewaan";

        // for modal 
        $data['modal'] = ["modal_transaksi"];
        
        // javascript 
        $data['js'] = [
            "ajax.js", 
            "function.js", 
            "helper.js", 
            "transaksi_penyewaan_reload.js",
            "transaksi_penyewaan.js",
        ];

        $data['langganan'] = $this->transaksi->get_langganan();

        $this->load->view("pages/transaksi-penyewaan", $data);
    }

    public function belumLunas(){
        // navbar and sidebar
        $data['menu'] = "penyewaan";
        $data['title'] = "List Transaksi Belum Lunas";

        // for modal 
        $data['modal'] = ["modal_transaksi"];
        
        // javascript 
        $data['js'] = [
            "ajax.js", 
            "function.js", 
            "helper.js", 
            "transaksi_belum_lunas_reload.js",
            "transaksi_penyewaan.js",
        ];

        $this->load->view("pages/transaksi-belum-lunas", $data);
    }

    public function rekap(){
        // navbar and sidebar
        $data['menu'] = "Rekap";
        $data['title'] = "List Rekap";

        // for modal 
        $data['modal'] = ["modal_transaksi"];
        
        // javascript 
        $data['js'] = [
            "ajax.js", 
            "function.js", 
            "helper.js", 
            "rekap_reload.js",
        ];

        $data['rekap'] = [];
        $rekap = $this->transaksi->dataRekap();
        foreach ($rekap as $i => $rekap) {
            $data['rekap'][$i] = $rekap;
            $data['rekap'][$i]['periode'] = bulan_tahun($rekap['periode']);
        }

        $this->load->view("pages/rekap", $data);
    }

    public function loadPemasukan(){
        header('Content-Type: application/json');
        $output = $this->transaksi->dataTablePemasukan();
        echo $output;
    }

    public function add_pemasukan(){
        $data = $this->transaksi->add_pemasukan();
        if($data) echo json_encode(1);
        else echo json_encode(0);
    }

    public function get_pemasukan(){
        $data = $this->transaksi->get_pemasukan();
        echo json_encode($data);
    }

    public function edit_pemasukan(){
        $data = $this->transaksi->edit_pemasukan();
        echo json_encode($data);
    }

    public function loadPengeluaran(){
        header('Content-Type: application/json');
        $output = $this->transaksi->dataTablePengeluaran();
        echo $output;
    }

    public function add_pengeluaran(){
        $data = $this->transaksi->add_pengeluaran();
        if($data) echo json_encode(1);
        else echo json_encode(0);
    }

    public function get_pengeluaran(){
        $data = $this->transaksi->get_pengeluaran();
        echo json_encode($data);
    }

    public function edit_pengeluaran(){
        $data = $this->transaksi->edit_pengeluaran();
        echo json_encode($data);
    }

    public function loadPenyewaan($rowno=0){
        header('Content-Type: application/json');
        $output = $this->transaksi->dataTablePenyewaan();
        echo $output;
    }

    public function add_penyewaan(){
        $data = $this->transaksi->add_penyewaan();
        if($data) echo json_encode(1);
        else echo json_encode(0);
    }

    public function get_penyewaan(){
        $data = $this->transaksi->get_penyewaan();
        echo json_encode($data);
    }

    public function edit_penyewaan(){
        $data = $this->transaksi->edit_penyewaan();
        echo json_encode($data);
    }

    public function loadRekap($rowno=0){
        $output = $this->transaksi->dataTableRekap();
        echo json_encode($output);
    }

    public function loadMobileRekap($rowno=0){
        $output = $this->transaksi->dataMobileRekap($rowno);
        echo json_encode($output);
    }

    public function loadTransaksiBelumLunas($rowno=0){
        header('Content-Type: application/json');
        $output = $this->transaksi->dataTableTransaksiBelumLunas();
        echo $output;
    }
}

/* End of file Transaksi.php */
