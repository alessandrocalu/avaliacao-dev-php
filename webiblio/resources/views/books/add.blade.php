@extends('layout.menu')
@section('page_heading','Novo Livro')
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
                        Preencha as informações abaixo:
                    </div>
                    <div class="row">
                        <br>
                    </div>
                    <form action="{{ url ('books/store') }}" enctype="multipart/form-data" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="row">
                            <div class="col-lg-1"></div>
                            <div class="col-lg-10 form-group">
                                <label>Título</label>
                                <input name="titulo" class="form-control" placeholder="Preencha o título"  required>
                            </div>
                            <div class="col-lg-1"></div>
                        </div> 
                        <div class="row">
                            <div class="col-lg-1"></div>
                            <div class="col-lg-10 form-group">
                                <label>Subtítulo</label>
                                <input name="subtitulo" class="form-control" placeholder="Preencha o subtítulo" >
                            </div>
                            <div class="col-lg-1"></div>
                        </div> 
                        <div class="row">
                            <div class="col-lg-1"></div>
                            <div class="col-lg-10 form-group">
                                <label>Imagem de capa</label>
                                <input name="arquivo_capa" type="file">
                            </div>
                            <div class="col-lg-1"></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-1"></div>
                            <div class="col-lg-10 form-group">
                                <label>Autores</label>
                                <input name="autores" class="form-control" placeholder="Preencha os nomes dos autores separados por vírgula(,)" required>
                            </div>
                            <div class="col-lg-1"></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-1"></div>
                            <div class="col-lg-5 form-group">
                                <label>ISBN</label>
                                <input name="isbn" class="form-control" placeholder="Preencha o ISBN" required>
                            </div>
                            <div class="col-lg-5 form-group">
                                <label>Páginas</label>
                                <input name="paginas" class="form-control" placeholder="Preencha o número de páginas" required>
                            </div>
                            <div class="col-lg-1"></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-1"></div>
                            <div class="col-lg-10">
                                <label>Resumo</label>
                                <textarea name="resumo" class="form-control" rows="3"></textarea>
                            </div>
                            <div class="col-lg-1"></div>
                        </div>  
                        <hr>
                        <div class="row">
                            <div class="col-lg-1"></div>
                            <div class="col-lg-10">
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-primary">Confirmar</button>
                                    <a href="{{ url ('books') }}" type="button" class="btn btn-danger">Cancelar</a>
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