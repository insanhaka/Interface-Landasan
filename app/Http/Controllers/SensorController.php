<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Datasensor;
use DB;
use Carbon\Carbon;

class SensorController extends Controller
{
    public function dataSensor() {
        
        $levels = DB::table('datasensor')
                    ->select('waktu', 'level', 'ip')
                    // ->where('ip', $ip)
                    ->whereIn('id', function($query) {
                        $query->selectRaw('max(id) from `datasensor`')->groupBy('ip');
                    })
                    ->orderBy('ip')
                    ->take(16)
                    ->get();

        foreach($levels as $level) {
          $level->waktu = Carbon::parse($level->waktu)->timestamp;
        }

        return response()->json(['datasensor' => $levels]);
    }
}
