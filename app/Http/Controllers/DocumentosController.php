<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use Illuminate\Http\Request;

class DocumentosController extends Controller
{
    public function index(Request $request)
    {                        
        return view('documentos.index');        
    }   

    public function paginate(Request $request)
    {               
        $query = $request->search_query;
        $country = $request->country;
        $sort_by = $request->sort_by;
        $range = $request->range; 
        if($request->ajax()) {
            $documentos = Noticia::paginate(5, ['id','titulo']);
            return view('documento_data', compact('documentos'))->render();
        }
    }   
    
    public function show(int $id)
    {
        $documento = Noticia::find($id);      

        //return view('documentos.conteudo', compact('documento'));        
        return view('documentos.conteudo');
    }
}
