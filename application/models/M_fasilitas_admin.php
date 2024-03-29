<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_fasilitas_admin extends CI_Model
{

    public $table = 'tb_fasilitas';
    public $id = 'ID_FASILITAS';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('ID_FASILITAS,FASILITAS,KET_FASILITAS,BIAYA');
        $this->datatables->from('tb_fasilitas');
        //add this line for join
        //$this->datatables->join('table2', 'tb_fasilitas.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('fasilitas/read/$1'),'Read')." | ".anchor(site_url('fasilitas/update/$1'),'Update')." | ".anchor(site_url('fasilitas/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'ID_FASILITAS');
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
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('ID_FASILITAS', $q);
	$this->db->or_like('FASILITAS', $q);
	$this->db->or_like('KET_FASILITAS', $q);
	$this->db->or_like('BIAYA', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('ID_FASILITAS', $q);
	$this->db->or_like('FASILITAS', $q);
	$this->db->or_like('KET_FASILITAS', $q);
	$this->db->or_like('BIAYA', $q);
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
