@extends('layout.plane')

@section('body')


    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url ('') }}">Sistema Web Biblio</a>
            </div>
            <!-- /.navbar-header -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <!--<li {{ (Request::is('*usuarios') ? 'class="active"' : '') }}>
                            <a href="{{ url ('usuarios') }}"><i class="fa fa-group fa-fw"></i> Usuários</a>
                        </li>-->
                        <li {{ (Request::is('*authors') ? 'class="active"' : '') }}>
                            <a href="{{ url ('authors') }}"><i class="fa fa-group fa-fw"></i> Autores</a>
                        </li>
                        <li {{ (Request::is('*books') ? 'class="active"' : '') }}>
                            <a href="{{ url ('books') }}"><i class="fa fa-book fa-fw"></i> Livros</a>
                        </li>
                        <li {{ (Request::is('*dictionars') ? 'class="active"' : '') }}>
                            <a href="{{ url ('dictionars') }}"><i class="fa fa-book fa-fw"></i> Dicionários</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">@yield('page_heading')</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
				@yield('section')
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

@stop