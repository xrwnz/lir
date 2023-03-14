@extends('adminlte::page')

@section('title_postfix', 'Tambah Laporan IR')

@section('content_header')
<h1 class="m-0 text-dark">Buat Laporan IR</h1>
@stop

@section('content')
{{-- Minimal --}}
<x-adminlte-input-date name="idBasic" />

{{-- Disabled with predefined value --}}
@php
$config = ['format' => 'YYYY-MM-DD'];
@endphp
<x-adminlte-input-date name="idDisabled" value="2020-10-04" :config="$config" disabled />

{{-- Placeholder, time only and prepend icon --}}
@php
$config = ['format' => 'LT'];
@endphp
<x-adminlte-input-date name="idTimeOnly" :config="$config" placeholder="Choose a time...">
    <x-slot name="prependSlot">
        <div class="input-group-text bg-gradient-info">
            <i class="fas fa-clock"></i>
        </div>
    </x-slot>
</x-adminlte-input-date>

{{-- Placeholder, date only and append icon --}}
@php
$config = ['format' => 'L'];
@endphp
<x-adminlte-input-date name="idDateOnly" :config="$config" placeholder="Choose a date...">
    <x-slot name="appendSlot">
        <div class="input-group-text bg-gradient-danger">
            <i class="fas fa-calendar-alt"></i>
        </div>
    </x-slot>
</x-adminlte-input-date>

    <div class="input-group date" id="reservationdate" data-target-input="nearest">
        <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" />
        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
        </div>
    </div>


{{-- With Label --}}
@php
$config = ['format' => 'DD/MM/YYYY HH:mm'];
@endphp
<x-adminlte-input-date name="idLabel" :config="$config" placeholder="Choose a date..." label="Datetime" label-class="text-primary">
    <x-slot name="appendSlot">
        <x-adminlte-button theme="outline-primary" icon="fas fa-lg fa-birthday-cake" title="Set to Birthday" />
    </x-slot>
</x-adminlte-input-date>

{{-- SM size, restricted to current month and week days --}}
@php
$config = [
'format' => 'YYYY-MM-DD HH.mm',
'dayViewHeaderFormat' => 'MMM YYYY',
'minDate' => "js:moment().startOf('month')",
'maxDate' => "js:moment().endOf('month')",
'daysOfWeekDisabled' => [0, 6],
];
@endphp
<x-adminlte-input-date name="idSizeSm" label="Working Datetime" igroup-size="sm" :config="$config" placeholder="Choose a working day...">
    <x-slot name="appendSlot">
        <div class="input-group-text bg-dark">
            <i class="fas fa-calendar-day"></i>
        </div>
    </x-slot>
</x-adminlte-input-date>

{{-- LG size with multiple datetimes --}}
@php
$config = [
'allowMultidate' => true,
'multidateSeparator' => ',',
'format' => 'DD MMM YYYY',
];
@endphp
<x-adminlte-input-date name="idSizeLg" label="Multiple Datetimes" label-class="text-danger" igroup-size="lg" placeholder="Multidate..." :config="$config">
    <x-slot name="prependSlot">
        <div class="input-group-text bg-white">
            <i class="far fa-lg fa-calendar-alt text-danger"></i>
        </div>
    </x-slot>
</x-adminlte-input-date>


{{-- --}}
{{-- Minimal --}}
<x-adminlte-input-color name="icBasic" />

{{-- Disabled with predefined value --}}
<x-adminlte-input-color name="icDisabled" value="rgb(50, 100, 50)" disabled />

{{-- Append slot and data-* config --}}
<x-adminlte-input-color name="icAddon" data-color="rgb(50, 100, 150)" data-format='hex' data-horizontal=true>
    <x-slot name="appendSlot">
        <div class="input-group-text">
            <i class="fas fa-lg fa-square"></i>
        </div>
    </x-slot>
</x-adminlte-input-color>

{{-- Label and placeholder --}}
<x-adminlte-input-color name="icPlaceholder" placeholder="Select a color..." label="Color">
    <x-slot name="prependSlot">
        <div class="input-group-text bg-gradient-light">
            <i class="fas fa-lg fa-tint"></i>
        </div>
    </x-slot>
</x-adminlte-input-color>

{{-- SM size with custom config --}}
@php
$config = [
"color" => "#000000",
"horizontal" => true,
"format" => null,
];
@endphp
<x-adminlte-input-color name="icSizeSm" label="Fill Color" igroup-size="sm" :config="$config">
    <x-slot name="appendSlot">
        <div class="input-group-text bg-white">
            <i class="fas fa-lg fa-fill"></i>
        </div>
    </x-slot>
</x-adminlte-input-color>

{{-- LG size with predefined color extension --}}
@php
$config = [
"extensions" => [
[
"name" => 'swatches',
"options" => [
"colors" => [
'black' => '#000000',
'gray' => '#888888',
'white' => '#ffffff',
'red' => '#ff0000',
'default' => '#777777',
'primary' => '#337ab7',
'success' => '#5cb85c',
'info' => '#5bc0de',
'warning' => '#f0ad4e',
'danger' => '#d9534f'
],
"namesAsValues" => true,
]
]
]
];
@endphp
<x-adminlte-input-color name="icSizeLg" placeholder="Choice a color..." label="Brush Color" label-class="text-primary" igroup-size="lg" :config="$config">
    <x-slot name="appendSlot">
        <div class="input-group-text">
            <i class="fas fa-lg fa-brush"></i>
        </div>
    </x-slot>
</x-adminlte-input-color>

{{-- Minimal --}}
<x-adminlte-text-editor name="teBasic" />

{{-- Disabled with content --}}
<x-adminlte-text-editor name="teDisabled" disabled>
    <b>Lorem ipsum dolor sit amet</b>, consectetur adipiscing elit.
    <br>
    <i>Aliquam quis nibh massa.</i>
</x-adminlte-text-editor>

{{-- With placeholder, sm size, label and some configuration --}}
@php
$config = [
"height" => "100",
"toolbar" => [
// [groupName, [list of button]]
['style', ['bold', 'italic', 'underline', 'clear']],
['font', ['strikethrough', 'superscript', 'subscript']],
['fontsize', ['fontsize']],
['color', ['color']],
['para', ['ul', 'ol', 'paragraph']],
['height', ['height']],
['table', ['table']],
['insert', ['link', 'picture', 'video']],
['view', ['fullscreen', 'codeview', 'help']],
],
]
@endphp
<x-adminlte-text-editor name="teConfig" label="WYSIWYG Editor" label-class="text-danger" igroup-size="sm" placeholder="Write some text..." :config="$config" />


{{-- Setup data for datatables --}}
@php
$heads = [
'ID',
'Name',
['label' => 'Phone', 'width' => 40],
['label' => 'Actions', 'no-export' => true, 'width' => 5],
];

$btnEdit = '<button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
    <i class="fa fa-lg fa-fw fa-pen"></i>
</button>';
$btnDelete = '<button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
    <i class="fa fa-lg fa-fw fa-trash"></i>
</button>';
$btnDetails = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
    <i class="fa fa-lg fa-fw fa-eye"></i>
</button>';

$config = [
'data' => [
[22, 'John Bender', '+02 (123) 123456789', '<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'],
[19, 'Sophia Clemens', '+99 (987) 987654321', '<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'],
[3, 'Peter Sousa', '+69 (555) 12367345243', '<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'],
],
'order' => [[1, 'asc']],
'columns' => [null, null, null, ['orderable' => false]],
];
@endphp

{{-- Minimal example / fill data using the component slot --}}
<x-adminlte-datatable id="table1" :heads="$heads">
    @foreach($config['data'] as $row)
    <tr>
        @foreach($row as $cell)
        <td>{!! $cell !!}</td>
        @endforeach
    </tr>
    @endforeach
</x-adminlte-datatable>

{{-- Compressed with style options / fill data using the plugin config --}}
<x-adminlte-datatable id="table2" :heads="$heads" head-theme="dark" :config="$config" striped hoverable bordered compressed />

{{-- With multiple slot and size --}}
<x-adminlte-input name="iSearch" label="Search" placeholder="search" top-class="col-md-6" size="lg" disable-feedback>
    <x-slot name="appendSlot">
        <button type="button" class="btn btn-outline-danger">Go!</button>
    </x-slot>
    <x-slot name="prependSlot">
        <div class="input-group-text text-danger">
            <i class="fas fa-search"></i>
        </div>
    </x-slot>
</x-adminlte-input>

@stop

@push('js')
<script>
    //Date and time picker
    $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });
    
    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });
</script>
@endpush