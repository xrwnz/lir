@extends('adminlte::page')

@section('title_postfix', 'Tambah Laporan IR')

@section('content_header')
<h1 class="m-0 text-dark">Buat Laporan IR</h1>
@stop

@section('plugins.Select2', true)

@section('content')
<form action="{{route('lir.store')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    {{-- Tanggal Ibadah Raya --}}
                    <div class="form-group">
                        @php
                        $config = [
                        'format' => 'DD-MM-YYYY HH:mm:ss',
                        /*
                        'dayViewHeaderFormat' => 'MMM YYYY',
                        'minDate' => "js:moment().startOf('month')",
                        'maxDate' => "js:moment().endOf('month')",
                        'daysOfWeekDisabled' => [0, 6],
                        */
                        ];
                        @endphp
                        <x-adminlte-input-date class="datetimepicker-input @error('tglir') is-invalid @enderror" name="tglir" :config="$config" placeholder="Tanggal IR..." label="Tanggal IR" label-class="text-primary" value="{{old('tglir')}}">
                            <x-slot name="appendSlot">
                                <div class="input-group-text bg-gradient-dark">
                                    <i class="fas fa-calendar-alt"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input-date>
                        @error('tglir') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    {{-- Waktu Ibadah Raya Mulai --}}
                    @php
                    $config = [
                    'format' => 'LT',
                    ];
                    @endphp
                    <x-adminlte-input-date class="datetimepicker-input @error('wktir1') is-invalid @enderror" name="wktir1" :config="$config" placeholder="Waktu IR dimulai..." label="Ibadah Mulai" value="" required>
                        <x-slot name="appendSlot">
                            <div class="input-group-text bg-gradient-dark">
                                <i class="fas fa-clock"></i>
                            </div>
                        </x-slot>
                        @error('wktir1') <span class="text-danger">{{$message}}</span> @enderror
                    </x-adminlte-input-date>

                    {{-- Waktu Ibadah Raya Selesai --}}
                    @php
                    $config = [
                    'format' => 'LT',
                    ];
                    @endphp
                    <x-adminlte-input-date class="datetimepicker-input @error('wktir2') is-invalid @enderror" name="wktir2" :config="$config" placeholder="Waktu IR selesai..." label="Ibadah Selesai" value="{{old('wktir2')}}" required>
                        <x-slot name="appendSlot">
                            <div class="input-group-text bg-gradient-dark">
                                <i class="fas fa-clock"></i>
                            </div>
                        </x-slot>
                        @error('wktir2') <span class="text-danger">{{$message}}</span> @enderror
                    </x-adminlte-input-date>

                    {{-- Jumlah kehadiran jemaat pria --}}
                    <div class="form-group">
                        <x-adminlte-input type="number" class="form-control @error('npria') is-invalid @enderror" name="npria" label="Kehadiran Pria" placeholder="Jumlah jemaat pria..." value="{{old('npria')}}" min=0 oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                            <x-slot name="appendSlot">
                                <div class="input-group-text bg-dark">
                                    <i class="fas fa-hashtag"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                        @error('npria') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    {{-- Jumlah kehadiran jemaat wanita --}}
                    <div class="form-group">
                        <x-adminlte-input type="number" class="form-control @error('nwanita') is-invalid @enderror" name="nwanita" label="Kehadiran Wanita" placeholder="Jumlah jemaat wanita..." value="{{old('nwanita')}}" min=0 oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                            <x-slot name="appendSlot">
                                <div class="input-group-text bg-dark">
                                    <i class="fas fa-hashtag"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                        @error('nwanita') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    {{-- Jumlah Kehadiran Total --}}
                    <div class="form-group">
                        <x-adminlte-input type="number" class="form-control" name="nhadir" label="Jumlah Kehadiran" placeholder="Jumlah Kehadiran" value="{{old('nhadir')}}" readonly>
                            <x-slot name="appendSlot">
                                <div class="input-group-text bg-dark">
                                    <i class="fas fa-hashtag"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                        <?php /*
                        @error('nhadir') is-invalid @enderror
                        @error('nhadir') <span class="text-danger">{{$message}}</span> @enderror
                        */ ?>
                    </div>
                    {{-- Kolom keterangan / saran --}}
                    <div class="form-group">
                        <x-adminlte-textarea class="form-control @error('ket') is-invalid @enderror" name="ket" label="Keterangan" placeholder="Isi keterangan, kritik atau saran..." rows=5 igroup-size="sm" value="{{old('ket')}}">
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
    </div>
</form>
@stop

@push('js')
<script>
    $(function() {
        $("#npria, #nwanita").on("input", sum);

        function sum() {
            $("#nhadir").val(Number($("#npria").val()) + Number($("#nwanita").val()));
            // document.getElementById("nhadir").value = Number($("#npria").val()) + Number($("#nwanita").val());
        }
    });
</script>
@endpush