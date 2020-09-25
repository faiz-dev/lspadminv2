@extends('layouts.portal.main')

@section('page-content')
<div class="container-fluid bg-primary page-subheader">

</div>
<section class="container pt-5" role="main">
    <div class="row">
        <div class="col-12 col-md-3">
           <h2>Kategori</h2>
           <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action">Semua</a>
                <a href="#" class="list-group-item list-group-item-action">Pedoman BNSP</a>
                <a href="#" class="list-group-item list-group-item-action">Jejaring</a>
                <a href="#" class="list-group-item list-group-item-action">SOP</a>
                <a href="#" class="list-group-item list-group-item-action">Dasar Hukum</a>
                <a href="#" class="list-group-item list-group-item-action">Edaran</a>
                <a href="#" class="list-group-item list-group-item-action">Lain-lain</a>
           </div>
        </div>
        <div class="col-12 col-md-9">
            <h3>Daftar file Download</h3>
            @for ($i = 0; $i < 5; $i++)
                <div class="media my-media shadow p-3 px-2 rounded">
                    {{-- <img src="https://dummyimage.com/100x100" class="mr-3"> --}}
                    <div class="media-body">
                        <small class="mr-5"> 24 Desember 2019 </small>
                        <h5><b>Pedoman Pelaksanaan Sertifikasi masa Pandemi</b></h5>
                        <div class="jadwal-meta">
                          <span class="d-block mb-1">Download file tentang kebijakan pelaksanaan sertifikasi di masa pandemi</span>
                          <button class="btn btn-primary btn-sm">Download File</button>
                        </div>
                      </div>
                </div>
            @endfor
        </div>
    </div>
</section>

   
@endsection

@section('page-script')

  
@endsection
