<ul class="nav nav-list">
	<?php
        echo "<li class=''>";
        echo anchor("Dashboard","<i class='menu-icon fa fa-dashboard'></i> <span class='menu-text'>Dashboard</span>");
        echo "<b class='arrow'></b></li>";
        // chek settingan tampilan menu
        $setting = $this->db->get_where('tbl_setting',array('id_setting'=>1))->row_array();
        if($setting['value']=='ya'){
            // cari level user
            $id_user_level = $this->session->userdata('id_user_level');
            $sql_menu = "SELECT * 
						FROM tbl_menu 
						WHERE id_menu in(select id_menu from tbl_hak_akses where id_user_level=$id_user_level) and is_main_menu=0 and is_aktif='y'";
        }else{
            $sql_menu = "select * from tbl_menu where is_aktif='y' and is_main_menu=0";
        }
        $main_menu = $this->db->query($sql_menu)->result();
		foreach ($main_menu as $menu){
            // chek is have sub menu
            $ceksub = $this->db->query("SELECT is_main_menu FROM tbl_menu WHERE url='".$this->uri->segment(1)."' ")->result();
            $this->db->where('is_main_menu',$menu->id_menu);
            $this->db->where('is_aktif','y');
            $submenu = $this->db->get('tbl_menu');
            if($submenu->num_rows()>0){
                // display sub menu
                $active = "";
                foreach ($ceksub as $ceks) {
                     if($ceks->is_main_menu == $menu->id_menu){
                        $active = "active open";
                    }else{
                        $active = "";
                    }
                }               
                echo "<li class='$active'>
                        <a href='#' class='dropdown-toggle'>
                            <i class='menu-icon $menu->icon'></i> 
							<span class='menu-text'>".ucwords($menu->title)."</span>
							<b class='arrow fa fa-angle-down'></b>
                        </a>						
                        <ul class='submenu'>";
                        foreach ($submenu->result() as $sub){                            
                            if($sub->url == $this->uri->segment(1)){
                                $actives = "active";
                            }else{
                                $actives = "";
                            }
                            echo "<li class='$actives'>".anchor($sub->url,"<i class='menu-icon fa fa-caret-right'></i> ".ucwords($sub->title))."<b class='arrow'></b></li>"; 
                        }
                        echo" </ul>
                    </li>";
            }else{
                if($menu->url == $this->uri->segment(1)){
                    $active = "active";
                }else{
                    $active = "";
                }
                // display main menu
                echo "<li class='$active'>";
                echo anchor($menu->url,"<i class='menu-icon ".$menu->icon."'></i> <span class='menu-text'>".ucwords($menu->title)."</span>");
                echo "<b class='arrow'></b></li>";
            }
        }
        echo "<li class=''>";
        echo anchor(base_url('auth/logout'),"<i class='menu-icon fa fa-sign-out'></i> <span class='menu-text'>".ucwords('Logout')."</span>");
        echo "<b class='arrow'></b></li>";
	?>
</ul>
<!-- /.sidebar -->