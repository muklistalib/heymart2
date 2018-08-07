@extends('layouts.app')

@section('title')
	Daftar Kategori
@endsection




@section('content')

<div class="row">
        <div class="col-md-12">
				<a onclick="addForm()" class="btn btn-succes"><i class="fa fa-plus-circle"></i> Tambah</a>
				</div>
				<table class="table table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Kategori</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody></tbody>
				</table>
</div>
@include('kategori.form')
@endsection

@section('script')
<script type="text/javasript">
var table, save method;
$(function(){

//menampilkan data dengan plugin Data table
table = $('.table').DataTable({
	"processing" : true,
	"ajax" : {
		"url" : "{{ route('kategori.data') }}",
		"type" : "GET"
	}
});

//menyimpan data form tambah/edit beserta validasinya
$('#modal-form form').validator().on('submit', function(e){
	if(!e.isDefaultPrevented()){
		var id = $('#id').val();
		if(save method == "add") url = {{ route('kategori.store') }}";
		else url = "kategori/" +id;
		
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
//menampilkan form tambah
function addForm(){
	save method = "add";
	$('input[name= method]').val('POST');
	$('#modal-form').modal('show');
	$('#modal-form form')[0].reset();
	$('.modal-title').text('Tambah Kategori');
}

//Menampilkan form edit dan menampilkan data pada form tersebut
function editForm(id){
		save method = "edit";
		$('input[name=method]').val('PATCH');
		$('#modal-form form')[0].reset();
		$.ajax({
			url : "kategori/"+id+"/edit",
			type : "GET"
			dataType : "JSON"
			success : function(data){
				$('#modal-form').modal('show');
				$('.modal-title').text('Edit Kategori');
				
				$('#id').val(data.id_kategori);
				$('#nama').val(data.nama_kategori);
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
			url : "kategori/"+id,
			type : "POST",
			data : {' method' : 'DELETE', 'token' :
			$('meta[name=csrf-token]'.attr('content')}
			success : function(data){
			table.ajax.reload()'
			},
		error : function(){
			alert("tidak dapat menghapusdata!");
		}
		});
	}
}
</script>
@endsection