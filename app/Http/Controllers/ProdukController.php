<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\kategori;

use App\Produk;

use Datatables;

use PDF;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$kategori = kategori::all();
        return view('produk.index', compact('kategori'));
    }
    public function listData()
	{
		$produk = Produk::leftJoin('kategori', 'kategori.id_kategori', '=', 'produk.id_kategori')
		->orderBy('produk.id_produk', 'desc')
		->get();
		$no = 0;
		$data = array();
		foreach($produk as $list){
			$no ++;
			$row = array();
			$row[] ="<input type='checkbox' name='id[]'' value='".$list->id_produk."'>";
			$row[] = $no;
			$row[] = $list->kode_produk;
			$row[] = $list->nama_produk;
			$row[] = $list->kode_kategori;
			$row[] = $list->kode_merk;
			$row[] = $list->Harga_beli;
			$row[] = $list->harga_jual;
			$row[] = $list->diskon."%";
			$row[] = $list->stok;
			$row[] = '<div class="btn-group">
						<a onclick="editForm('.$list->id_produk.')" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
						<a onclick="deleteData('.$list->id_produk.')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a></div>';
			$data[] = $row;
		
		}
	return Datatables::of($data)->escapeColoums([])->make(true);
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jml = Produk::where ('kode_produk', '=', $request['kode'])->count();
		if($jml < 1){
			$produk = new produk;
			$produk->kode_produk = $request['kode'];
			$produk->nama_produk = $request['nama'];
			$produk->id_kategori = $request['kategori'];
			$produk->merk = $request['merk'];
			$produk->harga_beli = $request['harga beli'];
			$produk->diskon = $request['diskon'];
			$produk->harga_jual = $request['harga jual'];
			$produk->stok = $request['stok'];
			$produk->save();
			echo json_encode(array('msg' => 'succes'));
		}else{ 
			echo json_encode(array('msg' => 'error'));
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produk = Produk::find($id);
		echo json_encode($produk);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $produk = Produk::find($id);
		$produk->nama_produk = $request['nama'];
		$produk->id_kategori = $request['kategori'];
		$produk->merk = $request['merk'];
		$produk->harga_beli = $request['harga beli'];
		$produk->diskon = $request['diskon'];
		$produk->harga_jual = $request['harga jual'];
		$produk->stok = $request['stok'];
		$kategori->update();
		echo json_encode(array('msg'=>'success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produk = Produk::find($id);
		$produk->delete();
    }
	
	public function destroySelected(request $request)
    {
        foreach($request['id'] as $id){
		$produk = Produk::find($id);
		$produk->delete();
		}
    }
	
	public function printBarcode(request $request)
    {
        $dataproduk = array();
		foreach($request['id'] as $id){
		$produk = Produk::find($id);
		$dataproduk[]=$produk;
		}
		$no=1;
		$pdf = PDF::loadView('produk.barcode',compact('dataproduk', 'no'));
		return $pdf->stream();
    }
}
