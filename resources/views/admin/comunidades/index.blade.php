@extends('default.crud')

@section('boxTitle')
    Lista de Comunidades
@stop

@section('boxButtons')
    <a href="/admin/comunidades/create" class="btn btn-primary"><i class="fa fa-plus"></i> Novo</a>
@stop

@section('boxBody')
    {{-- Setup data for datatables --}}
    {!!
        $tableData;
    !!}
    @php
        $heads = [
            'ID',
            'Nome',
            'Data Criação',
            'Data Atualização',
            ['label' => 'Ações', 'no-export' => true, 'width' => 5],
        ];

        $array = [];
        foreach ($tableData as $row) {
            $form = "<form action=\"/\" method=\"get\">";
            $endform = "</form>";
            $btnEdit = "<button class=\"btn btn-xs btn-default text-primary mx-1 shadow\" title=\"Edit\"
                            formaction=\"/admin/comunidades/edit/$row->id\" type=\"submit\">
                            <i class=\"fa fa-lg fa-fw fa-pen\"></i>
                        </button>";
            $array[] = [$row->id, $row->nome, $row->create_at, $row->update_at, "<nobr>$form$btnEdit$endform</nobr>"];
        }

        $config = [
            'data' => $array,
            'order' => [[1, 'asc']],
            'columns' => [null, null, null, null, ['orderable' => false]],
        ];


    @endphp

    {{-- Minimal example / fill data using the component slot --}}
    <x-adminlte-datatable id="table1" :heads="$heads" theme="light" :config="$config" striped with-buttons hoverable>
        @foreach($config['data'] as $row)
            <tr>
                @foreach($row as $cell)
                    <td>{!! $cell !!}</td>
                @endforeach
            </tr>
        @endforeach
    </x-adminlte-datatable>

@stop
