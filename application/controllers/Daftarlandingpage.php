<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class DaftarLandingPage extends MY_Controller {
    
    public function form($project){
        $data['js'] = [
            "ajax.js",
            "function.js",
            "helper.js",
        ];

        
        if($project == "klaster-nayanika"){
            $data['title'] = "Form Landing Page Klaster Nayanika";
            $data['project'] = "klaster-nayanika";
        } else if($project == "sakinah-mountain-view"){
            $data['title'] = "Form Landing Page Sakiah Mountain View";
            $data['project'] = "sakinah-mountain-view";
        } else if($project == "kavling-rmh"){
            $data['title'] = "Form Landing Page Raudhoh Madani Hills";
            $data['project'] = "kavling-rmh";
        } else if($project == "beverly-lake"){
            $data['title'] = "Form Landing Page Beverly Lake";
            $data['project'] = "beverly-lake";
        } else if($project == "cahaya-swarga-parung"){
            $data['title'] = "Form Landing Page Cahaya Swarga Parung";
            $data['project'] = "cahaya-swarga-parung";
        }

        $this->load->view("sales/registrasi", $data);
    }

    // public function index(){
    //     $data['js'] = [
    //         "ajax.js",
    //         "function.js",
    //         "helper.js",
    //     ];

    //     $data['title'] = "Form Landing Page Klaster Nayanika";
    //     $data['data_title'] = "Form Landing Page <br>www.klasternayanika.com";
    //     $this->load->view("sales/registrasi", $data);
    // }

    public function add_registrasi_marketing(){
        $panggilan = $this->input->post("panggilan");
        $nama_panggilan = $this->input->post("nama_panggilan");
        $nama = $this->input->post("nama");
        $no_wa = $this->input->post("no_wa");
        $email = $this->input->post("email");
        $id_name = $this->input->post("id_name");
        $project = $this->input->post("project");

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

        $this->load->config('email');
        $this->load->library('email');
        
        $from = $this->config->item('smtp_user');

        $to = $email;
        $subject = 'Link Landing Page';

        if($project == "klaster-nayanika"){
            $web = "https://pro.amerta.com/klaster-nayanika/{$id_name}";
            $landingpage = "Klaster Nayanika";
        } else if($project == "sakinah-mountain-view"){
            $web = "https://pro.amerta.com/sakinah-mountain-view/{$id_name}";
            $landingpage = "Sakinah Mountain View";
        } else if($project == "kavling-rmh"){
            $web = "https://pro.amerta.com/kavling-rmh/{$id_name}";
            $landingpage = "Raudhoh Madani Hills";
        } else if($project == "beverly-lake"){
            $web = "https://pro.amerta.com/beverly-lake/{$id_name}";
            $landingpage = "Beverly Lake";
        } else if($project == "cahaya-swarga-parung"){
            $web = "https://pro.amerta.com/cahaya-swarga-parung/{$id_name}";
            $landingpage = "Cahaya Swarga Parung";
        }

        $message = "
            <h3>Alhamdulillah, Selamat Anda Telah Berhasil Membuat Landing Page {$landingpage}</h3>
            <p><b>Berikut link Landing Page atau Website Anda : </b></p>
            <p>{$web}</p>
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
                <li><b>Pertama</b>, Landing Page tersebut adalah informasi berisi penawaran produk dari {$landingpage}. Di sana tersedia pula konten yang isinya mengajak konsumen untuk membaca informasi yang tersedia.</li>
                <li><b>Kedua</b>, Jika konsumen tertarik, mereka bisa langsung menghubungi Anda dengan cara mengklik tombol &quot;Hubungi Kami&quot; di sebelah kiri.</li>
                <li><b>Ketiga</b>, Pada saat konsumen menekan tombol Call To Action (CTA) yang diatur sedemikian rupa (Tombol &quot;Hubungi Kami&quot;, maka mereka akan diarahkan langsung ke WhatsApp Anda.</li>
                <li><b>Keempat</b>, Nah setelah sampai ke WhatsApp Anda silahkan di handling dengan baik sehingga lebih tertarik dan akhirnya mau survey dan selanjutnya membeli unit yang Anda tawarkan.</li>
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
            <p><b>Salam hangat dari saya Ali El Farabi owner Sharia Institute (PT Sharia Grup Indonesia)</b></p>";

        $this->email->set_newline("\r\n");
        $this->email->from($from);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->send();

        $this->session->set_flashdata("pesan", "
            <div>
                <center>
                    <h2 class='mt-4 mb-4'>Alhamdulillah, Selamat Anda Telah Berhasil Membuat Landing Page {$landingpage}</h2 class='mt-5'>
                    <p><b>Berikut link Landing Page Anda : </b> <br> <a target='_blank' href='{$web}'>{$web}</a></p>
                    <button class='copy btn btn-success mb-3' data-clipboard-text='{$web}'>
                        ".tablerIcon('copy', 'me-1')."
                        Salin Link
                    </button>
                    <p>Di copy dan disimpan baik-baik ya linknya... </p>
                    <div class='mt-4'>
                        <p>Oh iya, kalau lupa linknya bisa di cek di email yang Anda daftarkan tadi.</br>
                        Langsung cek Email Anda sekarang, ada <b>BONUS TIPS & TRICK CARA PENGGUNAAN LANDING PAGE</b>. Cekidot!</p>
                    </div>
                    <div class='mt-4'>
                        <p><b>Salam hangat dari saya Ali El Farabi owner Sharia Institute (PT Sharia Grup Indonesia)</b></p>
                    </div>
                </center>
            </div>
        ");
        
        if($project == "klaster-nayanika"){
            redirect(base_url('daftarlandingpage/klaster-nayanika'));
        } else if($project == "sakinah-mountain-view"){
            redirect(base_url('daftarlandingpage/sakinah-mountain-view'));
        } else if($project == "kavling-rmh"){
            redirect(base_url('daftarlandingpage/kavling-rmh'));
        } else if($project == "beverly-lake"){
            redirect(base_url('daftarlandingpage/beverly-lake'));
        } else if($project == "cahaya-swarga-parung"){
            redirect(base_url('daftarlandingpage/cahaya-swarga-parung'));
        }
    }

    public function get_username(){
        $id_name = $this->input->post("id_name");
        $project = $this->input->post("project");
        $data = $this->daftarlandingpage->get_one("marketing", ["id_name" => $id_name, "project" => $project]);
        echo json_encode($data);
    }
}