@extends('layout')

@section('estilo')
<style>
    #paginacao svg {
        width: 20px;
    }
</style>
@endsection

@section('conteudo')
<table class="table">
    <tbody>        
    </tbody>
</table>

<div id="paginacao" class="text-center">

    <nav id="botoes-paginacao" role="navigation">
    </nav>
    {{-- <nav id="botoes-paginacao" role="navigation">
        <span class="btn px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
            « Anterior
        </span>
        <a href="http://127.0.0.1:8003/documentos?page=2" rel="next" class="btn text-primary relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
            Próximo »
        </a>
    </nav>     --}}
</div>



@push('scripts')
<script>    
    $( document ).ready(function() {
        function populaTabela(data) {        
            var tr = '';
            data.forEach(element => {
                console.log(element);
                tr += `<tr>
                        <td>
                            ${element.titulo}
                        </td>
                        <td>
                            <a href="/documentos/${element.id}" target="_blank" class="btn btn-info btn-sm mr-1">
                                <i class="fas fa-external-link-alt"></i>
                            </a>
                        </td>
                    </tr>`;
            });            
            $('tbody').html(tr);
        }    

        function definiBotoesPaginacao(prevPageUrl, nextPageUrl) {        
            
            var btnPrevPageUrl;
            var btnNextPageUrl;
            
            $('#botoes-paginacao').html('');
            if (prevPageUrl != null) {
                btnPrevPageUrl = `<a href="${prevPageUrl}" rel="next" class="btn text-primary relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                    « Anterior
                </a>`;
                $('#botoes-paginacao').append(btnPrevPageUrl);
            }  
            if (nextPageUrl != null) {    
                btnNextPageUrl = `<a href="${nextPageUrl}" rel="next" class="btn text-primary relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                    Próximo »
                </a>`;
                $('#botoes-paginacao').append(btnNextPageUrl);
            }                                        
        }           
    
        $(document).on('click', '#paginacao a', function(event) {
              event.preventDefault();
              var page = $(this).attr('href').split('page=')[1];              
              paginate(page);
            });                                
    
        function paginate(page) {          
            var url = page == undefined ? "{{ route('paginate.documentos') }}" : "{{ route('paginate.documentos') }}" + "?page=" + page;
          $.ajax({
            type: "GET",            
            url: url,
            success:function(response) {
                populaTabela(response.data);   
                definiBotoesPaginacao(response.prev_page_url, response.next_page_url);
            }
          });
        }
        
        paginate();
    
    });
    </script>
@endpush

@endsection