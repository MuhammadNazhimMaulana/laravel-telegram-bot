@extends('layout.main_admin')

@section('content')
<div class="container">
    <div class="card text-center">
        <div class="card-header text-dark fs-1 fw-bold text-uppercase">
          {{ __('List Existed Image') }}
        </div>
        <div class="card-body text-dark">
          <p class="card-text">{{ __('Berikut merupakan daftar gambar yang tersedia') }}</p>

          {{-- Table --}}
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Nama Gambar</th>
                <th scope="col">Gambar</th>
              </tr>
            </thead>
            <tbody>

            {{-- Foreach --}}
            @foreach($images as $image)
              <tr>
                <td>{{ $image->nama_foto }}</td>
                <td>
                    <img src="{{ asset('storage/' . str_replace('public/', '', $image->foto)) }}" alt="" width="50">
                </td>
              </tr>
            @endforeach
            {{-- End of Foreach --}}
            
            </tbody>
          </table>


        </div>
    </div>
</div>

@endsection