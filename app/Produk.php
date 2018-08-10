<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk';
	protected $primaryKey= 'id_kategori';
	public function kategori(){
		return $this->belongsTo('App\Kategori');
	}
}
