@extends('admin.layout.admin')


@section('contentElement')
    <h1 class="m-0 text-dark text-uppercase"><strong> Linha de Produtos</strong></h1>
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
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title"><b>PRODUTOS</b></h3>
                <form action="{{route('painel.searchProduct')}}" method="post">
                    @csrf
                    <div class="col-sm-12">
                        <div id="example1_filter" class="dataTables_filter float-right">
                                <input type="search" name="code" class="form-control form-control-sm "  placeholder="Pesquisar Pelo Codigo" aria-controls="example1">
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-body p-0">
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Unidade</th>
                        <th>Código</th>
                        <th>Preço(R$)</th>
                        <th>Estoque</th>
{{--                        <th>Empresa</th>--}}
                    </tr>
                    </thead>
                    <tbody>

            @foreach($products as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td class="text-capitalize">{{$product->name}}</td>
                        <td>{{$product->unity}}</td>
                        <td>{{$product->code}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->stock}}</td>
{{--                        @if(isset($prov))--}}
{{--                            @foreach($prov as $pr)--}}
{{--                                <td>{{$pr->company}}</td>--}}
{{--                            @endforeach--}}
{{--                        @endif--}}
                        <td class="py-0 align-middle">
                            <div class="row">
                                <a href="{{route('product.show', ['product' => $product])}}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                <form method="post" action="{{route('product.destroy', ['product' => $product])}}">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
                                <a href="{{route('product.edit', ['product' => $product])}}" class="btn btn-info"><i class="fas fa-pencil-alt"></i></a>
                            </div>
                        </td>
                    </tr>
            @endforeach
                    </tbody>
                </table>
            </div>
            <div class="dropdown-divider"></div>

            <div class="container align-content-center mt-3">
                @if(isset($dataForm))
                    {{$products->appends($dataForm)->links()}}
                @else
                    {{$products->links()}}
                @endif
            </div>

            <!-- /.card-body -->
            <div class="card-footer clearfix">
                <a href="#" data-toggle="modal" data-target="#myModalcad" class="btn btn-sm btn-info float-left">Novo Produto</a>
                <div class="modal fade" id="myModalcad" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title float-left" id="myModalLabel"><strong>Cadastro de Produto</strong></h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{route('product.store')}}" enctype="multipart/form-data">
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
                                        <label for="recipient-name" class="control-label">Nome:</label>
                                        <input name="nome" type="text" class="form-control">
                                    </div>

                                        <div class="form-group">
                                            <label>Unidade</label>
                                            <select class="form-control" name="unidade">
                                                <option>UNI</option>
                                                <option>KG</option>
                                            </select>
                                        </div>

                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Codigo</label>
                                        <input name="codigo" type="text" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Preço</label>
                                        <input name="preco" type="text" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Estoque</label>
                                        <input name="stock" type="text" class="form-control">
                                    </div>

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">Cadastrar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Fim Modal -->
                <a href="{{route('pdf.produto')}}" class="btn btn-sm btn-secondary float-right"> Gerar PDF <i class="fas fa-download"></i></a>
            </div>
        </div>
    </div>
@endsection


