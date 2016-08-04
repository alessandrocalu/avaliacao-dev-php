@extends('layout.menu')
@section('page_heading','Revistas')
@section('section')
<div class="container">
    <div class="content">
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-10">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Listagem de Revistas
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <div class="pull-right">
                                <a href="{{ url ('magazines/create') }}" type="button" class="btn btn-primary">Nova Revista</a>
                            </div>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Título</th>
                                        <th>Subtítulo</th>
                                        <th>Ano</th>
                                        <th>Edição</th>
                                        <th>Páginas</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 	@foreach ($magazines as $magazine)
                                    <tr>
                                        <td>{{ $magazine->id }}</td>
                                        <td>{{ $magazine->material->titulo }}</td>
                                        <td>{{ $magazine->material->subtitulo }}</td>
                                        <td>{{ $magazine->ano }}</td>
                                        <td>{{ $magazine->edicao }}</td>
                                        <td>{{ $magazine->paginas }}</td>
                                        <td>
                                            <nobr>
                                                <a href="{{ url ('magazines/edit/'.$magazine->id) }}" type="button" class="btn btn-info btn-circle" title="Editar Revista">
                                                    <i class="fa fa-edit">
                                                    </i>
                                                </a>
                                                <a href="{{ url ('magazines/delete/'.$magazine->id) }}" type="button" class="btn btn-warning btn-circle" title="Apagar Revista">
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
                    			{!! $magazines->render() !!}
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