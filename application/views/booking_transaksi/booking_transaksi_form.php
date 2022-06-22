
<div class="page-header"><h1>Form Booking Transaksi</h1></div>
<div class="row">
    <div class="col-xs-12">
<form class="form-horizontal" action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Id Booking </label>
        <div class="col-sm-9">
            <select class="form-control" name="id_booking" id="id_booking" >
                <option value="">-Pilih Id Booking-</option>
            </select><?php echo form_error('id_booking') ?>
        </div>
    </div>   
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Nama Transaksi </label>
        <div class="col-sm-9">
            <input type="text" class="form-control" name="nama_transaksi" id="nama_transaksi" placeholder="Nama Transaksi" value="<?php echo $nama_transaksi; ?>" /><?php echo form_error('nama_transaksi') ?>
        </div>
    </div>   
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Harga </label>
        <div class="col-sm-9">
            <input type="text" class="form-control" name="harga" id="harga" placeholder="Harga" value="<?php echo $harga; ?>" /><?php echo form_error('harga') ?>
        </div>
    </div>
	 <div class="clearfix form-actions">
        <div class="col-md-offset-3 col-md-9">
            <input type="hidden" name="id_transaksi" value="<?php echo $id_transaksi; ?>" /> 
	        <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button>&nbsp; &nbsp; &nbsp;
	        <a href="<?php echo site_url('Booking_transaksi') ?>" class="btn btn-sm btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
        </div>
    </div>
</form>
    </div>
</div>