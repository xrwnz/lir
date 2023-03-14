@extends('adminlte::page')

@section('title_postfix', 'Ubah Laporan IR')

@section('content_header')
<h1 class="m-0 text-dark">Perbarui Laporan IR</h1>
@stop

@section('plugins.TempusDominusBs4', true)

@section('content')
<form action="{{route('lir.update', $lir)}}" method="post">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    {{-- Tanggal Ibadah Raya --}}
                    @php
                    $config = [
                        'format' => 'DD-MM-YYYY HH:mm:ss',
                        ];
                    @endphp
                    <x-adminlte-input-date class="datetimepicker-input @error('tglir') is-invalid @enderror" name="tglir" :config="$config" placeholder="Tanggal IR..." label="Tanggal IR" label-class="text-primary" value="{{$lir->tglir ?? old('tglir')}}">
                        <x-slot name="appendSlot">
                            <div class="input-group-text bg-gradient-dark">
                                <i class="fas fa-calendar-alt"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input-date>

                    <?php /*
                    {{-- Tanggal Ibadah Raya alt. --}}
                    <div class="form-group">
                        <div class="input-group date" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input @error('tglir') is-invalid @enderror" id="tglir1" data-target="#tglir1">
                            <div class="input-group-append" data-target="#tglir1" data-toggle="datetimepicker">
                                <div class="input-group-text bg-gradient-dark">
                                    <i class="fas fa-calendar-alt"></i>
                                </div>
                            </div>
                            @error('tglir') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                    */ ?>

                    {{-- Jumlah kehadiran jemaat pria --}}
                    <x-adminlte-input type="number" class="form-control @error('npria') is-invalid @enderror" name="npria" label="Kehadiran Pria" placeholder="Jumlah jemaat pria..." value="{{$lir->npria ?? old('npria')}}" min=0 oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                        <x-slot name="appendSlot">
                            <div class="input-group-text bg-dark">
                                <i class="fas fa-hashtag"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                    @error('npria') <span class="text-danger">{{$message}}</span> @enderror

                    {{-- Jumlah kehadiran jemaat wanita --}}
                    <x-adminlte-input type="number" class="form-control @error('nwanita') is-invalid @enderror" name="nwanita" label="Kehadiran Wanita" placeholder="Jumlah jemaat wanita..." value="{{$lir->nwanita ?? old('nwanita')}}" min=0 oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                        <x-slot name="appendSlot">
                            <div class="input-group-text bg-dark">
                                <i class="fas fa-hashtag"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                    @error('nwanita') <span class="text-danger">{{$message}}</span> @enderror

                    {{-- Jumlah Kehadiran Total --}}
                    <x-adminlte-input type="number" class="form-control" name="nhadir" label="Jumlah Kehadiran" placeholder="Jumlah Kehadiran" value="{{$lir->nhadir ?? old('nhadir')}}" readonly>
                        <x-slot name="appendSlot">
                            <div class="input-group-text bg-dark">
                                <i class="fas fa-hashtag"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                    {{-- @error('nhadir') <span class="text-danger">{{$message}}</span> @enderror --}}

                    {{-- Kolom keterangan / saran --}}
                    <x-adminlte-textarea class="form-control @error('ket') is-invalid @enderror" name="ket" label="Keterangan" placeholder="Isi keterangan, kritik atau saran..." rows=5 igroup-size="sm">{{$lir->ket ?? old('ket')}}
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-dark">
                                <i class="fas fa-lg fa-file-alt text-warning"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-textarea>
                    @error('ket') <span class="text-danger">{{$message}}</span> @enderror

                </div>

            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{route('lir.index')}}" class="btn btn-default">
                    Batal
                </a>
            </div>
        </div>
    </div>
</form>
@stop

@push('js')
<script>
    $(function() {
        /*
        //Date picker
        $('#tglir1').datetimepicker({
            format: 'DD-MM-YYYY HH:mm:ss',
        });

        let value = "{{ $lir->tglir ?? old('tglir', date('d-m-Y h:m:s')) }}";
        $('#tglir1').val(value || "");
        */

        $("#npria, #nwanita").on("input", sum);
        function sum() {
            $("#nhadir").val(Number($("#npria").val()) + Number($("#nwanita").val()));
        }
    });
</script>
@endpush