<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Booking_model extends CI_Model
{

    public $table = 'booking';
    public $id = 'id_booking';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('
            booking.id_booking,
            booking.id_pelanggan,
            booking.id_ballroom,
            booking.tgl_booking,
            booking.tgl_event,
            booking.deposit,
            booking.status,
            ballroom.nama_ballroom,
            pelanggan.nama AS nama_pelanggan
        ');
        $this->datatables->from('booking');
        //add this line for join
        $this->datatables->join('pelanggan', 'pelanggan.id_pelanggan = booking.id_pelanggan');
        $this->datatables->join('ballroom', 'ballroom.id_ballroom = booking.id_ballroom');
        if($this->session->userdata('id_user_level') == 3){
             $this->datatables->where('booking.id_pelanggan', $this->session->userdata('id_users'));
        }
        $this->datatables->add_column('tgl_booking','$1','date_indo(tgl_booking)');
        $this->datatables->add_column('tgl_event','$1','date_indo(tgl_event)');
        $this->datatables->add_column('deposit','$1','rp(deposit)');
        $this->datatables->add_column('status','$1','sts_booking(status,id_booking)');
        $this->datatables->add_column('action', anchor(site_url('Booking/read/$1'),'<i class="fa fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-primary btn-xs'))." 
            ".anchor(site_url('Booking/update/$1'),'<i class="fa fa-pencil" aria-hidden="true"></i>', array('class' => 'btn btn-success btn-xs'))." 
                ".anchor(site_url('Booking/delete/$1'),'<i class="fa fa-trash" aria-hidden="true"></i>','class="btn btn-danger btn-xs" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'ec(id_booking)');
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
        $this->db->select('
            booking.id_booking,
            booking.id_pelanggan,
            booking.id_ballroom,
            booking.tgl_booking,
            booking.tgl_event,
            booking.deposit,
            booking.status,
            ballroom.nama_ballroom,
            pelanggan.nama AS nama_pelanggan,
            booking.keterangan,
            booking.total_bayar,
            ballroom.keterangan as deskripsi_ballroom,
            ballroom.kapasitas,
            pelanggan.no_ktp,
            pelanggan.alamat,
            pelanggan.tgl_lahir,
            pelanggan.no_telp,
            pelanggan.tgl_daftar
        ');
        $this->db->join('pelanggan', 'pelanggan.id_pelanggan = booking.id_pelanggan');
        $this->db->join('ballroom', 'ballroom.id_ballroom = booking.id_ballroom');
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    function get_by_date($start, $end)
    {
        return $this->db->query("
            SELECT
            booking.id_booking,
            booking.id_pelanggan,
            booking.id_ballroom,
            booking.tgl_booking,
            booking.tgl_event,
            booking.deposit,
            booking.keterangan,
            booking.total_bayar,
            booking.status,
            ballroom.nama_ballroom,
            pelanggan.nama AS nama_pelanggan,
            ballroom.keterangan,
            ballroom.kapasitas,
            pelanggan.no_ktp,
            pelanggan.alamat,
            pelanggan.tgl_lahir,
            pelanggan.no_telp,
            pelanggan.tgl_daftar
            FROM
            booking
            INNER JOIN pelanggan ON pelanggan.id_pelanggan = booking.id_pelanggan
            INNER JOIN ballroom ON ballroom.id_ballroom = booking.id_ballroom
            WHERE booking.tgl_event BETWEEN '$start' AND '$end'
            ")->result();
    } 

    function get_by_date2($start, $end)
    {
        return $this->db->query("
            SELECT
            booking.id_booking,
            booking.id_pelanggan,
            booking.id_ballroom,
            booking.tgl_booking,
            booking.tgl_event,
            booking.deposit,
            booking.keterangan,
            booking.total_bayar,
            booking.status,
            ballroom.nama_ballroom,
            pelanggan.nama AS nama_pelanggan,
            ballroom.keterangan,
            ballroom.kapasitas,
            pelanggan.no_ktp,
            pelanggan.alamat,
            pelanggan.tgl_lahir,
            pelanggan.no_telp,
            pelanggan.tgl_daftar
            FROM
            booking
            INNER JOIN pelanggan ON pelanggan.id_pelanggan = booking.id_pelanggan
            INNER JOIN ballroom ON ballroom.id_ballroom = booking.id_ballroom
            WHERE pelanggan.id_pelanggan='".$this->session->userdata('id_users')."' 
            AND booking.tgl_event BETWEEN '$start' AND '$end'
            ")->result();
    }

    function get_pelanggan($d){

        $this->db->select("pelanggan.id_pelanggan,pelanggan.nama");
        $this->db->from('pelanggan');
        $this->db->like('pelanggan.id_pelanggan',$d['term']);
        $this->db->or_like('pelanggan.nama',$d['term']);
        $this->db->or_like('pelanggan.no_ktp',$d['term']);
        $this->db->limit(10);
        return $this->db->get()->result();
    }

    function get_ballroom($d){

        $this->db->select("ballroom.id_ballroom,ballroom.nama_ballroom");
        $this->db->from('ballroom');
        $this->db->like('ballroom.id_ballroom',$d['term']);
        $this->db->or_like('ballroom.nama_ballroom',$d['term']);
        $this->db->limit(10);
        return $this->db->get()->result();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_booking', $q);
	$this->db->or_like('id_pelanggan', $q);
	$this->db->or_like('id_ballroom', $q);
	$this->db->or_like('tgl_booking', $q);
	$this->db->or_like('tgl_event', $q);
	$this->db->or_like('keterangan', $q);
	$this->db->or_like('deposit', $q);
	$this->db->or_like('total_bayar', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_booking', $q);
	$this->db->or_like('id_pelanggan', $q);
	$this->db->or_like('id_ballroom', $q);
	$this->db->or_like('tgl_booking', $q);
	$this->db->or_like('tgl_event', $q);
	$this->db->or_like('keterangan', $q);
	$this->db->or_like('deposit', $q);
	$this->db->or_like('total_bayar', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
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
	
	// generate primary key
	public function id_booking()   {
        $this->db->select('RIGHT(booking.id_booking,4) as kode', FALSE);
        //$this->db->where('field', 'value' );    
        $this->db->order_by('id_booking','DESC');    
        $this->db->limit(1);    
        $query = $this->db->get('booking'); 
        if($query->num_rows() <> 0){      
           //jika kode ternyata sudah ada.      
           $data = $query->row();      
           $kode = intval($data->kode) + 1;    
        }else {      
           //jika kode belum ada      
           $kode = 1;    
        }
        $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT);
        $kodejadi = date("ymd").$kodemax;
        return $kodejadi;  
    }

}

/* End of file Booking_model.php */
/* Location: ./application/models/Booking_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator */
/* Modified by Mohamad_Sopian Codeigniter CRUD Generator 2021-06-23 18:54:16 */
/* http://harviacode.com */