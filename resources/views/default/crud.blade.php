@extends('adminlte::page')

@section('content')
    <div class="row-fluid">
        <div class="box box-success">
            <div class="box-header with-border" style="padding:13px">
                <h2 class="box-title">@yield('boxTitle')</h2>
                <div class="box-tools pull-right">
                    @yield('boxButtons')
                </div>
            </div>
            <div class="box-body">
                @yield('boxBody')
            </div>
        </div>
    </div>
@stop
