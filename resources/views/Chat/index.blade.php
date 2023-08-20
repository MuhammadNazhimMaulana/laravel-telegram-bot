@extends('layout.main_admin')

@section('content')
<div class="container">
    <div class="card text-center">
        <div class="card-header text-dark fs-1 fw-bold text-uppercase">
          {{ __('Welcome') }}
        </div>
        <div class="card-body text-dark">
          <h5 class="card-title text-uppercase fw-bold">{{ __('laraboneapibot') }}</h5>
          <p class="card-text">{{ __('Aplikasi ini merupakan sebuah aplikasi bot telegram yang dibuat dengan menggunakan Laravel.') }}</p>
          {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
        </div>
    </div>
</div>

@endsection