@extends('layouts.app')

@section('title')
	Daftar Pengeluaran
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
						<th>Tanggal</th>
						<th>Jenis Pengeluaran</th>
						<th>Nominal</th>
						<th width="100">Aksi</th>
					</tr>
				</thead>
				<tbody></tbody>
				</table>
</div>
@include('pengeluaran.form')
@endsection

@section('script')
<script type="text/javasript">
var table, save method;
$(function(){

//menampilkan data dengan plugin Data table
table = $('.table').DataTable({
	"processing" : true,
	"ajax" : {
		"url" : "{{ route('pengeluaran.data') }}",
		"type" : "GET"
	}
});

//menyimpan data form tambah/edit beserta validasinya
$('#modal-form form').validator().on('submit', function(e){
	if(!e.isDefaultPrevented()){
		var id = $('#id').val();
		if(save method == "add") url = {{ route('pengeluaran.store') }}";
		else url = "pengeluaran/" +id;
		
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
	$('.modal-title').text('Tambah Pengeluaran');
}

//Menampilkan form edit dan menampilkan data pada form tersebut
function editForm(id){
		save method = "edit";
		$('input[name=method]').val('PATCH');
		$('#modal-form form')[0].reset();
		$.ajax({
			url : "pengeluaran/"+id+"/edit",
			type : "GET"
			dataType : "JSON"
			success : function(data){
				$('#modal-form').modal('show');
				$('.modal-title').text('Edit Pengeluaran');
				
				$('#id').val(data.id_pengeluaran);
				$('#nama').val(data.jenis_pengeluaran);
				$('#nominal').val(data.nominal);
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
			url : "pengeluaran/"+id,
			type : "POST",
			data : {' method' : 'DELETE', 'token' :
			$('meta[name=csrf-token]'.attr('content')},
			success : function(data){
			table.ajax.reload();
			},
		error : function(){
			alert("tidak dapat menghapus data!");
		}
		});
	}
}

</script>
@endsection