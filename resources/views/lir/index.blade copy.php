@extends('adminlte::page')

@section('title_postfix', 'Daftar Laporan IR')

@section('content_header')
<h1 class="m-0 text-dark">Daftar Laporan IR</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <a href="{{route('lir.create')}}" class="btn btn-primary mb-2">
                    Buat Laporan IR
                </a>

                @php
                $headers = [
                'No.',
                ['label' => 'Tgl IR', 'width' => 12],
                ['label' => 'Pria', 'width' => 10],
                ['label' => 'Wanita', 'width' => 10],
                ['label' => 'Kehadiran', 'width' => 10],
                ['label' => 'Keterangan', 'width' => 50],
                ['label' => 'Opsi', 'no-export' => true, 'width' => 5],
                ];
                $configs = [
                // 'data' => $data,
                'order' => [[1, 'asc']],
                'columns' => [null, null, null, null, null, null, ['orderable' => false]],
                // 'buttons' => ['', '', '', '', 'colvis'],
                ];
                @endphp
                {{-- table berisi list laporan evaluasi IR yang pernah dibuat --}}
                <x-adminlte-datatable id="tblir" :heads="$headers" :config="$configs" hoverable bordered striped with-buttons head-theme="dark">

                    @foreach($lirs as $key => $lir)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$lir->tglir}}</td>
                        <td>{{$lir->npria}}</td>
                        <td>{{$lir->nwanita}}</td>
                        <td>{{$lir->nhadir}}</td>
                        <td>{{$lir->ket}}</td>
                        <td>
                            <nobr>
                                <?php /*
                                <button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit" onclick="onEdit(event, this)" href="{{route('lir.edit', $lir)}}">
                                    <i class="fa fa-lg fa-fw fa-pen"></i>
                                </button>

                                <button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Preview" onclick="onShow(event, this)" href="{{route('lir.show', $lir)}}">
                                    <i class="fa fa-lg fa-fw fa-eye"></i>
                                </button>
                                */ ?>

                                <button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit" data-toggle="modal" data-target="#modal-edit-lir-{{ $lir->lirid }}">
                                    <i class="fa fa-lg fa-fw fa-pen"></i>
                                </button>
                                @include('partials.editlirmod', ['prmid' => $lir->lirid])

                                <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete" onclick="notificationBeforeDelete(event, this)" href="{{route('lir.destroy', $lir)}}">
                                    <i class="fa fa-lg fa-fw fa-trash"></i>
                                </button>

                                <a class="btn btn-xs btn-default text-teal mx-1" role="button" title="Detail" data-toggle="modal" data-target="#modal-show-lir-{{ $lir->lirid }}"><i class="fa fa-lg fa-fw fa-eye"></i></a>
                                @include('partials.showlirmod')

                            </nobr>
                        </td>
                    </tr>
                    @endforeach

                </x-adminlte-datatable>

            </div>
        </div>
    </div>
</div>
@stop

@push('js')
<form action="" id="delete-form" method="post">
    @method('delete')
    @csrf
</form>
<form action="" id="edit-form" method="get">@csrf</form>
<form action="" id="show-form" method="get">@csrf</form>

<script>
    function notificationBeforeDelete(event, el) {
        event.preventDefault();
        if (confirm('Apakah anda yakin akan menghapus data ? ')) {
            $("#delete-form").attr('action', $(el).attr('href'));
            $("#delete-form").submit();
        }
    }

    function onEdit(event, el) {
        event.preventDefault();
        $("#edit-form").attr('action', $(el).attr('href'));
        $("#edit-form").submit();
    }

    function onShow(event, el) {
        event.preventDefault();
        $("#edit-form").attr('action', $(el).attr('href'));
        $("#edit-form").submit();
    }

    /*
    $(function() {
        $("#tblir").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#tblir_wrapper .col-md-6:eq(0)');
    })
    */
</script>
@endpush