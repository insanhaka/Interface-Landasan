<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Datasensor;
use DB;
//use Carbon\Carbon;

class PrintController extends Controller
{
    public function datapage()
    {
    	return view('datahouse.recordpage');
    }

    public function dataPrint() {
        
        $levels = DB::table('datasensor')
                    ->select( 'id', 'waktu', 'level', 'ip')
                    ->whereNotIn('ip', ['192.168.1.31', '192.168.1.41'])
                    ->orderBy('id')
                    ->get();

        //foreach($levels as $level) {
          //$level->waktu = Carbon::parse($level->waktu)->timestamp;
        //}

        return response()->json([
            'dataprint' => $levels
        ]);
    }
}
