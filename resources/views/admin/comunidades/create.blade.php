@extends('default.crud')

@section('boxTitle')
    Cadastro de Comunidades
@stop

@section('boxBody')
    <div class="col-md-12">
        {!! Form::open(["url" => url('/') . "/admin/comunidades/create", "method" => "POST", "id" => "form", "role" => "form"]) !!}
        @include('admin.comunidades.includes.form')
        {!! Form::close() !!}
    </div>
@stop
