<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Universite;
use DB;
use Response;
use App\Http\Controllers\Log;

class UnivController extends Controller
{
    public function search(Request $request)
    {
        $term = $request->input('term');
        $result = array();
        $queries = DB::table('universite')->where('nom', 'LIKE', "%{$term}%")
    ->orWhere('acro_univ', 'LIKE', "%{$term}%")->select('nom')->take(10)->get();
        foreach ($queries as $query) {
            $result[] = ['value'=>$query->nom];
        }
        return response()->json($result);
    }
}
