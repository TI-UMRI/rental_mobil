<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Fasilitas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_fasilitas_admin');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $data['data']=$this->M_fasilitas_admin->get_all();
        $this->load->view('template/header');
        $this->load->view('fasilitas/tb_fasilitas_list',$data);
        $this->load->view('template/footer');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->M_fasilitas_admin->json();
    }

    public function read($id) 
    {
        $row = $this->M_fasilitas_admin->get_by_id($id);
        if ($row) {
            $data = array(
		'ID_FASILITAS' => $row->ID_FASILITAS,
		'FASILITAS' => $row->FASILITAS,
		'KET_FASILITAS' => $row->KET_FASILITAS,
		'BIAYA' => $row->BIAYA,
	    );
                    $this->load->view('template/header');
            $this->load->view('fasilitas/tb_fasilitas_read', $data);

        $this->load->view('template/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('fasilitas'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('fasilitas/create_action'),
    	    'ID_FASILITAS' => set_value('ID_FASILITAS'),
    	    'FASILITAS' => set_value('FASILITAS'),
    	    'KET_FASILITAS' => set_value('KET_FASILITAS'),
    	    'BIAYA' => set_value('BIAYA'),
	       );
        $this->load->view('template/header');
        $this->load->view('fasilitas/tb_fasilitas_form', $data);
        $this->load->view('template/footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
        		'FASILITAS' => $this->input->post('FASILITAS',TRUE),
        		'KET_FASILITAS' => $this->input->post('KET_FASILITAS',TRUE),
        		'BIAYA' => $this->input->post('BIAYA',TRUE)
    	    );

            $this->M_fasilitas_admin->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('fasilitas'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->M_fasilitas_admin->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('fasilitas/update_action'),
		'ID_FASILITAS' => set_value('ID_FASILITAS', $row->ID_FASILITAS),
		'FASILITAS' => set_value('FASILITAS', $row->FASILITAS),
		'KET_FASILITAS' => set_value('KET_FASILITAS', $row->KET_FASILITAS),
		'BIAYA' => set_value('BIAYA', $row->BIAYA),
	    );
            $this->load->view('template/header');
            $this->load->view('fasilitas/tb_fasilitas_form', $data);
            $this->load->view('template/footer');

        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('fasilitas'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('ID_FASILITAS', TRUE));
        } else {
            $data = array(
		'FASILITAS' => $this->input->post('FASILITAS',TRUE),
		'KET_FASILITAS' => $this->input->post('KET_FASILITAS',TRUE),
		'BIAYA' => $this->input->post('BIAYA',TRUE),
	    );

            $this->M_fasilitas_admin->update($this->input->post('ID_FASILITAS', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('fasilitas'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->M_fasilitas_admin->get_by_id($id);

        if ($row) {
            $this->M_fasilitas_admin->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('fasilitas'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('fasilitas'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('FASILITAS', 'fasilitas', 'trim|required');
	$this->form_validation->set_rules('KET_FASILITAS', 'ket fasilitas', 'trim|required');
	// $this->form_validation->set_rules('BIAYA', 'biaya', 'trim|required|numeric');

	$this->form_validation->set_rules('ID_FASILITAS', 'ID_FASILITAS', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
