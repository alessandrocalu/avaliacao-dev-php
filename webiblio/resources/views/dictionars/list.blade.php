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
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Título</th>
                                        <th>Subtítulo</th>
                                        <th>Edição</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 	@foreach ($dictionars as $dictionar)
                                    <tr>
                                        <td>{{ $dictionar->id }}</td>
                                        <td>{{ $dictionar->material->titulo }}</td>
                                        <td>{{ $dictionar->material->subtitulo }}</td>
                                        <td>{{ $dictionar->edicao }}</td>
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

