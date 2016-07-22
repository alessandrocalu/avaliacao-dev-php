@extends('layout.menu')
@section('page_heading','Dicionários')
@section('section')
<div class="container">
    <div class="content">
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-10">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Listagem de Dicionários
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <div class="pull-right">
                                <a href="{{ url ('dictionars/create') }}" type="button" class="btn btn-primary">Novo Dicionário</a>
                            </div>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Título</th>
                                        <th>Subtítulo</th>
                                        <th>Edição</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 	@foreach ($dictionars as $dictionar)
                                    <tr>
                                        <td>{{ $dictionar->id }}</td>
                                        <td>{{ $dictionar->material->titulo }}</td>
                                        <td>{{ $dictionar->material->subtitulo }}</td>
                                        <td>{{ $dictionar->edicao }}</td>
                                        <td>
                                            <nobr>
                                                <a href="{{ url ('dictionars/edit/'.$dictionar->id) }}" type="button" class="btn btn-info btn-circle" title="Editar Dicionário">
                                                    <i class="fa fa-edit">
                                                    </i>
                                                </a>
                                                <a href="{{ url ('dictionars/delete/'.$dictionar->id) }}" type="button" class="btn btn-warning btn-circle" title="Apagar Dicionário">
                                                    <i class="fa fa-times">
                                                    </i>
                                                </a>
                                            </nobr>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="text-center">
                    			{!! $dictionars->render() !!}
                    		</div>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
    	</div>
    </div>
</div>         
@stop

