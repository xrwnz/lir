{{-- Create LIR Modal --}}
<div class="modal fade" id="modal-create-lir" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <?php /* <h4 class="modal-title"><i class="fas fa-circle-plus fa-beat-fade" style="--fa-animation-duration: 2s; --fa-fade-opacity: 0.5;"></i> Buat Laporan IR</h4> */ ?>
                <h4 class="modal-title"><i class="fas fa-asterisk fa-spin"></i> Buat Laporan IR</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="fnew" action="{{route('lir.store')}}" method="post">
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
                                    <x-adminlte-input-date class="datetimepicker-input @error('tglir') is-invalid @enderror" name="tglir" :config="$config" placeholder="Tanggal IR..." label="Tanggal IR" label-class="text-primary" value="{{old('tglir')}}" required>
                                        <x-slot name="appendSlot">
                                            <div class="input-group-text bg-gradient-primary">
                                                <i class="fas fa-calendar-alt"></i>
                                            </div>
                                        </x-slot>
                                        @error('tglir') <span class="text-danger">{{$message}}</span> @enderror
                                    </x-adminlte-input-date>
                                </div>
                                <div class="col-3">
                                    {{-- Waktu Ibadah Raya Mulai --}}
                                    @php
                                    $config = [
                                    'format' => 'LT',
                                    ];
                                    @endphp
                                    <x-adminlte-input-date class="datetimepicker-input @error('wktir1') is-invalid @enderror" name="wktir1" :config="$config" placeholder="Waktu IR dimulai..." label="Ibadah Mulai" value="{{old('wktir1')}}" required>
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
                                    <x-adminlte-input-date class="datetimepicker-input @error('wktir2') is-invalid @enderror" name="wktir2" :config="$config" placeholder="Waktu IR selesai..." label="Ibadah Selesai" value="{{old('wktir2')}}" required>
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
                                    <x-adminlte-select class="datetimepicker-input @error('irnm') is-invalid @enderror" name="ir" placeholder="Pilih Ibadah Raya..." label="Ibadah Raya" label-class="text-primary" value="{{old('ir')}}" required>
                                        <x-slot name="prependSlot">
                                            <div class="input-group-text bg-gradient-primary">
                                                <i class="fas fa-church"></i>
                                            </div>
                                        </x-slot>
                                        @foreach($irs as $ir)
                                        <?php /* <option value="{{ $ir->irpk }}" {{$ir->irpk == $lir->ir  ? 'selected' : ''}}>{{ $ir->irnm }}</option> */ ?>
                                        <option value="{{ $ir->irpk }}">{{ $ir->irnm }}</option>
                                        @endforeach
                                        @error('ir') <span class="text-danger">{{$message}}</span> @enderror
                                    </x-adminlte-select>
                                </div>
                                <div class="col-6">
                                    {{-- Nama Gembala IR --}}
                                    <x-adminlte-input class="form-control @error('gembala') is-invalid @enderror" name="gembala" label="Gembala IR" placeholder="Nama Gembala IR..." value="{{old('gembala')}}" required>
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
                                {{--
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                --}}
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
                                            <x-adminlte-input type="number" class="form-control @error('npria') is-invalid @enderror" name="npria" label="Kehadiran Pria" placeholder="Jumlah jemaat pria..." value="{{old('npria')}}" min=0 oninput="this.value = this.value.replace(/[^0-9]/g, '');" required>
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
                                            <x-adminlte-input type="number" class="form-control @error('nwanita') is-invalid @enderror" name="nwanita" label="Kehadiran Wanita" placeholder="Jumlah jemaat wanita..." value="{{old('nwanita')}}" min=0 oninput="this.value = this.value.replace(/[^0-9]/g, '');" required>
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
                                            <x-adminlte-input type="number" class="form-control" name="nhadir" label="Jumlah Kehadiran" placeholder="Jumlah Kehadiran" value="{{old('nhadir')}}" readonly required>
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
                                            <x-adminlte-input type="number" class="form-control" name="jbpria" label="Jemaat Baru Pria" placeholder="Jemaat baru pria..." value="{{old('jbpria')}}" min=0 oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                                                <x-slot name="appendSlot">
                                                    <div class="input-group-text bg-gradient-dark">
                                                        <i class="fas fa-hashtag"></i>
                                                    </div>
                                                </x-slot>
                                            </x-adminlte-input>
                                        </div>
                                        <div class="col-3">
                                            {{-- Jumlah jemaat baru wanita --}}
                                            <x-adminlte-input type="number" class="form-control" name="jbwanita" label="Jemaat Baru Wanita" placeholder="Jemaat baru wanita..." value="{{old('jbwanita')}}" min=0 oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                                                <x-slot name="appendSlot">
                                                    <div class="input-group-text bg-gradient-dark">
                                                        <i class="fas fa-hashtag"></i>
                                                    </div>
                                                </x-slot>
                                            </x-adminlte-input>
                                        </div>
                                        <div class="col-3">
                                            {{-- Jumlah Total jemaat baru --}}
                                            <x-adminlte-input type="number" class="form-control" name="jbhadir" label="Jumlah Jemaat Baru" placeholder="Jumlah Jemaat Baru" value="{{old('jbhadir')}}" readonly>
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
                                            <x-adminlte-input type="number" class="form-control" name="lbpria" label="Lahir Baru Pria" placeholder="Lahir baru pria..." value="{{old('lbpria')}}" min=0 oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                                                <x-slot name="appendSlot">
                                                    <div class="input-group-text bg-gradient-dark">
                                                        <i class="fas fa-hashtag"></i>
                                                    </div>
                                                </x-slot>
                                            </x-adminlte-input>
                                        </div>
                                        <div class="col-3">
                                            {{-- Jumlah lahir baru wanita --}}
                                            <x-adminlte-input type="number" class="form-control" name="lbwanita" label="Lahir Baru Wanita" placeholder="Lahir baru wanita..." value="{{old('lbwanita')}}" min=0 oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                                                <x-slot name="appendSlot">
                                                    <div class="input-group-text bg-gradient-dark">
                                                        <i class="fas fa-hashtag"></i>
                                                    </div>
                                                </x-slot>
                                            </x-adminlte-input>
                                        </div>
                                        <div class="col-3">
                                            {{-- Jumlah Total lahir baru --}}
                                            <x-adminlte-input type="number" class="form-control" name="lbhadir" label="Jumlah Lahir Baru" placeholder="Jumlah lahir baru" value="{{old('lbhadir')}}" readonly>
                                                <x-slot name="appendSlot">
                                                    <div class="input-group-text bg-gradient-dark">
                                                        <i class="fas fa-hashtag"></i>
                                                    </div>
                                                </x-slot>
                                            </x-adminlte-input>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="card-footer"></div> --}}
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
                                            <x-adminlte-input class="form-control @error('wl') is-invalid @enderror" name="wl" label="WL" placeholder="Nama WL..." value="{{old('wl')}}" required>
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
                                            <x-adminlte-input class="form-control @error('singer1') is-invalid @enderror" name="singer1" label="Singer 1" placeholder="Nama singer 1..." value="{{old('singer1')}}" required>
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
                                            <x-adminlte-input class="form-control" name="singer2" label="Singer 2" placeholder="Nama singer 2..." value="{{old('singer2')}}">
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
                                            <x-adminlte-input-date class="datetimepicker-input @error('wl_dtg') is-invalid @enderror" name="wl_dtg" :config="$config" label="WL Datang" placeholder="WL datang..." value="{{old('wl_dtg')}}" required>
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
                                            <x-adminlte-input-date class="datetimepicker-input @error('singer1_dtg') is-invalid @enderror" name="singer1_dtg" :config="$config" label="Singer 1 Datang" placeholder="Singer 1 datang..." value="{{old('singer1_dtg')}}" required>
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
                                            <x-adminlte-input-date class="datetimepicker-input" name="singer2_dtg" :config="$config" label="Singer 2 Datang" placeholder="Singer 2 datang..." value="{{old('singer2_dtg')}}">
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
                                            <x-adminlte-input class="form-control @error('pembicara') is-invalid @enderror" name="pembicara" label="Pembicara" placeholder="Nama Pembicara..." value="{{old('pembicara')}}" required>
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
                                            <x-adminlte-input-date class="datetimepicker-input @error('wktbicara1') is-invalid @enderror" name="wktbicara1" :config="$config" label="Khotbah mulai" placeholder="Khotbah mulai..." value="{{old('wktbicara1')}}" required>
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
                                            <x-adminlte-input-date class="datetimepicker-input @error('wktbicara2') is-invalid @enderror" name="wktbicara2" :config="$config" label="Khotbah selesai" placeholder="Khotbah selesai..." value="{{old('wktbicara2')}}" required>
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
                                            <x-adminlte-input class="form-control @error('pemusik1') is-invalid @enderror" name="pemusik1" label="Pemusik 1" placeholder="Nama Pemusik 1..." value="{{old('pemusik1')}}" required>
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
                                            <x-adminlte-input class="form-control @error('pemusik2') is-invalid @enderror" name="pemusik2" label="Pemusik 2" placeholder="Nama Pemusik 2..." value="{{old('pemusik2')}}" required>
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
                                            <x-adminlte-input class="form-control @error('pemusik3') is-invalid @enderror" name="pemusik3" label="Pemusik 3" placeholder="Nama Pemusik 3..." value="{{old('pemusik3')}}" required>
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
                                            <x-adminlte-input-date class="datetimepicker-input @error('pemusik1_dtg') is-invalid @enderror" name="pemusik1_dtg" :config="$config" label="Pemusik 1 datang" placeholder="Pemusik 1 datang..." value="{{old('pemusik1_dtg')}}" required>
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
                                            <x-adminlte-input-date class="datetimepicker-input @error('pemusik2_dtg') is-invalid @enderror" name="pemusik2_dtg" :config="$config" label="Pemusik 2 datang" placeholder="Pemusik 2 datang..." value="{{old('pemusik2_dtg')}}" required>
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
                                            <x-adminlte-input-date class="datetimepicker-input @error('pemusik3_dtg') is-invalid @enderror" name="pemusik3_dtg" :config="$config" label="Pemusik 3 Datang" placeholder="Pemusik 3 datang..." value="{{old('pemusik3_dtg')}}" required>
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
                                            <x-adminlte-input class="form-control" name="pemusik4" label="Pemusik 4" placeholder="Nama Pemusik 4..." value="{{old('pemusik4')}}">
                                                <x-slot name="appendSlot">
                                                    <div class="input-group-text bg-gradient-dark">
                                                        <i class="fas fa-edit"></i>
                                                    </div>
                                                </x-slot>
                                            </x-adminlte-input>
                                        </div>
                                        {{-- Pemusik 5 --}}
                                        <div class="col-4">
                                            <x-adminlte-input class="form-control" name="pemusik5" label="Pemusik 5" placeholder="Nama Pemusik 5..." value="{{old('pemusik5')}}">
                                                <x-slot name="appendSlot">
                                                    <div class="input-group-text bg-gradient-dark">
                                                        <i class="fas fa-edit"></i>
                                                    </div>
                                                </x-slot>
                                            </x-adminlte-input>
                                        </div>
                                        {{-- Pemusik 6 --}}
                                        <div class="col-4">
                                            <x-adminlte-input class="form-control" name="pemusik6" label="Pemusik 6" placeholder="Nama Pemusik 6..." value="{{old('pemusik6')}}">
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
                                            <x-adminlte-input-date class="datetimepicker-input" name="pemusik4_dtg" :config="$config" label="Pemusik 4 datang" placeholder="Pemusik 4 datang..." value="{{old('pemusik4_dtg')}}">
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
                                            <x-adminlte-input-date class="datetimepicker-input" name="pemusik5_dtg" :config="$config" label="Pemusik 5 datang" placeholder="Pemusik 5 datang..." value="{{old('pemusik5_dtg')}}">
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
                                            <x-adminlte-input-date class="datetimepicker-input" name="pemusik6_dtg" :config="$config" label="Pemusik 6 datang" placeholder="Pemusik 6 datang..." value="{{old('pemusik6_dtg')}}">
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
                                            <x-adminlte-input class="form-control" name="penari1" label="Penari 1" placeholder="Nama Penari 1..." value="{{old('penari1')}}">
                                                <x-slot name="appendSlot">
                                                    <div class="input-group-text bg-gradient-dark">
                                                        <i class="fas fa-edit"></i>
                                                    </div>
                                                </x-slot>
                                            </x-adminlte-input>
                                        </div>
                                        {{-- Penari 2 --}}
                                        <div class="col-3">
                                            <x-adminlte-input class="form-control" name="penari2" label="Penari 2" placeholder="Nama Penari 2..." value="{{old('penari2')}}">
                                                <x-slot name="appendSlot">
                                                    <div class="input-group-text bg-gradient-dark">
                                                        <i class="fas fa-edit"></i>
                                                    </div>
                                                </x-slot>
                                            </x-adminlte-input>
                                        </div>
                                        {{-- Penari 3 --}}
                                        <div class="col-3">
                                            <x-adminlte-input class="form-control" name="penari3" label="Penari 3" placeholder="Nama Penari 3..." value="{{old('penari3')}}">
                                                <x-slot name="appendSlot">
                                                    <div class="input-group-text bg-gradient-dark">
                                                        <i class="fas fa-edit"></i>
                                                    </div>
                                                </x-slot>
                                            </x-adminlte-input>
                                        </div>
                                        {{-- Penari 4 --}}
                                        <div class="col-3">
                                            <x-adminlte-input class="form-control" name="penari4" label="Penari 4" placeholder="Nama Penari 4..." value="{{old('penari4')}}">
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
                                            <x-adminlte-input-date class="datetimepicker-input" name="penari1_dtg" :config="$config" label="Penari 1 datang" placeholder="Penari 1 datang..." value="{{old('penari1_dtg')}}">
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
                                            <x-adminlte-input-date class="datetimepicker-input" name="penari2_dtg" :config="$config" label="Penari 2 datang" placeholder="Penari 2 datang..." value="{{old('penari2_dtg')}}">
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
                                            <x-adminlte-input-date class="datetimepicker-input" name="penari3_dtg" :config="$config" label="Penari 3 datang" placeholder="Penari 3 datang..." value="{{old('penari3_dtg')}}">
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
                                            <x-adminlte-input-date class="datetimepicker-input" name="penari4_dtg" :config="$config" label="Penari 4 datang" placeholder="Penari 4 datang..." value="{{old('penari4_dtg')}}">
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
                                            <x-adminlte-input class="form-control @error('media1') is-invalid @enderror" name="media1" label="Media 1" placeholder="Nama Media 1..." value="{{old('media1')}}" required>
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
                                            <x-adminlte-input class="form-control" name="media2" label="Media 2" placeholder="Nama Media 2..." value="{{old('media2')}}">
                                                <x-slot name="appendSlot">
                                                    <div class="input-group-text bg-gradient-dark">
                                                        <i class="fas fa-edit"></i>
                                                    </div>
                                                </x-slot>
                                            </x-adminlte-input>
                                        </div>
                                        {{-- Media 3 --}}
                                        <div class="col-4">
                                            <x-adminlte-input class="form-control" name="media3" label="Media 3" placeholder="Nama Media 3..." value="{{old('media3')}}">
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
                                            <x-adminlte-input-date class="datetimepicker-input @error('media1_dtg') is-invalid @enderror" name="media1_dtg" :config="$config" label="Media 1 datang" placeholder="Media 1 datang..." value="{{old('media1_dtg')}}" required>
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
                                            <x-adminlte-input-date class="datetimepicker-input" name="media2_dtg" :config="$config" label="Media 2 datang" placeholder="Media 2 datang..." value="{{old('media2_dtg')}}">
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
                                            <x-adminlte-input-date class="datetimepicker-input" name="media3_dtg" :config="$config" label="Media 3 datang" placeholder="Media 3 datang..." value="{{old('media3_dtg')}}">
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
                                            <x-adminlte-input class="form-control" name="media4" label="Media 4" placeholder="Nama Media 4..." value="{{old('media4')}}">
                                                <x-slot name="appendSlot">
                                                    <div class="input-group-text bg-gradient-dark">
                                                        <i class="fas fa-edit"></i>
                                                    </div>
                                                </x-slot>
                                            </x-adminlte-input>
                                        </div>
                                        {{-- Media 5 --}}
                                        <div class="col-4">
                                            <x-adminlte-input class="form-control" name="media5" label="Media 5" placeholder="Nama Media 5..." value="{{old('media5')}}">
                                                <x-slot name="appendSlot">
                                                    <div class="input-group-text bg-gradient-dark">
                                                        <i class="fas fa-edit"></i>
                                                    </div>
                                                </x-slot>
                                            </x-adminlte-input>
                                        </div>
                                        {{-- Media 6 --}}
                                        <div class="col-4">
                                            <x-adminlte-input class="form-control" name="media6" label="Media 6" placeholder="Nama Media 6..." value="{{old('media6')}}">
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
                                            <x-adminlte-input-date class="datetimepicker-input" name="media4_dtg" :config="$config" label="Media 4 datang" placeholder="Media 4 datang..." value="{{old('media4_dtg')}}">
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
                                            <x-adminlte-input-date class="datetimepicker-input" name="media5_dtg" :config="$config" label="Media 5 datang" placeholder="Media 5 datang..." value="{{old('media5_dtg')}}">
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
                                            <x-adminlte-input-date class="datetimepicker-input" name="media6_dtg" :config="$config" label="Media 6 datang" placeholder="Media 6 datang..." value="{{old('media6_dtg')}}">
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
                                            <x-adminlte-input class="form-control" name="lighting1" label="Lighting 1" placeholder="Nama Lighting 1..." value="{{old('lighting1')}}">
                                                <x-slot name="appendSlot">
                                                    <div class="input-group-text bg-gradient-dark">
                                                        <i class="fas fa-edit"></i>
                                                    </div>
                                                </x-slot>
                                            </x-adminlte-input>
                                        </div>
                                        {{-- Lighting 2 --}}
                                        <div class="col-6">
                                            <x-adminlte-input class="form-control" name="lighting2" label="Lighting 2" placeholder="Nama Lighting 2..." value="{{old('lighting2')}}">
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
                                            <x-adminlte-input-date class="datetimepicker-input" name="lighting1_dtg" :config="$config" label="Lighting 1 Datang" placeholder="Lighting 1 Datang..." value="{{old('lighting1_dtg')}}">
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
                                            <x-adminlte-input-date class="datetimepicker-input" name="lighting2_dtg" :config="$config" label="Lighting 2 Datang" placeholder="Lighting 2 Datang..." value="{{old('lighting2_dtg')}}">
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
                                            <x-adminlte-input class="form-control @error('soundman1') is-invalid @enderror" name="soundman1" label="Soundman 1" placeholder="Nama Soundman 1..." value="{{old('soundman1')}}" required>
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
                                            <x-adminlte-input class="form-control" name="soundman2" label="Soundman 2" placeholder="Nama Soundman 2..." value="{{old('soundman2')}}">
                                                <x-slot name="appendSlot">
                                                    <div class="input-group-text bg-gradient-dark">
                                                        <i class="fas fa-edit"></i>
                                                    </div>
                                                </x-slot>
                                            </x-adminlte-input>
                                        </div>
                                        {{-- Soundman 3 --}}
                                        <div class="col-4">
                                            <x-adminlte-input class="form-control" name="soundman3" label="Soundman 3" placeholder="Nama Soundman 3..." value="{{old('soundman3')}}">
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
                                            <x-adminlte-input-date class="datetimepicker-input @error('soundman1_dtg') is-invalid @enderror" name="soundman1_dtg" :config="$config" label="Soundman 1 Datang" placeholder="Soundman 1 Datang..." value="{{old('soundman1_dtg')}}" required>
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
                                            <x-adminlte-input-date class="datetimepicker-input" name="soundman2_dtg" :config="$config" label="Soundman 2 Datang" placeholder="Soundman 2 Datang..." value="{{old('soundman2_dtg')}}">
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
                                            <x-adminlte-input-date class="datetimepicker-input" name="soundman3_dtg" :config="$config" label="Soundman 3 Datang" placeholder="Soundman 3 Datang..." value="{{old('soundman3_dtg')}}">
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
                                                <input class="form-check-input" type="checkbox" name="qsuara_a" id="qsuara_a">
                                                <label class="form-check-label" for="qsuara_a">a. Terlalu Besar</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="qsuara_b" id="qsuara_b">
                                                <label class="form-check-label" for="qsuara_b">b. WL tidak terdengar</label>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="qsuara_c" id="qsuara_c">
                                                <label class="form-check-label" for="qsuara_c">c. Singer tidak terdengar</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="qsuara_d" id="qsuara_d">
                                                <label class="form-check-label" for="qsuara_d">d. Musik terlalu keras</label>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="qsuara_e" id="qsuara_e" checked>
                                                <label class="form-check-label" for="qsuara_e">e. Bagus</label>
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
                                                    <div class="pn01val text-center">3</div>
                                                    <div class="form-group d-flex justify-content-center">
                                                        <input type="range" class="form-range" id="pn01" name="pn01" min="1" max="5" step="0.5" value="{{old('pn01')}}">
                                                        <?php /*
                                                                <input type="range" list="tickmarks" class="form-range" id="pn01-{{$prmid}}" name="pn01" min="1" max="5" step="0.5" value="{{$lir->pn01}}">
                                                                <datalist id="tickmarks">
                                                                    <option value="1" label="1"></option>
                                                                    <option value="1.5"></option>
                                                                    <option value="2"></option>
                                                                    <option value="2.5"></option>
                                                                    <option value="3" label="3"></option>
                                                                    <option value="3.5"></option>
                                                                    <option value="4"></option>
                                                                    <option value="4.5"></option>
                                                                    <option value="5" label="5"></option>
                                                                </datalist>
                                                            */
                                                        ?>
                                                    </div>
                                                </td>
                                                {{-- Catatan Dan Masukan 1 --}}
                                                <td>
                                                    <x-adminlte-input class="form-control" name="pc01" placeholder="Catatan..." value="{{old('pc01')}}">
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
                                                    <div class="pn02val text-center">3</div>
                                                    <div class="form-group d-flex justify-content-center">
                                                        <input type="range" class="form-range" id="pn02" name="pn02" min="1" max="5" step="0.5" value="{{old('pn02')}}">
                                                    </div>
                                                </td>
                                                {{-- Catatan Dan Masukan 2 --}}
                                                <td>
                                                    <x-adminlte-input class="form-control" name="pc02" placeholder="Catatan..." value="{{old('pc02')}}">
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
                                                    <div class="pn03val text-center">3</div>
                                                    <div class="form-group d-flex justify-content-center">
                                                        <input type="range" class="form-range" id="pn03" name="pn03" min="1" max="5" step="0.5" value="{{old('pn03')}}">
                                                    </div>
                                                </td>
                                                {{-- Catatan Dan Masukan 3 --}}
                                                <td>
                                                    <x-adminlte-input class="form-control" name="pc03" placeholder="Catatan..." value="{{old('pc03')}}">
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
                                                    <div class="pn04val text-center">3</div>
                                                    <div class="form-group d-flex justify-content-center">
                                                        <input type="range" class="form-range" id="pn04" name="pn04" min="1" max="5" step="0.5" value="{{old('pn04')}}">
                                                    </div>
                                                </td>
                                                {{-- Catatan Dan Masukan 4 --}}
                                                <td>
                                                    <x-adminlte-input class="form-control" name="pc04" placeholder="Catatan..." value="{{old('pc04')}}">
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
                                                    <div class="pn05val text-center">3</div>
                                                    <div class="form-group d-flex justify-content-center">
                                                        <input type="range" class="form-range" id="pn05" name="pn05" min="1" max="5" step="0.5" value="{{old('pn05')}}">
                                                    </div>
                                                </td>
                                                {{-- Catatan Dan Masukan 5 --}}
                                                <td>
                                                    <x-adminlte-input class="form-control" name="pc05" placeholder="Catatan..." value="{{old('pc05')}}">
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
                                                    <div class="pn06val text-center">3</div>
                                                    <div class="form-group d-flex justify-content-center">
                                                        <input type="range" class="form-range" id="pn06" name="pn06" min="1" max="5" step="0.5" value="{{old('pn06')}}">
                                                    </div>
                                                </td>
                                                {{-- Catatan Dan Masukan 6 --}}
                                                <td>
                                                    <x-adminlte-input class="form-control" name="pc06" placeholder="Catatan..." value="{{old('pc06')}}">
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
                                                    <div class="pn07val text-center">3</div>
                                                    <div class="form-group d-flex justify-content-center">
                                                        <input type="range" class="form-range" id="pn07" name="pn07" min="1" max="5" step="0.5" value="{{old('pn07')}}">
                                                    </div>
                                                </td>
                                                {{-- Catatan Dan Masukan 7 --}}
                                                <td>
                                                    <x-adminlte-input class="form-control" name="pc07" placeholder="Catatan..." value="{{old('pc07')}}">
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
                                                    <div class="pn08val text-center">3</div>
                                                    <div class="form-group d-flex justify-content-center">
                                                        <input type="range" class="form-range" id="pn08" name="pn08" min="1" max="5" step="0.5" value="{{old('pn08')}}">
                                                    </div>
                                                </td>
                                                {{-- Catatan Dan Masukan 8 --}}
                                                <td>
                                                    <x-adminlte-input class="form-control" name="pc08" placeholder="Catatan..." value="{{old('pc08')}}">
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
                                                    <div class="pn09val text-center">3</div>
                                                    <div class="form-group d-flex justify-content-center">
                                                        <input type="range" class="form-range" id="pn09" name="pn09" min="1" max="5" step="0.5" value="{{old('pn09')}}">
                                                    </div>
                                                </td>
                                                {{-- Catatan Dan Masukan 9 --}}
                                                <td>
                                                    <x-adminlte-input class="form-control" name="pc09" placeholder="Catatan..." value="{{old('pc09')}}">
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
                                                    <div class="pn10val text-center">3</div>
                                                    <div class="form-group d-flex justify-content-center">
                                                        <input type="range" class="form-range" id="pn10" name="pn10" min="1" max="5" step="0.5" value="{{old('pn10')}}">
                                                    </div>
                                                </td>
                                                {{-- Catatan Dan Masukan 10 --}}
                                                <td>
                                                    <x-adminlte-input class="form-control" name="pc10" placeholder="Catatan..." value="{{old('pc10')}}">
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
                                                    <div class="pn11val text-center">3</div>
                                                    <div class="form-group d-flex justify-content-center">
                                                        <input type="range" class="form-range" id="pn11" name="pn11" min="1" max="5" step="0.5" value="{{old('pn11')}}">
                                                    </div>
                                                </td>
                                                {{-- Catatan Dan Masukan 11 --}}
                                                <td>
                                                    <x-adminlte-input class="form-control" name="pc11" placeholder="Catatan..." value="{{old('pc11')}}">
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
                                                    <div class="pn12val text-center">3</div>
                                                    <div class="form-group d-flex justify-content-center">
                                                        <input type="range" class="form-range" id="pn12" name="pn12" min="1" max="5" step="0.5" value="{{old('pn12')}}">
                                                    </div>
                                                </td>
                                                {{-- Catatan Dan Masukan 12 --}}
                                                <td>
                                                    <x-adminlte-input class="form-control" name="pc12" placeholder="Catatan..." value="{{old('pc12')}}">
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
                                                    <div class="pn13val text-center">3</div>
                                                    <div class="form-group d-flex justify-content-center">
                                                        <input type="range" class="form-range" id="pn13" name="pn13" min="1" max="5" step="0.5" value="{{old('pn13')}}">
                                                    </div>
                                                </td>
                                                {{-- Catatan Dan Masukan 13 --}}
                                                <td>
                                                    <x-adminlte-input class="form-control" name="pc13" placeholder="Catatan..." value="{{old('pc13')}}">
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
                                                    <div class="rn01val text-center">3</div>
                                                    <div class="form-group d-flex justify-content-center">
                                                        <input type="range" class="form-range @error('rn01') is-invalid @enderror" id="rn01" name="rn01" min="1" max="5" step="0.5" value="{{old('rn01')}}">
                                                        @error('rn01') <span class="text-danger">{{$message}}</span> @enderror
                                                    </div>
                                                </td>
                                            </tr>
                                            {{-- Penilaian 2 --}}
                                            <tr>
                                                <td>2</td>
                                                <td>Khotbah mengingatkan sesuatu yang salah dalam hidup jemaat</td>
                                                {{-- Nilai 2 Slider --}}
                                                <td>
                                                    <div class="rn02val text-center">3</div>
                                                    <div class="form-group d-flex justify-content-center">
                                                        <input type="range" class="form-range @error('rn02') is-invalid @enderror" id="rn02" name="rn02" min="1" max="5" step="0.5" value="{{old('rn02')}}">
                                                        @error('rn02') <span class="text-danger">{{$message}}</span> @enderror
                                                    </div>
                                                </td>
                                            </tr>
                                            {{-- Penilaian 3 --}}
                                            <tr>
                                                <td>3</td>
                                                <td>Khotbah membukakan sesuatu kebenaran</td>
                                                {{-- Nilai 3 Slider --}}
                                                <td>
                                                    <div class="rn03val text-center">3</div>
                                                    <div class="form-group d-flex justify-content-center">
                                                        <input type="range" class="form-range @error('rn03') is-invalid @enderror" id="rn03" name="rn03" min="1" max="5" step="0.5" value="{{old('rn03')}}">
                                                        @error('rn03') <span class="text-danger">{{$message}}</span> @enderror
                                                    </div>
                                                </td>
                                            </tr>
                                            {{-- Penilaian 4 --}}
                                            <tr>
                                                <td>4</td>
                                                <td>Khotbah membangkitkan inspirasi dan semangat untuk melakukan Firman</td>
                                                {{-- Nilai 4 Slider --}}
                                                <td>
                                                    <div class="rn04val text-center">3</div>
                                                    <div class="form-group d-flex justify-content-center">
                                                        <input type="range" class="form-range @error('rn04') is-invalid @enderror" id="rn04" name="rn04" min="1" max="5" step="0.5" value="{{old('rn04')}}">
                                                        @error('rn04') <span class="text-danger">{{$message}}</span> @enderror
                                                    </div>
                                                </td>
                                            </tr>
                                            {{-- Penilaian 5 --}}
                                            <tr>
                                                <td>5</td>
                                                <td>Jemaat menikmati pujian dan penyembahan</td>
                                                {{-- Nilai 5 Slider --}}
                                                <td>
                                                    <div class="rn05val text-center">3</div>
                                                    <div class="form-group d-flex justify-content-center">
                                                        <input type="range" class="form-range @error('rn05') is-invalid @enderror" id="rn05" name="rn05" min="1" max="5" step="0.5" value="{{old('rn05')}}">
                                                        @error('rn05') <span class="text-danger">{{$message}}</span> @enderror
                                                    </div>
                                                </td>
                                            </tr>
                                            {{-- Penilaian 6 --}}
                                            <tr>
                                                <td>6</td>
                                                <td>Suasana keseluruhan menurut Jemaat</td>
                                                {{-- Nilai 6 Slider --}}
                                                <td>
                                                    <div class="rn06val text-center">3</div>
                                                    <div class="form-group d-flex justify-content-center">
                                                        <input type="range" class="form-range @error('rn06') is-invalid @enderror" id="rn06" name="rn06" min="1" max="5" step="0.5" value="{{old('rn06')}}">
                                                        @error('rn06') <span class="text-danger">{{$message}}</span> @enderror
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
                            <x-adminlte-textarea class="form-control @error('ket') is-invalid @enderror" name="ket" label="Komentar umum secara keseluruhan" placeholder="Isi komentar, kritik atau saran..." rows=5 igroup-size="sm" required>
                                {{old('ket')}}
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
                <button type="submit" form="fnew" class="btn btn-primary">Simpan</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>

@push('js')
<script>
    /*
    jQuery(document).ready(function(){
            jQuery('#ajaxSubmit').click(function(e){
               e.preventDefault();
               $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });
               jQuery.ajax({
                  url: "{{route('lir.store')}}",
                  method: 'post',
                  data: {
                     name: jQuery('#name').val(),
                     club: jQuery('#club').val(),
                     country: jQuery('#country').val(),
                     score: jQuery('#score').val(),
                  },
                  success: function(result){
                  	if(result.errors)
                  	{
                  		jQuery('.alert-danger').html('');

                  		jQuery.each(result.errors, function(key, value){
                  			jQuery('.alert-danger').show();
                  			jQuery('.alert-danger').append('<li>'+value+'</li>');
                  		});
                  	}
                  	else
                  	{
                  		jQuery('.alert-danger').hide();
                  		$('#open').hide();
                  		$('#myModal').modal('hide');
                  	}
                  }});
               });
            });


    $('#fnew').submit(function(e) {
        e.preventDefault();
        var $form = $(this);

        // check if the input is valid using a 'valid' property
        if (!$form.valid) return false;

        $.ajax({
            type: "POST",
            url: "{{route('lir.store')}}",
            data: $('#form').serialize(),
            success: function(response) {
                $('#answers').html(response);
            },
            error: 
        });
    });


    $('#fnew').submit(function(e) {
        e.preventDefault();
        var $form = $(this);
        $form.validate({
            rules: {
                tglir: {
                    required: true
                },
                gembala: {
                    required: true,
                    minlength: 6
                }
                // re_Password: {required: true, equalTo: "#Password"} 
            },
            invalidHandler: function(event, validator) {
                // 'this' refers to the form
                var errors = validator.numberOfInvalids();
                if (errors) {
                    var message = errors === 1 ?
                        'You missed 1 field. It has been highlighted' :
                        'You missed ' + errors + ' fields. They have been highlighted';
                }
            },
            submitHandler: function(form) {

                var $form = $(form);
                $.ajax({
                        url: "{{route('lir.store')}}",
                        method: "POST",
                        data: $form.serialize()
                    })
                    .done(function(result) {
                        // show some message, etc...

                        return false; // blocks redirect after submission via ajax
                    })
                    .fail(function(response, error) {
                        // failed
                    })
                    .always(function() {

                    });
            }
        })
    });
    */

    //customize pesan error
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

    //function untuk summary kehadiran
    $(() => {
        $("#npria, #nwanita").on("input", nsum);

        function nsum() {
            $("#nhadir").val(Number($("#npria").val()) + Number($("#nwanita").val()));
        }

        $("#jbpria, #jbwanita").on("input", jbsum);

        function jbsum() {
            $("#jbhadir").val(Number($("#jbpria").val()) + Number($("#jbwanita").val()));
        }

        $("#lbpria, #lbwanita").on("input", lbsum);

        function lbsum() {
            $("#lbhadir").val(Number($("#lbpria").val()) + Number($("#lbwanita").val()));
        }
    })

    //function untuk update Value diatas range slide Penilaian pelaksanaan
    $(document).ready(function() {
        $('#pn01').on('input', function() {
            v = $('#pn01').val();
            $('div.pn01val').text(v);
        });

        $('#pn02').on('input', function() {
            v = $('#pn02').val();
            $('div.pn02val').text(v);
        });

        $('#pn03').on('input', function() {
            v = $('#pn03').val();
            $('div.pn03val').text(v);
        });

        $('#pn04').on('input', function() {
            v = $('#pn04').val();
            $('div.pn04val').text(v);
        });

        $('#pn05').on('input', function() {
            v = $('#pn05').val();
            $('div.pn05val').text(v);
        });

        $('#pn06').on('input', function() {
            v = $('#pn06').val();
            $('div.pn06val').text(v);
        });

        $('#pn07').on('input', function() {
            v = $('#pn07').val();
            $('div.pn07val').text(v);
        });

        $('#pn08').on('input', function() {
            v = $('#pn08').val();
            $('div.pn08val').text(v);
        });

        $('#pn09').on('input', function() {
            v = $('#pn09').val();
            $('div.pn09val').text(v);
        });

        $('#pn10').on('input', function() {
            v = $('#pn10').val();
            $('div.pn10val').text(v);
        });

        $('#pn11').on('input', function() {
            v = $('#pn11').val();
            $('div.pn11val').text(v);
        });

        $('#pn12').on('input', function() {
            v = $('#pn12').val();
            $('div.pn12val').text(v);
        });

        $('#pn13').on('input', function() {
            v = $('#pn13').val();
            $('div.pn13val').text(v);
        });
    });

    //function untuk update value diatas range slide Angket Jemaat
    $(document).ready(function() {
        $('#rn01').on('input', function() {
            v = $('#rn01').val();
            $('div.rn01val').text(v);
        });

        $('#rn02').on('input', function() {
            v = $('#rn02').val();
            $('div.rn02val').text(v);
        });

        $('#rn03').on('input', function() {
            v = $('#rn03').val();
            $('div.rn03val').text(v);
        });

        $('#rn04').on('input', function() {
            v = $('#rn04').val();
            $('div.rn04val').text(v);
        });

        $('#rn05').on('input', function() {
            v = $('#rn05').val();
            $('div.rn05val').text(v);
        });

        $('#rn06').on('input', function() {
            v = $('#rn06').val();
            $('div.rn06val').text(v);
        });
    });

    //
    $(document).ready(function() {
        // $('#fnew').on('change', function() { // change or input event
        //     var $inputs = $(this).find(':input:not(:submit)');
        //     var anyInputChanged = !!$inputs.filter(function() {
        //         return this.value !== this.defaultValue;
        //     }).length;
        //     $inputs.toggleClass('required', anyInputChanged);
        // });

        $('#singer2').on('input', function() {
            // var anyInputChanged = !!$(this).filter(function() {
            //     return this.value !== this.defaultValue;
            // }).length;
            // $('#singer2_dtg').toggleClass('required', anyInputChanged);

            if (this.value !== this.defaultValue) {
                document.getElementById("#singer2_dtg").required = true;
            }
        })
    });
</script>
@endpush