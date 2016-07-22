@extends('layout.menu')
@section('page_heading','Exclusão de Dicionário')
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
                            <value>{{ $dictionar->material->titulo }}</value>
                        </div>
                        <div class="col-lg-1"></div>
                    </div> 
                    <div class="row">
                        <div class="col-lg-1"></div>
                        <div class="col-lg-10">
                            <label>Subtítulo</label>
                            <br>
                            <value>{{ $dictionar->material->subtitulo }}</value>
                        </div>
                        <div class="col-lg-1"></div>
                    </div> 
                    @if ($dictionar->material->imagem_capa != '')
                        <div class="row">
                            <div class="col-lg-1"></div>
                            <div class="col-lg-10">
                                <label>Imagem Capa</label>
                                <br>
                                <img scr="{{ asset('images/'.$dictionar->material->imagem_capa) }}" />
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
                                {{ $author->nome }}<br>
                            @endforeach
                            </p>
                        </div>
                        <div class="col-lg-1"></div>
                    </div> 
                    <div class="row">
                        <div class="col-lg-1"></div>
                        <div class="col-lg-5">
                            <label>Edição</label>
                            <br>
                            <value>{{ $dictionar->edicao }}</value>
                        </div>
                        <div class="col-lg-5">
                            <label>Classificação</label>
                            <br>
                            <value>{{ $dictionar->classificacao }}</value>
                        </div>
                        <div class="col-lg-1"></div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-1"></div>
                        <div class="col-lg-10">
                            <div class="pull-right">
                                <a href="{{ url ('dictionars/destroy/'.$dictionar->id) }}" class="btn btn-primary">Confirmar Exclusão</a>
                                <a href="{{ url ('dictionars') }}" type="button" class="btn btn-danger">Cancelar</a>
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