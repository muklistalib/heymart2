<div class="modal" id="modal-form" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
	<div class="modal-dialog">
		<div class="modal-content">
		
	<form class="form-horizontal" data-toggle="validator" method="POST">
	{{ csrf_field() }} {{ method_field('POST') }}
	`
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"> &times; </span>
		</button>
		
	<h3 class="modal-title"></h3>
	</div>
	
	<div class="modal-body">
	
	<input type="hidden" id="id" name="id">
	<div class="form-group">
		<label for="kode" class="col-md-3 control-label">Kode Produk</label>
		<div class="col-md-6">
			<input id="kode" type="number" class="form-control" name="kode" autofocus required>
				<span class="help-block with-errors"></span>
		</div>
	</div>
	
	<div class="form-group">
		<label for="nama" class="col-md-3 control-label">Nama Produk</label>
		<div class="col-md-6">
			<input id="nama" type="text" class="form-control" name="nama" required>
				<span class="help-block with-errors"></span>
		</div>
	</div>
	
	<div class="form-group">
		<label for="kategori" class="col-md-3 control-label">Kategori</label>
		<div class="col-md-6">
			<select id="kategori" type="text" class="form-control" name="kategori" required>
			<option value=""> -- pilih kategori -- </option>
			@foreach ($kategori as $list)
			<option value="{{ $list->id_kategori }}">{{ $list->nama_kategori }}</option>
			@endforeach
			</select>
			<span class="help-block with-errors"></span>
		</div>	
	</div>
	
	<div class="form-group">
		<label for="merk" class="col-md-3 control-label">Merk</label>
		<div class="col-md-6">
			<input id="Merk" type="text" class="form-control" name="merk" required>
				<span class="help-block with-errors"></span>
		</div>
	</div>
	
	<div class="form-group">
		<label for="harga beli" class="col-md-3 control-label">Harga Beli</label>
		<div class="col-md-6">
			<input id="harga beli" type="text" class="form-control" name="harga beli" required>
				<span class="help-block with-errors"></span>
		</div>
	</div>
	
	<div class="form-group">
		<label for="diskon" class="col-md-3 control-label">Diskon</label>
		<div class="col-md-6">
			<input id="diskon" type="text" class="form-control" name="diskon" required>
				<span class="help-block with-errors"></span>
		</div>
	</div>
	
	<div class="form-group">
		<label for="harga jual" class="col-md-3 control-label">Harga Jual</label>
		<div class="col-md-6">
			<input id="harga jual" type="text" class="form-control" name="harga jual" required>
				<span class="help-block with-errors"></span>
		</div>
	</div>
	
	<div class="form-group">
		<label for="stok" class="col-md-3 control-label">Stok</label>
		<div class="col-md-6">
			<input id="stok" type="text" class="form-control" name="stok" required>
				<span class="help-block with-errors"></span>
		</div>
	</div>
	
		<div class="modal-footer">
			<button type="submit" class="btn btn-primary btn-save"><i class="fa fa-floppy-o"></i>Simpan</button>
			<button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fa fa-arrow-circle-left"></i>Batal</button>
		</div>
		
		</form>
			</div>
		</div>
	</div>
			
			