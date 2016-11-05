		
<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header with-border">

            <button class="btn pull-right btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse" style="margin-right: 5px;"><i class="fa fa-caret-down"></i></button>	
            <a id="button-edit"class="btn btn-primary btn-sm" style="margin-right: 5px;"><i class="fa fa-pencil"></i> Update</a>	  
            <a id="button-insert-transaction" class="btn btn-primary btn-sm" style="margin-right: 5px;"><i class="fa fa-plus-circle"></i> Add Transaction</a>	
            <a id="button-edit-transaction"class="btn btn-primary btn-sm disabled" style="margin-right: 5px;"><i class="fa fa-pencil"></i> Update Transaction</a>	
            <a id="button-delete-transaction"class="btn btn-primary btn-sm disabled" style="margin-right: 5px;"><i class="fa fa-trash"></i> Delete Transaction</a>
        </div>
        <div class="box-body animated fadeInUpBig" id="box-content">
            <div class="col-lg-3">
                <table id="TableEvent-guest" class="table table-bordered table-striped responsive-table">
                    <thead>
                        <tr>
                            <th>Event Name</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <input type="hidden" name="bind_id_event" id="bind_id_event"/>
            <input type="hidden" name="bind_id_guestbook" id="bind_id_guestbook"/>
            <div class='col-lg-9 col-md-12' id="data_guestbook">

            </div>
            <div class="clearfix col-lg-12"><h1>&nbsp;</h1></div>
            <div class="span6"></div>
			<div class="col-lg-3"></div>
            <div class='col-lg-9 col-md-12' id="data_transaksi">

            </div>
        </div><!-- /.box-body -->
        <div class="box-footer">

        </div>
    </div><!-- /.box -->
</section><!-- /.content -->
<script>
    $(document).ready(function() {

        var table = $('#TableEvent-guest').DataTable({
            "dom": 't',
            "responsive": true,
            "paging": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            "ScrollX": "120",
            "fnRowCallback": function(Row, Data) {
                $(Row).attr('id', Data[5]);
                return Row;
            },
            "ajax": {
                "url": "Event/getEvent",
                "type": "GET"
            },
            "fnInitComplete": function() {
                $("#bind_id_event").val($('#TableEvent-guest tr:eq(1)').attr('id'));
                $('#TableEvent-guest tr:eq(1)').addClass('selected');
                $("#data_guestbook").load("GuestBook/data_guestbook");
            }
        });
        $('#TableEvent-guest').on('click', 'tbody tr', function() {
            $('#TableEvent-guest tbody tr').removeClass('selected')
            $(this).addClass('selected')
            $('#bind_id_event').val(this.id);
            $("#data_guestbook").load("Guestbook/data_guestbook");

        });

    })
</script>