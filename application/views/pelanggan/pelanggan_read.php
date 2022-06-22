
<div class="page-header"><h1>Detail Data Pelanggan</h1></div>
<div class="row">
    <div class="col-xs-12">
        <table class="table">
		    <tr>
		    	<td width="25%">Nomor KTP</td>
		    	<td width="1%">:</td>
		    	<td><?=$no_ktp?></td>
		    </tr>
		    <tr>
		    	<td width="25%">Nama pelanggan</td>
		    	<td width="1%">:</td>
		    	<td><?=$nama?></td>
		    </tr>
		    <tr>
		    	<td width="25%">Alamat</td>
		    	<td width="1%">:</td>
		    	<td><?=$alamat?></td>
		    </tr>
		    <tr>
		    	<td width="25%">Tanggal Lahir</td>
		    	<td width="1%">:</td>
		    	<td><?=date_indo($tgl_lahir)?></td>
		    </tr>
		    <tr>
		    	<td width="25%">No Telp</td>
		    	<td width="1%">:</td>
		    	<td><?=$no_telp?></td>
		    </tr>
		    <tr>
		    	<td width="25%">Tanggal Daftar</td>
		    	<td width="1%">:</td>
		    	<td><?=date_indo($tgl_daftar)?></td>
		    </tr>
		    <!-- <tr>
		    	<td width="25%">Status</td>
		    	<td width="1%">:</td>
		    	<td><?=$status?></td>
		    </tr> -->
		    <tr>
		    	<td></td>
		    	<td></td>
		    	<td>
		    		<a href="<?php echo site_url('Pelanggan') ?>" class="btn btn-sm btn-default">Cancel</a>
		    	</td>
		    </tr>
		</table>
    </div>
</div>