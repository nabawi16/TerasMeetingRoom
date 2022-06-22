
<div class="page-header"><h1>Dashboard </h1></div>
<div class="content-wrapper">
    <section class="content">
	<?php
        if($this->session->userdata('id_user_level') != 3){
    ?>
	<div class="row">
		<div class="col-md-3 col-sm-6 col-xs-12">
    		<div class="infobox infobox-blue infobox-big infobox-dark">
				<div class="infobox-icon">
					<i class="ace-icon fa fa-users"></i>
				</div>
				<div class="infobox-data">
					 <?php 
		                  $query=$this->db->query("SELECT * FROM pelanggan");
		                  $jml=$query->num_rows();
		              ?>
					<span class="infobox-data-number">Pelanggan</span>
					<div class="infobox-content"><?php echo $jml;?></div>
				</div>
			</div>
		</div>
		<div class="col-md-3 col-sm-8 col-xs-12">
			<div class="infobox infobox-red infobox-big infobox-dark">
				<div class="infobox-icon">
					<i class="ace-icon fa fa-home"></i>
				</div>
				<div class="infobox-data">
					<?php 
						$query=$this->db->query("SELECT * FROM ballroom");
						$jml=$query->num_rows();
		            ?>
					<span class="infobox-data-number">Ballroom</span>
					<div class="infobox-content"><?php echo $jml;?></div>
				</div>
			</div>
		</div>
		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="infobox infobox-green infobox-big infobox-dark">
				<div class="infobox-icon">
					<i class="ace-icon fa fa-refresh"></i>
				</div>
				<div class="infobox-data">
					<?php 
						$query=$this->db->query("SELECT * FROM booking");
                    	$jml=$query->num_rows();
		            ?>
					<span class="infobox-data-number">Booking</span>
					<div class="infobox-content"><?php echo $jml;?></div>
				</div>
			</div>
		</div>
		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="infobox infobox-orange infobox-big infobox-dark">
				<div class="infobox-icon">
					<i class="ace-icon fa fa-check"></i>
				</div>
				<div class="infobox-data">
					 <?php 
		                  	$query=$this->db->query("SELECT * FROM booking WHERE status='1'");
							$jml=$query->num_rows();
		              ?>
					<span class="infobox-data-number">Booking Done</span>
					<div class="infobox-content"><?php echo $jml;?></div>
				</div>
			</div>
		</div>
	</div>
	<hr>
	<?php
       }
    ?>
	<h1 align="center">
		SELAMAT DATANG DI TERAS MEETING ROOM<BR>
		SILAHKAN MELAKUKAN TRANSAKSI PADA MENU DI SAMPING
	</h1>
    </section>
</div>