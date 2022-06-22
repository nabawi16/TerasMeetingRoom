<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jadwal extends CI_Controller{
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
        $this->form_validation->set_rules('tgl_awal', 'tanggal awal', 'trim|required');
        $this->form_validation->set_rules('tgl_akhir', 'tanggal akhir', 'trim|required');

        if ($this->input->get('tgl_awal',TRUE) == FALSE) {
            $data = array(
                'tgl_awal' => set_value('tgl_awal',date("Y-m-d")),
                'tgl_akhir' => set_value('tgl_akhir',date("Y-m-d")),
                'jadwal' => ''
            );
        }else{

            if($this->session->userdata('id_user_level') == 3){
                $jadwal = $this->Booking_model->get_by_date2($this->input->get('tgl_awal',TRUE),$this->input->get('tgl_akhir',TRUE));
            }else{
                $jadwal = $this->Booking_model->get_by_date($this->input->get('tgl_awal',TRUE),$this->input->get('tgl_akhir',TRUE));
            }
            $data = array(
                'tgl_awal' => $this->input->get('tgl_awal',TRUE),
                'tgl_akhir' => $this->input->get('tgl_akhir',TRUE),

                'jadwal' => $jadwal
            );
        }

        // var_dump($data);
        $data['title'] = "Jadwal Booking";
        $this->template->load('template','jadwal/jadwal_booking',$data);
    } 

}

/* End of file Booking.php */
/* Location: ./application/controllers/Booking.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator */
/* Modified by Mohamad_Sopian Codeigniter CRUD Generator 2021-06-23 18:54:16 */
/* http://harviacode.com */