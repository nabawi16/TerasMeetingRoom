<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pengaturan extends CI_Controller{
    function __construct(){
        parent::__construct();
        is_login();
        $this->load->model('Pengaturan_model');
        $this->load->helper('tgl_indo');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    

    public function index() {
        $row = $this->Pengaturan_model->get_by_id(1);
        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('Pengaturan/update_action'),
                'id' => set_value('id', $row->id),
                'text_header' => set_value('text_header', $row->text_header),
                'text_header_small' => set_value('text_header_small', $row->text_header_small),
                'deskripsi_hotel' => set_value('deskripsi_hotel', $row->deskripsi_hotel),
                'deskripsi_ruang_meeting' => set_value('deskripsi_ruang_meeting', $row->deskripsi_ruang_meeting),
                'alamat' => set_value('alamat', $row->alamat),
                'no_telp' => set_value('no_telp', $row->no_telp),
                'fax' => set_value('fax', $row->fax),
                'email' => set_value('email', $row->email),
                'facebook' => set_value('facebook', $row->facebook),
                'twitter' => set_value('twitter', $row->twitter),
                'instagram' => set_value('instagram', $row->instagram),
            );
        }else{
            $data = array(
                'button' => 'Create',
                'action' => site_url('Pengaturan/create_action'),
    		    'id' => set_value('id'),
    		    'text_header' => set_value('text_header'),
                'text_header_small' => set_value('text_header_small'),
                'deskripsi_hotel' => set_value('deskripsi_hotel'),
                'deskripsi_ruang_meeting' => set_value('deskripsi_ruang_meeting'),
                'alamat' => set_value('alamat'),
    		    'no_telp' => set_value('no_telp'),
    		    'fax' => set_value('fax'),
    		    'email' => set_value('email'),
    		    'facebook' => set_value('facebook'),
    		    'twitter' => set_value('twitter'),
    		    'instagram' => set_value('instagram'),
    		);
        }
        $data['title'] = "Form Pengaturan";
        $this->template->load('template','pengaturan/pengaturan_form', $data);
    }
                
    public function create_action() {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        }else{
			//$id = $this->Pengaturan_model->id();
            $data = array(
				'text_header' => $this->input->post('text_header',TRUE),
                'text_header_small' => $this->input->post('text_header_small',TRUE),
                'deskripsi_hotel' => $this->input->post('deskripsi_hotel',TRUE),
                'deskripsi_ruang_meeting' => $this->input->post('deskripsi_ruang_meeting',TRUE),
                'alamat' => $this->input->post('alamat',TRUE),
				'no_telp' => $this->input->post('no_telp',TRUE),
				'fax' => $this->input->post('fax',TRUE),
				'email' => $this->input->post('email',TRUE),
				'facebook' => $this->input->post('facebook',TRUE),
				'twitter' => $this->input->post('twitter',TRUE),
				'instagram' => $this->input->post('instagram',TRUE),
		    );

        $this->Pengaturan_model->insert($data);
        $this->session->set_flashdata('flash_message2', 'Data berhasil disimpan');
        redirect(site_url('Pengaturan'));
        }
    }
                
    public function update_action() {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->update(ec($this->input->post('id', TRUE)));
        }else{
            $data = array(
                'text_header' => $this->input->post('text_header',TRUE),
                'text_header_small' => $this->input->post('text_header_small',TRUE),
                'deskripsi_hotel' => $this->input->post('deskripsi_hotel',TRUE),
                'deskripsi_ruang_meeting' => $this->input->post('deskripsi_ruang_meeting',TRUE),
				'alamat' => $this->input->post('alamat',TRUE),
				'no_telp' => $this->input->post('no_telp',TRUE),
				'fax' => $this->input->post('fax',TRUE),
				'email' => $this->input->post('email',TRUE),
				'facebook' => $this->input->post('facebook',TRUE),
				'twitter' => $this->input->post('twitter',TRUE),
				'instagram' => $this->input->post('instagram',TRUE),
		    );
            $this->Pengaturan_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('flash_message2', 'Perubahan data berhasil disimpan');
            redirect(site_url('Pengaturan'));
        }
    }

    public function _rules() {
		$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
		$this->form_validation->set_rules('no_telp', 'no telp', 'trim|required');
		// $this->form_validation->set_rules('fax', 'fax', 'trim|required');
		$this->form_validation->set_rules('email', 'email', 'trim|required');
		// $this->form_validation->set_rules('facebook', 'facebook', 'trim|required');
		// $this->form_validation->set_rules('twitter', 'twitter', 'trim|required');
		// $this->form_validation->set_rules('instagram', 'instagram', 'trim|required');

		$this->form_validation->set_rules('id', 'id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Pengaturan.php */
/* Location: ./application/controllers/Pengaturan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator */
/* Modified by Mohamad_Sopian Codeigniter CRUD Generator 2021-08-16 00:45:54 */
/* http://harviacode.com */