<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan_model extends MY_Model {
    public function dataTable(){
        $this->datatables->select('a.id_pelanggan, nama_pelanggan, no_ktp, status, no_hp, 
        (select count(id_sewa) from sewa where a.id_pelanggan = id_pelanggan AND hapus = 0) as langganan,
        (select sum(nominal) from transaksi_sewa where a.id_pelanggan = id_pelanggan AND status = "Belum Lunas") as tagihan');
        $this->datatables->from('pelanggan as a');
        $this->datatables->add_column('view', '
                <span class="dropdown">
                <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">
                    Actions
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item detailPelanggan" data-bs-toggle="modal" href="#detailPelanggan" data-id="$1">
                        Detail
                    </a>
                    <a class="dropdown-item detailLangganan" data-bs-toggle="modal" href="#detailLangganan" data-id="$1">
                        Detail Langganan
                    </a>
                    <a class="dropdown-item" href="'.base_url().'pelanggan/kartupiutang/$2" data-id="$1">
                        Kartu Piutang
                    </a>
                </div>
                </span>','id_pelanggan, md5(id_pelanggan)');
        return $this->datatables->generate();
    }

    public function loadKartuPiutang($id){
        $this->datatables->select('DATE_FORMAT(tgl_transaksi, "%d %M %Y") as tgl_transaksi, nama_pelanggan, keterangan, nominal, id_transaksi, jualan, status');
        $this->datatables->from('transaksi_sewa');
        $this->datatables->where('md5(id_pelanggan)', $id);
        $this->datatables->add_column('view', '
                <span class="dropdown">
                <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">
                    Actions
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item editTransaksiPenyewaan" data-bs-toggle="modal" href="#editTransaksiPenyewaan" data-id="$1">
                        Detail
                    </a>
                </div>
                </span>','id_transaksi');
        return $this->datatables->generate();
    }

    public function add(){
        $data = [];
        foreach ($_POST as $key => $value) {
            $data[$key] = $this->input->post($key);
        }

        $id = $this->add_data("pelanggan", $data);

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

        $image_name=$id.'.png'; //buat name dari qr code sesuai dengan nim

        $params['data'] = "https://app.lontara-bdg.id/langganan/".md5($id); //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

        return $id;
    }

    public function add_langganan(){
        $data = [];
        foreach ($_POST as $key => $value) {
            $data[$key] = $this->input->post($key);
        }

        $data['tarif'] = rp_to_int($data['tarif']);

        return $this->add_data("sewa", $data);
    }

    public  function get(){
        $id_pelanggan = $this->input->post("id_pelanggan");
        $data = $this->get_one("pelanggan", ["id_pelanggan" => $id_pelanggan]);
        return $data;
    }

    public function edit(){
        $id_pelanggan = $this->input->post('id_pelanggan');
        unset($_POST['id_pelanggan']);

        $data = [];
        foreach ($_POST as $key => $value) {
            $data[$key] = $this->input->post($key);
        }

        return $this->edit_data("pelanggan", ["id_pelanggan" => $id_pelanggan], $data);
    }

    // public function edit_data(){
    //     // unset id 
        
    //     $data = [];
    //     foreach ($_POST as $key => $value) {
    //         $data[$key] = $this->input->post($key);
    //     }

    //     return $this->edit_data("lac", "where", $data);
    // }

    // public function delete_data(){

    // }

    // public function get_data(){

    // }

    // public function get_datas(){

    // }
}

/* End of file Pelanggan_model.php */
