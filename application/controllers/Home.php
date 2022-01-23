<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {
    
    public function index(){
        redirect('https://amertaproperty.com');
    }
    
    public function project($project, $id_name){
        $data['marketing'] = $this->home->get_one("marketing", ["id_name" => $id_name, "project" => $project]);
        if($data['marketing']){

            $replace_wa = array(
                ' ' => '%20',
                '"' => '%22'
            );

            $nama_panggilan = str_replace(array_keys($replace_wa), $replace_wa, $data['marketing']['nama_panggilan']);

            if($project == "klaster-nayanika"){
                $data['link_wa'] = "https://wa.me/{$data['marketing']['no_wa']}?text=Halo%20{$data['marketing']['panggilan']}%20{$nama_panggilan}%2C%20mau%20tau%20info%20Kavling%20Siap%20Bangun%20di%20Klaster%20Nayanika%20dong%20{$data['marketing']['panggilan']}%2C%20yang%20lokasinya%20di%20Setu%2C%20Bekasi.%20Terima%20Kasih";
            } else if($project == "sakinah-mountain-view"){
                $data['link_wa'] = "https://wa.me/{$data['marketing']['no_wa']}?text=Halo%20{$data['marketing']['panggilan']}%20{$nama_panggilan}%2C%20mau%20tau%20info%20Kavling%20Siap%20Bangun%20di%20Sakinah%20Mountain%20View%20dong%20{$data['marketing']['panggilan']}%2C%20yang%20lokasinya%20di%20Ciampea%2C%20Bogor.%20Terima%20Kasih";
            } else if($project == "kavling-rmh"){
                $data['link_wa'] = "https://wa.me/{$data['marketing']['no_wa']}?text=Halo%20{$data['marketing']['panggilan']}%20{$nama_panggilan}%2C%20mau%20tau%20info%20Kavling%20Serbaguna%20di%20Kavling%20RMH%20dong%20{$data['marketing']['panggilan']}%2C%20yang%20lokasinya%20di%20Tanjungsari%2C%20Bogor.%20Terima%20Kasih";
            } else if($project == "beverly-lake"){
                $data['link_wa'] = "https://wa.me/{$data['marketing']['no_wa']}?text=Halo%20{$data['marketing']['panggilan']}%20{$nama_panggilan}%2C%20mau%20tau%20info%20Perumahan%20di%20Beverly%20Lake%20dong%20{$data['marketing']['panggilan']}%2C%20yang%20lokasinya%20di%20Parung%20Panjang%2C%20Bogor.%20Terima%20Kasih";
            } else if($project == "cahaya-swarga-parung"){
                $data['link_wa'] = "https://wa.me/{$data['marketing']['no_wa']}?text=Halo%20{$data['marketing']['panggilan']}%20{$nama_panggilan}%2C%20mau%20tau%20info%20Perumahan%20di%20Cahaya%20Swarga%20Parung%20dong%20{$data['marketing']['panggilan']}%2C%20yang%20lokasinya%20di%20Parung%2C%20Bogor.%20Terima%20Kasih";
            }

            $this->load->view("landingpage/".$project, $data);
        } else {
            if($project == "klaster-nayanika" || $project == "kavling-rmh" || $project == "sakinah-mountain-view"){
                redirect("https://kavling123.com/".$project);
            } else {
                redirect("https://rumahku123.com/".$project);
            }
        }
    }}

/* End of file Transaksi.php */
