<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Fasilitas_mobil extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_fasilitas_mobil_admin');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('fasilitas_mobil/tb_fasilitas_mobil_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->M_fasilitas_mobil_admin->json();
    }

    public function read($id) 
    {
        $row = $this->M_fasilitas_mobil_admin->get_by_id($id);
        if ($row) {
            $data = array(
		'ID_MOBIL' => $row->ID_MOBIL,
		'ID_FASILITAS' => $row->ID_FASILITAS,
	    );
            $this->load->view('fasilitas_mobil/tb_fasilitas_mobil_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('fasilitas_mobil'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('fasilitas_mobil/create_action'),
	    'ID_MOBIL' => set_value('ID_MOBIL'),
	    'ID_FASILITAS' => set_value('ID_FASILITAS'),
	);
        $this->load->view('fasilitas_mobil/tb_fasilitas_mobil_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
	    );

            $this->M_fasilitas_mobil_admin->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('fasilitas_mobil'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->M_fasilitas_mobil_admin->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('fasilitas_mobil/update_action'),
		'ID_MOBIL' => set_value('ID_MOBIL', $row->ID_MOBIL),
		'ID_FASILITAS' => set_value('ID_FASILITAS', $row->ID_FASILITAS),
	    );
            $this->load->view('fasilitas_mobil/tb_fasilitas_mobil_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('fasilitas_mobil'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('ID_MOBIL', TRUE));
        } else {
            $data = array(
	    );

            $this->M_fasilitas_mobil_admin->update($this->input->post('ID_MOBIL', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('fasilitas_mobil'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->M_fasilitas_mobil_admin->get_by_id($id);

        if ($row) {
            $this->M_fasilitas_mobil_admin->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('fasilitas_mobil'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('fasilitas_mobil'));
        }
    }

    public function _rules() 
    {

	$this->form_validation->set_rules('ID_MOBIL', 'ID_MOBIL', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
