{{-- Show LIR Modal --}}
<x-adminlte-modal id="modal-show-lir-{{ $lir->lirid }}" title="Detail LIR" theme="success" icon="fas fa-eye fa-beat" style="--fa-beat-scale: 1.5;" scrollable>
    <x-slot name="prependSlot">
        <x-adminlte-button id="headerX" data-dismiss="modal" aria-label="Close">
            <i class="fas fa-times"></i>
        </x-adminlte-button>
    </x-slot>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    {{-- Tanggal Ibadah Raya --}}
                    <x-adminlte-input type="text" class="form-control" id="mtglir" name="tglir" label="Tanggal IR" value="{{$lir->tglir ?? old('tglir')}}" readonly>
                        <x-slot name="appendSlot">
                            <div class="input-group-text bg-dark">
                                <i class="fas fa-calendar-alt"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>

                    {{-- Jumlah kehadiran jemaat pria --}}
                    <x-adminlte-input type="number" class="form-control" id="mnpria" name="npria" label="Kehadiran Pria" value="{{$lir->npria ?? old('npria')}}" readonly>
                        <x-slot name="appendSlot">
                            <div class="input-group-text bg-dark">
                                <i class="fas fa-hashtag"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>

                    {{-- Jumlah kehadiran jemaat wanita --}}
                    <x-adminlte-input type="number" class="form-control" id="mnwanita" name="nwanita" label="Kehadiran Wanita" value="{{$lir->nwanita ?? old('nwanita')}}" readonly>
                        <x-slot name="appendSlot">
                            <div class="input-group-text bg-dark">
                                <i class="fas fa-hashtag"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>

                    {{-- Jumlah Kehadiran Total --}}
                    <x-adminlte-input type="number" class="form-control" id="mnhadir" name="nhadir" label="Jumlah Kehadiran" value="{{$lir->nhadir ?? old('nhadir')}}" readonly>
                        <x-slot name="appendSlot">
                            <div class="input-group-text bg-dark">
                                <i class="fas fa-hashtag"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>

                    {{-- Kolom keterangan / saran --}}
                    <x-adminlte-textarea class="form-control" id="mket" name="ket" label="Keterangan" rows=5 igroup-size="sm" readonly>{{$lir->ket ?? old('ket')}}
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-dark">
                                <i class="fas fa-lg fa-file-alt text-warning"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-textarea>

                </div>
            </div>
        </div>
    </div>
    <x-slot name="footerSlot">
        <!-- <x-adminlte-button class="mr-auto" theme="success" label="Accept"/>
        <x-adminlte-button theme="danger" label="Dismiss" data-dismiss="modal"/>  -->
        <x-adminlte-button theme="success" label="Tutup" data-dismiss="modal" />
    </x-slot>
</x-adminlte-modal>