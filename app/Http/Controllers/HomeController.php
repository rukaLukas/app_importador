<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {                
        // return view('documentos.index');
        return redirect()->route('listar_documentos');
    }
}
