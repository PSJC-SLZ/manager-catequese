@extends('default.crud')

@section('boxTitle')
    Editar Comunidade
@stop

@section('boxBody')
    <div class="col-md-12">
        {!! Form::model($data,["url" => url('/') . "/admin/comunidades/edit/".$data->id, "method" => "PUT", "id" => "form", "role" => "form"]) !!}
        @include('admin.comunidades.includes.form')
        {!! Form::close() !!}
    </div>
@stop
