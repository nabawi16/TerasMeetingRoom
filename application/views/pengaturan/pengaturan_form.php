
<div class="page-header"><h1>Form Pengaturan</h1></div>
<div class="row">
    <div class="col-xs-12">
<form class="form-horizontal" action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="formku">
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Header </label>
        <div class="col-sm-9">
            <input type="text" class="form-control required" name="text_header" id="text_header" placeholder="Header" value="<?php echo $text_header; ?>" /><?php echo form_error('text_header') ?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Header Small </label>
        <div class="col-sm-9">
            <input type="text" class="form-control required" name="text_header_small" id="text_header_small" placeholder="Header Small" value="<?php echo $text_header_small; ?>" /><?php echo form_error('text_header_small') ?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">About Hotel </label>
        <div class="col-sm-9">
            <textarea class="form-control required" rows="3" name="deskripsi_hotel" id="deskripsi_hotel" placeholder="About Hotel"><?php echo $deskripsi_hotel; ?></textarea><?php echo form_error('deskripsi_hotel') ?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">About Meeting Rooms </label>
        <div class="col-sm-9">
            <textarea class="form-control required" rows="3" name="deskripsi_ruang_meeting" id="deskripsi_ruang_meeting" placeholder="About Rooms "><?php echo $deskripsi_ruang_meeting; ?></textarea><?php echo form_error('deskripsi_ruang_meeting') ?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Address </label>
        <div class="col-sm-9">
            <textarea class="form-control required" rows="3" name="alamat" id="alamat" placeholder="Address"><?php echo $alamat; ?></textarea><?php echo form_error('alamat') ?>
        </div>
    </div>   
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Phone </label>
        <div class="col-sm-9">
            <input type="text" class="form-control required" name="no_telp" id="no_telp" placeholder="Phone" value="<?php echo $no_telp; ?>" /><?php echo form_error('no_telp') ?>
        </div>
    </div>   
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Fax </label>
        <div class="col-sm-9">
            <input type="text" class="form-control" name="fax" id="fax" placeholder="Fax" value="<?php echo $fax; ?>" /><?php echo form_error('fax') ?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Email </label>
        <div class="col-sm-9">
            <input type="email" class="form-control required email" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" /><?php echo form_error('email') ?>
        </div>
    </div>   
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Facebook </label>
        <div class="col-sm-9">
            <input type="text" class="form-control" name="facebook" id="facebook" placeholder="Facebook" value="<?php echo $facebook; ?>" /><?php echo form_error('facebook') ?>
        </div>
    </div>   
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Twitter </label>
        <div class="col-sm-9">
            <input type="text" class="form-control" name="twitter" id="twitter" placeholder="Twitter" value="<?php echo $twitter; ?>" /><?php echo form_error('twitter') ?>
        </div>
    </div>   
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Instagram </label>
        <div class="col-sm-9">
            <input type="text" class="form-control" name="instagram" id="instagram" placeholder="Instagram" value="<?php echo $instagram; ?>" /><?php echo form_error('instagram') ?>
        </div>
    </div>
	 <div class="clearfix form-actions">
        <div class="col-md-offset-3 col-md-9">
            <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	        <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button>&nbsp; &nbsp; &nbsp;
	        <a href="<?php echo site_url('Pengaturan') ?>" class="btn btn-sm btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
        </div>
    </div>
</form>
    </div>
</div>