<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Booking_transaksi_model extends CI_Model
{

    public $table = 'booking_transaksi';
    public $id = 'id_transaksi';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id_transaksi,id_booking,nama_transaksi,harga');
        $this->datatables->from('booking_transaksi');
        //add this line for join
        //$this->datatables->join('table2', 'booking_transaksi.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('Booking_transaksi/read/$1'),'<i class="fa fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-primary btn-xs'))." 
            ".anchor(site_url('Booking_transaksi/update/$1'),'<i class="fa fa-pencil" aria-hidden="true"></i>', array('class' => 'btn btn-success btn-xs'))." 
                ".anchor(site_url('Booking_transaksi/delete/$1'),'<i class="fa fa-trash" aria-hidden="true"></i>','class="btn btn-danger btn-xs" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'ec(id_transaksi)');
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
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_transaksi', $q);
	$this->db->or_like('id_booking', $q);
	$this->db->or_like('nama_transaksi', $q);
	$this->db->or_like('harga', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_transaksi', $q);
	$this->db->or_like('id_booking', $q);
	$this->db->or_like('nama_transaksi', $q);
	$this->db->or_like('harga', $q);
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
	public function id_transaksi()   {
        $this->db->select('RIGHT(booking_transaksi.id_transaksi,4) as kode', FALSE);
        //$this->db->where('field', 'value' );    
        $this->db->order_by('id_transaksi','DESC');    
        $this->db->limit(1);    
        $query = $this->db->get('booking_transaksi'); 
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

/* End of file Booking_transaksi_model.php */
/* Location: ./application/models/Booking_transaksi_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator */
/* Modified by Mohamad_Sopian Codeigniter CRUD Generator 2021-06-23 18:44:09 */
/* http://harviacode.com */