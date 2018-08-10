@extends('layouts.app')

@section('title')
	Daftar Member
@endsection

@section('content')

<div class="row">
        <div class="col-md-12">
				<a onclick="addForm()" class="btn btn-success"><i class="fa fa-plus-circle"></i> Tambah</a>
				<a onclick="printCard()" class="btn btn-success"><i class="fa fa-plus-circle"></i> Cetak kartu</a>
				</div>
				
				<form method="post" id="form-member">
				{{ csrf_field() }}
				<table class="table table-striped">
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
@include('member.form')
@endsection

@section('script')
<script type="text/javasript">
var table, save method;
$(function(){

//menampilkan data dengan plugin Data table
table = $('.table').DataTable({
	"processing" : true,
	"ajax" : {
		"url" : "{{ route('member.data') }}",
		"type" : "GET"
	},
	'coloumnDefs': [{
		'targets': 0,
		'searchable': false,
		'orderable': false
	}],
	'order': [1, 'asc']
});
	$('#select-all').click(function(){
		$('input[type="checkbox"]').prop('checked', this.checked);
	});

//menyimpan data form tambah/edit beserta validasinya
$('#modal-form form').validator().on('submit', function(e){
	if(!e.isDefaultPrevented()){
		var id = $('#id').val();
		if(save method == "add") url = {{ route('member.store') }}";
		else url = "member/" +id;
		
		$.ajax({
			url : url,
			type : "POST",
			data : $('#modal-form form').serialize(),
			dataType : 'JSON'
			success : function(data){
			if(data.msg=="error"){
				alert('kode member sudah digunakan!');
				$('#kode').focus().select();
			}else{
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
	$('.modal-title').text('Tambah member');
	$('#kode').attr('readonly', false);
}

//Menampilkan form edit dan menampilkan data pada form tersebut
function editForm(id){
		save method = "edit";
		$('input[name=method]').val('PATCH');
		$('#modal-form form')[0].reset();
		$.ajax({
			url : "member/"+id+"/edit",
			type : "GET"
			dataType : "JSON"
			success : function(data){
				$('#modal-form').modal('show');
				$('.modal-title').text('Edit Member');
				
				$('#id').val(data.id_member);
				$('#kode').val(data.kode_member.attr('readonly', true);
				$('#nama').val(data.nama);
				$('#alamat').val(data.alamat);
				$('#telpon').val(data.telpon);
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
			url : "member/"+id,
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

function printCard(){
	if($('input:checked').length < 1){
		alert('pilih data yang akan dicetak!');
	}else{
		$('#form-member').attr('target','blank').attr('action', "member/cetak").submit();
	}
	}
}

</script>
@endsection