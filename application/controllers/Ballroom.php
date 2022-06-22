<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ballroom extends CI_Controller{
    function __construct(){
        parent::__construct();
        is_login();
        $this->load->model('Ballroom_model');
        $this->load->helper('tgl_indo');
        $this->load->helper('rupiah');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index(){
        $data['title'] = "Kelola Data Ballroom";
        $this->template->load('template','ballroom/ballroom_list',$data);
    } 
                
    public function json() {
        header('Content-Type: application/json');
        echo $this->Ballroom_model->json();
    }

    public function read($id) {
        $row = $this->Ballroom_model->get_by_id(dc($id));
        if ($row) {
            $data = array(
				'id_ballroom' => $row->id_ballroom,
				'nama_ballroom' => $row->nama_ballroom,
				'kapasitas' => $row->kapasitas,
                'harga' => $row->harga,
				'keterangan' => $row->keterangan,
                'status' => $row->status,
		    );
            $data['title'] = "Detail Data Ballroom";
            $this->template->load('template','ballroom/ballroom_read', $data);
        }else{
            $this->session->set_flashdata('flash_message1', 'Data Tidak ditemukan');
            redirect(site_url('Ballroom'));
        }
    }

    public function create() {
        $data = array(
            'button' => 'Create',
            'action' => site_url('Ballroom/create_action'),
		    'id_ballroom' => set_value('id_ballroom'),
		    'nama_ballroom' => set_value('nama_ballroom'),
		    'kapasitas' => set_value('kapasitas'),
            'harga' => set_value('harga'),
		    'keterangan' => set_value('keterangan'),
            'status' => set_value('status'),
		);
        $data['title'] = "Form Ballroom";
        $this->template->load('template','ballroom/ballroom_form', $data);
    }
                
    public function create_action() {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        }else{
			//$id_ballroom = $this->Ballroom_model->id_ballroom();
            $data = array(
				'nama_ballroom' => $this->input->post('nama_ballroom',TRUE),
				'kapasitas' => $this->input->post('kapasitas',TRUE),
                'harga' => $this->input->post('harga',TRUE),
				'keterangan' => $this->input->post('keterangan',TRUE),
                'status' => $this->input->post('status',TRUE),
		    );

        $this->Ballroom_model->insert($data);
        $this->session->set_flashdata('flash_message2', 'Data berhasil disimpan');
        redirect(site_url('Ballroom'));
        }
    }
                
    public function update($id) {
        $row = $this->Ballroom_model->get_by_id(dc($id));
        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('Ballroom/update_action'),
				'id_ballroom' => set_value('id_ballroom', $row->id_ballroom),
				'nama_ballroom' => set_value('nama_ballroom', $row->nama_ballroom),
				'kapasitas' => set_value('kapasitas', $row->kapasitas),
                'harga' => set_value('harga', $row->harga),
				'keterangan' => set_value('keterangan', $row->keterangan),
                'status' => set_value('status', $row->status),
		    );
            $data['title'] = "Form Ballroom";
            $this->template->load('template','ballroom/ballroom_form', $data);
        } else {
            $this->session->set_flashdata('flash_message1', 'Data Tidak ditemukan');
            redirect(site_url('Ballroom'));
        }
    }
                
    public function update_action() {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->update(ec($this->input->post('id_ballroom', TRUE)));
        }else{
            $data = array(
				'nama_ballroom' => $this->input->post('nama_ballroom',TRUE),
				'kapasitas' => $this->input->post('kapasitas',TRUE),
                'harga' => $this->input->post('harga',TRUE),
				'keterangan' => $this->input->post('keterangan',TRUE),
                'status' => $this->input->post('status',TRUE),
		    );
            $this->Ballroom_model->update($this->input->post('id_ballroom', TRUE), $data);
            $this->session->set_flashdata('flash_message2', 'Perubahan data berhasil disimpan');
            redirect(site_url('Ballroom'));
        }
    }
                
    public function delete($id) {
        $row = $this->Ballroom_model->get_by_id(dc($id));
        if ($row) {
            $this->Ballroom_model->delete(dc($id));
            $this->session->set_flashdata('flash_message2', 'Data berhasil dihapus');
            redirect(site_url('Ballroom'));
        } else {
            $this->session->set_flashdata('flash_message1', 'Data Tidak ditemukan');
            redirect(site_url('Ballroom'));
        }
    }

    public function _rules() {
		$this->form_validation->set_rules('nama_ballroom', 'nama ballroom', 'trim|required');
		$this->form_validation->set_rules('kapasitas', 'kapasitas', 'trim|required|numeric');
        $this->form_validation->set_rules('harga', 'harga', 'trim|required|numeric');
		// $this->form_validation->set_rules('status', 'status', 'trim|required|numeric');

		$this->form_validation->set_rules('id_ballroom', 'id_ballroom', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel(){
        $this->load->helper('exportexcel');
        $namaFile = "ballroom.xls";
        $judul = "ballroom";
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
		xlsWriteLabel($tablehead, $kolomhead++, "Nama Ballroom");
		xlsWriteLabel($tablehead, $kolomhead++, "Kapasitas");
		xlsWriteLabel($tablehead, $kolomhead++, "Status");

		foreach ($this->Ballroom_model->get_all() as $data) {
            $kolombody = 0;
            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
		    xlsWriteLabel($tablebody, $kolombody++, $data->nama_ballroom);
		    xlsWriteNumber($tablebody, $kolombody++, $data->kapasitas);
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
            'ballroom_data' => $this->Ballroom_model->get_all(),
            'start' => 0
        );
        $this->load->view('ballroom/ballroom_pdf',$data);
    }

}

/* End of file Ballroom.php */
/* Location: ./application/controllers/Ballroom.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator */
/* Modified by Mohamad_Sopian Codeigniter CRUD Generator 2021-06-23 18:53:35 */
/* http://harviacode.com */