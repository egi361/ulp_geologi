<table id="TableGuest" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Visit Time</th>
            <th>Interesting_Product</th>
            <th>Institute</th>
            <th>Institution_Address</th>
            <th>City</th>
            <th>Province</th>
            <th>Division</th>
            <th>Institution_Phone</th>
            <th>Institution_Email</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table> 

<script>
    $(document).ready(function() {
        var table = $('#TableGuest').DataTable({
            "paging": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "ScrollX": "120",
            "responsive": true,
            "fnRowCallback": function(Row, Data) {
                $(Row).attr('id', Data[13]);
                $(Row).attr('class', "satisfaction");
                return Row;
            },
            "ajax": {
                "url": "Guest/getDataGuest",
                "type": "GET"
            },
			
        });
        $("#TableGuest").on("dblclick", "tbody tr", function() {
            
            $("#modalRender").load("<?= base_url() ?>Guest/satisfaction/"+this.id);
            $("#myModal").modal("show");
        })
    })
</script>