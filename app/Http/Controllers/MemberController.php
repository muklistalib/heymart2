<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Member;

use PDF;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('member.index');
    }
	public function listData()
	{
		$member = Member::orderBy('id_member', 'desc')->get();
		$no = 0;
		$data = array();
		foreach($member as $list){
			$no ++;
			$row = array();
			$row[] ="<input type='checkbox' name='id[]'' value='".$list->id_member."'>";
			$row[] = $no;
			$row[] = $list->kode_member;
			$row[] = $list->nama;
			$row[] = $list->alamat;
			$row[] = $list->telpon;
			$row[] = '<div class="btn-group">
						<a onclick="editForm('.$list->id_member.')" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
						<a onclick="deleteData('.$list->id_member')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a></div>';
			$data[] = $row;
		}
		$output = array("data" => $data);
		return response()->json($output);
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
        $jml = Member::where ('kode_member', '=', $request['kode'])->count();
		if($jml < 1){
			$member = new Member;
			$member->kode_member = $request['kode'];
			$member->nama = $request['nama'];
			$member->alamat = $request['alamat'];
			$member->telpon = $request['telpon'];
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
        $member = Member::find($id);
		echo json_encode($member);
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
		$member = Member::find($id);
		$member->nama = $request['nama'];
		$member->alamat = $request['alamat'];
		$member->telpon = $request['telpon'];
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
        $member = Member::find($id);
		$member->delete();
    }
	
	public function printcard(request $request)
    {
		$datamember = array();
		foreach($request['id'] as $id){
			$member = Member::find($id);
			$datamember[] = $member;
		}
        $pdf = PDF::loadView('member.card', compact('datamember'));
		$pdf->setPaper(array(0, 0, 566.93, 850.39 ), 'potrait');
		return $pdf->stream();
    }
	
}
