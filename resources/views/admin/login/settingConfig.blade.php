@extends('admin.layout.admin')

@section('contentElement')
    <h1 class="m-0 text-dark text-uppercase"><strong> Configurações</strong></h1>
@endsection

@section('content')
    <div class="container m-auto py-5">
            <div class="col-md-12">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <h3 class="profile-username text-center text-uppercase"><strong>{{$user->name}}</strong></h3>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Nome</b> <a class="float-right">{{$user->name}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>E-mail</b> <a class="float-right">{{$user->email}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Telephone</b> <a class="float-right">{{$user->telephone}}</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.card-body -->
                    <div class="container ">
                        <form action="{{route('adm.settingSucess')}}" method="post">
                            @csrf
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
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" name="name" class="form-control" value="{{$user->name}}" id="exampleInputEmail1" aria-describedby="emailHelp"></div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">E-mail</label>
                                <input type="text" name="email" class="form-control" value="{{$user->email}}" id="exampleInputPassword1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Telphone</label>
                                <input type="tel" name="telephone" class="form-control" value="{{$user->telephone}}" id="exampleInputPassword1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Senha</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                            </div>
                            <div class="container">
                                <button type="submit" class="btn btn-primary mb-3">Salvar</button>
                                <a href="{{route('adm.delet', ['user' => $user->id])}}" class="btn btn-sm btn-danger float-right p-2 pr-3 pl-3">Excluir Conta</a>
{{--                                <a href="javascript:void(0)" class="btn btn-sm btn-danger float-right"> Exluir </a>--}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>

@endsection
