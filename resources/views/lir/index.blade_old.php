@extends('adminlte::page')

@section('title_postfix', ' - Laporan IR')

@section('content_header')
<h1 class="m-0 text-dark">{{ __('Daftar Laporan IR') }}</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <a href="{{route('lir.create')}}" class="btn btn-primary mb-2">
                    Buat Laporan IR
                </a>

                <table class="table table-hover table-bordered table-stripped" id="example2">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Tgl IR</th>
                            <th>Pria</th>
                            <th>Wanita</th>
                            <th>Kehadiran</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($lirs as $key => $lir)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$lir->tglir}}</td>
                            <td>{{$lir->npria}}</td>
                            <td>{{$lir->nwanita}}</td>
                            <td>{{$lir->nhadir}}</td>
                            <td>{{$lir->ket}}</td>
                            <td>
                                <a href="{{route('lir.edit', $user)}}" class="btn btn-primary btn-xs">
                                    Edit
                                </a>
                                <a href="{{route('lir.destroy', $user)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                    Delete
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

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
<script>
    $('#example2').DataTable({
        "responsive": true,
    });

    function notificationBeforeDelete(event, el) {
        event.preventDefault();
        if (confirm('Apakah anda yakin akan menghapus data ? ')) {
            $("#delete-form").attr('action', $(el).attr('href'));
            $("#delete-form").submit();
        }
    }
</script>
@endpush