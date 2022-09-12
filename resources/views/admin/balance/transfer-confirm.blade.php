@extends('adminlte::page')

@section('title', 'Transferencia - Sistema de Saldo')

@section('content_header')
    <h1>Confirmar Transferência</h1>
    <ol class="breadcrumb">
        <li> <a href="">Dashboard </a></li>
        <li> <a href="">Saldo </a></li>
        <li> <a href="">Transferir </a></li>
        <li> <a href="">Confirmar Transferência </a></li>

    </ol>
@stop

@section('content')

    <div class="box box-success">
        <div class="box-header">
            <h3>Confirmar Transferência de Saldo</h3>
        </div>

        <div class="box-body">

            @include('admin.includes.alerts')
            <p><Strong>Seu Saldo Atual: R$  {{number_format($balance->amount, 2 ,',', '.') }}</Strong></p>
            <form class="form" action="{{ route('balance.confirm-transfer-store') }}" method="POST">
                {!! csrf_field() !!}

                <input type="hidden" name="sender_id" value="{{ $sender->id }}">
                <div class="form-group">
                    <label for="sender">Valor da Transferência</label>
                    <input type="number" min="0" class="form-control" name="value" placeholder="Informe o valor da transferência">
                </div>
                <div class="form-group">
                    <label>Nome de quem vai receber</label>
                    <input type="text" class="form-control" readonly value="{{ $sender->name }}" >
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Transferir</button>
                </div>
            </form>
        </div>
    </div>
@stop
