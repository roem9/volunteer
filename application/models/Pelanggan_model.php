<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan_model extends MY_Model {
    public function dataTable(){
        $this->datatables->select('a.id_pelanggan, nama_pelanggan, no_ktp, status, no_hp, 
        (select count(id_sewa) from sewa where a.id_pelanggan = id_pelanggan AND hapus = 0) as langganan');
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
                </div>
                </span>','id_pelanggan');
        return $this->datatables->generate();
    }

    public function dataTables(){
        $this->column_order = array(null,'status','no_ktp','nama_pelanggan','no_hp', 'langganan', null);
        $this->column_search = array('nama_pelanggan', 'no_ktp', 'no_hp');
        $this->order = array('nama_pelanggan' => 'desc');
        $this->select = "a.id_pelanggan, nama_pelanggan, no_ktp, status, no_hp, 
            (select count(id_sewa) from sewa where a.id_pelanggan = id_pelanggan AND hapus = 0) as langganan";
        $this->table = "pelanggan as a";
        $list = $this->get_datatables();
        $data = array();
        $no = $_POST['start'];

        foreach ($list as $list) {
            $no++;
            $row = array();
            $row[] = '<center>'.$no.'</center>';
            // $row[] = $list->status;
            $row[] = ($list->no_ktp == "") ? "<center>-</center>" : $list->no_ktp;
            $row[] = $list->nama_pelanggan;
            $row[] = $list->no_hp;
            $row[] = '<center>'.$list->langganan.'</center>';
            $row[] = '
                <div class="d-flex justify-content-end">
                    <span class="dropdown">
                    <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item detailPelanggan" data-bs-toggle="modal" href="#detailPelanggan" data-id="'.$list->id_pelanggan.'">
                            Detail
                        </a>
                        <a class="dropdown-item detailLangganan" data-bs-toggle="modal" href="#detailLangganan" data-id="'.$list->id_pelanggan.'">
                            Detail Langganan
                        </a>
                    </div>
                    </span>
                </div>';
            $data[] = $row;
        }
    
        $output = array(
                    "draw" => $_POST['draw'],
                    "recordsTotal" => $this->count_all(),
                    "recordsFiltered" => $this->count_filtered(),
                    "data" => $data,
                );
    
        return $output;
    }

    public function dataMobile($rowno){
        $this->url = base_url().'pelanggan/loadMobile';

        // Row per page
        $this->rowperpage = 6;
        $rowperpage = $this->rowperpage;
        
        // Row position
        if($rowno != 0){
            $rowno = ($rowno-1) * $rowperpage;
        }
    
        $search = $this->input->post("search");

        // All records count
        $allcount = COUNT($this->get_all_like("pelanggan", "nama_pelanggan", $search, ""));
        $this->total_rows = $allcount;

        // Get records
        $record = $this->get_all_limit_like("pelanggan", "nama_pelanggan", $search, "", "nama_pelanggan", "ASC", $rowno, $rowperpage);

        $this->rowno = $rowno;

        $result_record = [];
        foreach ($record as $i => $record) {
            $result_record[$i] = $record;
            $sewa = COUNT($this->get_all("sewa", ["id_pelanggan" => $record['id_pelanggan'], "hapus" => "0"]));
            $result_record[$i]['langganan'] = $sewa;
            $result_record[$i]['no_ktp'] = ($record['no_ktp'] != "") ? $record['no_ktp'] : "-";
        }

        return $this->data_mobile($result_record);

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

    public  function get_langganan(){
        $id_pelanggan = $this->input->post("id_pelanggan");
        $sewa = $this->get_all("sewa", ["id_pelanggan" => $id_pelanggan]);
        $data = [];
        foreach ($sewa as $i => $sewa) {
            $data[$i] = $sewa;
            $data[$i]['tgl_tagihan'] = ($sewa['tgl_tagihan'] != 0) ? "Tanggal " . $sewa['tgl_tagihan'] : "-";
        }
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
