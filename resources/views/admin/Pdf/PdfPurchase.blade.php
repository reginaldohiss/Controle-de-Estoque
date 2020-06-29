@extends('admin.layout.PdfLayout')

<h4 class="m-0 text-dark text-uppercase text-center mb-5"><strong>Compra Efetuada com Sucesso</strong></h4>

@section('content')
    <div class="row card card-info mt-5">
        <div class="card-body p-0">
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Cliente</th>
                    <th>Produto</th>
                    <th>Preço</th>
                    <th>Vendedor</th>
                    <th>Situação</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$compra->id}}</td>
                        <td>{{$compra->client}}</td>
                        <td>{{$compra->product}}</td>
                        <td>{{$compra->price}}</td>
                        <td>{{$compra->user}}</td>
                        <td><span class="badge badge-success">Bem Sucedido</span></td>
                    </tr>
                </tbody>
            </table>
            <div class="dropdown-divider"></div>
        </div>
        <div class="dropdown-divider"></div>
    </div>


@endsection
    {{date('d/m/y H:i', strtotime($compra->created_at))}}
