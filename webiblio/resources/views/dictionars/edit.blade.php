@extends('layout.menu')
@section('page_heading','Edição de Dicinário')
@section('section')
<div class="container">
    <div class="content">
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-10">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Edite as informações abaixo:
                    </div>
                    <div class="row">
                        <br>
                    </div>
                    <form action="{{ url ('dictionars/update') }}" enctype="multipart/form-data" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="id" value="{{ $dictionar->id }}">
                        <div class="row">
                            <div class="col-lg-1"></div>
                            <div class="col-lg-10 form-group">
                                <label>Título</label>
                                <input name="titulo" value="{{ $dictionar->material->titulo }}" class="form-control" placeholder="Preencha o título"  required>
                            </div>
                            <div class="col-lg-1"></div>
                        </div> 
                        <div class="row">
                            <div class="col-lg-1"></div>
                            <div class="col-lg-10 form-group">
                                <label>Subtítulo</label>
                                <input name="subtitulo" value="{{ $dictionar->material->subtitulo }}" class="form-control" placeholder="Preencha o subtítulo" >
                            </div>
                            <div class="col-lg-1"></div>
                        </div> 
                        <div class="row">
                            <div class="col-lg-1"></div>
                            <div class="col-lg-10 form-group">
                                <label>Definir nova Imagem de capa</label>
                                <input name="arquivo_capa" type="file">
                            </div>
                            <div class="col-lg-1"></div>
                        </div>
                        @if ($dictionar->material->imagem_capa != '')
                            <div class="row">
                                <div class="col-lg-1"></div>
                                <div class="col-lg-10">
                                    <label>Imagem Capa Atual</label>
                                    <br>
                                    <img src="{{ asset('images/'.$dictionar->material->imagem_capa) }}" />
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
                                    - {{$author->notacao }}:{{$author->nome }}<br> 
                                @endforeach
                                </p>
                            </div>
                            <div class="col-lg-1"></div>
                        </div> 
                        <div class="row">
                            <div class="col-lg-1"></div>
                            <div class="col-lg-10 form-group">
                                <label>Modificar Autores</label>
                                <input name="autores" class="form-control" placeholder="Preencha os nomes dos autores substitutos separados por vírgula(,)">
                            </div>
                            <div class="col-lg-1"></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-1"></div>
                            <div class="col-lg-5 form-group">
                                <label>Edição</label>
                                <input name="edicao" value="{{ $dictionar->edicao }}" class="form-control" placeholder="Preencha a edição" required>
                            </div>
                            <div class="col-lg-5 form-group">
                                <label>Classificação</label>
                                <input name="classificacao" value="{{ $dictionar->classificacao }}"  class="form-control" placeholder="Preencha a classificação">
                            </div>
                            <div class="col-lg-1"></div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-1"></div>
                            <div class="col-lg-10">
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-primary">Confirmar</button>
                                    <a href="{{ url ('dictionars') }}" type="button" class="btn btn-danger">Cancelar</a>
                                </div>  
                            </div>    
                            <div class="col-lg-1"></div>
                        </div> 
                    </form>    
                    <div class="row">
                        <br>
                    </div>
                </div>
            </div>    
    	</div>
    </div>
</div>          
@stop