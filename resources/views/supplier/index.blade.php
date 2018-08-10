@extends('layouts.app')

@section('title')
	Daftar Supplier
@endsection

@section('content')

<div class="row">
        <div class="col-md-12">
				<a onclick="addForm()" class="btn btn-success"><i class="fa fa-plus-circle"></i> Tambah</a>
				</div>
				<table class="table table-striped" id="tabel-kategori">
				<thead>
					<tr>
						<th width="30">No</th>
						<th>Nama Supplier</th>
						<th>Alamat</th>
						<th>Telpon</th>
						<th width="100">Aksi</th>
					</tr>
				</thead>
				<tbody></tbody>
				</table>
</div>
@include('supplier.form')
@endsection

@section('script')
<script type="text/javasript">
var table, save method;
$(function(){

//menampilkan data dengan plugin Data table
table = $('.table').DataTable({
	"processing" : true,
	"ajax" : {
		"url" : "{{ route('supplier.data') }}",
		"type" : "GET"
	}
});

//menyimpan data form tambah/edit beserta validasinya
$('#modal-form form').validator().on('submit', function(e){
	if(!e.isDefaultPrevented()){
		var id = $('#id').val();
		if(save method == "add") url = {{ route('supplier.store') }}";
		else url = "supplier/" +id;
		
		$.ajax({
			url : url,
			type : "POST",
			data : $('#modal-form form').serialize(),
			success : function(data){
				$('#modal-form').modal('hide');
				table.ajax.reload();
			},
			
			error : function(){
				alert("tidak dapat menyimpan data!");
			}
		});
		return false;
	}
});
});
//menampilkan form tambah
function addForm(){
	save method = "add";
	$('input[name= method]').val('POST');
	$('#modal-form').modal('show');
	$('#modal-form form')[0].reset();
	$('.modal-title').text('Tambah Supplier');
}

//Menampilkan form edit dan menampilkan data pada form tersebut
function editForm(id){
		save method = "edit";
		$('input[name=method]').val('PATCH');
		$('#modal-form form')[0].reset();
		$.ajax({
			url : "supplier/"+id+"/edit",
			type : "GET"
			dataType : "JSON"
			success : function(data){
				$('#modal-form').modal('show');
				$('.modal-title').text('Edit Supplier');
				
				$('#id').val(data.id_supplier);
				$('#nama').val(data.nama);
				$('#alamat').val(data.telpon);
			},
			error : function(){
				alert("tidak dapat menampilkan data!")
			}
		});
}

//menghapus data
function deleteData(id){
	if(confirm("Apakah yakin data akan dihapus?")){
		$.ajax({
			url : "supplier/"+id,
			type : "POST",
			data : {' method' : 'DELETE', 'token' :
			$('meta[name=csrf-token]'.attr('content')},
			success : function(data){
			table.ajax.reload();
			},
		error : function(){
			alert("tidak dapat menghapusdata!");
		}
		});
	}
}

</script>
@endsection