@extends('site.layouts.app')

@section('title', 'Meu Perfil')
@section('content')

    <h1>Meu Perfil</h1>

   @include('site.includes.alerts')
    <form action=" {{route('profile.update')  }} " class="form" method="post" enctype="multipart/form-data">

        {!! csrf_field() !!}
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="name" value="{{ auth()->user()->name }}" name="name" class="form-control"  placeholder="Seu nome">
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" name="email" value="{{ auth()->user()->email }}" class="form-control" placeholder="Seu melhor  email">
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Password">
        </div>
        <div class="form-group">

            @if (auth()->user()->image != null )
                    <img src="{{ url('storage/users/'.auth()->user()->id .'/' .auth()->user()->image) }}" alt="{{ auth()->user()->name }}" style="max-width: 50px;">
            @endif
            <label for="file">Foto</label>
            <input type="file" name="image" class="form-control" placeholder="Imagem do Perfil">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
