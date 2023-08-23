@extends('layout.main_admin')

@section('content')
<div class="container">
    <div class="card text-center">
        <div class="card-header text-dark fs-1 fw-bold text-uppercase">
          {{ __('File') }}
        </div>
        <div class="card-body text-dark">
          <h5 class="card-title text-uppercase fw-bold">{{ __('Upload File Here') }}</h5>

          <p class="card-text mb-3">{{ __('Silakan upload file') }}</p>

          {{-- Upload File --}}
          <form method="POST" enctype="multipart/form-data" id="upload-foto" action="/upload/store" >    
            @csrf
            <div class="row">

              <div class="col-md-12 mb-3">
                <div class="form-group">
                    <input class="form-control" type="text" name="nama_foto" placeholder="Nama Gambar" id="nama_foto">
                </div>
            </div>
            
              <div class="col-md-12 mb-3">
                  <div class="form-group">
                      <input class="form-control" type="file" name="foto" placeholder="Choose image" id="foto">
                  </div>
              </div>
                    
              <div class="col-md-12">
                  <button type="submit" class="btn btn-primary" id="submit">Submit</button>
              </div>

            </div>     
          </form>

        </div>
    </div>
</div>

@endsection