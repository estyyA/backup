<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movies;
class APIController extends Controller
{
    public function searchmovies(Request $request)
    {
        $cari = $request->input('q');

        $movies = Movies::where('title', 'LIKE', "%$cari%")->get();

        if ($movies->isEmpty())
        {
            return response()->json([
                                    'success' => false,
                                    'data' => "Data tidak di temukan"
                                    ], 404)->header('Access-Control-Allow-Origin', 'http://127.0.0.1:5500');
        }
        else
        {
            return response()->json([
                                    'success' => true,
                                    'data' => $movies
                                    ], 200)->header('Access-Control-Allow-Origin', 'http://127.0.0.1:5500'); 
        }
    }
}
