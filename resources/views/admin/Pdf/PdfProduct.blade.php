@extends('admin.layout.PdfLayout')

@section('content')
    <h4 class="m-0 text-dark text-uppercase text-center mb-5"><strong> Linha de Produtos</strong></h4>

    <div class="card card-info mt-5">
            <div class="card-body p-0">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Unidade</th>
                        <th>Código</th>
                        <th>Preço(R$)</th>
                        <th>Estoque</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($produt)
                    @foreach($produt as $prod)
                        <tr>
                            <td>{{$prod->id}}</td>
                            <td>{{$prod->name}}</td>
                            <td>{{$prod->unity}}</td>
                            <td>{{$prod->code}}</td>
                            <td>{{$prod->price}}</td>
                            <td>{{$prod->stock}}</td>

                        </tr>
                    @endforeach
                    @endif
                    </tbody>
                </table>
                <div class="dropdown-divider"></div>
            </div>
            <div class="dropdown-divider"></div>
        </div>


@endsection
