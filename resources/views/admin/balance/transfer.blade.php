@extends('adminlte::page')

@section('title', 'Transferir - Sistema de Saldo')

@section('content_header')
    <h1>Transferir</h1>
    <ol class="breadcrumb">
        <li> <a href="">Dashboard </a></li>
        <li> <a href="">Saldo </a></li>
        <li> <a href="">Transferir </a></li>

    </ol>
@stop

@section('content')

    <div class="box box-success">
        <div class="box-header">
            <h3>Fazer Transferência (Informe o Recebedor)</h3>
        </div>

        <div class="box-body">

            @include('admin.includes.alerts')
            
            <form class="form" action="{{ route('balance.confirm-transfer') }}" method="POST">
                {!! csrf_field() !!}
                <div class="form-group">
                    <label for="sender">Nome do Recebedor</label>
                    <input type="text" min="0" class="form-control" name="sender" placeholder="Informação de quem vai receber a transferência (Nome ou Email)">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Proxima Etapa</button>
                </div>
            </form>
        </div>
    </div>
@stop
