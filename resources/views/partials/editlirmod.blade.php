{{-- Create LIR Modal --}}
<div class="modal fade" id="modal-edit-lir-{{ $prmid }}" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <?php /* <h4 class="modal-title"><i class="fas fa-circle-plus fa-beat-fade" style="--fa-animation-duration: 2s; --fa-fade-opacity: 0.5;"></i> Buat Laporan IR</h4> */ ?>
                <h4 class="modal-title"><i class="fas fa-edit"></i> Edit Laporan IR</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="fedit-{{$prmid}}" action="{{route('lir.update', $lir)}}" method="post">
                    @method('PUT')
                    @csrf
                    {{-- Isian judul formulir IR --}}
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    {{-- Tanggal Ibadah Raya --}}
                                    @php
                                    $config = [
                                    'format' => 'DD-MM-YYYY',
                                    /*
                                    'format' => 'DD-MM-YYYY HH:mm:ss',
                                    'dayViewHeaderFormat' => 'MMM YYYY',
                                    'minDate' => "js:moment().startOf('month')",
                                    'maxDate' => "js:moment().endOf('month')",
                                    'daysOfWeekDisabled' => [0, 6],
                                    */
                                    ];
                                    @endphp
                                    <x-adminlte-input-date class="datetimepicker-input" name="tglir" id="tglir-{{$prmid}}" :config="$config" placeholder="Tanggal IR..." label="Tanggal IR" label-class="text-primary" value="{{$lir->tglir->format('d-m-Y')}}" disabled>
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
                                    <x-adminlte-input-date class="datetimepicker-input @error('wktir1') is-invalid @enderror" name="wktir1" id="wktir1-{{$prmid}}" :config="$config" placeholder="Waktu IR dimulai..." label="Ibadah Mulai" value="{{$lir->wktir1 ?? old('wktir1')}}" required>
                                        <x-slot name="appendSlot">
                                            <div class="input-group-text bg-gradient-dark">
                                                <i class="fas fa-clock"></i>
                                            </div>
                                        </x-slot>
                                        @error('wktir1') <span class="text-danger">{{$message}}</span> @enderror
                                    </x-adminlte-input-date>
                                </div>
                                <div class="col-3">
                                    {{-- Waktu Ibadah Raya Selesai --}}
                                    @php
                                    $config = [
                                    'format' => 'LT',
                                    ];
                                    @endphp
                                    <x-adminlte-input-date class="datetimepicker-input @error('wktir2') is-invalid @enderror" name="wktir2" id="wktir2-{{$prmid}}" :config="$config" placeholder="Waktu IR selesai..." label="Ibadah Selesai" value="{{$lir->wktir2 ?? old('wktir2')}}">
                                        <x-slot name="appendSlot">
                                            <div class="input-group-text bg-gradient-dark">
                                                <i class="fas fa-clock"></i>
                                            </div>
                                        </x-slot>
                                        @error('wktir2') <span class="text-danger">{{$message}}</span> @enderror
                                    </x-adminlte-input-date>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    {{-- Ibadah Raya --}}
                                    <x-adminlte-select class="datetimepicker-input" name="ir" id="ir-{{$prmid}}" placeholder="Pilih Ibadah Raya..." label="Ibadah Raya" label-class="text-primary" value="{{$lir->ir ?? old('ir')}}" disabled>
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
                                    <x-adminlte-input class="form-control @error('gembala') is-invalid @enderror" name="gembala" id="ir-{{$prmid}}" label="Gembala IR" placeholder="Nama Gembala IR..." value="{{$lir->gembala ?? old('gembala')}}" required>
                                        <x-slot name="appendSlot">
                                            <div class="input-group-text bg-gradient-dark">
                                                <i class="fas fa-edit"></i>
                                            </div>
                                        </x-slot>
                                        @error('gembala') <span class="text-danger">{{$message}}</span> @enderror
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
                                            <x-adminlte-input type="number" class="form-control @error('npria') is-invalid @enderror" name="npria" id="npria-{{$prmid}}" label="Kehadiran Pria" placeholder="Jumlah jemaat pria..." value="{{$lir->npria}}" min=0 oninput="this.value = this.value.replace(/[^0-9]/g, '');" required>
                                                <x-slot name="appendSlot">
                                                    <div class="input-group-text bg-gradient-dark">
                                                        <i class="fas fa-hashtag"></i>
                                                    </div>
                                                </x-slot>
                                                @error('npria') <span class="text-danger">{{$message}}</span> @enderror
                                            </x-adminlte-input>
                                        </div>
                                        <div class="col-3">
                                            {{-- Jumlah kehadiran jemaat wanita --}}
                                            <x-adminlte-input type="number" class="form-control @error('nwanita') is-invalid @enderror" name="nwanita" id="nwanita-{{$prmid}}" label="Kehadiran Wanita" placeholder="Jumlah jemaat wanita..." value="{{$lir->nwanita}}" min=0 oninput="this.value = this.value.replace(/[^0-9]/g, '');" required>
                                                <x-slot name="appendSlot">
                                                    <div class="input-group-text bg-gradient-dark">
                                                        <i class="fas fa-hashtag"></i>
                                                    </div>
                                                </x-slot>
                                                @error('nwanita') <span class="text-danger">{{$message}}</span> @enderror
                                            </x-adminlte-input>
                                        </div>
                                        <div class="col-3">
                                            {{-- Jumlah Kehadiran Total --}}
                                            <x-adminlte-input type="number" class="form-control" name="nhadir" id="nhadir-{{$prmid}}" label="Jumlah Kehadiran" placeholder="Jumlah Kehadiran" value="{{$lir->nhadir}}" readonly required>
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
                                            <x-adminlte-input type="number" class="form-control" name="jbpria" id="jbpria-{{$prmid}}" label="Jemaat Baru Pria" placeholder="Jemaat baru pria..." value="{{$lir->jbpria}}" min=0 oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                                                <x-slot name="appendSlot">
                                                    <div class="input-group-text bg-gradient-dark">
                                                        <i class="fas fa-hashtag"></i>
                                                    </div>
                                                </x-slot>
                                            </x-adminlte-input>
                                        </div>
                                        <div class="col-3">
                                            {{-- Jumlah jemaat baru wanita --}}
                                            <x-adminlte-input type="number" class="form-control" name="jbwanita" id="jbwanita-{{$prmid}}" label="Jemaat Baru Wanita" placeholder="Jemaat baru wanita..." value="{{$lir->jbwanita}}" min=0 oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                                                <x-slot name="appendSlot">
                                                    <div class="input-group-text bg-gradient-dark">
                                                        <i class="fas fa-hashtag"></i>
                                                    </div>
                                                </x-slot>
                                            </x-adminlte-input>
                                        </div>
                                        <div class="col-3">
                                            {{-- Jumlah Total jemaat baru --}}
                                            <x-adminlte-input type="number" class="form-control" name="jbhadir" id="jbhadir-{{$prmid}}" label="Jumlah Jemaat Baru" placeholder="Jumlah Jemaat Baru" value="{{$lir->jbhadir}}" readonly>
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
                                            <x-adminlte-input type="number" class="form-control" name="lbpria" id="lbpria-{{$prmid}}" label="Lahir Baru Pria" placeholder="Lahir baru pria..." value="{{$lir->lbpria}}" min=0 oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                                                <x-slot name="appendSlot">
                                                    <div class="input-group-text bg-gradient-dark">
                                                        <i class="fas fa-hashtag"></i>
                                                    </div>
                                                </x-slot>
                                            </x-adminlte-input>
                                        </div>
                                        <div class="col-3">
                                            {{-- Jumlah lahir baru wanita --}}
                                            <x-adminlte-input type="number" class="form-control" name="lbwanita" id="lbwanita-{{$prmid}}" label="Lahir Baru Wanita" placeholder="Lahir baru wanita..." value="{{$lir->lbwanita}}" min=0 oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                                                <x-slot name="appendSlot">
                                                    <div class="input-group-text bg-gradient-dark">
                                                        <i class="fas fa-hashtag"></i>
                                                    </div>
                                                </x-slot>
                                            </x-adminlte-input>
                                        </div>
                                        <div class="col-3">
                                            {{-- Jumlah Total lahir baru --}}
                                            <x-adminlte-input type="number" class="form-control" name="lbhadir" id="lbhadir-{{$prmid}}" label="Jumlah Lahir Baru" placeholder="Jumlah lahir baru" value="{{$lir->lbhadir}}" readonly>
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
                                            <x-adminlte-input class="form-control @error('wl') is-invalid @enderror" name="wl" id="wl-{{$prmid}}" label="WL" placeholder="Nama WL..." value="{{$lir->wl}}" required>
                                                <x-slot name="appendSlot">
                                                    <div class="input-group-text bg-gradient-dark">
                                                        <i class="fas fa-edit"></i>
                                                    </div>
                                                </x-slot>
                                                @error('wl') <span class="text-danger">{{$message}}</span> @enderror
                                            </x-adminlte-input>
                                        </div>
                                        {{-- Singer 1 --}}
                                        <div class="col-4">
                                            <x-adminlte-input class="form-control @error('singer1') is-invalid @enderror" name="singer1" id="singer1-{{$prmid}}" label="Singer 1" placeholder="Nama singer 1..." value="{{$lir->singer1}}" required>
                                                <x-slot name="appendSlot">
                                                    <div class="input-group-text bg-gradient-dark">
                                                        <i class="fas fa-edit"></i>
                                                    </div>
                                                </x-slot>
                                                @error('singer1') <span class="text-danger">{{$message}}</span> @enderror
                                            </x-adminlte-input>
                                        </div>
                                        {{-- Singer 2 --}}
                                        <div class="col-4">
                                            <x-adminlte-input class="form-control" name="singer2" id="singer2-{{$prmid}}" label="Singer 2" placeholder="Nama singer 2..." value="{{$lir->singer2}}">
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
                                            <x-adminlte-input-date class="datetimepicker-input @error('wl_dtg') is-invalid @enderror" name="wl_dtg" id="wl_dtg-{{$prmid}}" :config="$config" label="WL Datang" placeholder="WL datang..." value="{{$lir->wl_dtg}}" required>
                                                <x-slot name="appendSlot">
                                                    <div class="input-group-text bg-gradient-dark">
                                                        <i class="fas fa-clock"></i>
                                                    </div>
                                                </x-slot>
                                                @error('wl_dtg') <span class="text-danger">{{$message}}</span> @enderror
                                            </x-adminlte-input-date>
                                        </div>
                                        {{-- Singer 1 Datang --}}
                                        <div class="col-4">
                                            @php
                                            $config = [
                                            'format' => 'LT',
                                            ];
                                            @endphp
                                            <x-adminlte-input-date class="datetimepicker-input @error('singer1_dtg') is-invalid @enderror" name="singer1_dtg" id="singer1_dtg-{{$prmid}}" :config="$config" label="Singer 1 Datang" placeholder="Singer 1 datang..." value="{{$lir->singer1_dtg}}" required>
                                                <x-slot name="appendSlot">
                                                    <div class="input-group-text bg-gradient-dark">
                                                        <i class="fas fa-clock"></i>
                                                    </div>
                                                </x-slot>
                                                @error('singer1_dtg') <span class="text-danger">{{$message}}</span> @enderror
                                            </x-adminlte-input-date>
                                        </div>
                                        {{-- Singer 2 Datang --}}
                                        <div class="col-4">
                                            @php
                                            $config = [
                                            'format' => 'LT',
                                            ];
                                            @endphp
                                            <x-adminlte-input-date class="datetimepicker-input" name="singer2_dtg" id="singer2_dtg-{{$prmid}}" :config="$config" label="Singer 2 Datang" placeholder="Singer 2 datang..." value="{{$lir->singer2_dtg}}">
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
                                            <x-adminlte-input class="form-control @error('pembicara') is-invalid @enderror" name="pembicara" id="pembicara-{{$prmid}}" label="Pembicara" placeholder="Nama Pembicara..." value="{{$lir->pembicara}}" required>
                                                <x-slot name="appendSlot">
                                                    <div class="input-group-text bg-gradient-dark">
                                                        <i class="fas fa-edit"></i>
                                                    </div>
                                                </x-slot>
                                                @error('pembicara') <span class="text-danger">{{$message}}</span> @enderror
                                            </x-adminlte-input>
                                        </div>
                                        {{-- Khotbah mulai --}}
                                        <div class="col-4">
                                            @php
                                            $config = [
                                            'format' => 'LT',
                                            ];
                                            @endphp
                                            <x-adminlte-input-date class="datetimepicker-input @error('wktbicara1') is-invalid @enderror" name="wktbicara1" id="wktbicara1-{{$prmid}}" :config="$config" label="Khotbah mulai" placeholder="Khotbah mulai..." value="{{$lir->wktbicara1}}" required>
                                                <x-slot name="appendSlot">
                                                    <div class="input-group-text bg-gradient-dark">
                                                        <i class="fas fa-clock"></i>
                                                    </div>
                                                </x-slot>
                                                @error('wktbicara1') <span class="text-danger">{{$message}}</span> @enderror
                                            </x-adminlte-input-date>
                                        </div>
                                        {{-- Khotbah selesai --}}
                                        <div class="col-4">
                                            @php
                                            $config = [
                                            'format' => 'LT',
                                            ];
                                            @endphp
                                            <x-adminlte-input-date class="datetimepicker-input @error('wktbicara2') is-invalid @enderror" name="wktbicara2" id="wktbicara2-{{$prmid}}" :config="$config" label="Khotbah selesai" placeholder="Khotbah selesai..." value="{{$lir->wktbicara2}}" required>
                                                <x-slot name="appendSlot">
                                                    <div class="input-group-text bg-gradient-dark">
                                                        <i class="fas fa-clock"></i>
                                                    </div>
                                                </x-slot>
                                                @error('wktbicara2') <span class="text-danger">{{$message}}</span> @enderror
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
                                            <x-adminlte-input class="form-control @error('pemusik1') is-invalid @enderror" name="pemusik1" id="pemusik1-{{$prmid}}" label="Pemusik 1" placeholder="Nama Pemusik 1..." value="{{$lir->pemusik1}}" required>
                                                <x-slot name="appendSlot">
                                                    <div class="input-group-text bg-gradient-dark">
                                                        <i class="fas fa-edit"></i>
                                                    </div>
                                                </x-slot>
                                                @error('pemusik1') <span class="text-danger">{{$message}}</span> @enderror
                                            </x-adminlte-input>
                                        </div>
                                        {{-- Pemusik 2 --}}
                                        <div class="col-4">
                                            <x-adminlte-input class="form-control @error('pemusik2') is-invalid @enderror" name="pemusik2" id="pemusik2-{{$prmid}}" label="Pemusik 2" placeholder="Nama Pemusik 2..." value="{{$lir->pemusik2}}" required>
                                                <x-slot name="appendSlot">
                                                    <div class="input-group-text bg-gradient-dark">
                                                        <i class="fas fa-edit"></i>
                                                    </div>
                                                </x-slot>
                                                @error('pemusik2') <span class="text-danger">{{$message}}</span> @enderror
                                            </x-adminlte-input>
                                        </div>
                                        {{-- Pemusik 3 --}}
                                        <div class="col-4">
                                            <x-adminlte-input class="form-control @error('pemusik3') is-invalid @enderror" name="pemusik3" id="pemusik3-{{$prmid}}" label="Pemusik 3" placeholder="Nama Pemusik 3..." value="{{$lir->pemusik3}}" required>
                                                <x-slot name="appendSlot">
                                                    <div class="input-group-text bg-gradient-dark">
                                                        <i class="fas fa-edit"></i>
                                                    </div>
                                                </x-slot>
                                                @error('pemusik3') <span class="text-danger">{{$message}}</span> @enderror
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
                                            <x-adminlte-input-date class="datetimepicker-input @error('pemusik1_dtg') is-invalid @enderror" name="pemusik1_dtg" id="pemusik1_dtg-{{$prmid}}" :config="$config" label="Pemusik 1 datang" placeholder="Pemusik 1 datang..." value="{{$lir->pemusik1_dtg}}" required>
                                                <x-slot name="appendSlot">
                                                    <div class="input-group-text bg-gradient-dark">
                                                        <i class="fas fa-clock"></i>
                                                    </div>
                                                </x-slot>
                                                @error('pemusik1_dtg') <span class="text-danger">{{$message}}</span> @enderror
                                            </x-adminlte-input-date>
                                        </div>
                                        {{-- Pemusik 2 datang --}}
                                        <div class="col-4">
                                            @php
                                            $config = [
                                            'format' => 'LT',
                                            ];
                                            @endphp
                                            <x-adminlte-input-date class="datetimepicker-input @error('pemusik2_dtg') is-invalid @enderror" name="pemusik2_dtg" id="pemusik2_dtg-{{$prmid}}" :config="$config" label="Pemusik 2 datang" placeholder="Pemusik 2 datang..." value="{{$lir->pemusik2_dtg}}" required>
                                                <x-slot name="appendSlot">
                                                    <div class="input-group-text bg-gradient-dark">
                                                        <i class="fas fa-clock"></i>
                                                    </div>
                                                </x-slot>
                                                @error('pemusik2_dtg') <span class="text-danger">{{$message}}</span> @enderror
                                            </x-adminlte-input-date>
                                        </div>
                                        {{-- Pemusik 3 Datang --}}
                                        <div class="col-4">
                                            @php
                                            $config = [
                                            'format' => 'LT',
                                            ];
                                            @endphp
                                            <x-adminlte-input-date class="datetimepicker-input @error('pemusik3_dtg') is-invalid @enderror" name="pemusik3_dtg" id="pemusik3_dtg-{{$prmid}}" :config="$config" label="Pemusik 3 Datang" placeholder="Pemusik 3 datang..." value="{{$lir->pemusik3_dtg}}" required>
                                                <x-slot name="appendSlot">
                                                    <div class="input-group-text bg-gradient-dark">
                                                        <i class="fas fa-clock"></i>
                                                    </div>
                                                </x-slot>
                                                @error('pemusik3_dtg') <span class="text-danger">{{$message}}</span> @enderror
                                            </x-adminlte-input-date>
                                        </div>
                                    </div>
                                    {{-- Kelompok baris 3b nama pemusik --}}
                                    <div class="row">
                                        {{-- Pemusik 4 --}}
                                        <div class="col-4">
                                            <x-adminlte-input class="form-control" name="pemusik4" id="pemusik4-{{$prmid}}" label="Pemusik 4" placeholder="Nama Pemusik 4..." value="{{$lir->pemusik4}}">
                                                <x-slot name="appendSlot">
                                                    <div class="input-group-text bg-gradient-dark">
                                                        <i class="fas fa-edit"></i>
                                                    </div>
                                                </x-slot>
                                            </x-adminlte-input>
                                        </div>
                                        {{-- Pemusik 5 --}}
                                        <div class="col-4">
                                            <x-adminlte-input class="form-control" name="pemusik5" id="pemusik5-{{$prmid}}" label="Pemusik 5" placeholder="Nama Pemusik 5..." value="{{$lir->pemusik5}}">
                                                <x-slot name="appendSlot">
                                                    <div class="input-group-text bg-gradient-dark">
                                                        <i class="fas fa-edit"></i>
                                                    </div>
                                                </x-slot>
                                            </x-adminlte-input>
                                        </div>
                                        {{-- Pemusik 6 --}}
                                        <div class="col-4">
                                            <x-adminlte-input class="form-control" name="pemusik6" id="pemusik6-{{$prmid}}" label="Pemusik 6" placeholder="Nama Pemusik 6..." value="{{$lir->pemusik6}}">
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
                                            <x-adminlte-input-date class="datetimepicker-input" name="pemusik4_dtg" id="pemsik4_dtg-{{$prmid}}" :config="$config" label="Pemusik 4 datang" placeholder="Pemusik 4 datang..." value="{{$lir->pemusik4_dtg}}">
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
                                            <x-adminlte-input-date class="datetimepicker-input" name="pemusik5_dtg" id="pemusik5_dtg-{{$prmid}}" :config="$config" label="Pemusik 5 datang" placeholder="Pemusik 5 datang..." value="{{$lir->pemusik5_dtg}}">
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
                                            <x-adminlte-input-date class="datetimepicker-input" name="pemusik6_dtg" id="pemusik6_dtg-{{$prmid}}" :config="$config" label="Pemusik 6 datang" placeholder="Pemusik 6 datang..." value="{{$lir->pemusik6_dtg}}">
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
                                            <x-adminlte-input class="form-control" name="penari1" id="penari1-{{$prmid}}" label="Penari 1" placeholder="Nama Penari 1..." value="{{$lir->penari1}}">
                                                <x-slot name="appendSlot">
                                                    <div class="input-group-text bg-gradient-dark">
                                                        <i class="fas fa-edit"></i>
                                                    </div>
                                                </x-slot>
                                            </x-adminlte-input>
                                        </div>
                                        {{-- Penari 2 --}}
                                        <div class="col-3">
                                            <x-adminlte-input class="form-control" name="penari2" id="penari2-{{$prmid}}" label="Penari 2" placeholder="Nama Penari 2..." value="{{$lir->penari2}}">
                                                <x-slot name="appendSlot">
                                                    <div class="input-group-text bg-gradient-dark">
                                                        <i class="fas fa-edit"></i>
                                                    </div>
                                                </x-slot>
                                            </x-adminlte-input>
                                        </div>
                                        {{-- Penari 3 --}}
                                        <div class="col-3">
                                            <x-adminlte-input class="form-control" name="penari3" id="penari3-{{$prmid}}" label="Penari 3" placeholder="Nama Penari 3..." value="{{$lir->penari3}}">
                                                <x-slot name="appendSlot">
                                                    <div class="input-group-text bg-gradient-dark">
                                                        <i class="fas fa-edit"></i>
                                                    </div>
                                                </x-slot>
                                            </x-adminlte-input>
                                        </div>
                                        {{-- Penari 4 --}}
                                        <div class="col-3">
                                            <x-adminlte-input class="form-control" name="penari4" id="penari4-{{$prmid}}" label="Penari 4" placeholder="Nama Penari 4..." value="{{$lir->penari4}}">
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
                                            <x-adminlte-input-date class="datetimepicker-input" name="penari1_dtg" id="penari1_dtg-{{$prmid}}" :config="$config" label="Penari 1 datang" placeholder="Penari 1 datang..." value="{{$lir->penari1_dtg}}">
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
                                            <x-adminlte-input-date class="datetimepicker-input" name="penari2_dtg" id="penari2_dtg-{{$prmid}}" :config="$config" label="Penari 2 datang" placeholder="Penari 2 datang..." value="{{$lir->penari2_dtg}}">
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
                                            <x-adminlte-input-date class="datetimepicker-input" name="penari3_dtg" id="penari3_dtg-{{$prmid}}" :config="$config" label="Penari 3 datang" placeholder="Penari 3 datang..." value="{{$lir->penari3_dtg}}">
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
                                            <x-adminlte-input-date class="datetimepicker-input" name="penari4_dtg" id="penari4_dtg-{{$prmid}}" :config="$config" label="Penari 4 datang" placeholder="Penari 4 datang..." value="{{$lir->penari4_dtg}}">
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
                                            <x-adminlte-input class="form-control @error('media1') is-invalid @enderror" name="media1" id="media1-{{$prmid}}" label="Media 1" placeholder="Nama Media 1..." value="{{$lir->media1}}" required>
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
                                            <x-adminlte-input class="form-control" name="media2" id="media2-{{$prmid}}" label="Media 2" placeholder="Nama Media 2..." value="{{$lir->media2}}">
                                                <x-slot name="appendSlot">
                                                    <div class="input-group-text bg-gradient-dark">
                                                        <i class="fas fa-edit"></i>
                                                    </div>
                                                </x-slot>
                                            </x-adminlte-input>
                                        </div>
                                        {{-- Media 3 --}}
                                        <div class="col-4">
                                            <x-adminlte-input class="form-control" name="media3" id="media3-{{$prmid}}" label="Media 3" placeholder="Nama Media 3..." value="{{$lir->media3}}">
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
                                            <x-adminlte-input-date class="datetimepicker-input @error('media1_dtg') is-invalid @enderror" name="media1_dtg" id="media1_dtg-{{$prmid}}" :config="$config" label="Media 1 datang" placeholder="Media 1 datang..." value="{{$lir->media1_dtg}}" required>
                                                <x-slot name="appendSlot">
                                                    <div class="input-group-text bg-gradient-dark">
                                                        <i class="fas fa-clock"></i>
                                                    </div>
                                                </x-slot>
                                                @error('media1_dtg') <span class="text-danger">{{$message}}</span> @enderror
                                            </x-adminlte-input-date>
                                        </div>
                                        {{-- Media 2 datang --}}
                                        <div class="col-4">
                                            @php
                                            $config = [
                                            'format' => 'LT',
                                            ];
                                            @endphp
                                            <x-adminlte-input-date class="datetimepicker-input" name="media2_dtg" id="media2_dtg-{{$prmid}}" :config="$config" label="Media 2 datang" placeholder="Media 2 datang..." value="{{$lir->media2_dtg}}">
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
                                            <x-adminlte-input-date class="datetimepicker-input" name="media3_dtg" id="media3_dtg-{{$prmid}}" :config="$config" label="Media 3 datang" placeholder="Media 3 datang..." value="{{$lir->media3_dtg}}">
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
                                            <x-adminlte-input class="form-control" name="media4" id="media4-{{$prmid}}" label="Media 4" placeholder="Nama Media 4..." value="{{$lir->media4}}">
                                                <x-slot name="appendSlot">
                                                    <div class="input-group-text bg-gradient-dark">
                                                        <i class="fas fa-edit"></i>
                                                    </div>
                                                </x-slot>
                                            </x-adminlte-input>
                                        </div>
                                        {{-- Media 5 --}}
                                        <div class="col-4">
                                            <x-adminlte-input class="form-control" name="media5" id="media5-{{$prmid}}" label="Media 5" placeholder="Nama Media 5..." value="{{$lir->media5}}">
                                                <x-slot name="appendSlot">
                                                    <div class="input-group-text bg-gradient-dark">
                                                        <i class="fas fa-edit"></i>
                                                    </div>
                                                </x-slot>
                                            </x-adminlte-input>
                                        </div>
                                        {{-- Media 6 --}}
                                        <div class="col-4">
                                            <x-adminlte-input class="form-control" name="media6" id="media6-{{$prmid}}" label="Media 6" placeholder="Nama Media 6..." value="{{$lir->media6}}">
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
                                            <x-adminlte-input-date class="datetimepicker-input" name="media4_dtg" id="media4_dtg-{{$prmid}}" :config="$config" label="Media 4 datang" placeholder="Media 4 datang..." value="{{$lir->media4_dtg}}">
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
                                            <x-adminlte-input-date class="datetimepicker-input" name="media5_dtg" id="media5_dtg-{{$prmid}}" :config="$config" label="Media 5 datang" placeholder="Media 5 datang..." value="{{$lir->media5_dtg}}">
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
                                            <x-adminlte-input-date class="datetimepicker-input" name="media6_dtg" id="media6_dtg-{{$prmid}}" :config="$config" label="Media 6 datang" placeholder="Media 6 datang..." value="{{$lir->media6_dtg}}">
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
                                        <div class="col-6">
                                            <x-adminlte-input class="form-control" name="lighting1" id="lighting1-{{$prmid}}" label="Lighting 1" placeholder="Nama Lighting 1..." value="{{$lir->lighting1}}">
                                                <x-slot name="appendSlot">
                                                    <div class="input-group-text bg-gradient-dark">
                                                        <i class="fas fa-edit"></i>
                                                    </div>
                                                </x-slot>
                                            </x-adminlte-input>
                                        </div>
                                        {{-- Lighting 2 --}}
                                        <div class="col-6">
                                            <x-adminlte-input class="form-control" name="lighting2" id="lighting2-{{$prmid}}" label="Lighting 2" placeholder="Nama Lighting 2..." value="{{$lir->lighting2}}">
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
                                        <div class="col-6">
                                            @php
                                            $config = [
                                            'format' => 'LT',
                                            ];
                                            @endphp
                                            <x-adminlte-input-date class="datetimepicker-input" name="lighting1_dtg" id="lighting1_dtg-{{$prmid}}" :config="$config" label="Lighting 1 Datang" placeholder="Lighting 1 Datang..." value="{{$lir->lighting1_dtg}}">
                                                <x-slot name="appendSlot">
                                                    <div class="input-group-text bg-gradient-dark">
                                                        <i class="fas fa-clock"></i>
                                                    </div>
                                                </x-slot>
                                            </x-adminlte-input-date>
                                        </div>
                                        {{-- Lighting 2 Datang --}}
                                        <div class="col-6">
                                            @php
                                            $config = [
                                            'format' => 'LT',
                                            ];
                                            @endphp
                                            <x-adminlte-input-date class="datetimepicker-input" name="lighting2_dtg" id="lighting2_dtg-{{$prmid}}" :config="$config" label="Lighting 2 Datang" placeholder="Lighting 2 Datang..." value="{{$lir->lighting2_dtg}}">
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
                                            <x-adminlte-input class="form-control @error('soundman1') is-invalid @enderror" name="soundman1" id="soundman1-{{$prmid}}" label="Soundman 1" placeholder="Nama Soundman 1..." value="{{$lir->soundman1}}" required>
                                                <x-slot name="appendSlot">
                                                    <div class="input-group-text bg-gradient-dark">
                                                        <i class="fas fa-edit"></i>
                                                    </div>
                                                </x-slot>
                                                @error('soundman1') <span class="text-danger">{{$message}}</span> @enderror
                                            </x-adminlte-input>
                                        </div>
                                        {{-- Soundman 2 --}}
                                        <div class="col-4">
                                            <x-adminlte-input class="form-control" name="soundman2" id="soundman2-{{$prmid}}" label="Soundman 2" placeholder="Nama Soundman 2..." value="{{$lir->soundman2}}">
                                                <x-slot name="appendSlot">
                                                    <div class="input-group-text bg-gradient-dark">
                                                        <i class="fas fa-edit"></i>
                                                    </div>
                                                </x-slot>
                                            </x-adminlte-input>
                                        </div>
                                        {{-- Soundman 3 --}}
                                        <div class="col-4">
                                            <x-adminlte-input class="form-control" name="soundman3" id="soundman3-{{$prmid}}" label="Soundman 3" placeholder="Nama Soundman 3..." value="{{$lir->soundman3}}">
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
                                            <x-adminlte-input-date class="datetimepicker-input @error('soundman1_dtg') is-invalid @enderror" name="soundman1_dtg" id="soundman1_dtg-{{$prmid}}" :config="$config" label="Soundman 1 Datang" placeholder="Soundman 1 Datang..." value="{{$lir->soundman1_dtg}}" required>
                                                <x-slot name="appendSlot">
                                                    <div class="input-group-text bg-gradient-dark">
                                                        <i class="fas fa-clock"></i>
                                                    </div>
                                                </x-slot>
                                                @error('soundman1_dtg') <span class="text-danger">{{$message}}</span> @enderror
                                            </x-adminlte-input-date>
                                        </div>
                                        {{-- Soundman 2 Datang --}}
                                        <div class="col-4">
                                            @php
                                            $config = [
                                            'format' => 'LT',
                                            ];
                                            @endphp
                                            <x-adminlte-input-date class="datetimepicker-input" name="soundman2_dtg" id="soundman2_dtg-{{$prmid}}" :config="$config" label="Soundman 2 Datang" placeholder="Soundman 2 Datang..." value="{{$lir->soundman2_dtg}}">
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
                                            <x-adminlte-input-date class="datetimepicker-input" name="soundman3_dtg" id="soundman3_dtg-{{$prmid}}" :config="$config" label="Soundman 3 Datang" placeholder="Soundman 3 Datang..." value="{{$lir->soundman3_dtg}}">
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
                                                <input class="form-check-input" type="checkbox" name="qsuara_a" id="qsuara_a-{{$prmid}}" {{$lir->qsuara_a==1 ? 'checked' : ''}}>
                                                <label class="form-check-label" for="qsuara_a-{{$prmid}}">a. Terlalu Besar</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="qsuara_b" id="qsuara_b-{{$prmid}}" {{$lir->qsuara_b==1 ? 'checked' : ''}}>
                                                <label class="form-check-label" for="qsuara_b-{{$prmid}}">b. WL tidak terdengar</label>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="qsuara_c" id="qsuara_c-{{$prmid}}" {{$lir->qsuara_c==1 ? 'checked' : ''}}>
                                                <label class="form-check-label" for="qsuara_c-{{$prmid}}">c. Singer tidak terdengar</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="qsuara_d" id="qsuara_d-{{$prmid}}" {{$lir->qsuara_d==1 ? 'checked' : ''}}>
                                                <label class="form-check-label" for="qsuara_d-{{$prmid}}">d. Musik terlalu keras</label>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="qsuara_e" id="qsuara_e-{{$prmid}}" {{$lir->qsuara_e==1 ? 'checked' : ''}}>
                                                <label class="form-check-label" for="qsuara_e-{{$prmid}}">e. Bagus</label>
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
                                    <table class="table table-bordered table-hover table-striped">
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
                                                    <div class="pn01val-{{$prmid}} text-center"></div>
                                                    <div class="form-group d-flex justify-content-center">
                                                        <input type="range" class="form-range" id="pn01-{{$prmid}}" name="pn01" min="1" max="5" step="0.5" value="{{$lir->pn01}}">
                                                    </div>
                                                </td>
                                                {{-- Catatan Dan Masukan 1 --}}
                                                <td>
                                                    <x-adminlte-input class="form-control" name="pc01" placeholder="Catatan..." value="{{$lir->pc01}}">
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
                                                    <div class="pn02val-{{$prmid}} text-center"></div>
                                                    <div class="form-group d-flex justify-content-center">
                                                        <input type="range" class="form-range" id="pn02-{{$prmid}}" name="pn02" min="1" max="5" step="0.5" value="{{$lir->pn02}}">
                                                    </div>
                                                </td>
                                                {{-- Catatan Dan Masukan 2 --}}
                                                <td>
                                                    <x-adminlte-input class="form-control" name="pc02" placeholder="Catatan..." value="{{$lir->pc02}}">
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
                                                    <div class="pn03val-{{$prmid}} text-center"></div>
                                                    <div class="form-group d-flex justify-content-center">
                                                        <input type="range" class="form-range" id="pn03-{{$prmid}}" name="pn03" min="1" max="5" step="0.5" value="{{$lir->pn03}}">
                                                    </div>
                                                </td>
                                                {{-- Catatan Dan Masukan 3 --}}
                                                <td>
                                                    <x-adminlte-input class="form-control" name="pc03" placeholder="Catatan..." value="{{$lir->pc03}}">
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
                                                    <div class="pn04val-{{$prmid}} text-center"></div>
                                                    <div class="form-group d-flex justify-content-center">
                                                        <input type="range" class="form-range" id="pn04-{{$prmid}}" name="pn04" min="1" max="5" step="0.5" value="{{$lir->pn04}}">
                                                    </div>
                                                </td>
                                                {{-- Catatan Dan Masukan 4 --}}
                                                <td>
                                                    <x-adminlte-input class="form-control" name="pc04" placeholder="Catatan..." value="{{$lir->pc04}}">
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
                                                    <div class="pn05val-{{$prmid}} text-center"></div>
                                                    <div class="form-group d-flex justify-content-center">
                                                        <input type="range" class="form-range" id="pn05-{{$prmid}}" name="pn05" min="1" max="5" step="0.5" value="{{$lir->pn05}}">
                                                    </div>
                                                </td>
                                                {{-- Catatan Dan Masukan 5 --}}
                                                <td>
                                                    <x-adminlte-input class="form-control" name="pc05" placeholder="Catatan..." value="{{$lir->pc05}}">
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
                                                    <div class="pn06val-{{$prmid}} text-center"></div>
                                                    <div class="form-group d-flex justify-content-center">
                                                        <input type="range" class="form-range" id="pn06-{{$prmid}}" name="pn06" min="1" max="5" step="0.5" value="{{$lir->pn06}}">
                                                    </div>
                                                </td>
                                                {{-- Catatan Dan Masukan 6 --}}
                                                <td>
                                                    <x-adminlte-input class="form-control" name="pc06" placeholder="Catatan..." value="{{$lir->pc06}}">
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
                                                    <div class="pn07val-{{$prmid}} text-center"></div>
                                                    <div class="form-group d-flex justify-content-center">
                                                        <input type="range" class="form-range" id="pn07-{{$prmid}}" name="pn07" min="1" max="5" step="0.5" value="{{$lir->pn07}}">
                                                    </div>
                                                </td>
                                                {{-- Catatan Dan Masukan 7 --}}
                                                <td>
                                                    <x-adminlte-input class="form-control" name="pc07" placeholder="Catatan..." value="{{$lir->pc07}}">
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
                                                    <div class="pn08val-{{$prmid}} text-center"></div>
                                                    <div class="form-group d-flex justify-content-center">
                                                        <input type="range" class="form-range" id="pn08-{{$prmid}}" name="pn08" min="1" max="5" step="0.5" value="{{$lir->pn08}}">
                                                    </div>
                                                </td>
                                                {{-- Catatan Dan Masukan 8 --}}
                                                <td>
                                                    <x-adminlte-input class="form-control" name="pc08" placeholder="Catatan..." value="{{$lir->pc08}}">
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
                                                    <div class="pn09val-{{$prmid}} text-center"></div>
                                                    <div class="form-group d-flex justify-content-center">
                                                        <input type="range" class="form-range" id="pn09-{{$prmid}}" name="pn09" min="1" max="5" step="0.5" value="{{$lir->pn09}}">
                                                    </div>
                                                </td>
                                                {{-- Catatan Dan Masukan 9 --}}
                                                <td>
                                                    <x-adminlte-input class="form-control" name="pc09" placeholder="Catatan..." value="{{$lir->pc09}}">
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
                                                    <div class="pn10val-{{$prmid}} text-center"></div>
                                                    <div class="form-group d-flex justify-content-center">
                                                        <input type="range" class="form-range" id="pn10-{{$prmid}}" name="pn10" min="1" max="5" step="0.5" value="{{$lir->pn10}}">
                                                    </div>
                                                </td>
                                                {{-- Catatan Dan Masukan 10 --}}
                                                <td>
                                                    <x-adminlte-input class="form-control" name="pc10" placeholder="Catatan..." value="{{$lir->pc10}}">
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
                                                    <div class="pn11val-{{$prmid}} text-center"></div>
                                                    <div class="form-group d-flex justify-content-center">
                                                        <input type="range" class="form-range" id="pn11-{{$prmid}}" name="pn11" min="1" max="5" step="0.5" value="{{$lir->pn11}}">
                                                    </div>
                                                </td>
                                                {{-- Catatan Dan Masukan 11 --}}
                                                <td>
                                                    <x-adminlte-input class="form-control" name="pc11" placeholder="Catatan..." value="{{$lir->pc11}}">
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
                                                    <div class="pn12val-{{$prmid}} text-center"></div>
                                                    <div class="form-group d-flex justify-content-center">
                                                        <input type="range" class="form-range" id="pn12-{{$prmid}}" name="pn12" min="1" max="5" step="0.5" value="{{$lir->pn12}}">
                                                    </div>
                                                </td>
                                                {{-- Catatan Dan Masukan 12 --}}
                                                <td>
                                                    <x-adminlte-input class="form-control" name="pc12" placeholder="Catatan..." value="{{$lir->pc12}}">
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
                                                    <div class="pn13val-{{$prmid}} text-center"></div>
                                                    <div class="form-group d-flex justify-content-center">
                                                        <input type="range" class="form-range" id="pn13-{{$prmid}}" name="pn13" min="1" max="5" step="0.5" value="{{$lir->pn13}}">
                                                    </div>
                                                </td>
                                                {{-- Catatan Dan Masukan 13 --}}
                                                <td>
                                                    <x-adminlte-input class="form-control" name="pc13" placeholder="Catatan..." value="{{$lir->pc13}}">
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
                                                    <div class="rn01val-{{$prmid}} text-center"></div>
                                                    <div class="form-group d-flex justify-content-center">
                                                        <input type="range" class="form-range" id="rn01-{{$prmid}}" name="rn01" min="1" max="5" step="0.5" value="{{$lir->rn01}}">
                                                    </div>
                                                </td>
                                            </tr>
                                            {{-- Penilaian 2 --}}
                                            <tr>
                                                <td>2</td>
                                                <td>Khotbah mengingatkan sesuatu yang salah dalam hidup jemaat</td>
                                                {{-- Nilai 2 Slider --}}
                                                <td>
                                                    <div class="rn02val-{{$prmid}} text-center"></div>
                                                    <div class="form-group d-flex justify-content-center">
                                                        <input type="range" class="form-range" id="rn02-{{$prmid}}" name="rn02" min="1" max="5" step="0.5" value="{{$lir->rn02}}">
                                                    </div>
                                                </td>
                                            </tr>
                                            {{-- Penilaian 3 --}}
                                            <tr>
                                                <td>3</td>
                                                <td>Khotbah membukakan sesuatu kebenaran</td>
                                                {{-- Nilai 3 Slider --}}
                                                <td>
                                                    <div class="rn03val-{{$prmid}} text-center"></div>
                                                    <div class="form-group d-flex justify-content-center">
                                                        <input type="range" class="form-range" id="rn03-{{$prmid}}" name="rn03" min="1" max="5" step="0.5" value="{{$lir->rn03}}">
                                                    </div>
                                                </td>
                                            </tr>
                                            {{-- Penilaian 4 --}}
                                            <tr>
                                                <td>4</td>
                                                <td>Khotbah membangkitkan inspirasi dan semangat untuk melakukan Firman</td>
                                                {{-- Nilai 4 Slider --}}
                                                <td>
                                                    <div class="rn04val-{{$prmid}} text-center"></div>
                                                    <div class="form-group d-flex justify-content-center">
                                                        <input type="range" class="form-range" id="rn04-{{$prmid}}" name="rn04" min="1" max="5" step="0.5" value="{{$lir->rn04}}">
                                                    </div>
                                                </td>
                                            </tr>
                                            {{-- Penilaian 5 --}}
                                            <tr>
                                                <td>5</td>
                                                <td>Jemaat menikmati pujian dan penyembahan</td>
                                                {{-- Nilai 5 Slider --}}
                                                <td>
                                                    <div class="rn05val-{{$prmid}} text-center"></div>
                                                    <div class="form-group d-flex justify-content-center">
                                                        <input type="range" class="form-range" id="rn05-{{$prmid}}" name="rn05" min="1" max="5" step="0.5" value="{{$lir->rn05}}">
                                                    </div>
                                                </td>
                                            </tr>
                                            {{-- Penilaian 6 --}}
                                            <tr>
                                                <td>6</td>
                                                <td>Suasana keseluruhan menurut Jemaat</td>
                                                {{-- Nilai 6 Slider --}}
                                                <td>
                                                    <div class="rn06val-{{$prmid}} text-center"></div>
                                                    <div class="form-group d-flex justify-content-center">
                                                        <input type="range" class="form-range" id="rn06-{{$prmid}}" name="rn06" min="1" max="5" step="0.5" value="{{$lir->rn06}}">
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
                            <x-adminlte-textarea class="form-control @error('ket') is-invalid @enderror" name="ket" id="ket-{{$prmid}}" label="Komentar umum secara keseluruhan" placeholder="Isi komentar, kritik atau saran..." rows=5 igroup-size="sm" required>
                                {{$lir->ket}}
                                <x-slot name="prependSlot">
                                    <div class="input-group-text bg-gradient-dark">
                                        <i class="fas fa-lg fa-file-alt text-warning"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" form="fedit-{{$prmid}}" class="btn btn-primary">Simpan</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>

@push('js')
<script>
    $(document).ready(function() {
        var msg = "";
        var elements = document.getElementsByTagName("INPUT");

        for (var i = 0; i < elements.length; i++) {
            elements[i].oninvalid = function(e) {
                if (!e.target.validity.valid || !e.target.val()) {
                    e.target.setCustomValidity(e.target.name + " harus diisi dengan benar !");
                    /*
                    switch (e.target.id) {
                        case 'tglir':
                            e.target.setCustomValidity(e.target.name + "harus diisi !");
                            break;
                        case 'username':
                            e.target.setCustomValidity("Username cannot be blank");
                            break;
                        default:
                            e.target.setCustomValidity("");
                            break;
                    }
                    */
                }
            };
            elements[i].oninput = function(e) {
                e.target.setCustomValidity(msg);
            };
        }
    });

    //Reset form ketika modal ditutup (baik krn save / batal), krn nilai dari DB akan di-load saat modal show
    $('#modal-edit-lir-{{ $prmid }}').on('hidden.bs.modal', function(e) {
        $(this).find('form').trigger('reset');
    });

    $('#modal-edit-lir-{{ $prmid }}').on('show.bs.modal', function(e) {
        //Penilaian pelaksaan
        $('div.pn01val-{{$prmid}}').text($('#pn01-{{$prmid}}').val());
        $('div.pn02val-{{$prmid}}').text($('#pn02-{{$prmid}}').val());
        $('div.pn03val-{{$prmid}}').text($('#pn03-{{$prmid}}').val());
        $('div.pn04val-{{$prmid}}').text($('#pn04-{{$prmid}}').val());
        $('div.pn05val-{{$prmid}}').text($('#pn05-{{$prmid}}').val());
        $('div.pn06val-{{$prmid}}').text($('#pn06-{{$prmid}}').val());
        $('div.pn07val-{{$prmid}}').text($('#pn07-{{$prmid}}').val());
        $('div.pn08val-{{$prmid}}').text($('#pn08-{{$prmid}}').val());
        $('div.pn09val-{{$prmid}}').text($('#pn09-{{$prmid}}').val());
        $('div.pn10val-{{$prmid}}').text($('#pn10-{{$prmid}}').val());
        $('div.pn11val-{{$prmid}}').text($('#pn11-{{$prmid}}').val());
        $('div.pn12val-{{$prmid}}').text($('#pn12-{{$prmid}}').val());
        $('div.pn13val-{{$prmid}}').text($('#pn13-{{$prmid}}').val());

        //Penilaian Angket Jemaat
        $('div.rn01val-{{$prmid}}').text($('#rn01-{{$prmid}}').val());
        $('div.rn02val-{{$prmid}}').text($('#rn02-{{$prmid}}').val());
        $('div.rn03val-{{$prmid}}').text($('#rn03-{{$prmid}}').val());
        $('div.rn04val-{{$prmid}}').text($('#rn04-{{$prmid}}').val());
        $('div.rn05val-{{$prmid}}').text($('#rn05-{{$prmid}}').val());
        $('div.rn06val-{{$prmid}}').text($('#rn06-{{$prmid}}').val());
    });

    //script hitung jumlah total kehadiran berdasarkan input
    $(() => {
        $("#npria-{{$prmid}}, #nwanita-{{$prmid}}").on("input", nsum);

        function nsum() {
            $("#nhadir-{{$prmid}}").val(Number($("#npria-{{$prmid}}").val()) + Number($("#nwanita-{{$prmid}}").val()));
        }

        $("#jbpria-{{$prmid}}, #jbwanita-{{$prmid}}").on("input", jbsum);

        function jbsum() {
            $("#jbhadir-{{$prmid}}").val(Number($("#jbpria-{{$prmid}}").val()) + Number($("#jbwanita-{{$prmid}}").val()));
        }

        $("#lbpria-{{$prmid}}, #lbwanita-{{$prmid}}").on("input", lbsum);

        function lbsum() {
            $("#lbhadir-{{$prmid}}").val(Number($("#lbpria-{{$prmid}}").val()) + Number($("#lbwanita-{{$prmid}}").val()));
        }
    })

    //ubah label nilai diatas setiap range slide penilaian
    $(document).ready(function() {
        $('#pn01-{{$prmid}}').on('input', function() {
            v = $('#pn01-{{$prmid}}').val();
            $('div.pn01val-{{$prmid}}').text(v);
        });

        $('#pn02-{{$prmid}}').on('input', function() {
            v = $('#pn02-{{$prmid}}').val();
            $('div.pn02val-{{$prmid}}').text(v);
        });

        $('#pn03-{{$prmid}}').on('input', function() {
            v = $('#pn03-{{$prmid}}').val();
            $('div.pn03val-{{$prmid}}').text(v);
        });

        $('#pn04-{{$prmid}}').on('input', function() {
            v = $('#pn04-{{$prmid}}').val();
            $('div.pn04val-{{$prmid}}').text(v);
        });

        $('#pn05-{{$prmid}}').on('input', function() {
            v = $('#pn05-{{$prmid}}').val();
            $('div.pn05val-{{$prmid}}').text(v);
        });

        $('#pn06-{{$prmid}}').on('input', function() {
            v = $('#pn06-{{$prmid}}').val();
            $('div.pn06val-{{$prmid}}').text(v);
        });

        $('#pn07-{{$prmid}}').on('input', function() {
            v = $('#pn07-{{$prmid}}').val();
            $('div.pn07val-{{$prmid}}').text(v);
        });

        $('#pn08-{{$prmid}}').on('input', function() {
            v = $('#pn08-{{$prmid}}').val();
            $('div.pn08val-{{$prmid}}').text(v);
        });

        $('#pn09-{{$prmid}}').on('input', function() {
            v = $('#pn09-{{$prmid}}').val();
            $('div.pn09val-{{$prmid}}').text(v);
        });

        $('#pn10-{{$prmid}}').on('input', function() {
            v = $('#pn10-{{$prmid}}').val();
            $('div.pn10val-{{$prmid}}').text(v);
        });

        $('#pn11-{{$prmid}}').on('input', function() {
            v = $('#pn11-{{$prmid}}').val();
            $('div.pn11val-{{$prmid}}').text(v);
        });

        $('#pn12-{{$prmid}}').on('input', function() {
            v = $('#pn12-{{$prmid}}').val();
            $('div.pn12val-{{$prmid}}').text(v);
        });

        $('#pn13-{{$prmid}}').on('input', function() {
            v = $('#pn13-{{$prmid}}').val();
            $('div.pn13val-{{$prmid}}').text(v);
        });
    });

    //ubah label nilai diatas setiap range slide angket jemaat
    $(document).ready(function() {
        $('#rn01-{{$prmid}}').on('input', function() {
            v = $('#rn01-{{$prmid}}').val();
            $('div.rn01val-{{$prmid}}').text(v);
        });

        $('#rn02-{{$prmid}}').on('input', function() {
            v = $('#rn02-{{$prmid}}').val();
            $('div.rn02val-{{$prmid}}').text(v);
        });

        $('#rn03-{{$prmid}}').on('input', function() {
            v = $('#rn03-{{$prmid}}').val();
            $('div.rn03val-{{$prmid}}').text(v);
        });

        $('#rn04-{{$prmid}}').on('input', function() {
            v = $('#rn04-{{$prmid}}').val();
            $('div.rn04val-{{$prmid}}').text(v);
        });

        $('#rn05-{{$prmid}}').on('input', function() {
            v = $('#rn05-{{$prmid}}').val();
            $('div.rn05val-{{$prmid}}').text(v);
        });

        $('#rn06-{{$prmid}}').on('input', function() {
            v = $('#rn06-{{$prmid}}').val();
            $('div.rn06val-{{$prmid}}').text(v);
        });
    });
</script>
@endpush