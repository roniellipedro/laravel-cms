@extends('adminlte::page')

@section('title', 'Editar Usuário')

@section('content_header')
    <h1>
        Editar Página
    </h1>
@endsection

@section('content')

    @php($tinymceKey = config('services.tinymce.key'))

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

    @if (session('warning'))
        <div class="alert alert-success">
            <div class="mb-0">
                {{ session('warning') }}
            </div>
        </div>
    @endif

    <div class="card">
        <form action="{{ route('pages.update', ['id' => $page->id]) }}" method="POST" class="form-horizontal">
            @method('PUT')
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">
                        Título
                    </label>
                    <div class="col-sm-10">
                        <input type="text" name="title" value="{{ $page->title }}"
                            class="form-control @error('title') is-invalid @enderror">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">
                        Corpo
                    </label>
                    <div class="col-sm-10">
                        <textarea name="body" class="form-control bodyfield">{{ $page->body }}</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">
                    </label>
                    <div class="col-sm-6 ">
                        <input type="submit" value="Salvar" class="btn btn-success ">
                    </div>
                </div>

            </div>
        </form>
    </div>

    <script src="https://cdn.tiny.cloud/1/{{ $tinymceKey }}/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea.bodyfield',
            height: 300,
            menubar: false,
            statusbar: false,
            plugins: ['link', 'table', 'image', 'autoresize', 'lists'],
            toolbar: 'undo redo | blocks | bold italic backcolor | alignleft aligncenter alignright alignjustify | table | link image | bullist numlist',
            content_css: [
                '{{ asset('assets/css/content.css') }}'
            ]
        });
    </script>
@endsection
