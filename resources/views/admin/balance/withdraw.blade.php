@extends('adminlte::page')

@section('title', 'Home - Sistema de Saldo')

@section('content_header')
    <h1>Sacar</h1>
    <ol class="breadcrumb">
        <li> <a href="">Dashboard </a></li>
        <li> <a href="">Saldo </a></li>

    </ol>
@stop

@section('content')

    <div class="box box-success">
        <div class="box-header">
            <h3>Fazer Retirada</h3>
        </div>

        <div class="box-body">

            @include('admin.includes.alerts')
            
            <form class="form" action="{{ route('balance.withdraw.store') }}" method="POST">
                {!! csrf_field() !!}
                <div class="form-group">
                    <input type="number" min="0" class="form-control" name="value" placeholder="Valor da Retirada">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-danger">Sacar</button>
                </div>
            </form>
        </div>
    </div>
@stop
