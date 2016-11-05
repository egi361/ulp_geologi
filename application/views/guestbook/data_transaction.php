
<div class="table-responsive">
    <table id="Table-transaction" cellspacing="0" class="table dataTable table-bordered table-striped table-condensed">
        <thead>
            <tr>
                <th>Item</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total Price</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<script>
$(document).ready(function() {
    var table = $('#Table-transaction').DataTable({
        "dom": "T<'clear'><'col-md-4'l><'col-md-4'f>t<'col-md-6'i><'col-md-6'p>",
        "paging": true,
        "responsive": true,
        "ordering": true,
        "info": true,
        // "width": '100%',
        "autoWidth": false,
        "ScrollX": "120",
        "fnRowCallback": function(Row, Data) {

            $(Row).attr('id', Data[4]);
            return Row;
        },
        "ajax": {
            "url": "guestbook/getDataTransaction",
            "type": "GET",
            "data": function(d) {
                d.id_guestbook = $("#bind_id_guestbook").val();
            }
        },
        "tableTools": {
            "sSwfPath": "<?= base_url() ?>theme/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf"
        },
    });
    $('#Table-transaction').on('click', 'tbody tr', function() {
        if ($(this).hasClass('selected')) {
            $(this).removeClass('selected')
            $('#button-edit-transaction').addClass('disabled')
            $('#button-delete-transaction').addClass('disabled')
        }
        else {
            $('#Table-transaction tbody tr').removeClass('selected')
            $(this).addClass('selected')
            $('#button-edit-transaction').removeClass('disabled')
            $('#button-delete-transaction').removeClass('disabled')
        }
    })

    $("#button-edit-transaction").click(function() {

        var id = $("#Table-transaction .selected").attr('id')
        if (typeof id == 'undefined') {
            alert('Please Select One Data to Edit')
        }
        else {
            $('#button-edit-transaction').addClass('disabled');
            document.location.hash = "guestbook/editTransaction/" + id;
        }
    })
    $("#button-delete-transaction").click(function() {

        var id = $("#Table-transaction .selected").attr('id')
        if (typeof id == 'undefined') {
            alert('Please Select One Data to Edit')
        }
        else {
            if (!confirm('Are You Sure Want to Delete This Data?')) {
                return false;
            }
            else {
                $('#button-delete').addClass('disabled');
                document.location.hash = "GuestBook/deleteTransaction/" + id;
            }
        }
    })
	});
</script>