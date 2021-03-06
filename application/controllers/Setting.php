<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Setting extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Setting_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
		$data['title'] = "Kelola Data Setting";
        $this->template->load('template','setting/tbl_setting_list',$data);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Setting_model->json();
    }

    public function read($id) 
    {
        $row = $this->Setting_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_setting' => $row->id_setting,
		'nama_setting' => $row->nama_setting,
		'value' => $row->value,
	    );
			$data['title'] = "Detail Data Setting";
            $this->template->load('template','setting/tbl_setting_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('setting'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('setting/create_action'),
	    'id_setting' => set_value('id_setting'),
	    'nama_setting' => set_value('nama_setting'),
	    'value' => set_value('value'),
	);
		$data['title'] = "Form Setting";
        $this->template->load('template','setting/tbl_setting_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_setting' => $this->input->post('nama_setting',TRUE),
		'value' => $this->input->post('value',TRUE),
	    );

            $this->Setting_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('setting'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Setting_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('setting/update_action'),
		'id_setting' => set_value('id_setting', $row->id_setting),
		'nama_setting' => set_value('nama_setting', $row->nama_setting),
		'value' => set_value('value', $row->value),
	    );
			$data['title'] = "Form Setting";
            $this->template->load('template','setting/tbl_setting_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('setting'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_setting', TRUE));
        } else {
            $data = array(
		'nama_setting' => $this->input->post('nama_setting',TRUE),
		'value' => $this->input->post('value',TRUE),
	    );

            $this->Setting_model->update($this->input->post('id_setting', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('setting'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Setting_model->get_by_id($id);

        if ($row) {
            $this->Setting_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('setting'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('setting'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_setting', 'nama setting', 'trim|required');
	$this->form_validation->set_rules('value', 'value', 'trim|required');

	$this->form_validation->set_rules('id_setting', 'id_setting', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Setting.php */
/* Location: ./application/controllers/Setting.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-02-14 09:41:56 */
/* http://harviacode.com */