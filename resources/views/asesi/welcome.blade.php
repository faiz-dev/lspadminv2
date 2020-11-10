{{-- Extends layout --}}
@extends('layouts.member')

{{-- Content --}}
@section('content')

    {{-- Dashboard 1 --}}

    <div class="row" id="app">
        <div class="col-12">
            <div class="card card-custom mb-5">
                <div class="card-body">
                    <h1>Selamat Datang, {{Auth::user()->name}}</h1>
                </div>
            </div>

            @if (Auth::user()->dataDiri == null)
                <div class="alert alert-danger mb-5 p-5" role="alert">
                    <h4 class="alert-heading">Anda belum melengkapi Profil!</h4>
                    <p>Klik Tombol di bawah ini untuk melengkapi profil anda !</p>
                    <div class="border-bottom border-white opacity-20 mb-5"></div>
                    <a href="{{ route('asesi.pengaturan.profil') }}" class="btn btn-secondary">Lengkapi Profil</a>
                </div>    
            @endif
        </div>
        {{-- <div class="col-12 col-md-4">
            <div class="card card-custom mb-5">
                <div class="card-header">
                    <div class="card-title">
                        <span class="card-icon">
                            <i class="flaticon2-chat-1 text-primary"></i>
                        </span>
                        <h3 class="card-label">Sedang dilaksanakan</h3>
                    </div>
                </div>
                <div class="card-body">
                    
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="card card-custom mb-5">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">Selesai</h3>
                    </div>
                </div>
                <div class="card-body">
                    
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="card card-custom mb-5">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">Skill Passport</h3>
                    </div>
                </div>
                <div class="card-body">
                    
                </div>
            </div>
        </div> --}}
        @if(Auth::user()->dataDiri != null)
        {{-- <div class="col-6">
            <!--begin::Stats Widget 13-->
            <a href="#"
            class="card card-custom bgi-no-repeat card-stretch gutter-b"
            style="background-position: right top; background-size: 30% auto; background-image: url({{url('/media/svg/shapes/abstract-3.svg')}})">
            <!--begin::Body-->
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <i class="flaticon-clock-2 icon-3x text-primary"></i>
                    <span class="font-weight-bold text-success p-2">2 Jadwal Uji Aktif</span>
                </div>
                <div class="text-dark-75 font-weight-bolder font-size-h5 mb-2 mt-5">
                    Jadwal Uji Kompetensi</div>
                <div class="font-weight-bold text-muted text-hover-primary font-size-sm">
                    Lihat Jadwal Uji anda yang telah disetujui LSP</div>
            </div>
            <!--end::Body-->
            </a>
        </div> --}}
        @if ($ct_pendaftaran > 0)
        <div class="col-6">
            <!--begin::Stats Widget 13-->
            <a href="{{route('asesi.asesmen.list-pendaftaran')}}"
            class="card card-custom bgi-no-repeat card-stretch gutter-b"
            style="background-position: right top; background-size: 30% auto; background-image: url({{url('/media/svg/shapes/abstract-4.svg')}})">
            <!--begin::Body-->
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <i class="flaticon-file icon-3x text-primary"></i>
                    <span class="font-weight-bold text-success p-2">{{$ct_pendaftaran}} Pendaftaran Sedang Review / Revisi</span>
                </div>
                <div class="text-dark-75 font-weight-bolder font-size-h5 mb-2 mt-5">
                    Riwayat Pendaftaran Uji</div>
                <div class="font-weight-bold text-muted text-hover-primary font-size-sm">
                    Daftar Pengajuan Pendaftaran Uji Kompetensi</div>
            </div>
            <!--end::Body-->
            </a>
        </div>
        
        @endif
        <div class="col-12">
            <div class="card card-custom mb-5">
                <div class="card-header">
                    <div class="card-title">
                        <span class="card-icon">
                            <i class="flaticon2-chat-1 text-primary"></i>
                        </span>
                        <h3 class="card-label">Informasi Uji Kompetensi</h3>
                        <small>Anda dapat memilih Uji Kompetensi yang tersedia pada tabel di bawah ini. Perhatikan Judul dan Kompetensinya!</small>
                    </div>
                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <div class="datatable datatable-bordered datatable-head-custom" id="ktdt_ujikom">
                    </div>
                    <!--end: Datatable-->
                </div>
            </div>
        </div>
        @endif
    </div>

@endsection


{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ url('js/custom/datatable/local.js') }}"></script>
    <script>
     
        let app = new Vue({
            el: '#app',
            data: {
                elements: {
                    dataTableUji: null,
                },
                dataBase: {
                    daftarUji: JSON.parse(`{!! json_encode($daftar_uji) !!}`)
                },
                config: {
                    dataTable: {
                        columns: [
                            {
                                field: 'No',
                                title: 'No',    
                                width: 30,
                                sortable: true,
                                overflow: 'visible',
                                template: function(row, index) {
                                    return index + 1;
                                }
                            },
                            {
                                field: 'nama',
                                title: 'Nama',
                            },
                            {
                                field: 'tgl_awal',
                                title: 'Tanggal', 
                                width: 200,
                                autoHide: false,
                                template: function(row) {
                                    return `${row.tgl_awal} s.d ${row.tgl_akhir}`
                                }
                            }, 
                            {
                                field: 'jml_asesi',
                                title: 'Kuota',    
                                width: 150,
                                template: function(row) {
                                    return `${row.jml_asesi} Asesi`
                                }
                            },
                            {
                                field: 'Actions',
                                title: 'Aksi', 
                                width: 100,
                                autoHide: false,
                                template: function(row, index) {
                                    const url = '{{url("./member/ujikom/pendaftaran")}}?q='+row.uid;
                                    return `<a href="${url}"  class="btn btn-sm btn-primary btnRegister" title="Klik untuk Mendaftar">
                                                <i class="flaticon-list"></i> Daftar
                                            </a>`;
                                },
                            }
                        ]
                    }
                }
            },
            mounted() {
                let vm = this;
                vm.initDataTable();
                
            }, 
            methods: {
                initDataTable: async function() {
                    this.elements.dataTableUji = $('#ktdt_ujikom');
                    console.log(this.elements.dataTableUji)
                    CDataTable.init(this.elements.dataTableUji, this.dataBase.daftarUji, this.config.dataTable.columns);
                },
                initDataTableToolbar: function() {
                    this.elements.filterTableNama = $('#filterTableNama')
                    this.elements.filterTableNoReg = $('#filterTableNoReg')
                    this.elements.filterTableJurusan = $('#filterTableJurusan')
                    this.elements.filterTableSekolah = $('#filterTableSekolah')
                    console.log("initializing datatable toolbar", this.elements.filterTableNama)
                    CDataTable.initSearch(this.elements.dataTableUji, this.elements.filterTableNama, 'nama')
                    CDataTable.initSearch(this.elements.dataTableUji, this.elements.filterTableNoReg, 'no_reg')
                    CDataTable.initSearch(this.elements.dataTableUji, this.elements.filterTableJurusan, 'jurusan')
                    CDataTable.initSearch(this.elements.dataTableUji, this.elements.filterTableSekolah, 'tipe')
                },
                pendaftaranUji: function(event) {
                    alert('daftar')
                } 
            }
        })
    </script>
@endsection
