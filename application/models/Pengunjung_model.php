<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pengunjung_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function set_pengunjung($user_ip){
        $hsl=$this->db->query("INSERT INTO tbl_pengunjung (pengunjung_ip) VALUES ('$user_ip')");
        return $hsl;
    }

    function statistik_pengujung(){
        $query = $this->db->query("SELECT 
                                    DATE_FORMAT(pengunjung_tanggal,'%d') AS tgl,
                                    COUNT(pengunjung_ip) AS jumlah 
                                    FROM tbl_pengunjung 
                                    WHERE MONTH(pengunjung_tanggal)=MONTH(CURDATE()) 
                                    GROUP BY DATE(pengunjung_tanggal)");

        // $query = $this->db->query("SELECT
        //                                 to_char( pengunjung_tanggal, 'DD') as tgl,
        //                                 COUNT(pengunjung_ip) AS jumlah 
        //                             FROM
        //                                 tbl_pengunjung 
        //                             WHERE
        //                                 to_char( pengunjung_tanggal, 'MM') = to_char( NOW(), 'MM')
        //                             GROUP BY    pengunjung_tanggal");
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }

    function simpan_user_agent($user_ip,$agent){
        $pengunjung_tanggal = date("Y-m-d H:i:s");
        $hsl=$this->db->query("INSERT INTO tbl_pengunjung (pengunjung_tanggal,pengunjung_ip,pengunjung_perangkat) VALUES('$pengunjung_tanggal','$user_ip','$agent')");
        return $hsl;
    }

    function cek_ip($user_ip){
        $hsl=$this->db->query("SELECT * FROM tbl_pengunjung WHERE pengunjung_ip='$user_ip' AND DATE(pengunjung_tanggal) = CURRENT_DATE;");
        return $hsl;
    }

}
