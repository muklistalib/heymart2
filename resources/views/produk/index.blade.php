@extends('layouts.app')

@section('title')
	Daftar Produk
@endsection

@section('content')

<div class="row">
        <div class="col-md-12">
				<a onclick="addForm()" class="btn btn-success"><i class="fa fa-plus-circle"></i> Tambah</a>
				<a onclick="deleteAll()" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
				<a onclick="PrintBarcode()" class="btn btn-info"><i class="fa fa-barcode"></i> Cetak Barcode</a>
				</div>
				
				<form methode="post" id="form-produk">
				{{ csrf_field() }}
				<table class="table table-striped">
				<thead>
					<tr>
						<th width="20"><input type="checkbox" value="1" id="Select-all"></th>
						<th width="20">No</th>
						<th>Kode Produk</th>
						<th>Nama Produk</th>
						<th>Kategori</th>
						<th>Merk</th>
						<th>Harga beli</th>
						<th>Kode jual</th>
						<th>Diskon</th>
						<th>Stok</th>
						<th width="100">Aksi</th>
					</tr>
				</thead>
				<tbody></tbody>
				</table>
				</form>
</div>
@include('produk.form')
@endsection

@section('script')
<script type="text/javasript">
var table, save method;
$(function(){

//menampilkan data dengan plugin Data table
table = $('.table').DataTable({
	"processing" : true,
	"serverside" : true,
	"ajax" : {
		"url" : "{{ route('produk.data') }}",
		"type" : "GET"
	},
	'coloumnDefs': 0,
	'searchable' : false,
	'orderable'  : false
}],
	'order': [1, 'asc']
});

//menyimpan data semua checbox ketika checbox debgan id #select-all dicentang
$select('#select-all'.click(function(){
	$('input[type="checkbox"]'.prop('checked', this.checked);
});

//menyimpan data form tambah/edit beserta validasinya
$('#modal-form form').validator().on('submit', function(e){
	if(!e.isDefaultPrevented()){
		var id = $('#id').val();
		if(save method == "add") url = {{ route('produk.store') }}";
		else url = "produk/" +id;
		
		$.ajax({
			url : url,
			type : "POST",
			data : $('#modal-form form').serialize(),
			dataType: 'JSON'
			success : function(data){
				if(data.msg=="error"){
					alert('kode produk sudah digunakan!');
					$('#kode').focus().select();
				}else{
				$('#modal-form').modal('hide');
				table.ajax.reload();
			}
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
	$('.modal-title').text('Tambah Produk');
	$('#kode').attr('readonly', false);
}

//Menampilkan form edit dan menampilkan data pada form tersebut
function editForm(id){
		save method = "edit";
		$('input[name=method]').val('PATCH');
		$('#modal-form form')[0].reset();
		$.ajax({
			url : "produk/"+id+"/edit",
			type : "GET"
			dataType : "JSON"
			success : function(data){
				$('#modal-form').modal('show');
				$('.modal-title').text('Edit Produk');
				
				$('#id').val(data.id_produk);
				$('#kode').val(data.kode_produk).attr('readonly', true);
				$('#nama').val(data.nama_produk);
				$('#kategori').val(data.id_kategori);
				$('#merk').val(data.merk);
				$('#harga beli').val(data.harga_beli);
				$('#diskon').val(data.diskon);
				$('#harga jual').val(data.harga_jual);
				$('#stok').val(data.stok);
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
			url : "produk/"+id,
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

//menghapus semua data yang dicentang
function deleteData(id){
if($('input:checked').length < 1){
	alert ('pilih data yang akan di hapus!');
}else if(confirm("apakah yakin akan menghapus semua data terpilih ?")){
		$.ajax({
			url : "produk/hapus",
			type : "POST",
			data : $('#form-produk').serialize(),
			succes : function(data){
				table.ajax.reload();
			},
			error : function(){
				alert(" tidak dapat menghapus data!");
			}
			});
	}
}

//mencetak barcode ketika tombol cetak barkode diklik
function printBarcode(){
	if($('input:checked').length < 1){
		alert('pilih data yang akan dicetak!');
	}else{
		$('#form-produk').attr('target', 'blank').attr('action', "produk/cetak").submit();
	}
}
</script>
@endsection