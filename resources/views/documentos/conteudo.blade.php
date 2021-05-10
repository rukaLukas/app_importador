@extends('layout')

@section('conteudo')

<table class="table">
    <thead class="thead-dark">
      <tr>        
        <th scope="col">Conteudo</th>        
      </tr>
    </thead>
    <tbody>
      <tr>
        <td id="conteudo"></td>        
      </tr>     
    </tbody>
</table>

<table class="table">
    <thead class="thead-dark">
      <tr>        
        <th scope="col">Subtitulo</th>        
      </tr>
    </thead>
    <tbody>
      <tr>
        <td id="subtitulo"></td>        
      </tr>     
    </tbody>
</table>

<table class="table">
    <thead class="thead-dark">
      <tr>        
        <th scope="col">Fonte</th>        
      </tr>
    </thead>
    <tbody>
      <tr>
        <td id="fonte"></td>        
      </tr>     
    </tbody>
</table>

<table class="table">
    <thead class="thead-dark">
      <tr>        
        <th scope="col">Titulo</th>        
      </tr>
    </thead>
    <tbody>
      <tr>
        <td id="titulo"></td>        
      </tr>     
    </tbody>
</table>

<table class="table">
    <thead class="thead-dark">
      <tr>        
        <th scope="col">Data Publicação</th>        
      </tr>
    </thead>
    <tbody>
      <tr>
        <td id="data_publicacao"></td>        
      </tr>     
    </tbody>
</table>

<table class="table">
    <thead class="thead-dark">
      <tr>        
        <th scope="col">URL</th>        
      </tr>
    </thead>
    <tbody>
      <tr>
        <td id="url"></td>        
      </tr>     
    </tbody>
</table>


@push('scripts')
<script>    
    $( document ).ready(function() {  
      
      function populaDocumento(data) {
        console.log(data);
        var conteudo = data.conteudo;
        var subtitulo = data.subtitulo;
        var fonte = data.fonte;
        var titulo = data.titulo;
        var dataPublicacao = data.data_publicacao;
        var url = data.url;

        $('#conteudo').html(conteudo);
        $('#subtitulo').html(subtitulo);
        $('#fonte').html(fonte);
        $('#titulo').html(titulo);
        $('#data_publicacao').html(dataPublicacao);
        $('#url').html(url);
      }

      var id = {{ Request::route('id') }};      
      $.ajax({
        type: "GET",            
        url: "{{ route('conteudo_documento', 1) }}",
        success:function(response) {
          populaDocumento(response);                
        }
      });    
    });
    </script>
@endpush


@endsection