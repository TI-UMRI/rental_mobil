<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users_model extends CI_Model
{

    public $table = 'tb_users';
    public $id = 'ID_USER';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('ID_USER,USERNAME,NAME,EMAIL,NO_TELP,JENIS_KELAMIN,ALAMAT,PASSWORD,PHOTO,ACTIVATED,CREATED,GROUP_USER,LAST_LOGIN,LAST_UPDATE');
        $this->datatables->from('tb_users');
        //add this line for join
        //$this->datatables->join('table2', 'tb_users.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('users/read/$1'),'Read')." | ".anchor(site_url('users/update/$1'),'Update')." | ".anchor(site_url('users/delete/$1'),'Delete','onclick="javascript: return confirm(\'Are You Sure ?\')"'), 'ID_USER');
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
        $this->db->like('ID_USER', $q);
	$this->db->or_like('USERNAME', $q);
	$this->db->or_like('NAME', $q);
	$this->db->or_like('EMAIL', $q);
	$this->db->or_like('NO_TELP', $q);
	$this->db->or_like('JENIS_KELAMIN', $q);
	$this->db->or_like('ALAMAT', $q);
	$this->db->or_like('PASSWORD', $q);
	$this->db->or_like('PHOTO', $q);
	$this->db->or_like('ACTIVATED', $q);
	$this->db->or_like('CREATED', $q);
	$this->db->or_like('GROUP_USER', $q);
	$this->db->or_like('LAST_LOGIN', $q);
	$this->db->or_like('LAST_UPDATE', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('ID_USER', $q);
	$this->db->or_like('USERNAME', $q);
	$this->db->or_like('NAME', $q);
	$this->db->or_like('EMAIL', $q);
	$this->db->or_like('NO_TELP', $q);
	$this->db->or_like('JENIS_KELAMIN', $q);
	$this->db->or_like('ALAMAT', $q);
	$this->db->or_like('PASSWORD', $q);
	$this->db->or_like('PHOTO', $q);
	$this->db->or_like('ACTIVATED', $q);
	$this->db->or_like('CREATED', $q);
	$this->db->or_like('GROUP_USER', $q);
	$this->db->or_like('LAST_LOGIN', $q);
	$this->db->or_like('LAST_UPDATE', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $insert= $this->db->insert($this->table, $data);
        $res= $this->db->query("SELECT LAST_INSERT_ID()")->result_array();
        // var_dump();die();
        return $res[0]["LAST_INSERT_ID()"];
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
