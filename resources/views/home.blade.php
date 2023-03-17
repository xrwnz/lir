{{-- @extends('adminlte::page', ['iFrameEnabled' => true]) --}}

@extends('adminlte::page')

@section('title_postfix', '- Home iFrame')

@push('styles')
body {
  background-image: url('/img/1.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: % 100%;
}
@endpush

@section('content')
{{-- <h1>Home Page</h1> --}}
<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">
  <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
    <h1>Your New Online Sunday Service Reporting</h1>
    <h2>We are team of talented designers making websites with Laravel</h2>
    <a href="#about" class="btn-get-started scrollto">Get Started</a>
  </div>
</section><!-- End Hero -->
@stop

@section('css')
@stop

@section('js')
@stop