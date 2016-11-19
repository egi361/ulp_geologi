<section class="content">
    <div class="box" >
        <div class="box-header with-border">
            <button class="btn pull-right btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse" style="margin-right: 5px;"><i class="fa fa-caret-down"></i></button>    
            <?php
			if($this->session->userdata('role') != 12){
			?>
			<a href="#UsulanKegiatan/insert"class="btn btn-primary btn-sm" style="margin-right: 5px;"><i class="fa fa-plus-circle"></i> Add</a>
            <a id="button-edit"class="btn btn-primary btn-sm disabled" style="margin-right: 5px;"><i class="fa fa-pencil"></i> Update</a> 
            <a id="button-delete"class="btn btn-primary btn-sm disabled" style="margin-right: 5px;"><i class="fa fa-trash"></i> Delete</a>
			<?php
			} else {
			?>
			<a id="button-approve"class="btn btn-primary btn-sm disabled" style="margin-right: 5px;"><i class="fa fa-pencil"></i> Setujui</a>
			<a id="button-denied"class="btn btn-primary btn-sm disabled" style="margin-right: 5px;"><i class="fa fa-pencil"></i> Batalkan</a>				
			<?php
			}
			?>
        </div><!-- /.box-header -->
        <!-- form start -->

        <div class="box-body animated fadeInUpBig" id="box-content">
            <table id="TableUsulan" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Kode Usulan Kegiatan</th>
                <th>Unit Satuan Kerja</th>
                <th>Tanggal Usulan</th>
                <th>Nama Kegiatan</th>
                <th>Pagu Anggaran</th>
                <th>HPS</th>
                <th>Status Kegiatan</th>
                <th>Keterangan</th>
                <th>Jenis Kegiatan</th>
                <th>Jenis Anggaran</th>
                <th>Jenis Belanja</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
            </table>
        </div><!-- /.box-body -->
        <div class="box-footer">

       </div>
      </div><!-- /.box -->
</section><!-- /.content -->
<script>
$(document).ready(function(){
    var table=$('#TableUsulan').DataTable({
      "paging": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "ScrollX":"120",
      "fnRowCallback":function(Row,Data){
                      $(Row).attr('id',Data[11]);
                      return Row;
      },
      "ajax":{
                "url":"UsulanKegiatan/get",
                "type":"GET"
                }
    }); 
    $('#TableUsulan').on('click','tbody tr',function(){
        if( $(this).hasClass('selected') ){
            $(this).removeClass('selected')
            $('#button-edit').addClass('disabled')
            $('#button-delete').addClass('disabled')
			$('#button-approve').addClass('disabled');
			$('#button-denied').addClass('disabled');
        }
        else{
            $('#TableUsulan tbody tr').removeClass('selected')
            $(this).addClass('selected')
            $('#button-edit').removeClass('disabled')
            $('#button-delete').removeClass('disabled')
			$('#button-approve').removeClass('disabled');
			$('#button-denied').removeClass('disabled');
        }
    })
    $("#button-edit").click(function(){
        var id=$("#TableUsulan .selected").attr('id')
        if(typeof id=='undefined'){
            alert('Please Select One Data to Edit')
        }
        else{
            $('#button-edit').addClass('disabled');
            $('#button-delete').addClass('disabled');
            document.location.hash = "UsulanKegiatan/edit/"+id;
        }
    });
	$("#button-approve").click(function(){
		var id=$("#TableUsulan .selected").attr('id')
		if(typeof id=='undefined'){
			alert('Please Select One Data to Edit')
		}
		else{
			$('#button-approve').addClass('disabled');
			$('#button-denied').addClass('disabled');
			document.location.hash="Pelaksanaan/update_status/"+id+'/disetujui';
		}
	});
	$("#button-denied").click(function(){
		var id=$("#TableUsulan .selected").attr('id')
        if(typeof id=='undefined'){
            alert('Please Select One Data to Delete')
        }
        else{
            if(!confirm('Batalkan Usulan Kegiatan?')){
                return false;
            }
            else{
                $('#button-denied').addClass('disabled')
                document.location.hash="Pelaksanaan/update_status/"+id+'/dibatalkan';
            }
        }
	});
    $("#button-delete").click(function(){
        var id=$("#TableUsulan .selected").attr('id')
        if(typeof id=='undefined'){
            alert('Please Select One Data to Delete')
        }
        else{
            if(!confirm('Are You Sure Want to Delete This Data?')){
                return false;
            }
            else{
                $('#button-delete').addClass('disabled')
                document.location.hash="UsulanKegiatan/delete/"+id;
            }
        }
    })
})
</script>