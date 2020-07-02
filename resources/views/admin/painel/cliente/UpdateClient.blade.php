@extends('admin.layout.admin')

@section('contentElement')
    <h1 class="m-0 text-dark text-uppercase"><strong>Linha de Clientes</strong></h1>
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
    <div class="modal-dialog" >
        <div class="modal-content col-sm-12">
            <div class="modal-header">
                <h4 class="modal-title float-left"><strong>Atualizando Cliente</strong></h4>
            </div>
            <div class="modal-body col-12">
                <form method="POST" action="{{route('client.update', ['client' => $clien])}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @if($errors->all())
                        @foreach($errors->all() as $error)
                            <script>
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: '{{$error}}',
                                    // footer: '<a href>Why do I have this issue?</a>'
                                })</script>
                        @endforeach
                    @endif
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Cliente:</label>
                        <input name="cliente" value="{{$clien->client}}" type="text" class="form-control">
                    </div>
                    {{--                    <div class="form-group">--}}
                    {{--                        <label>Unidade</label>--}}
                    {{--                        <select class="form-control" name="unidade">--}}
                    {{--                            @if($product->unity === "KG")--}}
                    {{--                                <option>{{$product->unity}}</option>--}}
                    {{--                                <option>UNI</option>--}}
                    {{--                            @elseif($product->unity === "UNI")--}}
                    {{--                                <option>{{$product->unity}}</option>--}}
                    {{--                                <option>KG</option>--}}
                    {{--                            @endif--}}

                    {{--                        </select>--}}
                    {{--                    </div>--}}

                    <div class="form-group">
                        <label for="recipient-name" class="control-label">CPF</label>
                        <input name="cpf" value="{{$clien->CPF}}" type="text" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Identidade</label>
                        <input name="identidade"  value="{{$clien->Identity}}" type="text" class="form-control">
                    </div>

                    <div class="modal-footer">
                        <a href="{{route('client.index')}}" type="submit" class="btn btn-secondary">Voltar</a>
                        <button type="submit" class="btn btn-success">Atualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
