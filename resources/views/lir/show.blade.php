@extends('adminlte::page')

@section('title_postfix', 'Lihat Input LIR')

@section('content_header')
<h1 class="m-0 text-dark">Detail Input LIR</h1>
@stop

@section('plugins.TempusDominusBs4', true)

@section('content')
{{-- <form> --}}
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    {{-- Tanggal Ibadah Raya --}}
                    <x-adminlte-input type="text" class="form-control" name="tglir" label="Tanggal IR" value="{{$lir->tglir ?? old('tglir')}}" readonly>
                        <x-slot name="appendSlot">
                            <div class="input-group-text bg-dark">
                                <i class="fas fa-calendar-alt"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>

                    {{-- Jumlah kehadiran jemaat pria --}}
                    <x-adminlte-input type="number" class="form-control" name="npria" label="Kehadiran Pria" value="{{$lir->npria ?? old('npria')}}" readonly>
                        <x-slot name="appendSlot">
                            <div class="input-group-text bg-dark">
                                <i class="fas fa-hashtag"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>

                    {{-- Jumlah kehadiran jemaat wanita --}}
                    <x-adminlte-input type="number" class="form-control" name="nwanita" label="Kehadiran Wanita" value="{{$lir->nwanita ?? old('nwanita')}}" readonly>
                        <x-slot name="appendSlot">
                            <div class="input-group-text bg-dark">
                                <i class="fas fa-hashtag"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>

                    {{-- Jumlah Kehadiran Total --}}
                    <x-adminlte-input type="number" class="form-control" name="nhadir" label="Jumlah Kehadiran" value="{{$lir->nhadir ?? old('nhadir')}}" readonly>
                        <x-slot name="appendSlot">
                            <div class="input-group-text bg-dark">
                                <i class="fas fa-hashtag"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>

                    {{-- Kolom keterangan / saran --}}
                    <x-adminlte-textarea class="form-control" name="ket" label="Keterangan" rows=5 igroup-size="sm" readonly>{{$lir->ket ?? old('ket')}}
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-dark">
                                <i class="fas fa-lg fa-file-alt text-warning"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-textarea>

                </div>

            </div>

            <div class="card-footer">
                <a href="{{route('lir.index')}}" class="btn btn-default">
                    Kembali
                </a>
            </div>
        </div>
    </div>
{{-- </form> --}}
@stop

@push('js')
@endpush