<?php
function kelamin($id){
    if($id=="L"){
        $value = "Laki-Laki";
    }elseif ($id=="P") {
        $value = "Perempuan";
    }
    return $value;  
}

function sts_booking($sts,$id){
    $ci = get_instance();
    if($ci->session->userdata('id_user_level') <= 2){
        if($sts==0){
            $value ='<button type="button" data-id="'.$id.'" class="update_status btn btn-primary btn-xs ">
                      Request
                    </button>';
        }elseif ($sts==1) {
            $value ='<button type="button" data-id="'.$id.'" class="update_status btn btn-success btn-xs ">
                      Done
                    </button>';
        }elseif ($sts==2) {
            $value ='<button type="button" data-id="'.$id.'" class="update_status btn btn-danger btn-xs ">
                      Reject
                    </button>';
        }
    }else{
        if($sts==0){
            $value = '<span class="label label-sm label-primary">Request</span>';
        }elseif ($sts==1) {
            $value = '<span class="label label-sm label-success">Done</span>';
        }elseif ($sts==2) {
            $value = '<span class="label label-sm label-danger">Reject</span>';
        }
    }
    return $value;  
}

function sts_aktif($id){
    $ci = get_instance();
    $row = $ci->db->get_where('m_status_mhs',array('kode_status' => $id, ))->row();
    return $row->status;  
}