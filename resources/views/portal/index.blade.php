@extends('layouts.portal.main')

@section('page-content')
    <section id="silder-wrapper">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                  <img src="https://dummyimage.com/1378x600" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="https://dummyimage.com/1378x600" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="https://dummyimage.com/1378x600" class="d-block w-100" alt="...">
              </div>
            </div>
          </div>
    </section>

    <section id="quick-action" class="">
      <div class="container pb-5 mb-5 px-4">
        <div class="text-center">
          <h4 class="my-5"><i>Quick Action</i></h4>
        </div>
        <div class="row">
          <div class="col-6 col-sm-3" v-for="(item, idx) in quickActions" :key="idx">
            <div class="card shadow">
              <img src="https://dummyimage.com/200x200" class="card-img-top" alt="">
              <div class="card-body text-center">
                <h5 class="card-title">@{{item.title}}</h5>
                <p class="card-text">@{{item.text}}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="greeting" class="py-5 bg-primary">
      <div class="container py-5 px-4 text-white">
        <div class="row">
          <div class="col-sm-7">
            <h2 class="display-4">Sertifikasi bekal hadapi MEA</h2>
            <p class="w-20">Jadilah tenaga kerja Profesional dengan Sertifikasi Kompetensi <br> bersama LSP P1 SMK Negeri 1 Kandeman</p>
          </div>
          <div class="col-sm-5">
            <div class="embed-responsive embed-responsive-16by9">
              {{-- <iframe class="embed-responsive-item" src="https://drive.google.com/file/d/1sl7Xjvfx0S-aoAYCBxp5NOK1KyqJky-I/preview" allowfullscreen></iframe> --}}
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="news">
      <div class="container py-5 px-4 ">
        <div class="d-flex mb-3 justify-content-between">
          <h5>Berita & Informasi</h5>
          <a href="">Lihat Lainnya</a>
        </div>
        <div class="card-deck">
          <div class="card mb-5 shadow" v-for="(news, i) in newsList" :key="i">
            <img src="https://dummyimage.com/200x150" class="card-img-top" style="max-height:150px" alt="">
            <div class="card-body">
              <span style="font-size: 0.8em">@{{news.date}}</span>
              <a href="#">
                <h5 class="card-title">@{{news.title}}</h5>
              </a>
              <p class="card-text">@{{news.excerpt}}</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="jadwaluji ">
      <div class="container px-4 pb-5">
        <div class="d-flex mb-3 justify-content-between">
          <h5>Jadwal Uji Kompetensi</h5>
        </div>
        <div class="card shadow-lg rounded-bottom" id="widgetJadwal">
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <a class="nav-link active" id="TAV-tab" data-toggle="tab" href="#TAV" role="tab" aria-controls="TAV" aria-selected="true">TAV</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="TKRO-tab" data-toggle="tab" href="#TKRO" role="tab" aria-controls="TKRO" aria-selected="false">TKRO</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="TP-tab" data-toggle="tab" href="#TP" role="tab" aria-controls="TP" aria-selected="false">TP</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="TBSM-tab" data-toggle="tab" href="#TBSM" role="tab" aria-controls="TBSM" aria-selected="false">TBSM</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="TEI-tab" data-toggle="tab" href="#TEI" role="tab" aria-controls="TEI" aria-selected="false">TEI</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="TITL-tab" data-toggle="tab" href="#TITL" role="tab" aria-controls="TITL" aria-selected="false">TITL</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="RPL-tab" data-toggle="tab" href="#RPL" role="tab" aria-controls="RPL" aria-selected="false">RPL</a>
            </li>          
          </ul>

          <div class="card-body">
            <!-- Tab panes -->
            <div class="tab-content">
              <div class="tab-pane active" id="TAV" role="tabpanel" aria-labelledby="TAV-tab">
                <h5 class="display-5"><b>Kompetensi Keahlian Teknik Audio Video</b></h5>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis adipisci ipsa vero explicabo quibusdam dolorem nesciunt aspernatur iste. Qui beatae amet quo unde esse fugit error mollitia ipsa aliquam est.</p>
                <ul class="list-unstyled">
                  <li class="pb-5" v-for="(j,i) in dummyJadwalUji" :key="i">
                    <div class="row">
                      <div class="col-md-10">
                        <div class="media">
                          <img src="https://dummyimage.com/100x100" class="mr-3">
                          <div class="media-body">
                            <h5>@{{j.title}}</h5>
                            <div class="jadwal-meta">
                              <span class="d-block mb-1">Kode Skema : @{{j.noSkema}}</span>
                              <span class="mr-5"> <i class="fa fa-calendar-alt mr-1 text-muted"></i> Tanggal @{{j.jadwal}}</span>
                              <span> <i class="fa fa-user-tag mr-1 text-muted"></i>Kuota @{{j.kuota}}</span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-2">
                        <span>12 peserta terdaftar</span>
                        <button class="btn btn-primary mt-3">Daftar Sekarang</button>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
              <div class="tab-pane fade" id="TKRO" role="tabpanel" aria-labelledby="TKRO-tab">
                <h5 class="display-5"><b>Kompetensi Keahlian Teknik Kendaraan Ringan Otomotif</b></h5>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis adipisci ipsa vero explicabo quibusdam dolorem nesciunt aspernatur iste. Qui beatae amet quo unde esse fugit error mollitia ipsa aliquam est.</p>
                <ul class="list-unstyled">
                  <li class="pb-5" v-for="(j,i) in dummyJadwalUji" :key="i">
                    <div class="row">
                      <div class="col-md-10">
                        <div class="media">
                          <img src="https://dummyimage.com/100x100" class="mr-3">
                          <div class="media-body">
                            <h5>@{{j.title}}</h5>
                            <div class="jadwal-meta">
                              <span class="d-block mb-1">Kode Skema : @{{j.noSkema}}</span>
                              <span class="mr-5"> <i class="fa fa-calendar-alt mr-1 text-muted"></i> Tanggal @{{j.jadwal}}</span>
                              <span> <i class="fa fa-user-tag mr-1 text-muted"></i>Kuota @{{j.kuota}}</span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-2">
                        <span>12 peserta terdaftar</span>
                        <button class="btn btn-primary mt-3">Daftar Sekarang</button>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
              <div class="tab-pane fade" id="TP" role="tabpanel" aria-labelledby="TP-tab">
                <h5 class="display-5"><b>Kompetensi Keahlian Teknik Pemesinan</b></h5>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis adipisci ipsa vero explicabo quibusdam dolorem nesciunt aspernatur iste. Qui beatae amet quo unde esse fugit error mollitia ipsa aliquam est.</p>
                <ul class="list-unstyled">
                  <li class="pb-5" v-for="(j,i) in dummyJadwalUji" :key="i">
                    <div class="row">
                      <div class="col-md-10">
                        <div class="media">
                          <img src="https://dummyimage.com/100x100" class="mr-3">
                          <div class="media-body">
                            <h5>@{{j.title}}</h5>
                            <div class="jadwal-meta">
                              <span class="d-block mb-1">Kode Skema : @{{j.noSkema}}</span>
                              <span class="mr-5"> <i class="fa fa-calendar-alt mr-1 text-muted"></i> Tanggal @{{j.jadwal}}</span>
                              <span> <i class="fa fa-user-tag mr-1 text-muted"></i>Kuota @{{j.kuota}}</span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-2">
                        <span>12 peserta terdaftar</span>
                        <button class="btn btn-primary mt-3">Daftar Sekarang</button>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
              <div class="tab-pane fade" id="TBSM" role="tabpanel" aria-labelledby="TBSM-tab">
                <h5 class="display-5"><b>Kompetensi Keahlian Teknik Bisnis Sepeda Motor</b></h5>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis adipisci ipsa vero explicabo quibusdam dolorem nesciunt aspernatur iste. Qui beatae amet quo unde esse fugit error mollitia ipsa aliquam est.</p>
                <ul class="list-unstyled">
                  <li class="pb-5" v-for="(j,i) in dummyJadwalUji" :key="i">
                    <div class="row">
                      <div class="col-md-10">
                        <div class="media">
                          <img src="https://dummyimage.com/100x100" class="mr-3">
                          <div class="media-body">
                            <h5>@{{j.title}}</h5>
                            <div class="jadwal-meta">
                              <span class="d-block mb-1">Kode Skema : @{{j.noSkema}}</span>
                              <span class="mr-5"> <i class="fa fa-calendar-alt mr-1 text-muted"></i> Tanggal @{{j.jadwal}}</span>
                              <span> <i class="fa fa-user-tag mr-1 text-muted"></i>Kuota @{{j.kuota}}</span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-2">
                        <span>12 peserta terdaftar</span>
                        <button class="btn btn-primary mt-3">Daftar Sekarang</button>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
              <div class="tab-pane fade" id="TEI" role="tabpanel" aria-labelledby="TEI-tab">
                <h5 class="display-5"><b>Kompetensi Keahlian Teknik Elektronika Industri</b></h5>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis adipisci ipsa vero explicabo quibusdam dolorem nesciunt aspernatur iste. Qui beatae amet quo unde esse fugit error mollitia ipsa aliquam est.</p>
                <ul class="list-unstyled">
                  <li class="pb-5" v-for="(j,i) in dummyJadwalUji" :key="i">
                    <div class="row">
                      <div class="col-md-10">
                        <div class="media">
                          <img src="https://dummyimage.com/100x100" class="mr-3">
                          <div class="media-body">
                            <h5>@{{j.title}}</h5>
                            <div class="jadwal-meta">
                              <span class="d-block mb-1">Kode Skema : @{{j.noSkema}}</span>
                              <span class="mr-5"> <i class="fa fa-calendar-alt mr-1 text-muted"></i> Tanggal @{{j.jadwal}}</span>
                              <span> <i class="fa fa-user-tag mr-1 text-muted"></i>Kuota @{{j.kuota}}</span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-2">
                        <span>12 peserta terdaftar</span>
                        <button class="btn btn-primary mt-3">Daftar Sekarang</button>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
              <div class="tab-pane fade" id="TITL" role="tabpanel" aria-labelledby="TITL-tab">
                <h5 class="display-5"><b>Kompetensi Keahlian Teknik Instalasi Tenaga Listrik</b></h5>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis adipisci ipsa vero explicabo quibusdam dolorem nesciunt aspernatur iste. Qui beatae amet quo unde esse fugit error mollitia ipsa aliquam est.</p>
                <ul class="list-unstyled">
                  <li class="pb-5" v-for="(j,i) in dummyJadwalUji" :key="i">
                    <div class="row">
                      <div class="col-md-10">
                        <div class="media">
                          <img src="https://dummyimage.com/100x100" class="mr-3">
                          <div class="media-body">
                            <h5>@{{j.title}}</h5>
                            <div class="jadwal-meta">
                              <span class="d-block mb-1">Kode Skema : @{{j.noSkema}}</span>
                              <span class="mr-5"> <i class="fa fa-calendar-alt mr-1 text-muted"></i> Tanggal @{{j.jadwal}}</span>
                              <span> <i class="fa fa-user-tag mr-1 text-muted"></i>Kuota @{{j.kuota}}</span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-2">
                        <span>12 peserta terdaftar</span>
                        <button class="btn btn-primary mt-3">Daftar Sekarang</button>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
              <div class="tab-pane fade" id="RPL" role="tabpanel" aria-labelledby="RPL-tab">
                <h5 class="display-5"><b>Kompetensi Keahlian Teknik Rekayasa Perangkat Lunak</b></h5>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis adipisci ipsa vero explicabo quibusdam dolorem nesciunt aspernatur iste. Qui beatae amet quo unde esse fugit error mollitia ipsa aliquam est.</p>
                <ul class="list-unstyled">
                  <li class="pb-5" v-for="(j,i) in dummyJadwalUji" :key="i">
                    <div class="row">
                      <div class="col-md-10">
                        <div class="media">
                          <img src="https://dummyimage.com/100x100" class="mr-3">
                          <div class="media-body">
                            <h5>@{{j.title}}</h5>
                            <div class="jadwal-meta">
                              <span class="d-block mb-1">Kode Skema : @{{j.noSkema}}</span>
                              <span class="mr-5"> <i class="fa fa-calendar-alt mr-1 text-muted"></i> Tanggal @{{j.jadwal}}</span>
                              <span> <i class="fa fa-user-tag mr-1 text-muted"></i>Kuota @{{j.kuota}}</span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-2">
                        <span>12 peserta terdaftar</span>
                        <button class="btn btn-primary mt-3">Daftar Sekarang</button>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>

          <button class="d-block btn-jadwal-lain">Lihat Jadwal Lainnya</button>
        </div>        
      </div>
    </section>
@endsection

@section('page-script')
  <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
  <script>
    let app = new Vue({
      el: "#app",
      data: {
        dummyJadwalUji: [
          {
            title: "Uji Kompetensi TAV Klaster Perbaikan Rangkaian Elektronika 12 September 2020",
            noSkema: "212/SKM/TAV/5.31",
            jadwal: "12 September 2020 - 18 September 2020",
            kuota: "20 Peserta"
          },
          {
            title: "Uji Kompetensi TAV Klaster Perbaikan Rangkaian Elektronika 12 September 2020",
            noSkema: "212/SKM/TAV/5.31",
            jadwal: "12 September 2020 - 18 September 2020",
            kuota: "20 Peserta"
          }
        ],
        quickActions: [
          {
            title: 'Assessment Baru',
            text: 'Portal Peserta Assessment'
          },
          {
            title: 'Jejaring',
            text: 'Portal SMK Jejaring'
          },
          {
            title: 'Portal Assesor',
            text: 'Portal Assessor Kompetensi'
          },
          {
            title: 'Cek Sertifikat',
            text: 'Cek keaslian data Sertifikat'
          }
        ],
        newsList: [
          {
            title: 'Launching LSP membawa Semangat Baru',
            excerpt: 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
            slug: '#',
            date: 'Senin, 17 Agustus 2020'
          },
          {
            title: 'Uji Kompetensi Skema KKNI Level 2 TAV',
            excerpt: 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
            slug: '#',
            date: 'Senin, 17 Agustus 2020'
          },
          {
            title: 'Uji Kompetensi Skema KKNI Level 2 TKR',
            excerpt: 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
            slug: '#',
            date: 'Senin, 17 Agustus 2020'
          },

          {
            title: 'Uji Kompetensi Skema KKNI Level 2 TKR',
            excerpt: 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
            slug: '#',
            date: '17 Agustus 2020'
          },
        ]
      }
    })
  </script>
@endsection
