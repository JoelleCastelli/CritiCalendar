<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    // Lister les films
    function index()
    {
        $films = Film::paginate(50);
        return view('films', ['films' => $films]);
    }
}
