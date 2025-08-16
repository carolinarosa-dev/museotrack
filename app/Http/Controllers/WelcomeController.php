<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\News;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index() {
        $eventos = Event::where('publicado', true)->orderBy('data_inicio', 'asc')->take(5)->get();
        $noticias = News::where('publicado', true)->orderBy('data_publicacao', 'desc')->take(5)->get();

        return view('welcome', compact('eventos', 'noticias'));
    }

}
