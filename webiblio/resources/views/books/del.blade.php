@extends('layout.menu')
@section('page_heading','Exclusão de Livro')
@section('section')
<div class="container">
    <div class="content">
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-10">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Verifique as informações abaixo e confirme exclusão:
                    </div>
                    <div class="row">
                        <br>
                    </div>
                    <div class="row">
                        <div class="col-lg-1"></div>
                        <div class="col-lg-10">
                            <label>Título</label>
                            <br>
                            <value>{{ $book->material->titulo }}</value>
                        </div>
                        <div class="col-lg-1"></div>
                    </div> 
                    <div class="row">
                        <div class="col-lg-1"></div>
                        <div class="col-lg-10">
                            <label>Subtítulo</label>
                            <br>
                            <value>{{ $book->material->subtitulo }}</value>
                        </div>
                        <div class="col-lg-1"></div>
                    </div> 
                    @if ($book->material->imagem_capa != '')
                        <div class="row">
                            <div class="col-lg-1"></div>
                            <div class="col-lg-10">
                                <label>Imagem Capa</label>
                                <br>
                                <img scr="{{ asset('images/'.$book->material->imagem_capa) }}" />
                            </div>
                            <div class="col-lg-1"></div>
                        </div> 
                    @endif
                    <div class="row">
                        <div class="col-lg-1"></div>
                        <div class="col-lg-10">
                            <label>Autores</label>
                            <br>
                            <p>
                            @foreach ($authors as $author)
                                - {{ $author->nome }}<br>
                            @endforeach
                            </p>
                        </div>
                        <div class="col-lg-1"></div>
                    </div> 
                    <div class="row">
                        <div class="col-lg-1"></div>
                        <div class="col-lg-5">
                            <label>ISBN</label>
                            <br>
                            <value>{{ $book->isbn }}</value>
                        </div>
                        <div class="col-lg-5">
                            <label>Páginas</label>
                            <br>
                            <value>{{ $book->paginas }}</value>
                        </div>
                        <div class="col-lg-1"></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-1"></div>
                        <div class="col-lg-10">
                            <label>Resumo</label>
                            <br>
                            <p>{{ $book->resumo }}</p>
                        </div>
                        <div class="col-lg-1"></div>
                    </div>  
                    <hr>
                    <div class="row">
                        <div class="col-lg-1"></div>
                        <div class="col-lg-10">
                            <div class="pull-right">
                                <a href="{{ url ('books/destroy/'.$book->id) }}" class="btn btn-primary">Confirmar Exclusão</a>
                                <a href="{{ url ('books') }}" type="button" class="btn btn-danger">Cancelar</a>
                            </div>   
                        </div>    
                        <div class="col-lg-1"></div>
                    </div> 
                    <div class="row">
                        <br>
                    </div>
                </div>
            </div>    
    	</div>
    </div>
</div>          
@stop