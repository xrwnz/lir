{{-- Show LIR Modal --}}
<div class="modal fade" id="modal-show-lir-{{ $lir->lirid }}" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header bg-success">
                <?php /* <h4 class="modal-title"><i class="fas fa-eye fa-beat" style="--fa-animation-duration: 1.5s; --fa-beat-scale: 1.5;"></i> Buat Laporan IR</h4> */ ?>
                <h4 class="modal-title"><i class="fas fa-eye"></i> Detail Laporan IR</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                @csrf
                {{-- Isian judul formulir IR --}}
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                {{-- Tanggal Ibadah Raya --}}
                                <x-adminlte-input-date class="datetimepicker-input" name="tglir" placeholder="Tanggal IR..." label="Tanggal IR" label-class="text-primary" value="{{ $lir->tglir->format('d-m-Y') }}" readonly>
                                    <x-slot name="appendSlot">
                                        <div class="input-group-text bg-gradient-primary">
                                            <i class="fas fa-calendar-alt"></i>
                                        </div>
                                    </x-slot>
                                </x-adminlte-input-date>
                            </div>
                            <div class="col-3">
                                {{-- Waktu Ibadah Raya Mulai --}}
                                @php
                                $config = [
                                'format' => 'LT',
                                ];
                                @endphp
                                <x-adminlte-input-date class="datetimepicker-input" name="wktir1" :config="$config" placeholder="Waktu IR dimulai..." label="Ibadah Mulai" value="{{$lir->wktir1}}" readonly>
                                    <x-slot name="appendSlot">
                                        <div class="input-group-text bg-gradient-dark">
                                            <i class="fas fa-clock"></i>
                                        </div>
                                    </x-slot>
                                </x-adminlte-input-date>
                            </div>
                            <div class="col-3">
                                {{-- Waktu Ibadah Raya Selesai --}}
                                @php
                                $config = [
                                'format' => 'LT',
                                ];
                                @endphp
                                <x-adminlte-input-date class="datetimepicker-input" name="wktir2" :config="$config" placeholder="Waktu IR selesai..." label="Ibadah Selesai" value="{{$lir->wktir2}}" readonly>
                                    <x-slot name="appendSlot">
                                        <div class="input-group-text bg-gradient-dark">
                                            <i class="fas fa-clock"></i>
                                        </div>
                                    </x-slot>
                                </x-adminlte-input-date>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                {{-- Ibadah Raya --}}
                                <x-adminlte-select class="datetimepicker-input" name="irnm" placeholder="Pilih Ibadah Raya..." label="Ibadah Raya" label-class="text-primary" disabled>
                                    <x-slot name="prependSlot">
                                        <div class="input-group-text bg-gradient-primary">
                                            <i class="fas fa-church"></i>
                                        </div>
                                    </x-slot>
                                    @foreach($irs as $ir)
                                    <?php /* <option value="{{ $ir->irpk }}">{{ $ir->irnm }}</option> */ ?>
                                    <option value="{{ $ir->irpk }}" {{$ir->irpk == $lir->ir  ? 'selected' : ''}}>{{ $ir->irnm }}</option>
                                    @endforeach
                                </x-adminlte-select>
                            </div>
                            <div class="col-6">
                                {{-- Nama Gembala IR --}}
                                <x-adminlte-input class="form-control" name="gembala" label="Gembala IR" placeholder="Nama Gembala IR..." value="{{$lir->gembala}}" readonly>
                                    <x-slot name="appendSlot">
                                        <div class="input-group-text bg-gradient-dark">
                                            <i class="fas fa-edit"></i>
                                        </div>
                                    </x-slot>
                                </x-adminlte-input>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Diisi dan ditulis oleh gembala ibadah raya --}}
                <div class="card">
                    <div class="card-header d-flex justify-content-center bg-gradient-secondary">
                        <h3 class="card-title">Diisi dan ditulis oleh gembala ibadah raya</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        {{-- Data Jumlah Dalam Pelaksanaan Ibadah --}}
                        <div class="card">
                            <div class="card-header bg-gradient-secondary">
                                <h3 class="card-title">Data Jumlah Dalam Pelaksanaan Ibadah</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                {{-- Jumlah Kehadiran Total di IR --}}
                                <div class="row">
                                    <div class="col-3">
                                        <label>Jumlah total kehadiran di Ibadah Raya</label>
                                    </div>
                                    <div class="col-3">
                                        {{-- Jumlah kehadiran jemaat pria --}}
                                        <x-adminlte-input type="number" class="form-control" name="npria" label="Kehadiran Pria" value="{{$lir->npria}}" readonly>
                                            <x-slot name="appendSlot">
                                                <div class="input-group-text bg-gradient-dark">
                                                    <i class="fas fa-hashtag"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input>
                                    </div>
                                    <div class="col-3">
                                        {{-- Jumlah kehadiran jemaat wanita --}}
                                        <x-adminlte-input type="number" class="form-control" name="nwanita" label="Kehadiran Wanita" value="{{$lir->nwanita}}" readonly>
                                            <x-slot name="appendSlot">
                                                <div class="input-group-text bg-gradient-dark">
                                                    <i class="fas fa-hashtag"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input>
                                    </div>
                                    <div class="col-3">
                                        {{-- Jumlah Kehadiran Total --}}
                                        <x-adminlte-input type="number" class="form-control" name="nhadir" label="Jumlah Kehadiran" value="{{$lir->nhadir}}" readonly>
                                            <x-slot name="appendSlot">
                                                <div class="input-group-text bg-gradient-dark">
                                                    <i class="fas fa-hashtag"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input>
                                    </div>
                                </div>
                                {{-- Jumlah Jemaat Baru di IR --}}
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label>Jumlah kehadiran jemaat baru di Ibadah Raya</label>
                                    </div>
                                    <div class="col-3">
                                        {{-- Jumlah jemaat baru pria --}}
                                        <x-adminlte-input type="number" class="form-control" name="jbpria" label="Jemaat Baru Pria" value="{{$lir->jbpria}}" readonly>
                                            <x-slot name="appendSlot">
                                                <div class="input-group-text bg-gradient-dark">
                                                    <i class="fas fa-hashtag"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input>
                                    </div>
                                    <div class="col-3">
                                        {{-- Jumlah jemaat baru wanita --}}
                                        <x-adminlte-input type="number" class="form-control" name="jbwanita" label="Jemaat Baru Wanita" value="{{$lir->jbwanita}}" readonly>
                                            <x-slot name="appendSlot">
                                                <div class="input-group-text bg-gradient-dark">
                                                    <i class="fas fa-hashtag"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input>
                                    </div>
                                    <div class="col-3">
                                        {{-- Jumlah Total jemaat baru --}}
                                        <x-adminlte-input type="number" class="form-control" name="jbhadir" label="Jumlah Jemaat Baru" value="{{$lir->jbhadir}}" readonly>
                                            <x-slot name="appendSlot">
                                                <div class="input-group-text bg-gradient-dark">
                                                    <i class="fas fa-hashtag"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input>
                                    </div>
                                </div>
                                {{-- Jumlah Lahir Baru di IR --}}
                                <div class="row">
                                    <div class="col-3">
                                        <label>Jumlah jemaat lahir baru di Ibadah Raya</label>
                                    </div>
                                    <div class="col-3">
                                        {{-- Jumlah lahir baru pria --}}
                                        <x-adminlte-input type="number" class="form-control" name="lbpria" label="Lahir Baru Pria" value="{{$lir->lbpria}}" readonly>
                                            <x-slot name="appendSlot">
                                                <div class="input-group-text bg-gradient-dark">
                                                    <i class="fas fa-hashtag"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input>
                                    </div>
                                    <div class="col-3">
                                        {{-- Jumlah lahir baru wanita --}}
                                        <x-adminlte-input type="number" class="form-control" name="lbwanita" label="Lahir Baru Wanita" value="{{$lir->lbwanita}}" readonly>
                                            <x-slot name="appendSlot">
                                                <div class="input-group-text bg-gradient-dark">
                                                    <i class="fas fa-hashtag"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input>
                                    </div>
                                    <div class="col-3">
                                        {{-- Jumlah Total lahir baru --}}
                                        <x-adminlte-input type="number" class="form-control" name="lbhadir" label="Jumlah Lahir Baru" value="{{$lir->lbhadir}}" readonly>
                                            <x-slot name="appendSlot">
                                                <div class="input-group-text bg-gradient-dark">
                                                    <i class="fas fa-hashtag"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Evaluasi Pelaksanaan Ibadah --}}
                        <div class="card">
                            <div class="card-header bg-gradient-secondary">
                                <h3 class="card-title">Evaluasi Pelaksanaan Ibadah</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                {{-- Nama dan Waktu Kedatangan Team IR --}}
                                <div class="row">
                                    <div class="col-12">
                                        <label>Nama dan Waktu Kedatangan Team IR :</label>
                                    </div>
                                </div>
                                {{-- Kelompok baris 1 nama wl dan singer --}}
                                <div class="row">
                                    {{-- WL --}}
                                    <div class="col-4">
                                        <x-adminlte-input class="form-control" name="wl" label="WL" value="{{$lir->wl}}" readonly>
                                            <x-slot name="appendSlot">
                                                <div class="input-group-text bg-gradient-dark">
                                                    <i class="fas fa-edit"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input>
                                    </div>
                                    {{-- Singer 1 --}}
                                    <div class="col-4">
                                        <x-adminlte-input class="form-control" name="singer1" label="Singer 1" value="{{$lir->singer1}}" readonly>
                                            <x-slot name="appendSlot">
                                                <div class="input-group-text bg-gradient-dark">
                                                    <i class="fas fa-edit"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input>
                                    </div>
                                    {{-- Singer 2 --}}
                                    <div class="col-4">
                                        <x-adminlte-input class="form-control" name="singer2" label="Singer 2" value="{{$lir->singer2}}" readonly>
                                            <x-slot name="appendSlot">
                                                <div class="input-group-text bg-gradient-dark">
                                                    <i class="fas fa-edit"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input>
                                    </div>
                                </div>
                                {{-- Kelompok baris 1 waktu kedatangan wl dan singer --}}
                                <div class="row">
                                    {{-- WL Datang --}}
                                    <div class="col-4">
                                        @php
                                        $config = [
                                        'format' => 'LT',
                                        ];
                                        @endphp
                                        <x-adminlte-input-date class="datetimepicker-input" name="wl_dtg" :config="$config" label="WL Datang" value="{{$lir->wl_dtg}}" readonly>
                                            <x-slot name="appendSlot">
                                                <div class="input-group-text bg-gradient-dark">
                                                    <i class="fas fa-clock"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input-date>
                                    </div>
                                    {{-- Singer 1 Datang --}}
                                    <div class="col-4">
                                        @php
                                        $config = [
                                        'format' => 'LT',
                                        ];
                                        @endphp
                                        <x-adminlte-input-date class="datetimepicker-input" name="singer1_dtg" :config="$config" label="Singer 1 Datang" value="{{$lir->singer1_dtg}}" readonly>
                                            <x-slot name="appendSlot">
                                                <div class="input-group-text bg-gradient-dark">
                                                    <i class="fas fa-clock"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input-date>
                                    </div>
                                    {{-- Singer 2 Datang --}}
                                    <div class="col-4">
                                        @php
                                        $config = [
                                        'format' => 'LT',
                                        ];
                                        @endphp
                                        <x-adminlte-input-date class="datetimepicker-input" name="singer2_dtg" :config="$config" label="Singer 2 Datang" value="{{$lir->singer2_dtg}}" readonly>
                                            <x-slot name="appendSlot">
                                                <div class="input-group-text bg-gradient-dark">
                                                    <i class="fas fa-clock"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input-date>
                                    </div>
                                </div>
                                <div class="astrodivider">
                                    <div class="astrodividermask"></div>
                                </div>
                                {{-- Kelompok baris 2 pembicara dan durasi --}}
                                <div class="row">
                                    {{-- Pembicara --}}
                                    <div class="col-4">
                                        <x-adminlte-input class="form-control" name="pembicara" label="Pembicara" value="{{$lir->pembicara}}" readonly>
                                            <x-slot name="appendSlot">
                                                <div class="input-group-text bg-gradient-dark">
                                                    <i class="fas fa-edit"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input>
                                    </div>
                                    {{-- Khotbah mulai --}}
                                    <div class="col-4">
                                        @php
                                        $config = [
                                        'format' => 'LT',
                                        ];
                                        @endphp
                                        <x-adminlte-input-date class="datetimepicker-input" name="wktbicara1" :config="$config" label="Khotbah mulai" value="{{$lir->wktbicara1}}" readonly>
                                            <x-slot name="appendSlot">
                                                <div class="input-group-text bg-gradient-dark">
                                                    <i class="fas fa-clock"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input-date>
                                    </div>
                                    {{-- Khotbah selesai --}}
                                    <div class="col-4">
                                        @php
                                        $config = [
                                        'format' => 'LT',
                                        ];
                                        @endphp
                                        <x-adminlte-input-date class="datetimepicker-input" name="wktbicara2" :config="$config" label="Khotbah selesai" value="{{$lir->wktbicara2}}" readonly>
                                            <x-slot name="appendSlot">
                                                <div class="input-group-text bg-gradient-dark">
                                                    <i class="fas fa-clock"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input-date>
                                    </div>
                                </div>
                                <div class="astrodivider">
                                    <div class="astrodividermask"></div>
                                </div>
                                {{-- Kelompok baris 3a nama pemusik --}}
                                <div class="row">
                                    {{-- Pemusik 1 --}}
                                    <div class="col-4">
                                        <x-adminlte-input class="form-control" name="pemusik1" label="Pemusik 1" value="{{$lir->pemusik1}}" readonly>
                                            <x-slot name="appendSlot">
                                                <div class="input-group-text bg-gradient-dark">
                                                    <i class="fas fa-edit"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input>
                                    </div>
                                    {{-- Pemusik 2 --}}
                                    <div class="col-4">
                                        <x-adminlte-input class="form-control" name="pemusik2" label="Pemusik 2" value="{{$lir->pemusik2}}" readonly>
                                            <x-slot name="appendSlot">
                                                <div class="input-group-text bg-gradient-dark">
                                                    <i class="fas fa-edit"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input>
                                    </div>
                                    {{-- Pemusik 3 --}}
                                    <div class="col-4">
                                        <x-adminlte-input class="form-control" name="pemusik3" label="Pemusik 3" value="{{$lir->pemusik3}}" readonly>
                                            <x-slot name="appendSlot">
                                                <div class="input-group-text bg-gradient-dark">
                                                    <i class="fas fa-edit"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input>
                                    </div>
                                </div>
                                {{-- Kelompok baris 3a waktu kedatangan pemusik --}}
                                <div class="row">
                                    {{-- Pemusik 1 datang --}}
                                    <div class="col-4">
                                        @php
                                        $config = [
                                        'format' => 'LT',
                                        ];
                                        @endphp
                                        <x-adminlte-input-date class="datetimepicker-input" name="pemusik1_dtg" :config="$config" label="Pemusik 1 datang" value="{{$lir->pemusik1_dtg}}" readonly>
                                            <x-slot name="appendSlot">
                                                <div class="input-group-text bg-gradient-dark">
                                                    <i class="fas fa-clock"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input-date>
                                    </div>
                                    {{-- Pemusik 2 datang --}}
                                    <div class="col-4">
                                        @php
                                        $config = [
                                        'format' => 'LT',
                                        ];
                                        @endphp
                                        <x-adminlte-input-date class="datetimepicker-input" name="pemusik2_dtg" :config="$config" label="Pemusik 2 datang" value="{{$lir->pemusik2_dtg}}" readonly>
                                            <x-slot name="appendSlot">
                                                <div class="input-group-text bg-gradient-dark">
                                                    <i class="fas fa-clock"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input-date>
                                    </div>
                                    {{-- Pemusik 3 Datang --}}
                                    <div class="col-4">
                                        @php
                                        $config = [
                                        'format' => 'LT',
                                        ];
                                        @endphp
                                        <x-adminlte-input-date class="datetimepicker-input" name="pemusik3_dtg" :config="$config" label="Pemusik 3 Datang" value="{{$lir->pemusik3_dtg}}" readonly>
                                            <x-slot name="appendSlot">
                                                <div class="input-group-text bg-gradient-dark">
                                                    <i class="fas fa-clock"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input-date>
                                    </div>
                                </div>
                                {{-- Kelompok baris 3b nama pemusik --}}
                                <div class="row">
                                    {{-- Pemusik 4 --}}
                                    <div class="col-4">
                                        <x-adminlte-input class="form-control" name="pemusik4" label="Pemusik 4" value="{{$lir->pemusik4}}" readonly>
                                            <x-slot name="appendSlot">
                                                <div class="input-group-text bg-gradient-dark">
                                                    <i class="fas fa-edit"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input>
                                    </div>
                                    {{-- Pemusik 5 --}}
                                    <div class="col-4">
                                        <x-adminlte-input class="form-control" name="pemusik5" label="Pemusik 5" value="{{$lir->pemusik5}}" readonly>
                                            <x-slot name="appendSlot">
                                                <div class="input-group-text bg-gradient-dark">
                                                    <i class="fas fa-edit"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input>
                                    </div>
                                    {{-- Pemusik 6 --}}
                                    <div class="col-4">
                                        <x-adminlte-input class="form-control" name="pemusik6" label="Pemusik 6" value="{{$lir->pemusik6}}" readonly>
                                            <x-slot name="appendSlot">
                                                <div class="input-group-text bg-gradient-dark">
                                                    <i class="fas fa-edit"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input>
                                    </div>
                                </div>
                                {{-- Kelompok baris 3b waktu kedatangan pemusik --}}
                                <div class="row">
                                    {{-- Pemusik 4 datang --}}
                                    <div class="col-4">
                                        @php
                                        $config = [
                                        'format' => 'LT',
                                        ];
                                        @endphp
                                        <x-adminlte-input-date class="datetimepicker-input" name="pemusik4_dtg" :config="$config" label="Pemusik 4 datang" value="{{$lir->pemusik4_dtg}}" readonly>
                                            <x-slot name="appendSlot">
                                                <div class="input-group-text bg-gradient-dark">
                                                    <i class="fas fa-clock"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input-date>
                                    </div>
                                    {{-- Pemusik 5 datang --}}
                                    <div class="col-4">
                                        @php
                                        $config = [
                                        'format' => 'LT',
                                        ];
                                        @endphp
                                        <x-adminlte-input-date class="datetimepicker-input" name="pemusik5_dtg" :config="$config" label="Pemusik 5 datang" value="{{$lir->pemusik5_dtg}}" readonly>
                                            <x-slot name="appendSlot">
                                                <div class="input-group-text bg-gradient-dark">
                                                    <i class="fas fa-clock"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input-date>
                                    </div>
                                    {{-- Pemusik 6 datang --}}
                                    <div class="col-4">
                                        @php
                                        $config = [
                                        'format' => 'LT',
                                        ];
                                        @endphp
                                        <x-adminlte-input-date class="datetimepicker-input" name="pemusik6_dtg" :config="$config" label="Pemusik 6 datang" value="{{$lir->pemusik6_dtg}}" readonly>
                                            <x-slot name="appendSlot">
                                                <div class="input-group-text bg-gradient-dark">
                                                    <i class="fas fa-clock"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input-date>
                                    </div>
                                </div>
                                <div class="astrodivider">
                                    <div class="astrodividermask"></div>
                                </div>
                                {{-- Kelompok baris 4 nama penari --}}
                                <div class="row">
                                    {{-- Penari 1 --}}
                                    <div class="col-3">
                                        <x-adminlte-input class="form-control" name="penari1" label="Penari 1" value="{{$lir->penari1}}" readonly>
                                            <x-slot name="appendSlot">
                                                <div class="input-group-text bg-gradient-dark">
                                                    <i class="fas fa-edit"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input>
                                    </div>
                                    {{-- Penari 2 --}}
                                    <div class="col-3">
                                        <x-adminlte-input class="form-control" name="penari2" label="Penari 2" value="{{$lir->penari2}}" readonly>
                                            <x-slot name="appendSlot">
                                                <div class="input-group-text bg-gradient-dark">
                                                    <i class="fas fa-edit"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input>
                                    </div>
                                    {{-- Penari 3 --}}
                                    <div class="col-3">
                                        <x-adminlte-input class="form-control" name="penari3" label="Penari 3" value="{{$lir->penari3}}" readonly>
                                            <x-slot name="appendSlot">
                                                <div class="input-group-text bg-gradient-dark">
                                                    <i class="fas fa-edit"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input>
                                    </div>
                                    {{-- Penari 4 --}}
                                    <div class="col-3">
                                        <x-adminlte-input class="form-control" name="penari4" label="Penari 4" value="{{$lir->penari4}}" readonly>
                                            <x-slot name="appendSlot">
                                                <div class="input-group-text bg-gradient-dark">
                                                    <i class="fas fa-edit"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input>
                                    </div>
                                </div>
                                {{-- Kelompok baris 4 waktu kedatangan penari --}}
                                <div class="row">
                                    {{-- Penari 1 datang --}}
                                    <div class="col-3">
                                        @php
                                        $config = [
                                        'format' => 'LT',
                                        ];
                                        @endphp
                                        <x-adminlte-input-date class="datetimepicker-input" name="penari1_dtg" :config="$config" label="Penari 1 datang" value="{{$lir->penari1_dtg}}" readonly>
                                            <x-slot name="appendSlot">
                                                <div class="input-group-text bg-gradient-dark">
                                                    <i class="fas fa-clock"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input-date>
                                    </div>
                                    {{-- Penari 2 datang --}}
                                    <div class="col-3">
                                        @php
                                        $config = [
                                        'format' => 'LT',
                                        ];
                                        @endphp
                                        <x-adminlte-input-date class="datetimepicker-input" name="penari2_dtg" :config="$config" label="Penari 2 datang" value="{{$lir->penari2_dtg}}" readonly>
                                            <x-slot name="appendSlot">
                                                <div class="input-group-text bg-gradient-dark">
                                                    <i class="fas fa-clock"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input-date>
                                    </div>
                                    {{-- Penari 3 datang --}}
                                    <div class="col-3">
                                        @php
                                        $config = [
                                        'format' => 'LT',
                                        ];
                                        @endphp
                                        <x-adminlte-input-date class="datetimepicker-input" name="penari3_dtg" :config="$config" label="Penari 3 datang" value="{{$lir->penari3_dtg}}" readonly>
                                            <x-slot name="appendSlot">
                                                <div class="input-group-text bg-gradient-dark">
                                                    <i class="fas fa-clock"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input-date>
                                    </div>
                                    {{-- Penari 4 datang --}}
                                    <div class="col-3">
                                        @php
                                        $config = [
                                        'format' => 'LT',
                                        ];
                                        @endphp
                                        <x-adminlte-input-date class="datetimepicker-input" name="penari4_dtg" :config="$config" label="Penari 4 datang" value="{{$lir->penari4_dtg}}" readonly>
                                            <x-slot name="appendSlot">
                                                <div class="input-group-text bg-gradient-dark">
                                                    <i class="fas fa-clock"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input-date>
                                    </div>
                                </div>
                                <div class="astrodivider">
                                    <div class="astrodividermask"></div>
                                </div>
                                {{-- Kelompok baris 5a nama crew media --}}
                                <div class="row">
                                    {{-- Media 1 --}}
                                    <div class="col-4">
                                        <x-adminlte-input class="form-control" name="media1" label="Media 1" value="{{$lir->media1}}" readonly>
                                            <x-slot name="appendSlot">
                                                <div class="input-group-text bg-gradient-dark">
                                                    <i class="fas fa-edit"></i>
                                                </div>
                                            </x-slot>
                                            @error('media1') <span class="text-danger">{{$message}}</span> @enderror
                                        </x-adminlte-input>
                                    </div>
                                    {{-- Media 2 --}}
                                    <div class="col-4">
                                        <x-adminlte-input class="form-control" name="media2" label="Media 2" value="{{$lir->media2}}" readonly>
                                            <x-slot name="appendSlot">
                                                <div class="input-group-text bg-gradient-dark">
                                                    <i class="fas fa-edit"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input>
                                    </div>
                                    {{-- Media 3 --}}
                                    <div class="col-4">
                                        <x-adminlte-input class="form-control" name="media3" label="Media 3" value="{{$lir->media3}}" readonly>
                                            <x-slot name="appendSlot">
                                                <div class="input-group-text bg-gradient-dark">
                                                    <i class="fas fa-edit"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input>
                                    </div>
                                </div>
                                {{-- Kelompok baris 5a waktu kedatangan crew media --}}
                                <div class="row">
                                    {{-- Media 1 datang --}}
                                    <div class="col-4">
                                        @php
                                        $config = [
                                        'format' => 'LT',
                                        ];
                                        @endphp
                                        <x-adminlte-input-date class="datetimepicker-input" name="media1_dtg" :config="$config" label="Media 1 datang" value="{{$lir->media1_dtg}}" readonly>
                                            <x-slot name="appendSlot">
                                                <div class="input-group-text bg-gradient-dark">
                                                    <i class="fas fa-clock"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input-date>
                                    </div>
                                    {{-- Media 2 datang --}}
                                    <div class="col-4">
                                        @php
                                        $config = [
                                        'format' => 'LT',
                                        ];
                                        @endphp
                                        <x-adminlte-input-date class="datetimepicker-input" name="media2_dtg" :config="$config" label="Media 2 datang" value="{{$lir->media2_dtg}}" readonly>
                                            <x-slot name="appendSlot">
                                                <div class="input-group-text bg-gradient-dark">
                                                    <i class="fas fa-clock"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input-date>
                                    </div>
                                    {{-- Media 3 datang --}}
                                    <div class="col-4">
                                        @php
                                        $config = [
                                        'format' => 'LT',
                                        ];
                                        @endphp
                                        <x-adminlte-input-date class="datetimepicker-input" name="media3_dtg" :config="$config" label="Media 3 datang" value="{{$lir->media3_dtg}}" readonly>
                                            <x-slot name="appendSlot">
                                                <div class="input-group-text bg-gradient-dark">
                                                    <i class="fas fa-clock"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input-date>
                                    </div>
                                </div>
                                {{-- Kelompok baris 5b nama crew media --}}
                                <div class="row">
                                    {{-- Media 4 --}}
                                    <div class="col-4">
                                        <x-adminlte-input class="form-control" name="media4" label="Media 4" value="{{$lir->media4}}" readonly>
                                            <x-slot name="appendSlot">
                                                <div class="input-group-text bg-gradient-dark">
                                                    <i class="fas fa-edit"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input>
                                    </div>
                                    {{-- Media 5 --}}
                                    <div class="col-4">
                                        <x-adminlte-input class="form-control" name="media5" label="Media 5" value="{{$lir->media5}}" readonly>
                                            <x-slot name="appendSlot">
                                                <div class="input-group-text bg-gradient-dark">
                                                    <i class="fas fa-edit"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input>
                                    </div>
                                    {{-- Media 6 --}}
                                    <div class="col-4">
                                        <x-adminlte-input class="form-control" name="media6" label="Media 6" value="{{$lir->media6}}" readonly>
                                            <x-slot name="appendSlot">
                                                <div class="input-group-text bg-gradient-dark">
                                                    <i class="fas fa-edit"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input>
                                    </div>
                                </div>
                                {{-- Kelompok baris 5b waktu kedatangan crew media --}}
                                <div class="row">
                                    {{-- Media 4 datang --}}
                                    <div class="col-4">
                                        @php
                                        $config = [
                                        'format' => 'LT',
                                        ];
                                        @endphp
                                        <x-adminlte-input-date class="datetimepicker-input" name="media4_dtg" :config="$config" label="Media 4 datang" value="{{$lir->media4_dtg}}" readonly>
                                            <x-slot name="appendSlot">
                                                <div class="input-group-text bg-gradient-dark">
                                                    <i class="fas fa-clock"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input-date>
                                    </div>
                                    {{-- Media 5 datang --}}
                                    <div class="col-4">
                                        @php
                                        $config = [
                                        'format' => 'LT',
                                        ];
                                        @endphp
                                        <x-adminlte-input-date class="datetimepicker-input" name="media5_dtg" :config="$config" label="Media 5 datang" value="{{$lir->media5_dtg}}" readonly>
                                            <x-slot name="appendSlot">
                                                <div class="input-group-text bg-gradient-dark">
                                                    <i class="fas fa-clock"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input-date>
                                    </div>
                                    {{-- Media 6 datang --}}
                                    <div class="col-4">
                                        @php
                                        $config = [
                                        'format' => 'LT',
                                        ];
                                        @endphp
                                        <x-adminlte-input-date class="datetimepicker-input" name="media6_dtg" :config="$config" label="Media 6 datang" value="{{$lir->media6_dtg}}" readonly>
                                            <x-slot name="appendSlot">
                                                <div class="input-group-text bg-gradient-dark">
                                                    <i class="fas fa-clock"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input-date>
                                    </div>
                                </div>
                                <div class="astrodivider">
                                    <div class="astrodividermask"></div>
                                </div>
                                {{-- Kelompok baris 6 Lighting --}}
                                <div class="row">
                                    {{-- Lighting 1 --}}
                                    <div class="col-4">
                                        <x-adminlte-input class="form-control" name="lighting1" label="Lighting 1" value="{{$lir->lighting1}}" readonly>
                                            <x-slot name="appendSlot">
                                                <div class="input-group-text bg-gradient-dark">
                                                    <i class="fas fa-edit"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input>
                                    </div>
                                    {{-- Lighting 2 --}}
                                    <div class="col-4">
                                        <x-adminlte-input class="form-control" name="lighting2" label="Lighting 2" value="{{$lir->lighting2}}" readonly>
                                            <x-slot name="appendSlot">
                                                <div class="input-group-text bg-gradient-dark">
                                                    <i class="fas fa-edit"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input>
                                    </div>
                                </div>
                                {{-- Kelompok baris 6 waktu kedatangan Lighting --}}
                                <div class="row">
                                    {{-- Lighting 1 Datang --}}
                                    <div class="col-4">
                                        @php
                                        $config = [
                                        'format' => 'LT',
                                        ];
                                        @endphp
                                        <x-adminlte-input-date class="datetimepicker-input" name="lighting1_dtg" :config="$config" label="Lighting 1 Datang" value="{{$lir->lighting1_dtg}}" readonly>
                                            <x-slot name="appendSlot">
                                                <div class="input-group-text bg-gradient-dark">
                                                    <i class="fas fa-clock"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input-date>
                                    </div>
                                    {{-- Lighting 2 Datang --}}
                                    <div class="col-4">
                                        @php
                                        $config = [
                                        'format' => 'LT',
                                        ];
                                        @endphp
                                        <x-adminlte-input-date class="datetimepicker-input" name="lighting2_dtg" :config="$config" label="Lighting 2 Datang" value="{{$lir->lighting2_dtg}}" readonly>
                                            <x-slot name="appendSlot">
                                                <div class="input-group-text bg-gradient-dark">
                                                    <i class="fas fa-clock"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input-date>
                                    </div>
                                </div>
                                <div class="astrodivider">
                                    <div class="astrodividermask"></div>
                                </div>
                                {{-- Kelompok baris 7 Soundman --}}
                                <div class="row">
                                    {{-- Soundman 1 --}}
                                    <div class="col-4">
                                        <x-adminlte-input class="form-control" name="soundman1" label="Soundman 1" value="{{$lir->soundman1}}" readonly>
                                            <x-slot name="appendSlot">
                                                <div class="input-group-text bg-gradient-dark">
                                                    <i class="fas fa-edit"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input>
                                    </div>
                                    {{-- Soundman 2 --}}
                                    <div class="col-4">
                                        <x-adminlte-input class="form-control" name="soundman2" label="Soundman 2" value="{{$lir->soundman2}}" readonly>
                                            <x-slot name="appendSlot">
                                                <div class="input-group-text bg-gradient-dark">
                                                    <i class="fas fa-edit"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input>
                                    </div>
                                    {{-- Soundman 3 --}}
                                    <div class="col-4">
                                        <x-adminlte-input class="form-control" name="soundman3" label="Soundman 3" value="{{$lir->soundman3}}" readonly>
                                            <x-slot name="appendSlot">
                                                <div class="input-group-text bg-gradient-dark">
                                                    <i class="fas fa-edit"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input>
                                    </div>
                                </div>
                                {{-- Kelompok baris 7 waktu kedatangan Soundman --}}
                                <div class="row">
                                    {{-- Soundman 1 Datang --}}
                                    <div class="col-4">
                                        @php
                                        $config = [
                                        'format' => 'LT',
                                        ];
                                        @endphp
                                        <x-adminlte-input-date class="datetimepicker-input" name="soundman1_dtg" :config="$config" label="Soundman 1 Datang" value="{{$lir->soundman1_dtg}}" readonly>
                                            <x-slot name="appendSlot">
                                                <div class="input-group-text bg-gradient-dark">
                                                    <i class="fas fa-clock"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input-date>
                                    </div>
                                    {{-- Soundman 2 Datang --}}
                                    <div class="col-4">
                                        @php
                                        $config = [
                                        'format' => 'LT',
                                        ];
                                        @endphp
                                        <x-adminlte-input-date class="datetimepicker-input" name="soundman2_dtg" :config="$config" label="Soundman 2 Datang" value="{{$lir->soundman2_dtg}}" readonly>
                                            <x-slot name="appendSlot">
                                                <div class="input-group-text bg-gradient-dark">
                                                    <i class="fas fa-clock"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input-date>
                                    </div>
                                    {{-- Soundman 3 Datang --}}
                                    <div class="col-4">
                                        @php
                                        $config = [
                                        'format' => 'LT',
                                        ];
                                        @endphp
                                        <x-adminlte-input-date class="datetimepicker-input" name="soundman3_dtg" :config="$config" label="Soundman 3 Datang" value="{{$lir->soundman3_dtg}}" readonly>
                                            <x-slot name="appendSlot">
                                                <div class="input-group-text bg-gradient-dark">
                                                    <i class="fas fa-clock"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input-date>
                                    </div>
                                </div>
                                <div class="astrodivider">
                                    <div class="astrodividermask"></div>
                                </div>
                                {{-- Kelompok baris 8 Kualitas Sound --}}
                                <div class="row">
                                    <div class="col-3">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text bg-gradient-dark">
                                                    <i class="fas fa-assistive-listening-systems"></i>
                                                </div>
                                            </div>
                                            <label>Kualitas Suara (Sound)</label>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="qsuara_a" {{$lir->qsuara_a==1 ? 'checked' : ''}} disabled>
                                            <label class="form-check-label">a. Terlalu Besar</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="qsuara_b" {{$lir->qsuara_b==1 ? 'checked' : ''}} disabled>
                                            <label class="form-check-label">b. WL tidak terdengar</label>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="qsuara_c" {{$lir->qsuara_c==1 ? 'checked' : ''}} disabled>
                                            <label class="form-check-label">c. Singer tidak terdengar</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="qsuara_d" {{$lir->qsuara_d==1 ? 'checked' : ''}} disabled>
                                            <label class="form-check-label">d. Musik terlalu keras</label>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="qsuara_e" {{$lir->qsuara_e==1 ? 'checked' : ''}} disabled>
                                            <label class="form-check-label">e. Bagus</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Penilaian Pelaksanaan Ibadah --}}
                        <div class="card">
                            <div class="card-header bg-gradient-secondary">
                                <h3 class="card-title">Penilaian Pelaksanaan Ibadah</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <h6 class="text-center text-info">Penilaian pelaksanaan Ibadah : 1. Buruk, 2. Kurang, 3. Cukup, 4. Baik, 5. Terbaik</h6>
                                <table class="table table-bordered table-hover table-striped" style="min-width: 30vh">
                                    <thead class="bg-gradient-secondary">
                                        <tr>
                                            <th>No</th>
                                            <th class="col-5 text-center">Penilaian</th>
                                            <th class="col-2 text-center">Nilai</th>
                                            <th class="col-5 text-center">Catatan dan Masukan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- Penilaian 1 --}}
                                        <tr>
                                            <td>1</td>
                                            <td>Topik Khotbah Sesuai Dengan Tema</td>
                                            {{-- Nilai 1 Slider --}}
                                            <td>
                                                <div class="pn01val text-center">{{(float)$lir->pn01}}</div>
                                                <div class="form-group d-flex justify-content-center">
                                                    <input type="range" class="form-range" id="pn01" name="pn01" min="1" max="5" step="0.5" value="{{$lir->pn01}}" disabled>
                                                </div>
                                            </td>
                                            {{-- Catatan Dan Masukan 1 --}}
                                            <td>
                                                <x-adminlte-input class="form-control" name="pc01" value="{{$lir->pc01}}" readonly>
                                                    <x-slot name="appendSlot">
                                                        <div class="input-group-text bg-gradient-dark">
                                                            <i class="fas fa-edit"></i>
                                                        </div>
                                                    </x-slot>
                                                </x-adminlte-input>
                                            </td>
                                        </tr>
                                        {{-- Penilaian 2 --}}
                                        <tr>
                                            <td>2</td>
                                            <td>Pembicara Menguasai Topik Khotbah Minggu Ini</td>
                                            {{-- Nilai 2 Slider --}}
                                            <td>
                                                <div class="pn02val text-center">{{(float)$lir->pn02}}</div>
                                                <div class="form-group d-flex justify-content-center">
                                                    <input type="range" class="form-range" id="pn02" name="pn02" min="1" max="5" step="0.5" value="{{$lir->pn02}}" disabled>
                                                </div>
                                            </td>
                                            {{-- Catatan Dan Masukan 2 --}}
                                            <td>
                                                <x-adminlte-input class="form-control" name="pc02" value="{{$lir->pc02}}" readonly>
                                                    <x-slot name="appendSlot">
                                                        <div class="input-group-text bg-gradient-dark">
                                                            <i class="fas fa-edit"></i>
                                                        </div>
                                                    </x-slot>
                                                </x-adminlte-input>
                                            </td>
                                        </tr>
                                        {{-- Penilaian 3 --}}
                                        <tr>
                                            <td>3</td>
                                            <td>Performance WL dan Koordinasi Dengan Team</td>
                                            {{-- Nilai 3 Slider --}}
                                            <td>
                                                <div class="pn03val text-center">{{(float)$lir->pn03}}</div>
                                                <div class="form-group d-flex justify-content-center">
                                                    <input type="range" class="form-range" id="pn03" name="pn03" min="1" max="5" step="0.5" value="{{$lir->pn03}}" disabled>
                                                </div>
                                            </td>
                                            {{-- Catatan Dan Masukan 3 --}}
                                            <td>
                                                <x-adminlte-input class="form-control" name="pc03" value="{{$lir->pc03}}" readonly>
                                                    <x-slot name="appendSlot">
                                                        <div class="input-group-text bg-gradient-dark">
                                                            <i class="fas fa-edit"></i>
                                                        </div>
                                                    </x-slot>
                                                </x-adminlte-input>
                                            </td>
                                        </tr>
                                        {{-- Penilaian 4 --}}
                                        <tr>
                                            <td>4</td>
                                            <td>Performance Singer Dalam Team</td>
                                            {{-- Nilai 4 Slider --}}
                                            <td>
                                                <div class="pn04val text-center">{{(float)$lir->pn04}}</div>
                                                <div class="form-group d-flex justify-content-center">
                                                    <input type="range" class="form-range" id="pn04" name="pn04" min="1" max="5" step="0.5" value="{{$lir->pn04}}" disabled>
                                                </div>
                                            </td>
                                            {{-- Catatan Dan Masukan 4 --}}
                                            <td>
                                                <x-adminlte-input class="form-control" name="pc04" value="{{$lir->pc04}}" readonly>
                                                    <x-slot name="appendSlot">
                                                        <div class="input-group-text bg-gradient-dark">
                                                            <i class="fas fa-edit"></i>
                                                        </div>
                                                    </x-slot>
                                                </x-adminlte-input>
                                            </td>
                                        </tr>
                                        {{-- Penilaian 5 --}}
                                        <tr>
                                            <td>5</td>
                                            <td>Performance Pemusik Dalam Team</td>
                                            {{-- Nilai 5 Slider --}}
                                            <td>
                                                <div class="pn05val text-center">{{(float)$lir->pn05}}</div>
                                                <div class="form-group d-flex justify-content-center">
                                                    <input type="range" class="form-range" id="pn05" name="pn05" min="1" max="5" step="0.5" value="{{$lir->pn05}}" disabled>
                                                </div>
                                            </td>
                                            {{-- Catatan Dan Masukan 5 --}}
                                            <td>
                                                <x-adminlte-input class="form-control" name="pc05" value="{{$lir->pc05}}" readonly>
                                                    <x-slot name="appendSlot">
                                                        <div class="input-group-text bg-gradient-dark">
                                                            <i class="fas fa-edit"></i>
                                                        </div>
                                                    </x-slot>
                                                </x-adminlte-input>
                                            </td>
                                        </tr>
                                        {{-- Penilaian 6 --}}
                                        <tr>
                                            <td>6</td>
                                            <td>Performance Penari Dalam Team</td>
                                            {{-- Nilai 6 Slider --}}
                                            <td>
                                                <div class="pn06val text-center">{{(float)$lir->pn06}}</div>
                                                <div class="form-group d-flex justify-content-center">
                                                    <input type="range" class="form-range" id="pn06" name="pn06" min="1" max="5" step="0.5" value="{{$lir->pn06}}" disabled>
                                                </div>
                                            </td>
                                            {{-- Catatan Dan Masukan 6 --}}
                                            <td>
                                                <x-adminlte-input class="form-control" name="pc06" value="{{$lir->pc06}}" readonly>
                                                    <x-slot name="appendSlot">
                                                        <div class="input-group-text bg-gradient-dark">
                                                            <i class="fas fa-edit"></i>
                                                        </div>
                                                    </x-slot>
                                                </x-adminlte-input>
                                            </td>
                                        </tr>
                                        {{-- Penilaian 7 --}}
                                        <tr>
                                            <td>7</td>
                                            <td>Performance Operator Dalam Team (<i>Ada Cek Sound atau Tidak, Gangguan Alat, dll</i>)</td>
                                            {{-- Nilai 7 Slider --}}
                                            <td>
                                                <div class="pn07val text-center">{{(float)$lir->pn07}}</div>
                                                <div class="form-group d-flex justify-content-center">
                                                    <input type="range" class="form-range" id="pn07" name="pn07" min="1" max="5" step="0.5" value="{{$lir->pn07}}" disabled>
                                                </div>
                                            </td>
                                            {{-- Catatan Dan Masukan 7 --}}
                                            <td>
                                                <x-adminlte-input class="form-control" name="pc07" value="{{$lir->pc07}}" readonly>
                                                    <x-slot name="appendSlot">
                                                        <div class="input-group-text bg-gradient-dark">
                                                            <i class="fas fa-edit"></i>
                                                        </div>
                                                    </x-slot>
                                                </x-adminlte-input>
                                            </td>
                                        </tr>
                                        {{-- Penilaian 8 --}}
                                        <tr>
                                            <td>8</td>
                                            <td>Performance Usher (<i>Penyambutan, Pengaturan Kursi, dll</i>)</td>
                                            {{-- Nilai 8 Slider --}}
                                            <td>
                                                <div class="pn08val text-center">{{(float)$lir->pn08}}</div>
                                                <div class="form-group d-flex justify-content-center">
                                                    <input type="range" class="form-range" id="pn08" name="pn08" min="1" max="5" step="0.5" value="{{$lir->pn08}}" disabled>
                                                </div>
                                            </td>
                                            {{-- Catatan Dan Masukan 8 --}}
                                            <td>
                                                <x-adminlte-input class="form-control" name="pc08" value="{{$lir->pc08}}" readonly>
                                                    <x-slot name="appendSlot">
                                                        <div class="input-group-text bg-gradient-dark">
                                                            <i class="fas fa-edit"></i>
                                                        </div>
                                                    </x-slot>
                                                </x-adminlte-input>
                                            </td>
                                        </tr>
                                        {{-- Penilaian 9 --}}
                                        <tr>
                                            <td>9</td>
                                            <td>Performance Lighting</td>
                                            {{-- Nilai 9 Slider --}}
                                            <td>
                                                <div class="pn09val text-center">{{(float)$lir->pn09}}</div>
                                                <div class="form-group d-flex justify-content-center">
                                                    <input type="range" class="form-range" id="pn09" name="pn09" min="1" max="5" step="0.5" value="{{$lir->pn09}}" disabled>
                                                </div>
                                            </td>
                                            {{-- Catatan Dan Masukan 9 --}}
                                            <td>
                                                <x-adminlte-input class="form-control" name="pc09" value="{{$lir->pc09}}" readonly>
                                                    <x-slot name="appendSlot">
                                                        <div class="input-group-text bg-gradient-dark">
                                                            <i class="fas fa-edit"></i>
                                                        </div>
                                                    </x-slot>
                                                </x-adminlte-input>
                                            </td>
                                        </tr>
                                        {{-- Penilaian 10 --}}
                                        <tr>
                                            <td>10</td>
                                            <td>Performance Multimedia</td>
                                            {{-- Nilai 10 Slider --}}
                                            <td>
                                                <div class="pn10val text-center">{{(float)$lir->pn10}}</div>
                                                <div class="form-group d-flex justify-content-center">
                                                    <input type="range" class="form-range" id="pn10" name="pn10" min="1" max="5" step="0.5" value="{{$lir->pn10}}" disabled>
                                                </div>
                                            </td>
                                            {{-- Catatan Dan Masukan 10 --}}
                                            <td>
                                                <x-adminlte-input class="form-control" name="pc10" value="{{$lir->pc10}}" readonly>
                                                    <x-slot name="appendSlot">
                                                        <div class="input-group-text bg-gradient-dark">
                                                            <i class="fas fa-edit"></i>
                                                        </div>
                                                    </x-slot>
                                                </x-adminlte-input>
                                            </td>
                                        </tr>
                                        {{-- Penilaian 11 --}}
                                        <tr>
                                            <td>11</td>
                                            <td>Performance Announcer (<i>Ekspresi, Komunikatif, Durasi</i>)</td>
                                            {{-- Nilai 11 Slider --}}
                                            <td>
                                                <div class="pn11val text-center">{{(float)$lir->pn11}}</div>
                                                <div class="form-group d-flex justify-content-center">
                                                    <input type="range" class="form-range" id="pn11" name="pn11" min="1" max="5" step="0.5" value="{{$lir->pn11}}" disabled>
                                                </div>
                                            </td>
                                            {{-- Catatan Dan Masukan 11 --}}
                                            <td>
                                                <x-adminlte-input class="form-control" name="pc11" value="{{$lir->pc11}}" readonly>
                                                    <x-slot name="appendSlot">
                                                        <div class="input-group-text bg-gradient-dark">
                                                            <i class="fas fa-edit"></i>
                                                        </div>
                                                    </x-slot>
                                                </x-adminlte-input>
                                            </td>
                                        </tr>
                                        {{-- Penilaian 12 --}}
                                        <tr>
                                            <td>12</td>
                                            <td>Team Doa IR (<i>Ada / Tidak, jika ada tuliskan namanya</i>)</td>
                                            {{-- Nilai 12 Slider --}}
                                            <td>
                                                <div class="pn12val text-center">{{(float)$lir->pn12}}</div>
                                                <div class="form-group d-flex justify-content-center">
                                                    <input type="range" class="form-range" id="pn12" name="pn12" min="1" max="5" step="0.5" value="{{$lir->pn12}}" disabled>
                                                </div>
                                            </td>
                                            {{-- Catatan Dan Masukan 12 --}}
                                            <td>
                                                <x-adminlte-input class="form-control" name="pc12" value="{{$lir->pc12}}" readonly>
                                                    <x-slot name="appendSlot">
                                                        <div class="input-group-text bg-gradient-dark">
                                                            <i class="fas fa-edit"></i>
                                                        </div>
                                                    </x-slot>
                                                </x-adminlte-input>
                                            </td>
                                        </tr>
                                        {{-- Penilaian 13 --}}
                                        <tr>
                                            <td>13</td>
                                            <td>Suasana Keseluruhan Menurut Gembala Ibadah Raya</td>
                                            {{-- Nilai 13 Slider --}}
                                            <td>
                                                <div class="pn13val text-center">{{(float)$lir->pn13}}</div>
                                                <div class="form-group d-flex justify-content-center">
                                                    <input type="range" class="form-range" id="pn13" name="pn13" min="1" max="5" step="0.5" value="{{$lir->pn13}}" disabled>
                                                </div>
                                            </td>
                                            {{-- Catatan Dan Masukan 13 --}}
                                            <td>
                                                <x-adminlte-input class="form-control" name="pc13" value="{{$lir->pc13}}" readonly>
                                                    <x-slot name="appendSlot">
                                                        <div class="input-group-text bg-gradient-dark">
                                                            <i class="fas fa-edit"></i>
                                                        </div>
                                                    </x-slot>
                                                </x-adminlte-input>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot class="bg-gradient-secondary">
                                        <tr>
                                            <th>No</th>
                                            <th class="col-5 text-center">Penilaian</th>
                                            <th class="col-2 text-center">Nilai</th>
                                            <th class="col-5 text-center">Catatan dan Masukan</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        {{-- Resume Angket Jemaat --}}
                        <div class="card">
                            <div class="card-header bg-gradient-secondary">
                                <h3 class="card-title">Resume Angket Jemaat</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <h6 class="text-center text-info">Resume Angket Jemaat, Rata-rata : 1. Buruk, 2. Kurang, 3. Cukup, 4. Baik, 5. Terbaik</h6>
                                <table class="table table-bordered table-hover table-striped">
                                    {{-- <thead class="thead-dark"> --}}
                                    <thead class="bg-gradient-secondary">
                                        <tr>
                                            <th>No</th>
                                            <th class="col-10 text-center">Aspek Penilaian</th>
                                            <th class="col-2 text-center">Rata-rata</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- Penilaian 1 --}}
                                        <tr>
                                            <td>1</td>
                                            <td>Pemahaman intisari khotbah</td>
                                            {{-- Nilai 1 Slider --}}
                                            <td>
                                                <div class="rn01val text-center">{{(float)$lir->rn01}}</div>
                                                <div class="form-group d-flex justify-content-center">
                                                    <input type="range" class="form-range" id="rn01" name="rn01" min="1" max="5" step="0.5" value="{{$lir->rn01}}" disabled>
                                                </div>
                                            </td>
                                        </tr>
                                        {{-- Penilaian 2 --}}
                                        <tr>
                                            <td>2</td>
                                            <td>Khotbah mengingatkan sesuatu yang salah dalam hidup jemaat</td>
                                            {{-- Nilai 2 Slider --}}
                                            <td>
                                                <div class="rn02val text-center">{{(float)$lir->rn02}}</div>
                                                <div class="form-group d-flex justify-content-center">
                                                    <input type="range" class="form-range" id="rn02" name="rn02" min="1" max="5" step="0.5" value="{{$lir->rn02}}" disabled>
                                                </div>
                                            </td>
                                        </tr>
                                        {{-- Penilaian 3 --}}
                                        <tr>
                                            <td>3</td>
                                            <td>Khotbah membukakan sesuatu kebenaran</td>
                                            {{-- Nilai 3 Slider --}}
                                            <td>
                                                <div class="rn03val text-center">{{(float)$lir->rn03}}</div>
                                                <div class="form-group d-flex justify-content-center">
                                                    <input type="range" class="form-range" id="rn03" name="rn03" min="1" max="5" step="0.5" value="{{$lir->rn03}}" disabled>
                                                </div>
                                            </td>
                                        </tr>
                                        {{-- Penilaian 4 --}}
                                        <tr>
                                            <td>4</td>
                                            <td>Khotbah membangkitkan inspirasi dan semangat untuk melakukan Firman</td>
                                            {{-- Nilai 4 Slider --}}
                                            <td>
                                                <div class="rn04val text-center">{{(float)$lir->rn04}}</div>
                                                <div class="form-group d-flex justify-content-center">
                                                    <input type="range" class="form-range" id="rn04" name="rn04" min="1" max="5" step="0.5" value="{{$lir->rn04}}" disabled>
                                                </div>
                                            </td>
                                        </tr>
                                        {{-- Penilaian 5 --}}
                                        <tr>
                                            <td>5</td>
                                            <td>Jemaat menikmati pujian dan penyembahan</td>
                                            {{-- Nilai 5 Slider --}}
                                            <td>
                                                <div class="rn05val text-center">{{(float)$lir->rn05}}</div>
                                                <div class="form-group d-flex justify-content-center">
                                                    <input type="range" class="form-range" id="rn05" name="rn05" min="1" max="5" step="0.5" value="{{$lir->rn05}}" disabled>
                                                </div>
                                            </td>
                                        </tr>
                                        {{-- Penilaian 6 --}}
                                        <tr>
                                            <td>6</td>
                                            <td>Suasana keseluruhan menurut Jemaat</td>
                                            {{-- Nilai 6 Slider --}}
                                            <td>
                                                <div class="rn06val text-center">{{(float)$lir->rn06}}</div>
                                                <div class="form-group d-flex justify-content-center">
                                                    <input type="range" class="form-range" id="rn06" name="rn06" min="1" max="5" step="0.5" value="{{$lir->rn06}}" disabled>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot class="bg-gradient-secondary">
                                        <tr>
                                            <th>No</th>
                                            <th class="col-10 text-center">Aspek Penilaian</th>
                                            <th class="col-2 text-center">Rata-rata</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Kolom keterangan / saran --}}
                <div class="card">
                    <div class="card-body">
                        <x-adminlte-textarea class="form-control" name="ket" label="Keterangan umum secara keseluruhan" rows=5 igroup-size="sm" readonly>
                            {{$lir->ket}}
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-gradient-dark">
                                    <i class="fas fa-lg fa-file-alt text-warning"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>