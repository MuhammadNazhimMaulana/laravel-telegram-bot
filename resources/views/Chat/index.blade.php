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

          {{-- Starting Chat --}}
          <a target="_blank" href="https://t.me/laratele_bone_bot" class="btn btn-primary">{{ __('Mulai Chat') }}</a>
          
          {{-- Managing File --}}
          {{-- <a target="_blank" href="/upload" class="btn btn-primary">{{ __('File') }}</a> --}}

          {{-- Showing Uploaded File --}}
          {{-- <a target="_blank" href="/upload/list" class="btn btn-primary">{{ __('Uploaded File') }}</a> --}}

        </div>
    </div>
</div>

@endsection