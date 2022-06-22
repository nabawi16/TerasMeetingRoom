<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pelanggan_model extends CI_Model
{

    public $table = 'pelanggan';
    public $id = 'id_pelanggan';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id_pelanggan,no_ktp,nama,alamat,tgl_lahir,no_telp,tgl_daftar,status');
        $this->datatables->from('pelanggan');
        //add this line for join
        //$this->datatables->join('table2', 'pelanggan.field = table2.field');
         $this->datatables->add_column('tgl_daftar','$1','date_indo(tgl_daftar)');
        $this->datatables->add_column('action', anchor(site_url('Pelanggan/read/$1'),'<i class="fa fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-primary btn-xs'))." 
            ".anchor(site_url('Pelanggan/update/$1'),'<i class="fa fa-pencil" aria-hidden="true"></i>', array('class' => 'btn btn-success btn-xs'))." 
                ".anchor(site_url('Pelanggan/delete/$1'),'<i class="fa fa-trash" aria-hidden="true"></i>','class="btn btn-danger btn-xs" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'ec(id_pelanggan)');
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
        $this->db->like('id_pelanggan', $q);
	$this->db->or_like('no_ktp', $q);
	$this->db->or_like('nama', $q);
	$this->db->or_like('alamat', $q);
	$this->db->or_like('tgl_lahir', $q);
	$this->db->or_like('no_telp', $q);
	$this->db->or_like('tgl_daftar', $q);
	$this->db->or_like('status', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_pelanggan', $q);
	$this->db->or_like('no_ktp', $q);
	$this->db->or_like('nama', $q);
	$this->db->or_like('alamat', $q);
	$this->db->or_like('tgl_lahir', $q);
	$this->db->or_like('no_telp', $q);
	$this->db->or_like('tgl_daftar', $q);
	$this->db->or_like('status', $q);
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
	public function id_pelanggan()   {
        $this->db->select('RIGHT(pelanggan.id_pelanggan,4) as kode', FALSE);
        //$this->db->where('field', 'value' );    
        $this->db->order_by('id_pelanggan','DESC');    
        $this->db->limit(1);    
        $query = $this->db->get('pelanggan'); 
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

/* End of file Pelanggan_model.php */
/* Location: ./application/models/Pelanggan_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator */
/* Modified by Mohamad_Sopian Codeigniter CRUD Generator 2021-06-23 18:44:55 */
/* http://harviacode.com */