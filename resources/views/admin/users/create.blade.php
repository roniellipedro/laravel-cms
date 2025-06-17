@extends('adminlte::page')

@section('title', 'Novo Usuário')

@section('content_header')
    <h1>
        Novo Usuário
    </h1>
@endsection

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>

    @endif

    <form action="{{ route('users.store') }}" method="POST" class="form-horizontal">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <div class="row">

                    <div class="col-sm-6">
                        Nome Completo

                        <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">

                    <div class="col-sm-6">
                        E-mail

                        <input type="email" name="email" value="{{ old('email') }}"class="form-control">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">

                    <div class="col-sm-6">
                        Senha

                        <input type="password" name="password" class="form-control">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-sm-6">
                        Confirmação da Senha
                        <input type="password" name="password_confirmation" class="form-control">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">

                    <div class="col-sm-6 ">
                        <input type="submit" value="Cadastrar" class="btn btn-success form-control">
                    </div>
                </div>
            </div>

        </div>
    </form>

@endsection
