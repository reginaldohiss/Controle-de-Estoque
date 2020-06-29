@extends('admin.layout.layout')

@section('content')
    <div class="wrapper fadeInDown">

            <!-- Icon -->
            <div class="fadeIn first">
               <h2>Controle de Estoque</h2>
            </div>

        <div id="formContent">
            <!-- Tabs Titles -->

            <!-- Login Form -->
            <form action="{{route('adm.register')}}" method="post">
                @csrf

                @if($errors->all())
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">
                            {{$error}}
                        </div>
                    @endforeach
                @endif
                <input type="text" id="login" class="fadeIn second" name="email" placeholder="email">
                <input type="password" id="password" class="fadeIn third" name="password" placeholder="password">
                <input type="submit" class="fadeIn fourth" value="Entrar">
            </form>

            <!-- Remind Passowrd -->
            <div id="formFooter">
                <a class="underlineHover" href="{{route('adm.new')}}">Não Sou Cadastrado?</a>
            </div>

        </div>
    </div>
@endsection
