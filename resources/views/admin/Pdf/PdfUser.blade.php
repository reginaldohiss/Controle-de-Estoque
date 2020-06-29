@extends('admin.layout.PdfLayout')

<h4 class="m-0 text-dark text-uppercase text-center mb-5"><strong>Usuarios no Sistema</strong></h4>

@section('content')
    <div class="card card-info mt-5">
        <div class="card-body p-0">
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Telephone</th>
                    <th>Situação</th>
                </tr>
                </thead>
                <tbody>

                @foreach($usuario as $use)
                    <tr>
                        <td>{{$use->id}}</td>
                        <td>{{$use->name}}</td>
                        <td>{{$use->email}}</td>
                        <td>{{$use->telephone}}</td>
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
