<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_fasilitas_mobil_admin extends CI_Model
{

    public $table = 'tb_fasilitas_mobil';
    public $table_fasilitas = 'tb_fasilitas';
    public $id = 'ID_MOBIL';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('ID_MOBIL,ID_FASILITAS');
        $this->datatables->from('tb_fasilitas_mobil');
        $this->datatables->add_column('action', anchor(site_url('fasilitas_mobil/read/$1'),'Read')." | ".anchor(site_url('fasilitas_mobil/update/$1'),'Update')." | ".anchor(site_url('fasilitas_mobil/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'ID_MOBIL');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        $this->db->select("*")->from($this->table);
        $this->db->join($this->table_fasilitas,$this->table_fasilitas.".ID_FASILITAS=".$this->table.".ID_FASILITAS");
        return $this->db->get()->result();
    }
    
    // // get data by id
    // function get_by_id_mobil($id)
    // {
    //     $this->db->where($this->id, $id);
    //     return $this->db->get($this->table)->row();
    // }

    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('ID_MOBIL', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('ID_MOBIL', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}
