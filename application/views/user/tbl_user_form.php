<div class="page-header"><h1>INPUT DATA USER</h1></div>
<div class="row">
    <div class="col-xs-12">
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="formku">
            <table class='table table-bordered'>        
                <?php
                    if ($this->uri->segment(2) == 'update') {
                        $read = "readonly";
                    }else{
                        $read = "";
                    }
                ?>
                <tr>
                    <td width='200'>NIP/NIM/ID USER <?php echo form_error('id_users') ?></td>
                    <td><input type="text" class="form-control required" name="id_users" id="id_users" placeholder="NIP/NIM/ID USER" value="<?php echo $id_users; ?>" <?=$read?> /></td>
                </tr>
                <tr>
                    <td width='200'>Nama Lengkap <?php echo form_error('full_name') ?></td>
                    <td><input type="text" class="form-control required" name="full_name" id="full_name" placeholder="Full Name" value="<?php echo $full_name; ?>" /></td>
                </tr>
                <tr>
                    <td width='200'>Email <?php echo form_error('email') ?></td>
                    <td><input type="text" class="form-control required" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" /></td>
                </tr>
                    <?php
                        if ($this->uri->segment(2) == 'create' OR $this->uri->segment(2) == 'create_action') {
                    ?>
                        <tr>
                            <td width='200'>Password <?php echo form_error('password') ?></td>
                            <td><input type="password" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" /></td>
                        </tr>
                    <?php
                        }
                    ?>
                <tr>
                    <td width='200'>Fakultas</td>
                    <td>
                        <select class="form-control" name="kode_fak" id="kode_fak" >
                            <option value="">-Fakultas-</option>
                            <?php
                                foreach ($data_fak as $row) {
                                    echo "<option value='$row->kode_fak'";if($row->kode_fak==$kode_fak){echo "selected";} echo">$row->nama_fak</option>";
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td width='200'>Program Studi</td>
                    <td>
                        <select class="form-control" name="kode_prodi" id="prodi" >
                           <option value="">-Program Studi-</option>
                           <?php
                             if ($this->uri->segment(2) == 'update') {
                                foreach ($data_prodi as $row) {
                                    echo "<option value='$row->kode_prodi'";if($row->kode_prodi==$kode_prodi){echo "selected";} echo">$row->nama_prodi</option>";
                                }
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td width='200'>Level User <?php echo form_error('id_user_level') ?></td>
                    <td>
                        <?php echo cmb_dinamis('id_user_level', 'tbl_user_level', 'nama_level', 'id_user_level', $id_user_level,'DESC') ?>
                    </td>
                </tr>
                <tr>
                    <td width='200'>Status Aktif <?php echo form_error('is_aktif') ?></td>
                    <td>
                        <?php echo form_dropdown('is_aktif', array('y' => 'AKTIF', 'n' => 'TIDAK AKTIF'), $is_aktif, array('class' => 'form-control')); ?>                            
                    </td>
                </tr>
                <tr>
                    <td width='200'>Foto Profile <?php echo form_error('images') ?></td>
                    <td> <input type="file" name="images"></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
                        <a href="<?php echo site_url('user') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
                    </td>
                </tr>
            </table>
        </form> 
    </div>
</div>
<script type="text/javascript">
$('#kode_fak').on('change', function(){
    let getFak = $('#kode_fak').val();
    console.log(getFak);
    $.getJSON('<?=base_url()?>user/prodi_json/'+getFak+'', function (data) {
        let prodi = data.prodi;
        console.log(data);            
        let content = '';
        $.each(prodi, function (i, data) {
          content += `<option value="`+data.kode_prodi+`">`+data.nama_prodi+`</option> `;
        });
        $('#prodi').html(content);
    });
});
</script>