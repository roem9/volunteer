<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Volunteer_model extends MY_Model {

    public function load_volunteer(){
        $this->datatables->select("id_volunteer, nama_volunteer, domisili");
        $this->datatables->from("volunteer");
        $this->db->order_by("tgl_input", "desc");
            
        return $this->datatables->generate();
    }
}

/* End of file Subsoal.php */
