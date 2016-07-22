@extends('layout.menu')
@section('page_heading','Autores')
@section('section')
<div class="container">
    <div class="content">
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-10">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Listagem de Autores
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <div class="pull-right">
                                <a href="{{ url ('authors/create') }}" type="button" class="btn btn-primary">Novo Autor</a>
                            </div>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Notação</th>
                                        <th>Nome</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 	@foreach ($authors as $author)
                                    <tr>
                                        <td>{{ $author->id }}</td>
                                        <td>{{ $author->notacao }}</td>
                                        <td>{{ $author->nome }}</td>
                                        <td>
                                            <nobr>
                                                <a href="{{ url ('authors/edit/'.$author->id) }}" type="button" class="btn btn-info btn-circle" title="Editar Autor">
                                                    <i class="fa fa-edit">
                                                    </i>
                                                </a>
                                                <a href="{{ url ('authors/delete/'.$author->id) }}" type="button" class="btn btn-warning btn-circle" title="Apagar Autor">
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
                    			{!! $authors->render() !!}
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