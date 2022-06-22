
<div class="page-header"><h1>Form Pelanggan</h1></div>
<div class="row">
    <div class="col-xs-12">
<form class="form-horizontal" action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="formku">   
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">No KTP </label>
        <div class="col-sm-9">
            <input type="text" class="form-control required number" name="no_ktp" id="no_ktp" placeholder="No KTP" value="<?php echo $no_ktp; ?>" minLength="16" maxlength="16" />
            <?php echo form_error('no_ktp') ?>
        </div>
    </div>   
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Nama </label>
        <div class="col-sm-9">
            <input type="text" class="form-control required" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" minLength="3" />
            <?php echo form_error('nama') ?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Alamat </label>
        <div class="col-sm-9">
            <textarea class="form-control" rows="3" name="alamat" id="alamat" placeholder="Alamat"><?php echo $alamat; ?></textarea><?php echo form_error('alamat') ?>
        </div>
    </div>   
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Tanggal Lahir </label>
        <div class="col-sm-9">
            <input type="text" class="form-control required" name="tgl_lahir" id="datepicker" placeholder="Tanggal Lahir" value="<?php echo $tgl_lahir; ?>" readonly />
            <?php echo form_error('tgl_lahir') ?>
        </div>
    </div>   
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">No Telp </label>
        <div class="col-sm-9">
            <input type="text" class="form-control number required" name="no_telp" id="no_telp" placeholder="No Telp" value="<?php echo $no_telp; ?>" minLength="11" maxlength="12" />
            <?php echo form_error('no_telp') ?>
        </div>
    </div>   
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Tanggal Daftar </label>
        <div class="col-sm-9">
            <input type="text" class="form-control" name="tgl_daftar" id="datepicker2" placeholder="Tanggal Daftar" value="<?php echo $tgl_daftar; ?>" readonly />
            <?php echo form_error('tgl_daftar') ?>
        </div>
    </div>
   <!--  <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Status </label>
        <div class="col-sm-9">
            <select class="form-control" name="status" id="status" >
                <option value="">-Pilih Status-</option>
            </select><?php echo form_error('status') ?>
        </div>
    </div> -->
	 <div class="clearfix form-actions">
        <div class="col-md-offset-3 col-md-9">
            <input type="hidden" name="id_pelanggan" value="<?php echo $id_pelanggan; ?>" /> 
	        <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button>&nbsp; &nbsp; &nbsp;
	        <a href="<?php echo site_url('Pelanggan') ?>" class="btn btn-sm btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
        </div>
    </div>
</form>
    </div>
</div>