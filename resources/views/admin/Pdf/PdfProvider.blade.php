@extends('admin.layout.PdfLayout')

<h4 class="m-0 text-dark text-uppercase text-center mb-5"><strong>Fornecedores no Sistema</strong></h4>

@section('content')
    <div class="card card-info mt-5">
        <div class="card-body p-0">
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Fornecedor</th>
                    <th>Empresa</th>
                    <th>CNPJ</th>
                    <th>ID do Produto</th>
                    <th>Situação</th>
                </tr>
                </thead>
                <tbody>

                @foreach($fornecedor as $fornece)
                    <tr>
                        <td>{{$fornece->id}}</td>
                        <td>{{$fornece->provider}}</td>
                        <td>{{$fornece->company}}</td>
                        <td>{{$fornece->CNPJ}}</td>
                        <td class="text-center">{{$fornece->stock}}</td>
                        <td><span class="badge badge-success">cadastrado</span></td>

                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="dropdown-divider"></div>
        </div>
        <div class="dropdown-divider"></div>
    </div>


@endsection
