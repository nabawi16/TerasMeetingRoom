
<div class="page-header"><h1>Detail Data Ballroom</h1></div>
<div class="row">
    <div class="col-xs-12">
        <table class="table">
	    <tr><td width="20%">Nama Ballroom</td><td width="1%">:</td><td><?=$nama_ballroom?></td></tr>
	    <tr><td width="20%">Kapasitas</td><td width="1%">:</td><td><?=$kapasitas?></td></tr>
	    <tr><td width="20%">Harga Sewa</td><td width="1%">:</td><td><?=rp($harga)?></td></tr>
	    <tr><td width="20%">Keterangan</td><td width="1%">:</td><td><?=$keterangan?></td></tr>
	    <tr><td width="20%">Status</td><td width="1%">:</td><td><?=$status?></td></tr>
	    <tr><td></td><td></td><td><a href="<?php echo site_url('Ballroom') ?>" class="btn btn-sm btn-default">Cancel</a></td></tr>
	</table>
    </div>
</div>