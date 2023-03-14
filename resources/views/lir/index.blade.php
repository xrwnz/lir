@extends('adminlte::page')

@push('css')
<link href="{{ asset('css/custom.css') }}" rel="stylesheet">
@endpush

@section('title_postfix', 'Daftar Laporan IR')

@section('content_header')
<h1 class="m-0 text-dark">Daftar Laporan IR</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <a class="btn btn-primary mb-2 shadow" data-toggle="modal" data-target="#modal-create-lir" role="button" title="Buat Laporan IR">Buat Laporan IR</a>
                @include('partials.createlirmod')
                <?php
                /* <a href="{{route('lir.create')}}" class="btn btn-primary mb-2">Buat Laporan IR</a> data-toggle="modal" data-target="#modal-create-lir"
                <a class="btn btn-primary mb-2 shadow" data-toggle="modal" data-target="#modal-create-lir" role="button" title="Buat Laporan IR">Buat Laporan IR</a>
                
                @include('partials.createlirmod')
                */ ?>

                @php
                $headers = [
                'No.',
                ['label' => 'Tgl IR', 'width' => 15],
                ['label' => 'Ibadah', 'width' => 20],
                ['label' => 'Pria', 'width' => 10],
                ['label' => 'Wanita', 'width' => 10],
                ['label' => 'Kehadiran', 'width' => 10],
                ['label' => 'Keterangan', 'width' => 50],
                ['label' => 'Opsi', 'no-export' => true, 'width' => 5],
                ];
                $configs = [
                // 'data' => $data,
                'order' => [[1, 'asc']],
                'columns' => [null, null, null, null, null, null, null, ['orderable' => false]],
                // 'buttons' => ['', '', '', '', 'colvis'],
                ];
                @endphp
                {{-- table berisi list laporan evaluasi IR yang pernah dibuat --}}
                <x-adminlte-datatable id="tblir" :heads="$headers" :config="$configs" hoverable bordered striped with-buttons head-theme="dark">

                    @foreach($lirs as $key => $lir)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$lir->tglir->format('d-m-Y')}}</td>
                        <td>{{$lir->Ir->irnm}}</td>
                        <td>{{$lir->npria}}</td>
                        <td>{{$lir->nwanita}}</td>
                        <td>{{$lir->nhadir}}</td>
                        <td>{{$lir->ket}}</td>
                        <td>
                            @include('partials.editlirmod', ['prmid' => $lir->lirid])
                            @include('partials.deletelirmod', ['prmid' => $lir->lirid])
                            @include('partials.showlirmod')
                            <nobr>
                                <?php /*
                                    <button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit" onclick="onEdit(event, this)" href="{{route('lir.edit', $lir)}}">
                                        <i class="fa fa-lg fa-fw fa-pen"></i>
                                    </button>

                                    <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete" onclick="notificationBeforeDelete(event, this)" href="{{route('lir.destroy', $lir)}}">
                                        <i class="fa fa-lg fa-fw fa-trash"></i>
                                    </button>

                                    <button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Preview" onclick="onShow(event, this)" href="{{route('lir.show', $lir)}}">
                                        <i class="fa fa-lg fa-fw fa-eye"></i>
                                    </button>
                                    */ 
                                ?>

                                <button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit" data-toggle="modal" data-target="#modal-edit-lir-{{ $lir->lirid }}">
                                    <i class="fa fa-lg fa-fw fa-pen"></i>
                                </button>

                                <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete" data-toggle="modal" data-target="#modal-delete-lir-{{ $lir->lirid }}">
                                    <i class="fa fa-lg fa-fw fa-trash"></i>
                                </button>

                                <a class="btn btn-xs btn-default text-teal mx-1 shadow" role="button" title="Detail" data-toggle="modal" data-target="#modal-show-lir-{{ $lir->lirid }}">
                                    <i class="fa fa-lg fa-fw fa-eye"></i>
                                </a>
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

<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"></script>
<script>
    $(".modal-dialog").draggable({
        cursor: "move",
        handle: ".modal-header",
    });

    //clear form first time after page completely loaded (ready)
    $(document).ready(function() {
        $('#modal-create-lir').find('form').trigger('reset');
    });

    //clear form after submit
    $('#modal-create-lir').submit(function() {
        this.submit();
        $('#modal-create-lir').find('form').trigger('reset');
        return false;
    });

    //
    $('.modal').on('show.bs.modal', function() {
        // var contentHeight = $(window).height() - 60;
        // var headerHeight = $(this).find('.modal-header').outerHeight() || 2;
        // var footerHeight = $(this).find('.modal-footer').outerHeight() || 2;

        // $('.modal').css('margin-top', (Math.floor((window.innerHeight - $('.modal')[0].offsetHeight) / 2) + 'px'));
    });

    $('.modal').on('hidden.bs.modal', function() {

    });

    $('#modal-create-lir').on('hidden.bs.modal', function() {
        $(this).removeClass('invisible');
    });

    //clear form di modal pop-up saat page selesai di load oleh browser
    // $(document).ready(function() { //same as: $(function() { 
    //     $('#modal-create-lir').find('form').trigger('reset');
    // });

    /*

    $(document).ready("ready", function() {
        $('#modal-create-lir').find('form').trigger('reset');
    });
    
    function notificationBeforeDelete(event, el) {
        event.preventDefault();
        if (confirm('Apakah anda yakin akan menghapus data ? ')) {
            $("#delete-form").attr('action', $(el).attr('href'));
            $("#delete-form").submit();
        }
    }

    // reset modal if it isn't visible
    if (!$(".modal.in").length) {
        $(".modal-dialog").css({
            top: 20,
            left: 100,
        });
    }

    $("#btncreate").click(function() {
        //open modal
        $("#modal-create-lir").modal({
            backdrop: false,
            show: true,
        });
        //
    });

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