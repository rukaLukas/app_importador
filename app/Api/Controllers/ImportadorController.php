<?php

namespace App\Api\Controllers;

use App\Models\Noticia;
use Elasticsearch\ClientBuilder;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;

class ImportadorController extends Controller
{        
    public function indexacao()
    {        
        $client = ClientBuilder::create()->build();
        
        $noticias = Noticia::all()->toArray();           

        $params = $this->preparaDadosParaIndexacao($noticias);
        
        $client->bulk($params);   
        
        return response(Response::HTTP_CREATED);
    }    

    private function preparaDadosParaIndexacao(array $data)
    {        
        foreach($data as $noticia) {            
            $params['body'][] = [
                'index' => [
                    '_index' => 'news',
                ]
            ];

            $params['body'][] = [
                'conteudo' => $noticia['conteudo'],
                'subtitulo' => $noticia['subtitulo'],
                'fonte' => $noticia['fonte'],
                'titulo' => $noticia['titulo'],
                'data_publicacao' => $noticia['data_publicacao'],
                'url' => $noticia['url']
            ];
        }

        return $params;
    }
}