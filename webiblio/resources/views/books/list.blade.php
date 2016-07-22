@extends('layout.menu')
@section('page_heading','Livros')
@section('section')
<div class="container">
    <div class="content">
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-10">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Listagem de Livros
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <div class="pull-right">
                                <a href="{{ url ('books/create') }}" type="button" class="btn btn-primary">Novo Livro</a>
                            </div>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Título</th>
                                        <th>Subtítulo</th>
                                        <th>ISBN</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 	@foreach ($books as $book)
                                    <tr>
                                        <td>{{ $book->id }}</td>
                                        <td>{{ $book->material->titulo }}</td>
                                        <td>{{ $book->material->subtitulo }}</td>
                                        <td>{{ $book->isbn }}</td>
                                        <td>
                                            <nobr>
                                                <a href="{{ url ('books/edit/'.$book->id) }}" type="button" class="btn btn-info btn-circle" title="Editar Livro">
                                                    <i class="fa fa-edit">
                                                    </i>
                                                </a>
                                                <a href="{{ url ('books/destroy/'.$book->id) }}" type="button" class="btn btn-warning btn-circle" title="Apagar Livro">
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
                    			{!! $books->render() !!}
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