<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Waqif_model extends MY_Model {

    public function load_waqif(){
        $this->datatables->select("id_waqif, tgl_waqaf, nama_waqif, no_wa, email, nominal, nama_volunteer");
        $this->datatables->from("waqif");
        $this->datatables->add_column("sertifikat", "<a href='".base_url()."sertifikat/no/$1' target='_blank' class='btn btn-success'>".tablerIcon('certificate', '')."</a>", "md5(id_waqif)");
        $this->datatables->add_column('menu','
                <span class="dropdown">
                    <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">
                        '.tablerIcon("menu-2", "me-1").'
                        Menu
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item detailWaqif" href="#detailWaqif" data-bs-toggle="modal" data-id="$1">
                            '.tablerIcon("info-circle", "me-1").'
                            Detail Waqif
                        </a>
                    </div>
                </span>', 'id_waqif');
            
        return $this->datatables->generate();
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

        $id_waqif = $this->waqif->add_data("waqif", $data);

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

        // upload foto 
            if(isset($_FILES['file']['name'])) {

                $nama_file = $_FILES['file'] ['name']; // Nama Audio
                $size        = $_FILES['file'] ['size'];// Size Audio
                $error       = $_FILES['file'] ['error'];
                $tipe_audio  = $_FILES['file'] ['type']; //tipe audio untuk filter
                $folder      = "./assets/bukti_transfer/"; //folder tujuan upload
                $valid       = array('jpg','png','gif','jpeg', 'JPG', 'PNG', 'GIF', 'JPEG'); //Format File yang di ijinkan Masuk ke server
                
                if(strlen($nama_file)){   
                    // Perintah untuk mengecek format gambar
                    list($txt, $ext) = explode(".", $nama_file);
                    if(in_array($ext,$valid)){   

                        // Perintah untuk mengupload file dan memberi nama baru
                        switch ($tipe_audio) {
                            case 'image/jpeg':
                                $tipe_audio = "jpg";
                                break;
                            case 'image/png':
                                $tipe_audio = "png";
                                break;
                            case 'image/gif':
                                $tipe_audio = "gif";
                                break;
                            default:
                                break;
                        }

                        $img_peserta = $id_waqif.".".$tipe_audio;

                        $tmp = $_FILES['file']['tmp_name'];
                        
                        
                        if(move_uploaded_file($tmp, $folder.$img_peserta)){   
                            
                            $this->edit_data("waqif", ["id_waqif" => $id_waqif], ["bukti_transfer" => $img_peserta]);
                            return 1;
                            
                        } else { // Jika Audio Gagal Di upload 
                            return 0;
                        }
                    } else{ 
                        return 2;
                    }
            
                }
                
            }
        // upload foto 

        if($query) return 1;
        else return 0;
    }

    public function get_waqif(){
        $id_waqif = $this->input->post("id_waqif");
        $query = $this->get_one("waqif", ["id_waqif" => $id_waqif]);

        return $query;
    }

    public function edit_waqif(){
        $id_waqif = $this->input->post("id_waqif");
        $data = [
            "nama_waqif" => $this->input->post("nama_waqif"),
            "nominal" => rp_to_int($this->input->post("nominal")),
            "no_wa" => $this->input->post("no_wa"),
            "email" => $this->input->post("email"),
            "tgl_waqaf" => $this->input->post("tgl_waqaf"),
            "nama_volunteer" => $this->input->post("nama_volunteer"),
        ];

        $query = $this->edit_data("waqif", ["id_waqif" => $id_waqif], $data);

        // upload foto 
            if(isset($_FILES['file']['name'])) {

                $nama_file = $_FILES['file'] ['name']; // Nama Audio
                $size        = $_FILES['file'] ['size'];// Size Audio
                $error       = $_FILES['file'] ['error'];
                $tipe_audio  = $_FILES['file'] ['type']; //tipe audio untuk filter
                $folder      = "./assets/bukti_transfer/"; //folder tujuan upload
                $valid       = array('jpg','png','gif','jpeg', 'JPG', 'PNG', 'GIF', 'JPEG'); //Format File yang di ijinkan Masuk ke server
                
                if(strlen($nama_file)){   
                    // Perintah untuk mengecek format gambar
                    list($txt, $ext) = explode(".", $nama_file);
                    if(in_array($ext,$valid)){   

                        // Perintah untuk mengupload file dan memberi nama baru
                        switch ($tipe_audio) {
                            case 'image/jpeg':
                                $tipe_audio = "jpg";
                                break;
                            case 'image/png':
                                $tipe_audio = "png";
                                break;
                            case 'image/gif':
                                $tipe_audio = "gif";
                                break;
                            default:
                                break;
                        }

                        $img_peserta = $id_waqif.".".$tipe_audio;

                        $tmp = $_FILES['file']['tmp_name'];
                        
                        
                        if(move_uploaded_file($tmp, $folder.$img_peserta)){
                            
                            $this->edit_data("waqif", ["id_waqif" => $id_waqif], ["bukti_transfer" => $img_peserta]);
                            return 1;

                        } else { // Jika Audio Gagal Di upload 
                            return 0;
                        }
                    } else{ 
                        return 2;
                    }
                }
            }
        // upload foto 

        if($query) return 1;
        else return 0;
    }
}

/* End of file Subsoal.php */
