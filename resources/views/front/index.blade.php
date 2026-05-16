@extends('layouts.frontend')
@section('title', 'CABhavika || Home')
@push('styles')
    <link rel="stylesheet" href="{{ asset('front_assets/css/index.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('front_assets/js/index.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
@endpush
@section('content')
<img src="{{ asset('front_assets/images/logo.png') }}" alt="Hero Image" class="hero-image">
@endsection