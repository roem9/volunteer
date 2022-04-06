<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class DaftarVolunteer extends MY_Controller {
    
    public function index(){
        $data['js'] = [
            "ajax.js",
            "function.js",
            "helper.js",
        ];

        $data['title'] = "Form Pendaftaran Landing Page Project Amerta Property";

        $this->load->view("sales/registrasi", $data);
    }
    
    public function add_registrasi_marketing(){
        $project = ["arunika-village"];

        $panggilan = $this->input->post("panggilan");
        $nama_panggilan = $this->input->post("nama_panggilan");
        $nama = $this->input->post("nama");
        $no_wa = $this->input->post("no_wa");
        $email = $this->input->post("email");
        $id_name = $this->input->post("id_name");

        foreach ($project as $project) {
            $data = [
                "id_name" => $id_name,
                "nama" => $nama,
                "nama_panggilan" => $nama_panggilan,
                "panggilan" => $panggilan,
                "no_wa" => $no_wa,
                "email" => $email,
                "project" => $project,
            ];
    
            $this->daftarlandingpage->add_data("marketing", $data);
        }

        $this->load->config('email');
        $this->load->library('email');
        
        $from = $this->config->item('smtp_user');

        $to = $email;
        $subject = 'Link Landing Page';

        $web_arunika_village = "https://promo.arunikavillage.com/{$id_name}";

        $message = "
            <h3>Alhamdulillah, Selamat Anda Telah Berhasil Membuat Landing Page</h3>
            <p><b>Berikut Landing Page Yang Telah Anda Buat : </b></p>
            <ol>
                <li><b>Arunika Village</b> <br> {$web_arunika_village}<br><br></li>
            </ol>
            <p>Dan berikut data diri Anda : </p>
            
            <table style='margin-left: 20px'>
                <tr>
                    <td>&#9830; Panggilan</td>
                    <td>: {$panggilan}</td>
                </tr>
                <tr>
                    <td>&#9830; Nama Lengkap</td>
                    <td>: {$nama}</td>
                </tr>
                <tr>
                    <td>&#9830; Nama Panggilan</td>
                    <td>: {$nama_panggilan}</td>
                </tr>
                <tr>
                    <td>&#9830; No. WhatsApp</td>
                    <td>: {$no_wa}</td>
                </tr>
                <tr>
                    <td>&#9830; Email</td>
                    <td>: {$email}</td>
                </tr>
            </table>
            
            <p>Nah selanjutnya, inilah beberapa <b>TIPS & TRICK</b> cara penggunaan Landing Page</p>
            <p>Namun sebelum itu, yuk pahami terlebih dahulu <b>cara kerja</b> dari Landing Page itu sendiri</p>
            <ul type='radio'>
                <li><b>Pertama</b>, Pilih Landing Page produk atau project yang ingin Anda jualkan</li>
                <li><b>Kedua</b>, Salin (copy) link Landing Page tersebut, kemudian tempel (paste) atau share link tersebut di sosmed / platform yang Anda inginkan</li>
                <li><b>Ketiga</b>, Landing Page tersebut adalah informasi berisi penawaran produk atau project.</li>
                <li><b>Keempat</b>, Di Landing Page tersebut tersedia pula konten yang isinya mengajak konsumen untuk membaca informasi yang tersedia.</li>
                <li><b>Kelima</b>, Jika konsumen tertarik, mereka bisa langsung menghubungi Anda dengan cara mengklik tombol &quot;Chat WhatsApp&quot; di sebelah kiri.</li>
                <li><b>Keenam</b>, Pada saat konsumen menekan tombol Call To Action (CTA) yang diatur sedemikian rupa (Tombol &quot;Chat WhatsApp&quot;, maka mereka akan diarahkan langsung ke WhatsApp Anda.</li>
                <li><b>Ketujuh</b>, Nah setelah sampai ke WhatsApp Anda silahkan di handling dengan baik sehingga lebih tertarik dan akhirnya mau survey dan selanjutnya membeli unit yang Anda tawarkan.</li>
            </ul>
            <p>Setelah mengetahui bagaimana cara kerjanya, selanjutnya bagaimana sih <b>cara menggunakan Landing Page</b> ini ?</p>
            <ol type='number'>
                <li>Ketika update status ataupun posting iklan, Anda bisa menyelipkan link Landing Page Anda ke dalam suatu iklan tersebut</li>
                <li>Bisa juga ketika ada sanak keluarga atau teman yang tertarik, sangat memungkinkan jika Anda mengirim link Landing Page tersebut untuk membantu menjelaskan produk kepada mereka </li>
            </ol>
            <p><b>Berikut beberapa platform yang bisa untuk share link Landing Page :</b></p>
            <ol type='number'>
                <li>WhatsApp</li>
                <li>Facebook </li>
                <li>Instagram</li>
                <li>Youtube</li>
                <li>Tiktok</li>
                <li>Marketplace </li>
                <li>dan lain sebagainya..</li>
            </ol>
            <p>Nah jika ada yang kurang dipahami, silahkan langsung konsultasikan dan tanya-tanya di grup atau ke leadernya yaa..</p>
            <p>Selamat mencoba, semoga berhasil dan mendapatkan closingan dan KOMISI yang BERKAH serta BERLIMPAH yang bisa bermanfaat untuk diri sendiri, keluarga dan juga orang lain. Aamiin Ya Allah</p>
            <p><b>Salam hangat dari saya Ali El Farabi owner Amerta Property</b></p>";

        $this->email->set_newline("\r\n");
        $this->email->from($from);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->send();

        $this->session->set_flashdata("pesan", "
            <div>
                <center>
                    <h2 class='mt-4 mb-4'>Alhamdulillah, Selamat Anda Telah Berhasil Membuat Landing Page.</h2 class='mt-5'>
                </center>
                <p><b>Berikut Landing Page Yang Telah Anda Buat : </b></p>
                <ol>
                    <li class='mb-3'><b>Arunika Village</b> <br> Perumahan Paling Terjangkau di Setu Bekasi</li>
                </ol>
                <center>
                    <div class='mt-4'>
                        <p>Silakan cek email untuk mendapatkan link dari masing-masing landing page tersebut.<br> Oh iya, Langsung cek Email Anda sekarang, ada <b>BONUS TIPS & TRICK CARA PENGGUNAAN LANDING PAGE</b>. Cekidot!</p>
                    </div>
                    <div class='mt-4'>
                        <p><b>Salam hangat dari saya Ali El Farabi owner Amerta Property</b></p>
                    </div>
                </center>
            </div>
        ");
        
        redirect(base_url('daftarlandingpage'));
    }
}