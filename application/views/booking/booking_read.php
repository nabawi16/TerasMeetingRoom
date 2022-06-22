
<div class="page-header"><h1>Detail Data Booking</h1></div>
<div class="row">
    <div class="col-xs-12">
        <table class="table">
		    <tr bgcolor="grey">
		    	<td colspan="3"><b>Data Booking</b></td>
		    	<td colspan="3"><b>Data Pelanggan</b></td>
		    </tr>
		    <tr>
		    	<td width="15%">Ballroom</td>
		    	<td width="1%">:</td>
		    	<td><?=$nama_ballroom?> (Kapasitas <?=$kapasitas?>)</td>
		    	<td width="15%">Nomor KTP</td>
		    	<td width="1%">:</td>
		    	<td><?=$no_ktp?></td>
		    </tr>
		    <tr>
		    	<td width="15%">Tanggal Booking</td>
		    	<td width="1%">:</td>
		    	<td><?=date_indo($tgl_booking)?></td>
		    	<td width="15%">Nama Pelanggan</td>
		    	<td width="1%">:</td>
		    	<td><?=$nama_pelanggan?></td>
		    </tr>
		    <tr>
		    	<td width="15%">Tanggal Event</td>
		    	<td width="1%">:</td>
		    	<td><?=date_indo($tgl_event)?></td>
		    	<td width="15%">Alamat</td>
		    	<td width="1%">:</td>
		    	<td><?=$alamat?></td>
		    </tr>
		    <tr>
		    	<td width="15%">Deposit</td>
		    	<td width="1%">:</td>
		    	<td>Rp. <?=rp($deposit)?></td>
		    	<td width="15%">Tanggal Lahir</td>
		    	<td width="1%">:</td>
		    	<td><?=date_indo($tgl_lahir)?></td>
		    </tr>
		    <tr>
		    	<td width="15%">Total Bayar</td>
		    	<td width="1%">:</td>
		    	<td>Rp. <?=rp($total_bayar)?></td>
		    	<td width="15%">No Telp</td>
		    	<td width="1%">:</td>
		    	<td><?=$no_telp?></td>
		    </tr>
		    <tr>
		    	<td width="15%">Keterangan</td>
		    	<td width="1%">:</td>
		    	<td><?=$keterangan?></td>
		    	<td width="15%"></td>
		    	<td width="1%"></td>
		    	<td></td>
		    </tr>
		</table>


    </div>
</div>

<div class="page-header"><h1>Fasilitas Tambahan</h1></div>
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

			if($this->session->userdata('id_user_level') <= 2){
		?>
    	<form class="" action="<?=base_url("Booking_transaksi/create_action")?>" method="post" enctype="multipart/form-data" id="formku">   
		    <div class="form-group col-sm-3">
				<input type="text" class="form-control required" name="nama_transaksi" id="nama_transaksi" placeholder="Nama Transaksi" value="<?php echo $nama_transaksi; ?>" />
		    </div> 
		    <div class="form-group col-sm-3">
				<input type="number" class="form-control required number" name="harga" id="harga" placeholder="Harga" value="<?php echo $harga; ?>" />
		    </div> 
		    <div class="form-group col-sm-3">
		        <input type="hidden" name="id_booking" value="<?php echo $id_booking; ?>" /> 
		        <input type="hidden" name="id_transaksi" value="<?php echo $id_transaksi; ?>" /> 
			        <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-floppy-o"></i> Simpan</button>
		    </div>
		</form>
		<?php
			}
		?>

        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="3%">No</th>
				    <th>Nama Transaksi</th>
				    <th>Harga</th>
				    <th width="5%">Action</th>
                </tr>
            </thead>
	    	<tbody>
	    		<?php
	    			$no=1;
	    			foreach ($booking_transaksi as $r) {
	    				echo "
	    				<tr>
	    					<td>$no</td>
	    					<td>$r->nama_transaksi</td>
	    					<td>Rp. ".rp($r->harga)."</td>
	    					<td align='center'>";
	    					if($this->session->userdata('id_user_level') <= 2){
	    						echo "<a href='".base_url("Booking_transaksi/delete/".ec($r->id_transaksi))."' class='btn btn-sm btn-danger' onclick=\"javasciprt: return confirm('Are You Sure ?')\" ><i class='fa fa-floppy-o'></i></a>";
	    					}
	    				echo "
	    					</td>
	    				</tr>
	    				";
	    				$no++;
	    			}
	    		?>
	    	</tbody>
        </table>
	</div>
</div>