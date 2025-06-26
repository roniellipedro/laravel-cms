@extends('adminlte::page')

@section('plugins.Chartjs', true)

@section('title', 'Painel')

@section('content_header')
    <div class="row align-items-center mb-4">
        <div class="col-md-6">
            <h1 class="mb-0">Dashboard</h1>
        </div>

        <div class="col-md-6 d-flex justify-content-md-end">
            <form action="{{ route('painel.filter') }}" class="form-inline flex-nowrap w-auto">
                <label for="start_date" class="mr-2 mb-0 font-weight-bold">Data inicial</label>
                <input id="start_date" name="start_date" type="date" class="form-control mr-3"
                    value="{{ old('start_date', $start_date ?? date('Y-m-d')) }}" required>

                <label for="end_date" class="mr-2 mb-0 font-weight-bold">Data final</label>
                <input id="end_date" name="end_date" type="date" class="form-control mr-3"
                    value="{{ old('end_date', $end_date ?? date('Y-m-d')) }}" required>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-filter mr-1"></i> Filtrar
                </button>
            </form>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $visitsCount }}</h3>
                    <p>Acessos</p>
                </div>
                <div class="icon">
                    <i class="far fa-fw fa-eye"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $onlineCount }}</h3>
                    <p>Usuários Online</p>
                </div>
                <div class="icon">
                    <i class="far fa-fw fa-heart"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $pageCount }}</h3>
                    <p>Páginas</p>
                </div>
                <div class="icon">
                    <i class="far fa-fw fa-sticky-note"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $userCount }}</h3>
                    <p>Usuários</p>
                </div>
                <div class="icon">
                    <i class="far fa-fw fa-user"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Páginas mais visitadas</h3>
                </div>
                <div class="card-body">
                    <canvas id="pagePie">

                    </canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Sobre o sistema</h3>
                </div>
                <div class="card-body">
                    ...
                </div>
            </div>
        </div>
    </div>

    <script>
        window.onload = function() {
            let ctx = document.getElementById('pagePie').getContext('2d');
            window.pagePie = new Chart(ctx, {
                type: 'pie',
                data: {
                    datasets: [{
                        data: {{ $pageValues }},
                        backgroundColor: '#0000FF'
                    }],
                    labels: {!! $pageLabels !!}
                },
                options: {
                    responsive: true,
                    legend: {
                        display: false
                    }
                }
            });
        }
    </script>

@endsection
