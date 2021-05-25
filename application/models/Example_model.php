<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Example_model extends MY_Model {
    public function dataTable(){
        $this->column_order = array(null,'status','nama_lac','marketing','marketing_aktif', 'marketing_nonaktif', null, null);
        $this->column_search = array('nama_lac',);
        $this->order = array('nama_lac' => 'asc');
        $this->select = "id_lac, status, nama_lac, 
            (select count(id_marketing) from marketing_si where a.id_lac = id_lac) as marketing,
            (select count(id_marketing) from marketing_si where a.id_lac = id_lac AND status = 'aktif') as marketing_aktif,
            (select count(id_marketing) from marketing_si where a.id_lac = id_lac AND status <> 'aktif') as marketing_nonaktif,
            ";
        $this->table = "lac as a";
        $list = $this->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $lac) {
            $no++;
            $row = array();
            $row[] = '<center>'.$no.'</center>';
            $row[] = '<center>'.ucwords(strtolower($lac->status)).'</center>';
            $row[] = '<div class="text-truncate">'.ucwords(strtolower($lac->nama_lac)).'</div>';
            $row[] = '<center>'.$lac->marketing_aktif.'</center>';
            $row[] = '<center>'.$lac->marketing_nonaktif.'</center>';
            $row[] = '<center>'.$lac->marketing.'</center>';
            $row[] = '
                <center>
                    <a href="'.base_url().'lac/pdf/'.md5($lac->id_lac).'" target="_blank">
                        <svg width="24" height="24" class="text-danger">
                            <use xlink:href="'.base_url().'assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-file-text" />
                        </svg> 
                    </a>
                </center>
            ';
            $row[] = '
                <div class="d-flex justify-content-end">
                    <span class="dropdown">
                    <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item detailLac" data-bs-toggle="modal" href="#detailLac" data-id="'.$lac->id_lac.'">
                            Detail
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

    public function dataMobile($rowno=0){
        $this->url = base_url().'example/loadLacMobile';

        // Row per page
        $this->rowperpage = 6;
        $rowperpage = $this->rowperpage;
        
        // Row position
        if($rowno != 0){
            $rowno = ($rowno-1) * $rowperpage;
            $this->rowno = $rowno;
        }
    
        $search = $this->input->post("search");

        // All records count
        $allcount = COUNT($this->get_all_like("lac", "nama_lac", $search, ""));
        $this->total_rows = $allcount;

        // Get records
        $record = $this->get_all_limit_like("lac", "nama_lac", $search, "", "id_lac", "ASC", $rowno, $rowperpage);
        
        $result_record = [];
        foreach ($record as $i => $record) {
            $result_record[$i] = $record;
            $result_record[$i]['id'] = md5($record['id_lac']);
            $result_record[$i]['status'] = ucwords($record['status']);
            $result_record[$i]['nama_lac'] = ucwords(strtolower($record['nama_lac']));
            $result_record[$i]['marketing'] = COUNT($this->get_all("marketing_si", ["id_lac" => $record['id_lac']]));
            $result_record[$i]['marketing_aktif'] = COUNT($this->get_all("marketing_si", ["id_lac" => $record['id_lac'], "status" => "aktif"]));
            $result_record[$i]['marketing_nonaktif'] = COUNT($this->get_all("marketing_si", ["id_lac" => $record['id_lac'], "status <>" => "aktif"]));
        }

        return $this->data_mobile($result_record);

    }

    public function add(){
        $data = [];
        foreach ($_POST as $key => $value) {
            $data[$key] = $this->input->post($key);
        }

        return $this->add_data("lac", $data);
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

/* End of file Example_model.php */
