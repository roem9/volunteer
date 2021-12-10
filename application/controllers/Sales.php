<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sales extends MY_Controller {
    
    public function index(){
        // redirect(base_url()."0910");
        // $replace_wa = array(
        //     ' ' => '%20',
        //     '"' => '%22'
        // );

        // $nama_panggilan = str_replace(array_keys($replace_wa), $replace_wa, "Tiara");

        // $data['link_wa'] = "https://wa.me/6281311499892?text=Halo%20Mba%20{$nama_panggilan}%2C%20mau%20tau%20info%20Kavling%20Siap%20Bangun%20Klaster%20Nayanika%20di%20Setu%20Bekasi%20dong%20Mba%3F";

        // $this->load->view("klasternayanika/index_sales", $data);
    }

    public function registrasi_marketing(){
        $data['js'] = [
            "ajax.js",
            "function.js",
            "helper.js",
        ];

        $data['title'] = "Form Registrasi Landing Page";
        $this->load->view("sales/registrasi", $data);
    }

    public function add_registrasi_marketing(){
        $panggilan = $this->input->post("panggilan");
        $nama_panggilan = $this->input->post("nama_panggilan");
        $nama = $this->input->post("nama");
        $no_wa = $this->input->post("no_wa");
        $email = $this->input->post("email");
        $id = rand();

        $data = [
            "id" => $id,
            "no_wa" => $no_wa,
            "panggilan" => $panggilan,
            "nama_panggilan" => $nama_panggilan,
            "nama" => $nama,
            "email" => $email,
        ];

        $this->sales->add_data("marketing", $data);

        $this->load->config('email');
        $this->load->library('email');
        
        $from = $this->config->item('smtp_user');

        $to = $email;
        $subject = 'Link Landing Page';
        $message = "
            <p>Bismillah,</p>
            <p>Berikut ini link Landing Page Anda</p>
            <p>https://klasternayanika.com/{$id}</p>
            <p>Data Diri : </p>
            <table>
                <tr>
                    <td>Panggilan</td>
                    <td>: {$panggilan}</td>
                </tr>
                <tr>
                    <td>Nama Lengkap</td>
                    <td>: {$nama}</td>
                </tr>
                <tr>
                    <td>Nama Panggilan</td>
                    <td>: {$nama_panggilan}</td>
                </tr>
                <tr>
                    <td>No. WhatsApp</td>
                    <td>: {$no_wa}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>: {$email}</td>
                </tr>
            </table>";

        $this->email->set_newline("\r\n");
        $this->email->from($from);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->send();

        $this->session->set_flashdata('pesan', '
            <div class="alert alert-important alert-success alert-dismissible" role="alert">
                <div class="d-flex">
                    <div>
                        <svg width="24" height="24" class="alert-icon">
                            <use xlink:href="'.base_url().'assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-circle-check" />
                        </svg>
                    </div>
                    <div>
                        Berhasil membuat landing page. Silakan cek inbox atau spam email Anda untuk mendapatkan link landing page Anda
                    </div>
                </div>
                <a class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="close"></a>
            </div>
        ');

        
        redirect(base_url('sales/registrasi_marketing'));
    }

}

/* End of file Transaksi.php */
