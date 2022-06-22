
<div class="page-header"><h1>Kelola Data Pengaturan</h1></div>
<div class="row">
    <div class="col-xs-12">
    <div style="padding-bottom: 10px;">
    <?php echo anchor(site_url('Pengaturan/create'), '<i class="fa fa-plus" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm"'); ?></div>
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
                    <th width="7%">No</th>
				    <th>Alamat</th>
				    <th>No Telp</th>
				    <th>Fax</th>
				    <th>Email</th>
				    <th>Facebook</th>
				    <th>Twitter</th>
				    <th>Instagram</th>
				    <th width="13%">Action</th>
                </tr>
            </thead>
	    
        </table>
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
                    ajax: {"url": "Pengaturan/json", "type": "POST"},
                    columns: [
                        {
                            "data": "id",
                            "orderable": false
                        },{"data": "alamat"},{"data": "no_telp"},{"data": "fax"},{"data": "email"},{"data": "facebook"},{"data": "twitter"},{"data": "instagram"},
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
        </script>