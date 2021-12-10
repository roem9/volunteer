<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {
    
    public function id($id){
        $data['marketing'] = $this->home->get_one("marketing", ["id" => $id]);

        $replace_wa = array(
            ' ' => '%20',
            '"' => '%22'
        );

        $nama_panggilan = str_replace(array_keys($replace_wa), $replace_wa, $data['marketing']['nama_panggilan']);

        $data['link_wa'] = "https://wa.me/{$data['marketing']['no_wa']}?text=Halo%20{$data['marketing']['panggilan']}%20{$nama_panggilan}%2C%20mau%20tau%20info%20Kavling%20Siap%20Bangun%20Klaster%20Nayanika%20di%20Setu%20Bekasi%20dong%20{$data['marketing']['panggilan']}%3F";

        if($data['marketing']){
            $this->load->view("klasternayanika/index", $data);
        } else {
            redirect(base_url("sales"));
        }
    }

}

/* End of file Transaksi.php */
