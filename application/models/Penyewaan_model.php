<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Penyewaan_model extends MY_Model {
    public function dataTable(){
        $this->datatables->select('a.status, id_sewa, tipe, tarif, periode, jualan, tempat, a.tgl_input, tgl_tagihan, tagihan, nama_pelanggan');
        $this->datatables->from('sewa as a');
        $this->datatables->join('pelanggan as b', 'a.id_pelanggan=b.id_pelanggan');
        $this->datatables->add_column('view', '
                <span class="dropdown">
                <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">
                    Actions
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item editPenyewaan" data-bs-toggle="modal" href="#editPenyewaan" data-id="$1">
                        Detail
                    </a>
                </div>
                </span>','id_sewa');
        return $this->datatables->generate();
    }
    
    public  function get(){
        $id_sewa = $this->input->post("id_sewa");
        $data = $this->get_one("sewa", ["id_sewa" => $id_sewa]);
        return $data;
    }

    public function edit(){
        $id_sewa = $this->input->post('id_sewa');
        unset($_POST['id_sewa']);

        $data = [];
        foreach ($_POST as $key => $value) {
            $data[$key] = $this->input->post($key);
        }
        $data['tarif'] = rp_to_int($data['tarif']);

        return $this->edit_data("sewa", ["id_sewa" => $id_sewa], $data);
    }
}

/* End of file Penyewaan_model.php */
