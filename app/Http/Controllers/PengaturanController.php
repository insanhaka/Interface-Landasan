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

    	DB::table('databatasan')->insert($batasan);

    	return redirect('/pengaturan');
    }

    public function dataBatasan() 
    {    
        $batasans = DB::table('databatasan')
                    ->select('normal', 'bahaya')
                    // ->where('ip', $ip)
                    ->whereIn('id', function($query) {
                        $query->selectRaw('max(id) from `databatasan`');
                    })
                    ->orderBy('id')
                    ->take(1)
                    ->get();

        return response()->json(['batasan' => $batasans]);
    }

    public function insertalarm (request $request)
    {
        $banyaksensor = $request->input('banyak');
        $alarm = $request->input('persentase');

        $bunyi = array('persentase'=>$alarm, 'banyak'=>$banyaksensor);

        DB::table('dataalarm')->insert($bunyi);

        return redirect('/pengaturan');
    }

    public function dataAlarm() 
    {    
        $alarm = DB::table('dataalarm')
                    ->select('persentase', 'banyak')
                    // ->where('ip', $ip)
                    ->whereIn('id', function($query) {
                        $query->selectRaw('max(id) from `dataalarm`');
                    })
                    ->orderBy('id')
                    ->take(1)
                    ->get();

        return response()->json(['alarm' => $alarm]);
    }
}
