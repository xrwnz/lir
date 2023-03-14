{{-- Edit LIR Modal --}}
<div class="modal fade" id="modal-edit-lir-{{ $prmid }}" data-backdrop="static" data-keyboard="false" icon="fas fa-edit">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><i class="fas fa-edit"></i> Edit LIR</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="finputs-{{ $prmid }}" action="{{route('lir.update', $lir)}}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    {{-- Tanggal Ibadah Raya --}}
                                    @php
                                    $config = [
                                    'format' => 'DD-MM-YYYY',
                                    ];
                                    /*
                                    'format' => 'DD-MM-YYYY HH:mm:ss',
                                    */
                                    @endphp
                                    <x-adminlte-input-date class="datetimepicker-input @error('tglir') is-invalid @enderror" id="tglir-{{ $prmid }}" name="tglir" :config="$config" placeholder="Tanggal IR..." label="Tanggal IR" label-class="text-primary" value="{{$lir->tglir ?? old('tglir')}}">
                                        <x-slot name="appendSlot">
                                            <div class="input-group-text bg-gradient-dark">
                                                <i class="fas fa-calendar-alt"></i>
                                            </div>
                                        </x-slot>
                                    </x-adminlte-input-date>

                                    {{-- Nama Gembala IR --}}
                                    <div class="form-group">
                                        <x-adminlte-input class="form-control @error('gembala') is-invalid @enderror" name="gembala" label="Gembala IR" placeholder="Nama Gembala IR..." value="{{$lir->gembala ?? old('gembala')}}">
                                            <x-slot name="appendSlot">
                                                <div class="input-group-text bg-dark">
                                                    <i class="fas fa-edit"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input>
                                        @error('gembala') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>

                                    {{-- Jumlah kehadiran jemaat pria --}}
                                    <x-adminlte-input type="number" class="form-control @error('npria') is-invalid @enderror" id="npria-{{ $prmid }}" name="npria" label="Kehadiran Pria" placeholder="Jumlah jemaat pria..." value="{{$lir->npria ?? old('npria')}}" min=0 oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                                        <x-slot name="appendSlot">
                                            <div class="input-group-text bg-dark">
                                                <i class="fas fa-hashtag"></i>
                                            </div>
                                        </x-slot>
                                    </x-adminlte-input>
                                    @error('npria') <span class="text-danger">{{$message}}</span> @enderror

                                    {{-- Jumlah kehadiran jemaat wanita --}}
                                    <x-adminlte-input type="number" class="form-control @error('nwanita') is-invalid @enderror" id="nwanita-{{ $prmid }}" name="nwanita" label="Kehadiran Wanita" placeholder="Jumlah jemaat wanita..." value="{{$lir->nwanita ?? old('nwanita')}}" min=0 oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                                        <x-slot name="appendSlot">
                                            <div class="input-group-text bg-dark">
                                                <i class="fas fa-hashtag"></i>
                                            </div>
                                        </x-slot>
                                    </x-adminlte-input>
                                    @error('nwanita') <span class="text-danger">{{$message}}</span> @enderror

                                    {{-- Jumlah Kehadiran Total --}}
                                    <x-adminlte-input type="number" class="form-control" id="nhadir-{{ $prmid }}" name="nhadir" label="Jumlah Kehadiran" placeholder="Jumlah Kehadiran" value="{{$lir->nhadir ?? old('nhadir')}}" readonly>
                                        <x-slot name="appendSlot">
                                            <div class="input-group-text bg-dark">
                                                <i class="fas fa-hashtag"></i>
                                            </div>
                                        </x-slot>
                                    </x-adminlte-input>
                                    {{-- @error('nhadir') <span class="text-danger">{{$message}}</span> @enderror --}}

                                    {{-- Kolom keterangan / saran --}}
                                    <x-adminlte-textarea class="form-control @error('ket') is-invalid @enderror" id="ket-{{ $prmid }}" name="ket" label="Keterangan" placeholder="Isi keterangan, kritik atau saran..." rows=5 igroup-size="sm">
                                        {{$lir->ket ?? old('ket')}}
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
                                {{-- <button type="submit" class="btn btn-primary">Simpan</button> --}}
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" form="finputs-{{ $prmid }}" class="btn btn-primary">Simpan</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>

@push('js')
<script>
    $(() => {
        $("#npria-{{ $prmid }}, #nwanita-{{ $prmid }}").on("input", sum);

        function sum() {
            $("#nhadir-{{ $prmid }}").val(Number($("#npria-{{ $prmid }}").val()) + Number($("#nwanita-{{ $prmid }}").val()));
        }
    })
</script>
@endpush