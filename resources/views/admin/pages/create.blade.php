@extends('adminlte::page')

@section('title', 'Nova Página')

@section('content_header')
    <h1>
        Nova Página
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
        <form action="{{ route('pages.store') }}" method="POST" class="form-horizontal">
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">
                        Título
                    </label>
                    <div class="col-sm-10">
                        <input type="text" name="title" value="{{ old('title') }}"
                            class="form-control @error('title') is-invalid @enderror">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">
                        Corpo
                    </label>
                    <div class="col-sm-10">

                        <textarea name="body" class="form-control">{{ old('body') }}</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">
                    </label>
                    <div class="col-sm-6 ">
                        <input type="submit" value="Criar" class="btn btn-success ">
                    </div>
                </div>

            </div>
        </form>
    </div>

@endsection
