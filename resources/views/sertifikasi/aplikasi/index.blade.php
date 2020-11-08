{{-- Extends layout --}}
@extends('layouts.member')

{{-- Content --}}
@section('content')

    {{-- Dashboard 1 --}}

    <div class="row" id="app">
        <div class="col-12 col-sm-12 col-xl-8">
            <div class="card card-custom gutter-b" id="card_pencarian">
                <div class="card-header border-0">
                    <div class="card-title">
                        <h3 class="card-label">Pencarian Pengajuan Pendaftaran</h3>
                    </div>
                    <div class="card-toolbar">
                        <button class="btn btn-light-info mx-2 font-weight-bolder " data-toggle="modal" data-target="#modalImport">
                            <i class="flaticon-upload"></i>
                            Import Data
                        </button>
                        <a href="#"  class="btn btn-light-success mx-2 font-weight-bolder ">
                            <i class="flaticon-upload"></i>
                            New Record
                        </a>
                        <!--begin::Button-->
                        <button id="card_collapser" class="btn btn-sm btn-light-primary mx-2 font-weight-bolder " data-card-tool="toggle">
                            <i class="ki ki-arrow-up icon-nm"></i>
                        </button>
                        <!--end::Button-->
                    </div>
                </div>
                <div class="card-body">

                    <form action="">
                        <div class="form-group row">
                            <label for="tipe_pencarian" class="col-2 col-form-label">Status Pengajuan</label>
                            <div class="col-md-10">
                                <div class="btn-group">
                                    <button class="btn" :class="{'btn-primary' : form.status == 'semua'}" type="button" @click="form.status = 'semua'">Semua</button>
                                    <button class="btn" :class="{'btn-primary' : form.status == 'pending'}" type="button" @click="form.status = 'pending'">Pending</button>
                                    <button class="btn" :class="{'btn-primary' : form.status == 'revisi'}" type="button" @click="form.status = 'revisi'">Revisi</button>
                                    <button class="btn" :class="{'btn-primary' : form.status == 'disetujui'}" type="button" @click="form.status = 'disetujui'">Disetujui</button>
                                    <button class="btn" :class="{'btn-primary' : form.status == 'ditolak'}" type="button" @click="form.status = 'ditolak'">Ditolak</button>
                                </div>
                            </div>                      
                        </div>                        
                        
                        <div class="form-group row">
                            <label for="sekolah_jejaring" class="col-2 col-form-label">Sekolah</label>
                            <div class="col-md-10">
                                <select v-model="form.sekolah_jejaring" @change="fetchUjiKom" name="sekolah_jejaring" id="" class="form-control" required>
                                    <option value="">Pilih Sekolah</option>
                                    @foreach($daftar_sekolah as $sekolah)
                                        <option value="{{$sekolah->uid}}" selected>{{ $sekolah->nama }}</option>
                                    @endforeach
                                </select>
                            </div>         
                        </div>

                        <div class="form-group row">
                            <label for="sekolah_jejaring" class="col-2 col-form-label">Tahun Uji</label>
                            <div class="col-md-10">
                                <select v-model="form.tahun_uji" @change="fetchUjiKom" name="sekolah_jejaring" id="" class="form-control" required>
                                    <option value="">Pilih Tahun Uji</option>
                                    @for($i = 2020; $i <= date('Y'); $i++)
                                        <option value="2020">{{$i}}</option>
                                    @endfor
                                </select>
                            </div>         
                        </div>

                        <div class="form-group row" v-if="dataBase.daftar_ujikom.length > 0">
                            <label for="uji_kom" class="col-2 col-form-label">Uji Kompetensi</label>
                            <div class="col-md-10">
                                <select v-model="form.uji_kom_uid" name="uji_kom_uid" id="" class="form-control" required>
                                    <option value="" selected>Pilih Uji Kompetensi</option>
                                    <option :value="i.uid" v-for="(i, idx) in dataBase.daftar_ujikom">@{{ i.nama }}</option>
                                </select>
                            </div>         
                        </div>

                    </form>
                </div>
                <div class="card-footer" >
                    <div v-if="!status.cardShown">
                        Hasil Pencarian untuk filter : 
                        {{-- <button class="btn btn-sm btn-success" v-if="form.jenis_asesi"> Jenis Asesi : @{{form.jenis_asesi}}  </button>
                        <button class="btn btn-sm btn-success" @click="form.no_registrasi=''" v-if="form.no_registrasi"> <i class="flaticon-close"></i> NoReg : @{{form.no_registrasi}}</button>
                        <button class="btn btn-sm btn-success" @click="form.tahun_daftar=''" v-if="form.tahun_daftar"> <i class="flaticon-close"></i> Tahun Daftar : @{{form.tahun_daftar}}</button>
                        <button class="btn btn-sm btn-success" @click="form.jurusan=''" v-if="form.jurusan"> <i class="flaticon-close"></i> Jurusan : @{{form.jurusan}}</button>
                        <button class="btn btn-sm btn-success" @click="form.sekolah_jejaring=''" v-if="form.jenis_asesi == 'jejaring' && form.sekolah_jejaring"> <i class="flaticon-close"></i> Sekolah Jejaring : @{{form.sekolah_jejaring}}</button> --}}
                    </div>
                    <button v-if="status.cardShown" @click="fetchDB" class="btn btn-primary mx-2 font-weight-bolder ">
                        Tampilkan Pengajuan Pendaftaran
                    </button>
                </div>
            </div>
        </div>
        <div class="col-12">
            <!--begin::Card-->
            <div class="card card-custom gutter-b" v-if="!status.cardShown" >
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">Riwayat Pendaftaran</h3>
                    </div>
                    <div class="card-toolbar">
                        <a href="{{route('asesi.welcome')}}" class="btn btn-light-primary font-weight-bolder mr-2">
                            <i class="ki ki-long-arrow-back icon-sm"></i>
                            Dashboard
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <div class="datatable datatable-bordered datatable-head-custom" id="ktdt_pendaftaran">
                    </div>
                    <!--end: Datatable-->
                </div>
            </div>
            <!--end::Card-->
        </div>
    </div>

@endsection


{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ url('js/custom/datatable/local.js') }}"></script>
    <script>
        let app = new Vue({
            el: '#app',
            data: {
                form: {
                    status: 'semua',                    
                    tahun_uji: '{{date("Y")}}',
                    sekolah_jejaring: "",
                    uji_kompetensi: "",
                    uji_kom_uid: ""
                },
                urls: {
                    utils_ujikom: `{{ route('utils.ujikom.get') }}`,
                    get_pendaftaran: `{{ route('sertifikasi.aplikasi.index') }}`
                },
                status: {
                    cardShown: true
                },
                elements: {
                    dataTablePendaftaran: null,
                },
                dataBase: {
                    // daftarUji: JSON.parse(`{!! json_encode($daftar_pendaftaran) !!}`)
                    daftar_ujikom: []
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
                                template: function(row) {
                                    return row.uji_kompetensi.nama
                                }
                            },
                            {
                                field: 'tgl_awal',
                                title: 'Tanggal', 
                                width: 200,
                                autoHide: false,
                                template: function(row) {
                                    return `${row.uji_kompetensi.tgl_awal} s.d ${row.uji_kompetensi.tgl_akhir}`
                                }
                            }, 
                            {
                                field: 'created_at',
                                title: 'Waktu Daftar',    
                                width: 150,
                                template: function(row) {
                                    return moment(row.created_at).format('D-MMMM-Y LT')
                                }
                            },
                            {
                                field: 'id',
                                title: 'Status',    
                                width: 150,
                                template: function(row) {
                                    switch(row.status) {
                                        case 'review' : 
                                            return `<span class="label label-info label-dot mr-2"></span><span class="font-weight-bold text-info">review</span>`
                                        break;
                                        case 'revisi' : 
                                            return `<span class="label label-info label-dot mr-2"></span><span class="font-weight-bold ">revisi</span>`
                                        break;
                                        case 'disetujui' : 
                                            return `<span class="label label-info label-dot mr-2"></span><span class="font-weight-bold ">review</span>`
                                        break;
                                        case 'ditolak' : 
                                            return `<span class="label label-info label-dot mr-2"></span><span class="font-weight-bold ">review</span>`
                                        break;
                                    }
                                }
                            },
                            {
                                field: 'Actions',
                                title: 'Aksi', 
                                width: 100,
                                autoHide: false,
                                template: function(row, index) {
                                    const url = '{{url("./member/ujikom/pendaftaran")}}?q='+row.uji_kompetensi.uid;
                                    return `<a href="${url}"  class="btn btn-sm btn-primary btnRegister" title="Klik untuk melihat detail">
                                                <i class="flaticon-list"></i> Detail
                                            </a>`;
                                },
                            }
                        ]
                    }
                }
            },
            mounted() {
                let vm = this;
                // vm.initDataTable();
            }, 
            methods: {
                initDataTable: async function() {
                    this.elements.dataTablePendaftaran = $('#ktdt_pendaftaran');
                    console.log(this.elements.dataTablePendaftaran)
                    CDataTable.init(this.elements.dataTablePendaftaran, this.dataBase.daftarUji, this.config.dataTable.columns);
                },
                fetchDB: async function() {
                    let vm = this;
                    if(vm.form.tahun_uji == "" || vm.form.sekolah_jejaring == "" || vm.form.uji_kom_uid == "") {
                        swal.fire({
                            title: "Peringatan!",
                            text: "Isi form filter terlebih dahulu",
                            icon: "warning"
                        })
                        return
                    }
                    axios.get(`${vm.urls.get_pendaftaran}?status=${vm.form.status}&ujikom=${vm.form.uji_kom_uid}`)
                        .then(response => {
                            console.log(response.data);
                        })
                        .catch(e => {
                            swal.fire({
                                title: "Error",
                                text: "Terjadi kesalahan"
                            }).then(() => {
                                // window.location.reload();
                            })
                        })
                },
                fetchUjiKom: async function() {
                    let vm = this;
                    if(vm.form.tahun_uji == "" || vm.form.sekolah_jejaring == "") {
                        return
                    }
                    axios.get(`${vm.urls.utils_ujikom}?tahun=${vm.form.tahun_uji}&sid=${vm.form.sekolah_jejaring}`)
                        .then(response => {
                            vm.dataBase.daftar_ujikom = response.data.daftar_ujikom;
                        })
                        .catch(e => {
                            swal.fire({
                                title: "Error",
                                text: "Terjadi kesalahan"
                            }).then(() => {
                                window.location.reload();
                            })
                        })
                }
            }
        })
    </script>
@endsection
