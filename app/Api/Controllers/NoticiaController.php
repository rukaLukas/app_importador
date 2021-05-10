<?php

namespace App\Api\Controllers;

use App\Models\Noticia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;

class NoticiaController extends Controller
{
    public function index()
    {
        return Noticia::paginate(10, ['id','titulo']);
    }

    public function paginate(Request $request)
    {
        return Noticia::paginate(10, ['id','titulo']);
    }

    public function show($id)
    {
        return Noticia::find($id);
    }
    
    public function store(Request $request)
    {                        
        $dataInsert = $this->preparaDadosParaInsert($request->all());
        
        Noticia::insert($dataInsert);

        return response(Response::HTTP_CREATED);
    }   
    
    private function preparaDadosParaInsert(array $request)
    {
        $arrInsert = [];
        foreach($request as $value) {            
            $arrInsert[] = array(
                'conteudo' => isset($value['conteudo']) ? $value['conteudo'] : '',
                'subtitulo' => isset($value['subtitulo']) ? $value['subtitulo'] : '',
                'fonte' => isset($value['fonte']) ? $value['fonte'] : '',
                'titulo' => isset($value['titulo']) ? $value['titulo'] : '',
                'data_publicacao' => isset($value['data_publicacao']) ? $value['data_publicacao'] : '',
                'url' => isset($value['url']) ? $value['url'] : ''
            );
        }
        return $arrInsert;
    }
}