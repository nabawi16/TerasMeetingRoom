
<div class="page-header"><h1>Tampilkan Jadwal</h1></div>
<div class="row">
    <div class="col-xs-12">
    	<?php
			if(!empty($this->session->flashdata('flash_message1'))){
				echo"<div class='alert alert-danger alert-dismissable'>
						<i class='fa fa-info-circle'></i>
						<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
						<b>Failed!</b> ".$this->session->flashdata('flash_message1').".
				</div>";
			}elseif(!empty($this->session->flashdata('flash_message2'))){                    
				echo"<div class='alert alert-success alert-dismissable'>
						<i class='fa fa-info-circle'></i>
						<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
						<b>Success!</b> ".$this->session->flashdata('flash_message2').".
				</div>";
			}                           
		?>
    	<form class="" action="<?=base_url("Jadwal")?>" method="get" enctype="multipart/form-data" id="formku">   
		    <div class="form-group col-sm-3">
				<input type="text" class="form-control required" name="tgl_awal" id="datepicker" placeholder="Tanggal Awal" value="<?php echo $tgl_awal; ?>" />
		    </div> 
		    <div class="form-group col-sm-3">
				<input type="text" class="form-control required" name="tgl_akhir" id="datepicker2" placeholder="Tanggal Akhir" value="<?php echo $tgl_akhir; ?>" />
		    </div> 
		    <div class="form-group col-sm-3">
			        <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-search"></i> Cari</button>
		    </div>
		</form>

	</div>
	<div class="col-xs-12">
		<?php
			foreach ($jadwal as $r) {
				if($r->status == 0){
					echo '
					<div class="col-xs-12 col-sm-3 widget-container-col ui-sortable" >
						<div class="widget-box ui-sortable-handle widget-color-blue" >
							<div class="widget-header">
								<h5 class="widget-title smaller">'.$r->nama_ballroom.'</h5>
							</div>
							<div class="widget-body">
								<div class="widget-main padding-6">
									<div class="alert alert-info">
									<li>Pelanggan : '.$r->nama_pelanggan.'</li>
									<li>Tgl. Booking : '.date_indo($r->tgl_event).'</li>
									<li>Tgl. Event : '.date_indo($r->tgl_event).'</li>
									</div>
									<a href="'.base_url("Booking/read/".ec($r->id_booking)).'" class="btn btn-sm btn-info"><i class="fa fa-eye"></i> Detail Booking</a>
								</div>
							</div>
						</div>
					</div>
					';
				}elseif ($r->status == 1) {
					echo '
					<div class="col-xs-12 col-sm-3 widget-container-col ui-sortable" >
						<div class="widget-box ui-sortable-handle widget-color-green" >
							<div class="widget-header">
								<h5 class="widget-title smaller">'.$r->nama_ballroom.'</h5>
							</div>
							<div class="widget-body">
								<div class="widget-main padding-6">
									<div class="alert alert-success">
									<li>Pelanggan : '.$r->nama_pelanggan.'</li>
									<li>Tgl. Booking : '.date_indo($r->tgl_event).'</li>
									<li>Tgl. Event : '.date_indo($r->tgl_event).'</li>
									</div>
									<a href="'.base_url("Booking/read/".ec($r->id_booking)).'" class="btn btn-sm btn-success"><i class="fa fa-eye"></i> Detail Booking</a>
								</div>
							</div>
						</div>
					</div>
					';
				}elseif ($r->status == 2) {
					echo '
					<div class="col-xs-12 col-sm-3 widget-container-col ui-sortable" >
						<div class="widget-box ui-sortable-handle widget-color-red2" >
							<div class="widget-header">
								<h5 class="widget-title smaller">'.$r->nama_ballroom.'</h5>
							</div>
							<div class="widget-body">
								<div class="widget-main padding-6">
									<div class="alert alert-danger">
									<li>Pelanggan : '.$r->nama_pelanggan.'</li>
									<li>Tgl. Booking : '.date_indo($r->tgl_event).'</li>
									<li>Tgl. Event : '.date_indo($r->tgl_event).'</li>
									</div>
									<a href="'.base_url("Booking/read/".ec($r->id_booking)).'" class="btn btn-sm btn-danger"><i class="fa fa-eye"></i> Detail Booking</a>
								</div>
							</div>
						</div>
					</div>
					';
				}
				
			}
		?>
	        

			

	</div>
</div>