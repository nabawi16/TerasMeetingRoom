
<form class="form-horizontal" action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="formku">  
    <div class="form-group">
        <div class="col-sm-9">
            <input type="radio" name="status"  class="form-check-input" value="0" <?php if($status==0){echo "checked";} ?> >
            <label class="form-check-label">Request</label>
        </div>
    </div> 
    <div class="form-group">
        <div class="col-sm-9">
            <input type="radio" name="status"  class="form-check-input" value="1" <?php if($status==1){echo "checked";} ?>>
            <label class="form-check-label">Done</label>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-9">
            <input type="radio" name="status"  class="form-check-input" value="2" <?php if($status==2){echo "checked";} ?>>
            <label class="form-check-label">Reject</label>
        </div>
    </div> 
    <div class="border-top">
        <div class="card-body">
            <input type="hidden" name="id_booking" value="<?php echo $id_booking; ?>" /> 
            <button type="submit" class="btn btn-danger"><i class="fa fa-save"></i> <?php echo $button ?></button>&nbsp; &nbsp; &nbsp;
        </div>
    </div>
</form>