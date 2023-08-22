@extends('layout.main_admin')

@section('content')
<div class="container">
    <div class="card text-center">
        <div class="card-header text-dark fs-1 fw-bold text-uppercase">
          {{ __('File') }}
        </div>
        <div class="card-body text-dark">
          <h5 class="card-title text-uppercase fw-bold">{{ __('Upload File Here') }}</h5>

          <p class="card-text">{{ __('Silakan upload file') }}</p>

        </div>
    </div>
</div>

@endsection