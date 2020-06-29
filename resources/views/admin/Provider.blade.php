@extends('admin.layout.admin')

@section('contentElement')
    <h1 class="m-0 text-dark text-uppercase"><strong>Aréa de Fornecedores</strong></h1>
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
                <h3 class="card-title"><b>FORNECEDORES</b></h3>
                <form action="{{route('fornecedor.searchProvider')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div id="example1_filter" class="dataTables_filter float-right">
                                <input name="company" id="pesquisa" type="search" class="form-control form-control-sm" placeholder="Pesquisar Pela Empresa" aria-controls="example1">
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
                                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column descending" aria-sort="ascending" style="">Fornecedor</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="">Empresa</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="">CNPJ</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="">Iden. Produto</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="">Situação</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style=""></th>
                                </tr>
                                </thead>

                                @foreach($provid as $prov)
                                    <tbody>
                                    <tr role="row" class="odd">
                                        <td class="" tabindex="0">{{$prov->id}}</td>
                                        <td class="sorting_1 text-capitalize" style="">{{$prov->provider}}</td>
                                        <td class="" style="">{{$prov->company}}</td>
                                        <td style="">{{$prov->CNPJ}}</td>
                                        <td style="">{{$prov->stock}}</td>
{{--                                        <td style="">{{$provide->stock}}</td>--}}
                                        <td style=""><span class="badge badge-success">cadastrado</span></td>
                                        <td  class="py-0 align-middle">
                                            <div class="row">
                                                <a href="{{route('provider.show', ['provider' => $prov->id])}}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                                <form method="post" action="{{route('provider.destroy', ['provider' => $prov->id])}}">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                                </form>
                                                <a href="{{route('provider.edit', ['provider'=> $prov->id])}}" class="btn btn-info"><i class="fas fa-pencil-alt"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-7">
                            <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                                <div class="container align-content-center ">
                                    @if(isset($dataForm))
                                        {{$provid->appends($dataForm)->links()}}
                                    @else
                                        {{$provid->links()}}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer clearfix">
                <a href="#" data-toggle="modal" data-target="#myModalcad" class="btn btn-sm btn-info float-left">Novo Fornecedor</a>
                <div class="modal fade" id="myModalcad" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title float-left" id="myModalLabel"><strong>Cadastro de Fornecedor</strong></h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{route('provider.store')}}" enctype="multipart/form-data">
                                    @csrf
                                    @if($errors->all())
                                        @foreach($errors->all() as $error)
                                            <script>
                                                Swal.fire({
                                                    icon: 'error',
                                                    title: 'Oops...',
                                                    text: '{{$error}}',
                                                })</script>
                                        @endforeach
                                    @endif
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Fornecedor:</label>
                                        <input name="fornecedor" type="text" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Empresa</label>
                                        <input name="empresa" type="text" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">CNPJ</label>
                                        <input name="cnpj" type="text" class="form-control">
                                    </div>

{{--                                    <div class="form-group">--}}
{{--                                        <label for="recipient-name" class="control-label">ID do Produto</label>--}}
{{--                                        <input name="stock" type="text" class="form-control">--}}
{{--                                    </div>--}}

                                    <div class="form-group">
                                        <label>ID do Produto</label>
                                        <select class="form-control" name="stock">
                                            <option value="">--Selecione um o produto--</option>
                                            @if(isset($provide))
                                                @foreach($provide as $pr)
                                                    <option>{{$pr->id}} - {{$pr->name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">Cadastrar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>



{{-----------------------------------------------------------------------------------------------------------}}
                <a href="{{route('pdf.fornecedor')}}" class="btn btn-sm btn-secondary float-right"> Gerar PDF <i class="fas fa-download"></i></a>
            </div>
        </div>
    </div>
@endsection


