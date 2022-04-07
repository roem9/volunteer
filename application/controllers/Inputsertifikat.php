<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Inputsertifikat extends MY_Controller {
    
    public function index(){
        $data['js'] = [
            "ajax.js",
            "function.js",
            "helper.js",
        ];

        $data['title'] = "Form Download Sertifikat Waqaf Produktif Taman Tahfidz Firdaus";

        $this->load->view("sertifikat/input_sertifikat", $data);
    }

    public function add_waqif(){
        $data = [
            "nama_waqif" => $this->input->post("nama_waqif"),
            "nominal" => rp_to_int($this->input->post("nominal")),
            "no_wa" => $this->input->post("no_wa"),
            "email" => $this->input->post("email"),
            "tgl_waqaf" => $this->input->post("tgl_waqaf"),
            "nama_volunteer" => $this->input->post("nama_volunteer"),
        ];

        $id_waqif = $this->inputsertifikat->add_data("waqif", $data);

        // buat kode qr
            $this->load->library('qrcode/ciqrcode'); //pemanggilan library QR CODE
            
            $config['cacheable']    = true; //boolean, the default is true
            $config['cachedir']     = './assets/'; //string, the default is application/cache/
            $config['errorlog']     = './assets/'; //string, the default is application/logs/
            $config['imagedir']     = './assets/qrcode/'; //direktori penyimpanan qr code
            $config['quality']      = true; //boolean, the default is true
            $config['size']         = '1024'; //interger, the default is 1024
            $config['black']        = array(224,255,255); // array, default is array(255,255,255)
            $config['white']        = array(70,130,180); // array, default is array(0,0,0)
            $this->ciqrcode->initialize($config);

            $image_name=$id_waqif.'.png'; //buat name dari qr code sesuai dengan nim

            $params['data'] = "https://pewaqif.tamantahfidzfirdaus.org/sertifikat/no/".md5($id_waqif); //data yang akan di jadikan QR CODE
            $params['level'] = 'H'; //H=High
            $params['size'] = 10;
            $params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
            $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
        // buat kode qr 

        redirect(base_url("sertifikat/no/".md5($id_waqif)));
    }
}