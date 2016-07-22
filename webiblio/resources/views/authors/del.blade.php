@extends('layout.menu')
@section('page_heading','Exclusão de Autor')
@section('section')
<div class="container">
    <div class="content">
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-10">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Verifique as informações abaixove confirme exclusão:
                    </div>
                    <div class="row">
                        <br>
                    </div>
                    <div class="row">
                        <div class="col-lg-1"></div>
                        <div class="col-lg-7">
                            <label>Nome</label>
                            <br>
                            <value>{{ $author->nome }}</value>
                        </div>
                        <div class="col-lg-3">
                            <label>Notação de Autor</label>
                            <br>
                            <value>{{ $author->notacao }}</value>
                        </div>
                        <div class="col-lg-1"></div>
                    </div> 
                    <hr>
                    <div class="row">
                        <div class="col-lg-1"></div>
                        <div class="col-lg-10">
                            <div class="pull-right">
                                <a href="{{ url ('authors/destroy/'.$author->id) }}" class="btn btn-primary">Confirmar Exclusão</a>
                                <a href="{{ url ('authors') }}" type="button" class="btn btn-danger">Cancelar</a>
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