<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pelanggan extends CI_Controller{
    function __construct(){
        parent::__construct();
        is_login();
        $this->load->model('Pelanggan_model');
        $this->load->helper('tgl_indo');
        $this->load->library('form_validation');
			$this->load->library('datatables');
    }

    public function index(){
        $data['title'] = "Kelola Data Pelanggan";
        $this->template->load('template','pelanggan/pelanggan_list',$data);
    } 
                
    public function json() {
        header('Content-Type: application/json');
        echo $this->Pelanggan_model->json();
    }

    public function read($id) {
        $row = $this->Pelanggan_model->get_by_id(dc($id));
        if ($row) {
            $data = array(
				'id_pelanggan' => $row->id_pelanggan,
				'no_ktp' => $row->no_ktp,
				'nama' => $row->nama,
				'alamat' => $row->alamat,
				'tgl_lahir' => $row->tgl_lahir,
				'no_telp' => $row->no_telp,
				'tgl_daftar' => $row->tgl_daftar,
				'status' => $row->status,
		    );
            $data['title'] = "Detail Data Pelanggan";
            $this->template->load('template','pelanggan/pelanggan_read', $data);
        }else{
            $this->session->set_flashdata('flash_message1', 'Data Tidak ditemukan');
            redirect(site_url('Pelanggan'));
        }
    }

    public function create() {
        $data = array(
            'button' => 'Create',
            'action' => site_url('Pelanggan/create_action'),
		    'id_pelanggan' => set_value('id_pelanggan'),
		    'no_ktp' => set_value('no_ktp'),
		    'nama' => set_value('nama'),
		    'alamat' => set_value('alamat'),
		    'tgl_lahir' => set_value('tgl_lahir',date("Y-m-d")),
		    'no_telp' => set_value('no_telp'),
		    'tgl_daftar' => set_value('tgl_daftar',date("Y-m-d")),
		    'status' => set_value('status'),
		);
        $data['title'] = "Form Pelanggan";
        $this->template->load('template','pelanggan/pelanggan_form', $data);
    }
                
    public function create_action() {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        }else{
			//$id_pelanggan = $this->Pelanggan_model->id_pelanggan();
            $data = array(
				'no_ktp' => $this->input->post('no_ktp',TRUE),
				'nama' => $this->input->post('nama',TRUE),
				'alamat' => $this->input->post('alamat',TRUE),
				'tgl_lahir' => $this->input->post('tgl_lahir',TRUE),
				'no_telp' => $this->input->post('no_telp',TRUE),
				'tgl_daftar' => $this->input->post('tgl_daftar',TRUE),
				'status' => 0,
		    );

        $this->Pelanggan_model->insert($data);
        $this->session->set_flashdata('flash_message2', 'Data berhasil disimpan');
        redirect(site_url('Pelanggan'));
        }
    }
                
    public function update($id) {
        $row = $this->Pelanggan_model->get_by_id(dc($id));
        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('Pelanggan/update_action'),
				'id_pelanggan' => set_value('id_pelanggan', $row->id_pelanggan),
				'no_ktp' => set_value('no_ktp', $row->no_ktp),
				'nama' => set_value('nama', $row->nama),
				'alamat' => set_value('alamat', $row->alamat),
				'tgl_lahir' => set_value('tgl_lahir', $row->tgl_lahir),
				'no_telp' => set_value('no_telp', $row->no_telp),
				'tgl_daftar' => set_value('tgl_daftar', $row->tgl_daftar),
				'status' => set_value('status', $row->status),
		    );
            $data['title'] = "Form Pelanggan";
            $this->template->load('template','pelanggan/pelanggan_form', $data);
        } else {
            $this->session->set_flashdata('flash_message1', 'Data Tidak ditemukan');
            redirect(site_url('Pelanggan'));
        }
    }
                
    public function update_action() {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->update(ec($this->input->post('id_pelanggan', TRUE)));
        }else{
            $data = array(
				'no_ktp' => $this->input->post('no_ktp',TRUE),
				'nama' => $this->input->post('nama',TRUE),
				'alamat' => $this->input->post('alamat',TRUE),
				'tgl_lahir' => $this->input->post('tgl_lahir',TRUE),
				'no_telp' => $this->input->post('no_telp',TRUE),
				'tgl_daftar' => $this->input->post('tgl_daftar',TRUE),
				'status' => $this->input->post('status',TRUE),
		    );
            $this->Pelanggan_model->update($this->input->post('id_pelanggan', TRUE), $data);
            $this->session->set_flashdata('flash_message2', 'Perubahan data berhasil disimpan');
            redirect(site_url('Pelanggan'));
        }
    }
                
    public function delete($id) {
        $row = $this->Pelanggan_model->get_by_id(dc($id));
        if ($row) {
            $this->Pelanggan_model->delete(dc($id));
            $this->session->set_flashdata('flash_message2', 'Data berhasil dihapus');
            redirect(site_url('Pelanggan'));
        } else {
            $this->session->set_flashdata('flash_message1', 'Data Tidak ditemukan');
            redirect(site_url('Pelanggan'));
        }
    }

    public function _rules() {
		$this->form_validation->set_rules('no_ktp', 'no ktp', 'trim|required|numeric');
		$this->form_validation->set_rules('nama', 'nama', 'trim|required');
		// $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
		$this->form_validation->set_rules('tgl_lahir', 'tgl lahir', 'trim|required');
		$this->form_validation->set_rules('no_telp', 'no telp', 'trim|required');
		$this->form_validation->set_rules('tgl_daftar', 'tgl daftar', 'trim|required');

		$this->form_validation->set_rules('id_pelanggan', 'id_pelanggan', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel(){
        $this->load->helper('exportexcel');
        $namaFile = "pelanggan.xls";
        $judul = "pelanggan";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");
        xlsBOF();
        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
		xlsWriteLabel($tablehead, $kolomhead++, "No Ktp");
		xlsWriteLabel($tablehead, $kolomhead++, "Nama");
		xlsWriteLabel($tablehead, $kolomhead++, "Alamat");
		xlsWriteLabel($tablehead, $kolomhead++, "Tgl Lahir");
		xlsWriteLabel($tablehead, $kolomhead++, "No Telp");
		xlsWriteLabel($tablehead, $kolomhead++, "Tgl Daftar");
		xlsWriteLabel($tablehead, $kolomhead++, "Status");

		foreach ($this->Pelanggan_model->get_all() as $data) {
            $kolombody = 0;
            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
		    xlsWriteNumber($tablebody, $kolombody++, $data->no_ktp);
		    xlsWriteLabel($tablebody, $kolombody++, $data->nama);
		    xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
		    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_lahir);
		    xlsWriteLabel($tablebody, $kolombody++, $data->no_telp);
		    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_daftar);
		    xlsWriteNumber($tablebody, $kolombody++, $data->status);

	    $tablebody++;
            $nourut++;
        }
        xlsEOF();
        exit();
    }

    function pdf(){
        $this->load->library('Pdf');
        $data = array(
            'pelanggan_data' => $this->Pelanggan_model->get_all(),
            'start' => 0
        );
        $this->load->view('pelanggan/pelanggan_pdf',$data);
    }

}

/* End of file Pelanggan.php */
/* Location: ./application/controllers/Pelanggan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator */
/* Modified by Mohamad_Sopian Codeigniter CRUD Generator 2021-06-23 18:44:55 */
/* http://harviacode.com */