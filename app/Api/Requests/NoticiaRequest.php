<?php

namespace App\Api\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NoticiaRequest extends FormRequest
{
    public function rules(): array
    {        
        return [
            'conteudo' => ['required', 'string'],            
            'subtitulo' => ['required', 'string'],            
            'fonte' => ['required', 'string'],                        
            'titulo' => ['required', 'string'],           
            'data_publicacao' => ['required', ':Y-m-dTH:i:s'],            
           'url' => ['required', 'url'],            
        ];
    }
}