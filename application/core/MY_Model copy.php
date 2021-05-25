<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Controller {

    protected $table = "";
    protected $perPage = 5;

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }
    
    public function select($columns){
        $this->db->select($columns);
        return $this;
    }
    
    public function where($column, $condition){
        $this->db->where($column, $condition);
        return $this;
    }

    public function like($column, $condition){
        $this->db->like($column, $condition);
        return $this;
    }

    public function orLike($column, $condition){
        $this->db->or_like($column, $condition);
        return $this;
    }

    public function join($table, $type = "left"){
        $this->db->join($table, "$this->table.id_$table = $table.id", $type);
        return $this;
    }

    public function orderBy($column, $order = 'asc'){
        $this->db->order_by($column, $order);
        return $this;
    }

    public function first(){
        return $this->db->get($this->table)->row();
    }

    public function get(){
        return $this->db->get($this->table)->result();
    }

    public function count(){
        return $this->db->count_all_results($this->table);
    }

    public function create($data){
        return $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function update($data){
        return $this->db->update($this->table, $data);
    }

    public function delete(){
        $this->db->delete($this->delete);
        return $this->db->affected_row();
    }

    public function paginate($page){
        $this->db->limit(
            $this->perPage,
            $this->calculateRealOffset($page)
        );
    }

    public function calculateRealOffset($page){
        if(is_null($page) || empty($page)){
            $offset = 0;
        } else {
            $offset = ($page * $this->perPage) - $this->perPage;
        }

        return $offset;
    }
}

/* End of file MY_Model.php */
