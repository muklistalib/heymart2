<?php

use Illuminate\Database\Seeder;

class settingtableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('setting')->insert(array(
		[
			'nama_perusahaan' => 'heymart',
			'alamat' => 'jl. Citarum, Slawi, Tegal',
			'telpon' => '085823423232',
			'logo' => 'logo.png',
			'kartu_member' => 'card.png',
			'diskon_member' => '10',
			'tipe_nota' => '0'
		],
		));
    }
}
