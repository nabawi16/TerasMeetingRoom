<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Booking_transaksi extends CI_Controller{
    function __construct(){
        parent::__construct();
        // is_login();
        $this->load->model('Booking_transaksi_model');
        $this->load->helper('tgl_indo');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index(){
        $data['title'] = "Kelola Data Booking Transaksi";
        $this->template->load('template','booking_transaksi/booking_transaksi_list',$data);
    } 
                
    public function json() {
        header('Content-Type: application/json');
        echo $this->Booking_transaksi_model->json();
    }

    public function read($id) {
        $row = $this->Booking_transaksi_model->get_by_id(dc($id));
        if ($row) {
            $data = array(
				'id_transaksi' => $row->id_transaksi,
				'id_booking' => $row->id_booking,
				'nama_transaksi' => $row->nama_transaksi,
				'harga' => $row->harga,
		    );
            $data['title'] = "Detail Data Booking Transaksi";
            $this->template->load('template','booking_transaksi/booking_transaksi_read', $data);
        }else{
            $this->session->set_flashdata('flash_message1', 'Data Tidak ditemukan');
            redirect(site_url('Booking_transaksi'));
        }
    }

    public function create() {
        $data = array(
            'button' => 'Create',
            'action' => site_url('Booking_transaksi/create_action'),
		    'id_transaksi' => set_value('id_transaksi'),
		    'id_booking' => set_value('id_booking'),
		    'nama_transaksi' => set_value('nama_transaksi'),
		    'harga' => set_value('harga'),
		);
        $data['title'] = "Form Booking Transaksi";
        $this->template->load('template','booking_transaksi/booking_transaksi_form', $data);
    }
                
    public function create_action() {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        }else{
			//$id_transaksi = $this->Booking_transaksi_model->id_transaksi();
            $data = array(
				'id_booking' => $this->input->post('id_booking',TRUE),
				'nama_transaksi' => $this->input->post('nama_transaksi',TRUE),
				'harga' => $this->input->post('harga',TRUE),
		    );

        $this->Booking_transaksi_model->insert($data);
        $this->session->set_flashdata('flash_message2', 'Data berhasil disimpan');
        redirect(site_url('Booking/read/'.ec($this->input->post('id_booking',TRUE))));
        }
    }
                
    public function update($id) {
        $row = $this->Booking_transaksi_model->get_by_id(dc($id));
        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('Booking_transaksi/update_action'),
				'id_transaksi' => set_value('id_transaksi', $row->id_transaksi),
				'id_booking' => set_value('id_booking', $row->id_booking),
				'nama_transaksi' => set_value('nama_transaksi', $row->nama_transaksi),
				'harga' => set_value('harga', $row->harga),
		    );
            $data['title'] = "Form Booking Transaksi";
            $this->template->load('template','booking_transaksi/booking_transaksi_form', $data);
        } else {
            $this->session->set_flashdata('flash_message1', 'Data Tidak ditemukan');
            redirect(site_url('Booking_transaksi'));
        }
    }
                
    public function update_action() {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->update(ec($this->input->post('id_transaksi', TRUE)));
        }else{
            $data = array(
				'id_booking' => $this->input->post('id_booking',TRUE),
				'nama_transaksi' => $this->input->post('nama_transaksi',TRUE),
				'harga' => $this->input->post('harga',TRUE),
		    );
            $this->Booking_transaksi_model->update($this->input->post('id_transaksi', TRUE), $data);
            $this->session->set_flashdata('flash_message2', 'Perubahan data berhasil disimpan');
            redirect(site_url('Booking_transaksi'));
        }
    }
                
    public function delete($id) {
        $row = $this->Booking_transaksi_model->get_by_id(dc($id));
        if ($row) {
            $this->Booking_transaksi_model->delete(dc($id));
            $this->session->set_flashdata('flash_message2', 'Data berhasil dihapus');
            redirect(site_url('Booking/read/'.ec($row->id_booking)));
        } else {
            $this->session->set_flashdata('flash_message1', 'Data Tidak ditemukan');
            redirect(site_url('Booking/read/'.ec($row->id_booking)));
        }
    }

    public function _rules() {
		$this->form_validation->set_rules('id_booking', 'id booking', 'trim|required|numeric');
		$this->form_validation->set_rules('nama_transaksi', 'nama transaksi', 'trim|required');
		$this->form_validation->set_rules('harga', 'harga', 'trim|required');

		$this->form_validation->set_rules('id_transaksi', 'id_transaksi', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel(){
        $this->load->helper('exportexcel');
        $namaFile = "booking_transaksi.xls";
        $judul = "booking_transaksi";
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
		xlsWriteLabel($tablehead, $kolomhead++, "Id Booking");
		xlsWriteLabel($tablehead, $kolomhead++, "Nama Transaksi");
		xlsWriteLabel($tablehead, $kolomhead++, "Harga");

		foreach ($this->Booking_transaksi_model->get_all() as $data) {
            $kolombody = 0;
            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
		    xlsWriteNumber($tablebody, $kolombody++, $data->id_booking);
		    xlsWriteLabel($tablebody, $kolombody++, $data->nama_transaksi);
		    xlsWriteLabel($tablebody, $kolombody++, $data->harga);

	    $tablebody++;
            $nourut++;
        }
        xlsEOF();
        exit();
    }

    function pdf(){
        $this->load->library('Pdf');
        $data = array(
            'booking_transaksi_data' => $this->Booking_transaksi_model->get_all(),
            'start' => 0
        );
        $this->load->view('booking_transaksi/booking_transaksi_pdf',$data);
    }

}

/* End of file Booking_transaksi.php */
/* Location: ./application/controllers/Booking_transaksi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator */
/* Modified by Mohamad_Sopian Codeigniter CRUD Generator 2021-06-23 18:44:09 */
/* http://harviacode.com */