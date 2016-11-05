
					<div class="table-responsive">
                    <table id="Table-guest-book" cellspacing="0" class="table dataTable table-bordered table-striped table-condensed">
                    <thead>
					<tr>
                        <th>Name</th>
						<th>Phone</th>
						
						<th>Institute</th>
						<th>Visit_Time</th>
						<th>Satisfaction</th>
						<th>Interesting_Product</th>
						<th>Description</th>
						<th>Visit_Time_out</th>
						<th>Institution_Address</th>
						<th>City</th>
						<th>Province</th>
						<th>Division</th>
						<th>Email</th>
						<th>Institution_Phone</th>
						<th>Institution_Email</th>
                    </tr>
                    </thead>
                    <tbody>
					</tbody>
					</table>
					</div>
					
<script>
$(document).ready(function() {
										var table=$('#Table-guest-book').DataTable({
													  "dom":"T<'clear'><'col-md-4'l><'col-md-4'f>t<'col-md-6'i><'col-md-6'p>",
													  "paging": true,
													  "responsive": true,
													  "ordering": true,
													  "info": true,
													  // "width": '100%',
													  "autoWidth": false,
													  "ScrollX":"120",
													  "fnRowCallback":function(Row,Data){
																	  
																	  $(Row).attr('id',Data[16]);
																	  return Row;
													  },
													  "ajax":{
																"url":"GuestBook/getDataGuest",
																"type":"GET",
																"data":function(d){
																		d.id_event=$("#bind_id_event").val();
																}
																},
													  "tableTools":{
																	"sSwfPath":"<?=base_url()?>theme/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf"
																   },
													   "fnInitComplete":function(){
																					  $("#bind_id_guestbook").val($('#Table-guest-book tr:eq(1)').attr('id'));
																					  if($("#bind_id_guestbook").val()!=="" && typeof $("#bind_id_guestbook").val()!=="undefined"){
																					  $("#button-insert-transaction").attr('href','#GuestBook/insertTransaction/'+$("#bind_id_guestbook").val());
																					  }
																					  else{
																					  $("#button-insert-transaction").attr('href','#GuestBook');
																					  }
																					  $('#Table-guest-book tr:eq(1)').addClass('selected');
																					  $("#data_transaksi").load("Guestbook/data_transaction");
																					  }
													});
$('#Table-guest-book').on('click','tbody tr',function(){
		$('#Table-guest-book tbody tr').removeClass('selected')
		$(this).addClass('selected')
		$('#button-edit').removeClass('disabled')
		$('#button-delete').removeClass('disabled')
		if(this.id!=="" && typeof this.id!=="undefined"){
		$("#bind_id_guestbook").val(this.id);
		$("#button-insert-transaction").attr('href','#GuestBook/insertTransaction/'+this.id)
		}
		$("#data_transaksi").load("Guestbook/data_transaction");
	
})

$("#button-edit").click(function(){

	var id=$("#Table-guest-book .selected").attr('id')
	if(typeof id=='undefined'){
	alert('Please Select One Data to Edit')
	}
	else{
	$('#button-edit').addClass('disabled');
	document.location.hash="guestbook/edit/"+id;
	}
})
})
</script>