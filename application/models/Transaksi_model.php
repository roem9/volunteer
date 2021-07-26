<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_model extends MY_Model {
    public function dataTablePemasukan(){
        $this->datatables->select('tgl_pemasukan, pelaku, keterangan, nominal, id_pemasukan');
        $this->datatables->from('pemasukan');
        $this->datatables->add_column('view', '
                <span class="dropdown">
                <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">
                    Actions
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item editPemasukan" data-bs-toggle="modal" href="#editPemasukan" data-id="$1">
                        Detail
                    </a>
                </div>
                </span>','id_pemasukan');
        return $this->datatables->generate();
    }

    public function add_pemasukan(){
        $data = [];
        foreach ($_POST as $key => $value) {
            $data[$key] = $this->input->post($key);
        }

        $data['nominal'] = rp_to_int($this->input->post("nominal"));

        return $this->add_data("pemasukan", $data);
    }

    public  function get_pemasukan(){
        $id_pemasukan = $this->input->post("id_pemasukan");
        $data = $this->get_one("pemasukan", ["id_pemasukan" => $id_pemasukan]);
        return $data;
    }

    public function edit_pemasukan(){
        $id_pemasukan = $this->input->post('id_pemasukan');
        unset($_POST['id_pemasukan']);

        $data = [];
        foreach ($_POST as $key => $value) {
            $data[$key] = $this->input->post($key);
        }

        $data['nominal'] = rp_to_int($this->input->post("nominal"));

        return $this->edit_data("pemasukan", ["id_pemasukan" => $id_pemasukan], $data);
    }

    public function dataTablePengeluaran(){
        $this->datatables->select('tgl_pengeluaran, pelaku, keterangan, nominal, id_pengeluaran');
        $this->datatables->from('pengeluaran');
        $this->datatables->add_column('view', '
                <span class="dropdown">
                <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">
                    Actions
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item editPengeluaran" data-bs-toggle="modal" href="#editPengeluaran" data-id="$1">
                        Detail
                    </a>
                </div>
                </span>','id_pengeluaran');
        return $this->datatables->generate();
    }

    public function add_pengeluaran(){
        $data = [];
        foreach ($_POST as $key => $value) {
            $data[$key] = $this->input->post($key);
        }

        $data['nominal'] = rp_to_int($this->input->post("nominal"));

        return $this->add_data("pengeluaran", $data);
    }

    public  function get_pengeluaran(){
        $id_pengeluaran = $this->input->post("id_pengeluaran");
        $data = $this->get_one("pengeluaran", ["id_pengeluaran" => $id_pengeluaran]);
        return $data;
    }

    public function edit_pengeluaran(){
        $id_pengeluaran = $this->input->post('id_pengeluaran');
        unset($_POST['id_pengeluaran']);

        $data = [];
        foreach ($_POST as $key => $value) {
            $data[$key] = $this->input->post($key);
        }

        $data['nominal'] = rp_to_int($this->input->post("nominal"));

        return $this->edit_data("pengeluaran", ["id_pengeluaran" => $id_pengeluaran], $data);
    }
    
    public function dataTablePenyewaan(){
        $this->datatables->select('tgl_transaksi, nama_pelanggan, keterangan, nominal, id_transaksi, jualan, status');
        $this->datatables->from('transaksi_sewa');
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

    public function add_penyewaan(){
        $sewa = $this->get_one("sewa", ["id_sewa" => $this->input->post("id_sewa")]);

        $this->edit_data("sewa", ["id_sewa" => $this->input->post("id_sewa")], ["tagihan" => 0]);

        $pelanggan = $this->get_one("pelanggan", ["id_pelanggan" => $sewa['id_pelanggan']]);

        $data = [];
        foreach ($_POST as $key => $value) {
            $data[$key] = $this->input->post($key);
        }

        $data['jualan'] = $sewa['jualan'];
        $data['id_pelanggan'] = $pelanggan['id_pelanggan'];
        $data['nama_pelanggan'] = $pelanggan['nama_pelanggan'];
        $data['nominal'] = rp_to_int($this->input->post("nominal"));

        return $this->add_data("transaksi_sewa", $data);
    }

    public  function get_penyewaan(){
        $id_transaksi = $this->input->post("id_transaksi");
        $data = $this->get_one("transaksi_sewa", ["id_transaksi" => $id_transaksi]);
        return $data;
    }

    public function edit_penyewaan(){
        $id_transaksi = $this->input->post('id_transaksi');
        unset($_POST['id_transaksi']);

        $data = [];
        foreach ($_POST as $key => $value) {
            $data[$key] = $this->input->post($key);
        }

        $data['nominal'] = rp_to_int($this->input->post("nominal"));

        return $this->edit_data("transaksi_sewa", ["id_transaksi" => $id_transaksi], $data);
    }

    public function dataRekap(){
        $perPeriode = [];
        $bulan_tahun = [];
        $this->db->select("MONTH(tgl_pemasukan) as bulan, YEAR(tgl_pemasukan) as tahun, tgl_pemasukan");
        $this->db->from("pemasukan");
        $this->db->group_by(["bulan", "tahun"]);
        $periode = $this->db->get()->result_array();

        $periode_pemasukan = [];
        foreach ($periode as $periode) {
            $periode_pemasukan[] = $periode['tgl_pemasukan'];
            $bulan_tahun[] = $periode['bulan'].$periode['tahun'];
        }
        
        $this->db->select("MONTH(tgl_pengeluaran) as bulan, YEAR(tgl_pengeluaran) as tahun, tgl_pengeluaran");
        $this->db->from("pengeluaran");
        $this->db->group_by(["bulan", "tahun"]);
        $periode = $this->db->get()->result_array();

        $periode_pengeluaran = [];
        foreach ($periode as $periode) {
            if(!in_array($periode['bulan'].$periode['tahun'], $bulan_tahun)){
                $periode_pengeluaran[] = $periode['tgl_pengeluaran'];
                $bulan_tahun[] = $periode['bulan'].$periode['tahun'];
            }
        }

        $this->db->select("MONTH(tgl_transaksi) as bulan, YEAR(tgl_transaksi) as tahun, tgl_transaksi");
        $this->db->from("transaksi_sewa");
        $this->db->where("status", "Lunas");
        $this->db->group_by(["bulan", "tahun"]);
        $periode = $this->db->get()->result_array();

        $periode_sewa = [];
        foreach ($periode as $periode) {
            if(!in_array($periode['bulan'].$periode['tahun'], $bulan_tahun)){
                $periode_sewa[] = $periode['tgl_transaksi'];
                $bulan_tahun[] = $periode['bulan'].$periode['tahun'];
            }
        }

        $perPeriode = array_unique(array_merge($periode_pemasukan, $periode_pengeluaran, $periode_sewa));

        $periode = [];
        foreach ($perPeriode as $i => $perPeriode) {
            $bulan = date("m", strtotime($perPeriode));
            $tahun = date("Y", strtotime($perPeriode));

            $this->select("SUM(nominal) as pemasukan");
            $this->from("pemasukan");
            $this->where(["MONTH(tgl_pemasukan)" => $bulan, "YEAR(tgl_pemasukan)" => $tahun]);
            $pemasukan = $this->getOne();

            $this->select("SUM(nominal) as pengeluaran");
            $this->from("pengeluaran");
            $this->where(["MONTH(tgl_pengeluaran)" => $bulan, "YEAR(tgl_pengeluaran)" => $tahun]);
            $pengeluaran = $this->getOne();

            $this->select("SUM(nominal) as pemasukan");
            $this->from("transaksi_sewa");
            $this->where(["MONTH(tgl_transaksi)" => $bulan, "YEAR(tgl_transaksi)" => $tahun, "status" => "Lunas"]);
            $penyewaan = $this->getOne();

            $periode[$i]['periode'] = $perPeriode;
            $periode[$i]['pemasukan'] = $pemasukan['pemasukan'] + $penyewaan['pemasukan'];
            $periode[$i]['pengeluaran'] = $pengeluaran['pengeluaran'];
            $periode[$i]['total'] = $pemasukan['pemasukan'] + $penyewaan['pemasukan'] - $pengeluaran['pengeluaran'];
        }

        usort($periode, function($a, $b) {
            return $b['periode'] <=> $a['periode'];
        });
        
        return $periode;
    }

    public function dataMobileRekap($rowno){
        $this->url = base_url().'transaksi/loadMobileRekap';

        // Row per page
        $this->rowperpage = 6;
        $rowperpage = $this->rowperpage;
        
        // Row position
        if($rowno != 0){
            $rowno = ($rowno-1) * $rowperpage;
        }
    
        $search = $this->input->post("search");

        $rekap = $this->dataRekap();
        
        $this->total_rows = COUNT($rekap);

        $this->rowno = $rowno;

        $result_record = [];
        foreach ($rekap as $i => $rekap) {
            $result_record[$i] = $rekap;
            $result_record[$i]['periode'] = bulan_tahun($rekap['periode']);
            $result_record[$i]['pemasukan'] = ($rekap['pemasukan'] != null) ? rupiah($rekap['pemasukan']) : "Rp 0";
            $result_record[$i]['pengeluaran'] = ($rekap['pengeluaran'] != null) ? rupiah($rekap['pengeluaran']) : "Rp 0";
            $result_record[$i]['total'] = ($rekap['total'] != null) ? rupiah($rekap['total']) : "Rp 0";
        }

        return $this->data_mobile($result_record);

    }

    public function dataTableTransaksiBelumLunas(){
        $this->datatables->select('tgl_transaksi, nama_pelanggan, keterangan, nominal, id_transaksi, jualan, status');
        $this->datatables->from('transaksi_sewa');
        $this->datatables->where(["status" => "Belum Lunas"]);
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

    public function dataMobileTransaksiBelumLunas($rowno){
        $this->url = base_url().'transaksi/loadMobileTransaksiBelumLunas';

        // Row per page
        $this->rowperpage = 6;
        $rowperpage = $this->rowperpage;
        
        // Row position
        if($rowno != 0){
            $rowno = ($rowno-1) * $rowperpage;
        }
    
        $search = $this->input->post("search");

        // All records count
        $allcount = COUNT($this->get_all_like("transaksi_sewa", "nama_pelanggan", $search, ["status" => "Belum Lunas"]));
        $this->total_rows = $allcount;

        // Get records
        $record = $this->get_all_limit_like("transaksi_sewa", "nama_pelanggan", $search, ["status" => "Belum Lunas"], "tgl_transaksi", "DESC", $rowno, $rowperpage);

        $this->rowno = $rowno;

        $result_record = [];
        foreach ($record as $i => $record) {
            $result_record[$i] = $record;
            $result_record[$i]['tgl_transaksi'] = date("d-M-y", strtotime($record['tgl_transaksi']));
            $result_record[$i]['nominal'] = rupiah($record['nominal']);
        }

        return $this->data_mobile($result_record);

    }
}

/* End of file Transaksi_model.php */
