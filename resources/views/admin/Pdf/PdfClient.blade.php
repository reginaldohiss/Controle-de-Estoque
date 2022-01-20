@extends('admin.layout.PdfLayout')

<h4 class="m-0 text-dark text-uppercase text-center mb-5"><strong>Clientes no Sistema</strong></h4>

@section('content')
    <div class="card card-info mt-5">
        <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Cliente</th>
                    <th>CPF</th>
                    <th>Identidade</th>
                    <th>Situação</th>
                </tr>
                </thead>
                <tbody>

                @foreach($cliente as $clien)
                    <tr>
                        <td>{{$clien->id}}</td>
                        <td>{{$clien->client}}</td>
                        <td>{{$clien->CPF}}</td>
                        <td>{{$clien->Identity}}</td>
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
