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
            <div class="mb-0">
                @foreach ($errors->all() as $error)
                    <i class="icon fas fa-ban"></i>
                    <span>{{ $error }}</span>
                    <br>
                @endforeach
            </div>
        </div>

    @endif

    <div class="card">
        <form action="{{ route('users.store') }}" method="POST" class="form-horizontal">
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">
                        Nome Completo
                    </label>
                    <div class="col-sm-10">
                        <input type="text" name="name" value="{{ old('name') }}"
                            class="form-control @error('name') is-invalid @enderror">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">
                        E-mail
                    </label>
                    <div class="col-sm-10">
                        <input type="email" name="email" value="{{ old('email') }}"
                            class="form-control @error('email') is-invalid @enderror">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">
                        Senha
                    </label>
                    <div class="col-sm-10">
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">
                        Confirmação da Senha
                    </label>
                    <div class="col-sm-10">
                        <input type="password" name="password_confirmation"
                            class="form-control @error('password_confirmation') is-invalid @enderror">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">
                    </label>
                    <div class="col-sm-6 ">
                        <input type="submit" value="Cadastrar" class="btn btn-success ">
                    </div>
                </div>

            </div>
        </form>
    </div>

@endsection
