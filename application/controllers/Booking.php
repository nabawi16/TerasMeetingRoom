<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Booking extends CI_Controller{
    function __construct(){
        parent::__construct();
        is_login();
        $this->load->model('Booking_model');
        $this->load->helper('tgl_indo');
        $this->load->helper('rupiah');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index(){
        $data['title'] = "Kelola Data Booking";
        $this->template->load('template','booking/booking_list',$data);
    } 
                
    public function json() {
        header('Content-Type: application/json');
        echo $this->Booking_model->json();
    }

    public function read($id) {
        $row = $this->Booking_model->get_by_id(dc($id));
        if ($row) {
            $data = array(
				'id_booking' => $row->id_booking,
				'id_pelanggan' => $row->id_pelanggan,
				'id_ballroom' => $row->id_ballroom,
				'tgl_booking' => $row->tgl_booking,
				'tgl_event' => $row->tgl_event,
				'keterangan' => $row->keterangan,
				'deposit' => $row->deposit,
				'total_bayar' => $row->total_bayar,
                'nama_ballroom' => $row->nama_ballroom,
                'deskripsi_ballroom' => $row->deskripsi_ballroom,
                'kapasitas' => $row->kapasitas,
                'nama_pelanggan' => $row->nama_pelanggan,
                'no_ktp' => $row->no_ktp,
                'alamat' => $row->alamat,
                'tgl_lahir' => $row->tgl_lahir,
                'no_telp' => $row->no_telp,
                'tgl_daftar' => $row->tgl_daftar,

                'booking_transaksi' => $this->db->query("select * from booking_transaksi where id_booking='$row->id_booking' ")->result(),
		    );
            $data['title'] = "Detail Data Booking";
            $this->template->load('template','booking/booking_read', $data);
        }else{
            $this->session->set_flashdata('flash_message1', 'Data Tidak ditemukan');
            redirect(site_url('Booking'));
        }
    }

    public function create() {
        $data = array(
            'button' => 'Create',
            'action' => site_url('Booking/create_action'),
		    'id_booking' => set_value('id_booking'),
		    'id_pelanggan' => set_value('id_pelanggan'),
		    'id_ballroom' => set_value('id_ballroom'),
		    'tgl_booking' => set_value('tgl_booking',date('Y-m-d')),
		    'tgl_event' => set_value('tgl_event',date('Y-m-d')),
		    'keterangan' => set_value('keterangan'),
		    'deposit' => set_value('deposit'),
		    'total_bayar' => set_value('total_bayar'),
		);
        $data['title'] = "Form Booking";
        $this->template->load('template','booking/booking_form', $data);
    }
                
    public function create_action() {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        }else{
			//$id_booking = $this->Booking_model->id_booking();
            $data = array(
				'id_pelanggan' => $this->input->post('id_pelanggan',TRUE),
				'id_ballroom' => $this->input->post('id_ballroom',TRUE),
				'tgl_booking' => $this->input->post('tgl_booking',TRUE),
				'tgl_event' => $this->input->post('tgl_event',TRUE),
				'keterangan' => $this->input->post('keterangan',TRUE),
				'deposit' => $this->input->post('deposit',TRUE),
				'total_bayar' => $this->input->post('total_bayar',TRUE),
                'status' => 0,
		    );

        $this->Booking_model->insert($data);
        $this->session->set_flashdata('flash_message2', 'Data berhasil disimpan');
        redirect(site_url('Booking'));
        }
    }
                
    public function update($id) {
        $row = $this->Booking_model->get_by_id(dc($id));
        if ($row) {
            if($row->status == 1){
                $this->session->set_flashdata('flash_message2', 'Status Booking Sudah selesai tidak dapat di hapus!!');
                redirect(site_url('Booking'));
            }else{
                $data = array(
                    'button' => 'Update',
                    'action' => site_url('Booking/update_action'),
    				'id_booking' => set_value('id_booking', $row->id_booking),
    				'id_pelanggan' => set_value('id_pelanggan', $row->id_pelanggan),
    				'id_ballroom' => set_value('id_ballroom', $row->id_ballroom),
    				'tgl_booking' => set_value('tgl_booking', $row->tgl_booking),
    				'tgl_event' => set_value('tgl_event', $row->tgl_event),
    				'keterangan' => set_value('keterangan', $row->keterangan),
    				'deposit' => set_value('deposit', $row->deposit),
    				'total_bayar' => set_value('total_bayar', $row->total_bayar),
    		    );
                $data['title'] = "Form Booking";
                $this->template->load('template','booking/booking_form', $data);
            }
        } else {
            $this->session->set_flashdata('flash_message1', 'Data Tidak ditemukan');
            redirect(site_url('Booking'));
        }
    }
                
    public function update_action() {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->update(ec($this->input->post('id_booking', TRUE)));
        }else{
            $data = array(
				'id_pelanggan' => $this->input->post('id_pelanggan',TRUE),
				'id_ballroom' => $this->input->post('id_ballroom',TRUE),
				'tgl_booking' => $this->input->post('tgl_booking',TRUE),
				'tgl_event' => $this->input->post('tgl_event',TRUE),
				'keterangan' => $this->input->post('keterangan',TRUE),
				'deposit' => $this->input->post('deposit',TRUE),
				'total_bayar' => $this->input->post('total_bayar',TRUE),
		    );
            $this->Booking_model->update($this->input->post('id_booking', TRUE), $data);
            $this->session->set_flashdata('flash_message2', 'Perubahan data berhasil disimpan');
            redirect(site_url('Booking'));
        }
    }
                
    public function delete($id) {
        $row = $this->Booking_model->get_by_id(dc($id));
        if ($row) {
            if($row->status == 1){
                $this->session->set_flashdata('flash_message2', 'Status Booking Sudah selesai tidak dapat di hapus!!');
                redirect(site_url('Booking'));
            }else{
                $this->Booking_model->delete(dc($id));
                $this->session->set_flashdata('flash_message2', 'Data berhasil dihapus');
                redirect(site_url('Booking'));
            }
        } else {
            $this->session->set_flashdata('flash_message1', 'Data Tidak ditemukan');
            redirect(site_url('Booking'));
        }
    }

    public function update_status() {
        $id =  $this->input->post('id',TRUE);
        $row = $this->Booking_model->get_by_id($id);
        $data = array(
                'button' => 'Update',
                'action' => site_url('Booking/update_status_action'),
                'id_booking' => set_value('id_booking', $row->id_booking),
                'status' => set_value('status', $row->status),
            );
        $this->load->view('booking/booking_status_form', $data);
    }

     public function update_status_action() {
         $data = array(
            'status' => $this->input->post('status',TRUE),
        );
        $this->Booking_model->update($this->input->post('id_booking', TRUE), $data);
        $this->session->set_flashdata('flash_message2', 'Perubahan status berhasil disimpan');
        redirect(site_url('Booking'));
    }


    function get_pelanggan(){
        if (isset($_GET['term'])) {
            $param = array(
                'term' => $_GET['term']
            );
            $result = $this->Booking_model->get_pelanggan($param);
            if (count($result) > 0) {
                $list = array();
                $key = 0;
                foreach ($result as $row){
                    $list[$key]['id'] = $row->id_pelanggan;
                    $list[$key]['text'] = $row->nama; 
                    $list[$key]['selected'] = true; 
                    $key++;
                }
                 echo json_encode($list);
            }
        }
    }

    function get_ballroom(){
        if (isset($_GET['term'])) {
            $param = array(
                'term' => $_GET['term']
            );
            $result = $this->Booking_model->get_ballroom($param);
            if (count($result) > 0) {
                $list = array();
                $key = 0;
                foreach ($result as $row){
                    $list[$key]['id'] = $row->id_ballroom;
                    $list[$key]['text'] = $row->nama_ballroom; 
                    $list[$key]['selected'] = true; 
                    $key++;
                }
                 echo json_encode($list);
            }
        }
    }

    public function _rules() {
		$this->form_validation->set_rules('id_pelanggan', 'id pelanggan', 'trim|required');
		$this->form_validation->set_rules('id_ballroom', 'id ballroom', 'trim|required');
		$this->form_validation->set_rules('tgl_booking', 'tgl booking', 'trim|required');
		$this->form_validation->set_rules('tgl_event', 'tgl event', 'trim|required');
		$this->form_validation->set_rules('deposit', 'deposit', 'trim|required');

		$this->form_validation->set_rules('id_booking', 'id_booking', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel(){
        $this->load->helper('exportexcel');
        $namaFile = "booking.xls";
        $judul = "booking";
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
		xlsWriteLabel($tablehead, $kolomhead++, "Id Pelanggan");
		xlsWriteLabel($tablehead, $kolomhead++, "Id Ballroom");
		xlsWriteLabel($tablehead, $kolomhead++, "Tgl Booking");
		xlsWriteLabel($tablehead, $kolomhead++, "Tgl Event");
		xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");
		xlsWriteLabel($tablehead, $kolomhead++, "Deposit");
		xlsWriteLabel($tablehead, $kolomhead++, "Total Bayar");

		foreach ($this->Booking_model->get_all() as $data) {
            $kolombody = 0;
            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
		    xlsWriteNumber($tablebody, $kolombody++, $data->id_pelanggan);
		    xlsWriteNumber($tablebody, $kolombody++, $data->id_ballroom);
		    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_booking);
		    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_event);
		    xlsWriteLabel($tablebody, $kolombody++, $data->keterangan);
		    xlsWriteLabel($tablebody, $kolombody++, $data->deposit);
		    xlsWriteLabel($tablebody, $kolombody++, $data->total_bayar);

	    $tablebody++;
            $nourut++;
        }
        xlsEOF();
        exit();
    }

    function pdf(){
        $this->load->library('Pdf');
        $data = array(
            'booking_data' => $this->Booking_model->get_all(),
            'start' => 0
        );
        $this->load->view('booking/booking_pdf',$data);
    }

}

/* End of file Booking.php */
/* Location: ./application/controllers/Booking.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator */
/* Modified by Mohamad_Sopian Codeigniter CRUD Generator 2021-06-23 18:54:16 */
/* http://harviacode.com */