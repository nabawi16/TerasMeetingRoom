
<div class="page-header"><h1>Kelola Data Booking</h1></div>
<div class="row">
    <div class="col-xs-12">
    <div style="padding-bottom: 10px;">
    <?php echo anchor(site_url('Booking/create'), '<i class="fa fa-plus" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm"'); ?>
	<?php //echo anchor(site_url('Booking/excel'), '<i class="fa fa-file-excel-o" aria-hidden="true"></i> Export Ms Excel', 'class="btn btn-success btn-sm"'); ?>
	<?php //echo anchor(site_url('Booking/pdf'), '<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Export PDF', 'target="_blank" class="btn btn-warning btn-sm"'); ?></div>
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
		?>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="5%">No</th>
				    <th>Pelanggan</th>
				    <th>Ballroom</th>
				    <th>Tanggal Booking</th>
                    <th>Tanggal Event</th>
				    <th>Deposit (Rp)</th>
                    <th>Status</th>
				    <th width="10%">Action</th>
                </tr>
            </thead>
	    
        </table>
    </div>
</div>

<div id="form-modal" class="modal fade in" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="smaller lighter blue no-margin">Update Status</h3>
            </div>
            <div class="modal-body">
            </div>
        </div>
    </div>
</div>

        <script src="<?=config_item("plugin")?>datatables/jquery.dataTables.js"></script>
        <script src="<?=config_item("plugin")?>datatables/dataTables.bootstrap.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
                {
                    return {
                        "iStart": oSettings._iDisplayStart,
                        "iEnd": oSettings.fnDisplayEnd(),
                        "iLength": oSettings._iDisplayLength,
                        "iTotal": oSettings.fnRecordsTotal(),
                        "iFilteredTotal": oSettings.fnRecordsDisplay(),
                        "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                        "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
                    };
                };

                var t = $("#mytable").dataTable({
                    initComplete: function() {
                        var api = this.api();
                        $('#mytable_filter input')
                                .off('.DT')
                                .on('keyup.DT', function(e) {
                                    if (e.keyCode == 13) {
                                        api.search(this.value).draw();
                            }
                        });
                    },
                    oLanguage: {
                        sProcessing: "loading..."
                    },
                    processing: true,
                    serverSide: true,
                    ajax: {"url": "Booking/json", "type": "POST"},
                    columns: [
                        {
                            "data": "id_booking",
                            "orderable": false
                        },{"data": "nama_pelanggan"},
                        {"data": "nama_ballroom"},
                        {"data": "tgl_booking"},
                        {"data": "tgl_event"},
                        {"data": "deposit","className" : "text-center"},
                        {"data": "status","className" : "text-center"},
                        {
                            "data" : "action",
                            "orderable": false,
                            "className" : "text-center"
                        }
                    ],
                    order: [[0, 'desc']],
                    rowCallback: function(row, data, iDisplayIndex) {
                        var info = this.fnPagingInfo();
                        var page = info.iPage;
                        var length = info.iLength;
                        var index = page * length + (iDisplayIndex + 1);
                        $('td:eq(0)', row).html(index);
                    }
                });
            });

    $(document).on('click','.update_status',function(e){
        e.preventDefault();
        $(".modal-body").html('');
        $("#form-modal").modal('show');
        $.post('<?=base_url("Booking/update_status/")?>',
            {
                id:$(this).attr('data-id')
            },
            function(html){
                $(".modal-body").html(html);
            }   
        );
    });
        </script>