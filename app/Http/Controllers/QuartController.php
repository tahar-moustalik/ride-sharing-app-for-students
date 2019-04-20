<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quartiers;
use DB;
use Response;
use App\Http\Controllers\Log;
class QuartController extends Controller
{

  public function search(Request $request){
    $term = $request->input('term');
    $result = array();
    $queries = Quartiers::where('nomq','LIKE',"%{$term}%")->select('nomq')->take(10)->get();
    foreach($queries as $query)
    {
        $result[] = ['value'=>$query->nomq];
    }
    return response()->json($result);
  }



}

