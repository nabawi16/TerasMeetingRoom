
<div class="page-header"><h1>Form Ballroom</h1></div>
<div class="row">
    <div class="col-xs-12">
<form class="form-horizontal" action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="formku">   
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Nama Ballroom </label>
        <div class="col-sm-9">
            <input type="text" class="form-control required" name="nama_ballroom" id="nama_ballroom" placeholder="Nama Ballroom" value="<?php echo $nama_ballroom; ?>" /><?php echo form_error('nama_ballroom') ?>
        </div>
    </div>   
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Kapasitas </label>
        <div class="col-sm-9">
            <input type="number" class="form-control required number" name="kapasitas" id="kapasitas" placeholder="Kapasitas" value="<?php echo $kapasitas; ?>" /><?php echo form_error('kapasitas') ?>
        </div>
    </div>   
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Harga Sewa (Rp)</label>
        <div class="col-sm-9">
            <input type="number" class="form-control required number" name="harga" id="harga" placeholder="Harga Sewa" value="<?php echo $harga; ?>" /><?php echo form_error('harga') ?>
        </div>
    </div> 
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Keterangan </label>
        <div class="col-sm-9">
            <textarea class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan" rows="10"><?php echo $keterangan; ?></textarea>
            <?php echo form_error('keterangan') ?>
        </div>
    </div>
    <!-- <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Status </label>
        <div class="col-sm-9">
            <select class="form-control" name="status" id="status" >
                <option value="">-Pilih Status-</option>
            </select><?php echo form_error('status') ?>
        </div>
    </div> -->
	 <div class="clearfix form-actions">
        <div class="col-md-offset-3 col-md-9">
            <input type="hidden" name="id_ballroom" value="<?php echo $id_ballroom; ?>" /> 
	        <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button>&nbsp; &nbsp; &nbsp;
	        <a href="<?php echo site_url('Ballroom') ?>" class="btn btn-sm btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
        </div>
    </div>
</form>
    </div>
</div>