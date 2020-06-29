@extends('admin.layout.admin')


@section('contentElement')
    <h1 class="m-0 text-dark text-uppercase"><strong> Usuários no Sistema</strong></h1>
@endsection



@section('rowContent')
    <div class="container py-3">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><a href="{{route('adm.setting')}}"><i class="fas fa-cog"></i></a></span>

                    <div class="info-box-content">
                        <span class="info-box-text"> Cofigurações de Perfil</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><a href="{{route('painel.userAll')}}"><i class="ion ion-person-add"></i></a></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Usuário</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><a href="{{route('purchase.index')}}"><i class="fas fa-shopping-cart"></i></a></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Carrinho</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"> <a href="{{route('client.index')}}"><i class="fas fa-users"></i></a></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Cliente</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
    </div>
@endsection

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><b>USUÁRIOS</b></h3>
                <form action="{{route('painel.search')}}" method="post">
                    @csrf
                    <div class="row">
                            <div class="col-sm-12">
                                <div id="example1_filter" class="dataTables_filter float-right">
                                    <input name="name" id="pesquisa" type="search" class="form-control form-control-sm" placeholder="Pesquisar Pelo Nome" aria-controls="example1">
                                </div>
                            </div>
                    </div>
                </form>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending">ID</th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column descending" aria-sort="ascending" style="">Nome</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="">Telephone</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="">E-mail</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="">Situação</th>
                                    </tr>
                                </thead>

                                @foreach($users as $use)
                                    <tbody>
                                        <tr role="row" class="odd">
                                            <td class="" tabindex="0">{{$use->id}}</td>
                                            <td class="sorting_1 text-capitalize" style="">{{$use->name}}</td>
                                            <td class="" style="">{{$use->telephone}}</td>
                                            <td style="">{{$use->email}}</td>
                                                <td style=""><span class="badge badge-success">cadastrado</span></td>
                                        </tr>
                                    </tbody>
                                @endforeach
                             </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-7">
                            <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                                <div class="container align-content-center mt-3">
                                    @if(isset($dataForm))
                                        {{$users->appends($dataForm)->links()}}
                                    @else
                                        {{$users->links()}}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
                <a href="{{route('pdf.usuario')}}" class="btn btn-sm btn-secondary float-right"> Gerar PDF <i class="fas fa-download"></i></a>
            </div>
        </div>
    </div>
@endsection
