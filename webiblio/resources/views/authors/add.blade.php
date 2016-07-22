@extends('layout.menu')
@section('page_heading','Novo Autor')
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
                    <form action="{{ url ('authors/store') }}" role="form" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="row">
                            <div class="col-lg-1"></div>
                            <div class="col-lg-7 form-group">
                                <label>Nome</label>
                                <input name="nome" class="form-control" placeholder="Preencha o Nome" minlength=3 required>
                            </div>
                            <div class="col-lg-3 form-group">
                                <label>Notação de Autor</label>
                                <input name="notacao" class="form-control"  maxlength="3">
                            </div>
                            <div class="col-lg-1"></div>
                        </div> 
                        <hr>
                        <div class="row">
                            <div class="col-lg-1"></div>
                            <div class="col-lg-10">
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-primary">Confirmar</button>
                                    <a href="{{ url ('authors') }}" type="button" class="btn btn-danger">Cancelar</a>
                                </div>   
                                <br> 
                            </div>    
                            <div class="col-lg-1"></div>
                        </div> 
                        <div class="row">
                            <br>
                        </div>
                    </form>    
                </div>
            </div>    
    	</div>
    </div>
</div>          
@stop