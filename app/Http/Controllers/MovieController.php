<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{

    public function showAllMovies()
    {
        return response()->json(Movie::with('actors')->get());
    }

    public function showOneMovie($id)
    {
        return response()->json(Movie::find($id));
    }
}
