<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Databatasan;
use DB;

class PengaturanController extends Controller
{
    public function index()
    {
        $data_admin = \App\User::all();
    	return view('setting.pengaturan', ['data_admin' => $data_admin]);
    }

    public function insertbatasan(Request $request)
    {
    	$normal = $request->input('normal');
    	$bahaya = $request->input('bahaya');

    	$batasan = array('normal'=>$normal, 'bahaya'=>$bahaya);

    	DB::table('batasan')->insert($batasan);

    	return redirect('/pengaturan');
    }

    public function dataBatasan() {
        
        $batasans = DB::table('batasan')
                    ->select('normal', 'bahaya')
                    // ->where('ip', $ip)
                    ->whereIn('id', function($query) {
                        $query->selectRaw('max(id) from `batasan`');
                    })
                    ->orderBy('id')
                    ->take(1)
                    ->get();

        return response()->json(['batasan' => $batasans]);
    }

}
