@extends('layouts.portal.main')

@section('page-content')
<section class="container pt-5" role="main">
    <div class="row">
        <div class="col-12 col-md-8">
            <h1 class="display-3 mb-5">Kontak</h1>
            <p>
                Ada keperluan? kontak saya saja dengan form di bawah
            </p>
        </div>
        <div class="d-none d-md-block col-4">
            <h5>LSP P1 SMK Negeri 1 Kandeman</h5>
            <ul class="list-unstyled">
                <li>Kampus SMK Negeri 1 Kandeman, 
                    <br>Jalan Raya Kandeman KM. 04 Kabupaten Batang, 
                    <br>Jawa Tengah 51261
                </li>
                <li>HP/Whatsapp 087711112412</li>
                <li>
                    Email
                    <a href="mailto:a.faizakejf@game.com"
                        >lspp1smkn1kandeman@gmail.com</a
                    >
                </li>
            </ul>
        </div>
    </div>
</section>

<section id="form-kontak" class="py-2">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form action="#">
                    <div class="form-group">
                        <label for="nama" class="control-label"
                            >Nama</label
                        >
                        <input
                            type="text"
                            id="nama"
                            name="nama"
                            minlength="5"
                            class="form-control"
                        />
                    </div>

                    <div class="form-group">
                        <label for="nama" class="control-label"
                            >Email</label
                        >
                        <input
                            type="email"
                            id="email"
                            class="form-control"
                            name="email"
                        />
                    </div>

                    <div class="form-group">
                        <label for="pesan" class="control-label"
                            >Pesan</label
                        >
                        <textarea
                            name="pesan"
                            id="pesan"
                            rows="3"
                            class="form-control"
                        ></textarea>
                    </div>
                    <div class="form-group">
                        <button
                            class="btn btn-primary"
                            type="submit"
                        >
                            Kirim Pesan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
   
@endsection

@section('page-script')
  <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
  
@endsection
