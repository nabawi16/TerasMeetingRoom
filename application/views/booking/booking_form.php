
<div class="page-header"><h1>Form Booking</h1></div>
<div class="row">
    <div class="col-xs-12">
<form class="form-horizontal" action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="formku">
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Pelanggan </label>
        <div class="col-sm-9">
            <?php
                if($this->session->userdata('id_user_level') == 3){
            ?>
                <select class="form-control required" name="id_pelanggan" id="pelanggan" >
                    <option value="<?=$this->session->userdata('id_users')?>"><?=$this->session->userdata('full_name')?></option>
                </select><?php echo form_error('id_pelanggan') ?>
            <?php
                }else{
            ?>
                <select class="form-control select2 required" name="id_pelanggan" id="id_pelanggan" >
                    <option value="">-Pilih Pelanggan-</option>
                </select><?php echo form_error('id_pelanggan') ?>
            <?php
                }
            ?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Ballroom </label>
        <div class="col-sm-9">
            <select class="form-control select2 required" name="id_ballroom" id="id_ballroom" >
                <option value="">-Pilih Ballroom-</option>
            </select><?php echo form_error('id_ballroom') ?>
        </div>
    </div>   
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Tanggal Booking </label>
        <div class="col-sm-9">
            <input type="text" class="form-control required" name="tgl_booking" id="datepicker" placeholder="Tanggal Booking" value="<?php echo $tgl_booking; ?>" readonly/><?php echo form_error('tgl_booking') ?>
        </div>
    </div>   
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Tanggal Event </label>
        <div class="col-sm-9">
            <input type="text" class="form-control required" name="tgl_event" id="datepicker2" placeholder="Tanggal Event" value="<?php echo $tgl_event; ?>" readonly/><?php echo form_error('tgl_event') ?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Keterangan </label>
        <div class="col-sm-9">
            <textarea class="form-control" rows="3" name="keterangan" id="keterangan" placeholder="Keterangan"><?php echo $keterangan; ?></textarea><?php echo form_error('keterangan') ?>
        </div>
    </div>   
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Deposit </label>
        <div class="col-sm-9">
            <input type="number" class="form-control required number" name="deposit" id="deposit" placeholder="Deposit" value="<?php echo $deposit; ?>" /><?php echo form_error('deposit') ?>
        </div>
    </div>
	 <div class="clearfix form-actions">
        <div class="col-md-offset-3 col-md-9">
            <input type="hidden" name="id_booking" value="<?php echo $id_booking; ?>" /> 
	        <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button>&nbsp; &nbsp; &nbsp;
	        <a href="<?php echo site_url('Booking') ?>" class="btn btn-sm btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
        </div>
    </div>
</form>
    </div>
</div>

<link rel="stylesheet" href="<?=config_item("plugin")?>select2/select2.min.css" />
<script src="<?=config_item("plugin")?>select2/select2.min.js"></script>
<script type="text/javascript">
    $(function(){
        $("#id_pelanggan").select2({
            minimumInputLength: 1,
            allowClear: true,
            placeholder: 'Pilih Pelanggan',
            width: 'resolve',
            ajax: {
                dataType: 'json',
                url: '<?=base_url("Booking/get_pelanggan")?>',
                delay: 800,
                data: function(params) {
                    return {
                        term : params.term
                    }
                },
                processResults: function (data, page) {
                    return {
                        results: data
                    };
                },
            }
        });

        $("#id_ballroom").select2({
            minimumInputLength: 1,
            allowClear: true,
            placeholder: 'Pilih Ballroom',
            width: 'resolve',
            ajax: {
                dataType: 'json',
                url: '<?=base_url("Booking/get_ballroom")?>',
                delay: 800,
                data: function(params) {
                    return {
                        term : params.term
                    }
                },
                processResults: function (data, page) {
                    return {
                        results: data
                    };
                },
            }
        });
    });
</script>