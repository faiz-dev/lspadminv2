{{-- Extends layout --}}
@extends('layouts.manager')

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
                            <label for="tipe_pencarian" class="col-4 col-form-label">Status Pengajuan</label>
                            <div class="col-md-8">
                                <div class="btn-group">
                                    <button class="btn" :class="{'btn-primary' : form.status == 'semua'}" type="button" @click="form.status = 'semua'">Semua</button>
                                    <button class="btn" :class="{'btn-primary' : form.status == 'pending'}" type="button" @click="form.status = 'pending'">Pending</button>
                                    <button class="btn" :class="{'btn-primary' : form.status == 'revisi'}" type="button" @click="form.status = 'revisi'">Revisi</button>
                                    <button class="btn" :class="{'btn-primary' : form.status == 'disetujui'}" type="button" @click="form.status = 'disetujui'">Disetujui</button>
                                    <button class="btn" :class="{'btn-primary' : form.status == 'ditolak'}" type="button" @click="form.status = 'ditolak'">Ditolak</button>
                                </div>
                            </div>                      
                        </div>                        
                        
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="sekolah_jejaring" class="form-label">Sekolah</label>
                                    <select v-model="form.sekolah_jejaring" @change="fetchUjiKom" name="sekolah_jejaring" class="form-control" required>
                                        <option value="">Pilih Sekolah</option>
                                        @foreach($daftar_sekolah as $sekolah)
                                            <option value="{{$sekolah->uid}}" selected>{{ $sekolah->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="tahun_uji" class="form-label">Tahun Uji</label>
                                    <select v-model="form.tahun_uji" @change="fetchUjiKom" name="tahun_uji" class="form-control" required>
                                        <option value="">Pilih Tahun Uji</option>
                                        @for($i = 2020; $i <= date('Y'); $i++)
                                            <option value="2020">{{$i}}</option>
                                        @endfor
                                    </select>        
                                </div>
                            </div>
                        </div>

                        <div class="form-group" v-if="dataBase.daftar_ujikom.length > 0">
                            <label for="uji_kom" class="form-label">Uji Kompetensi</label>
                            <select v-model="form.uji_kom_uid" name="uji_kom_uid" id="" class="form-control" required>
                                <option value="" selected>Pilih Uji Kompetensi</option>
                                <option :value="i.uid" v-for="(i, idx) in dataBase.daftar_ujikom">@{{ i.nama }}</option>
                            </select>        
                        </div>

                    </form>
                </div>
                <div class="card-footer" >
                    <div v-if="!status.cardShown">
                        {{-- Hasil Pencarian untuk filter :  --}}
                        {{-- <button class="btn btn-sm btn-success" v-if="form.jenis_asesi"> Jenis Asesi : @{{form.jenis_asesi}}  </button>
                        <button class="btn btn-sm btn-success" @click="form.no_registrasi=''" v-if="form.no_registrasi"> <i class="flaticon-close"></i> NoReg : @{{form.no_registrasi}}</button>
                        <button class="btn btn-sm btn-success" @click="form.tahun_daftar=''" v-if="form.tahun_daftar"> <i class="flaticon-close"></i> Tahun Daftar : @{{form.tahun_daftar}}</button>
                        <button class="btn btn-sm btn-success" @click="form.jurusan=''" v-if="form.jurusan"> <i class="flaticon-close"></i> Jurusan : @{{form.jurusan}}</button>
                        <button class="btn btn-sm btn-success" @click="form.sekolah_jejaring=''" v-if="form.jenis_asesi == 'jejaring' && form.sekolah_jejaring"> <i class="flaticon-close"></i> Sekolah Jejaring : @{{form.sekolah_jejaring}}</button> --}}
                    </div>
                    <button @click="fetchDB" class="btn btn-primary mx-2 font-weight-bolder ">
                        Tampilkan Pengajuan Pendaftaran
                    </button>
                    
                </div>
            </div>
        </div>
        <div class="col-12">
            <!--begin::Card-->
            <div class="card card-custom gutter-b">
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
                    <p v-if="elements.ktdt == null" >Isi Filter di atas lalu klik Tampilkan Pengajuan Pendaftaran</p>
                    <!--begin: Datatable-->
                    <div class="datatable datatable-bordered datatable-head-custom" id="ktdt_pendaftaran">
                    </div>
                    <!--end: Datatable-->
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Data Pendaftaran</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-6">
                                    <h6>Data Asesi</h6>
                                    <table class="table">
                                        <tr>
                                            <td>Nama</td>
                                            <td>@{{ status.dataPendaftaran.asesi.nama }}</td>
                                        </tr>
                                        <tr>
                                            <td>Tempat, Tgl Lahir</td>
                                            <td>@{{ status.dataPendaftaran.asesi.ttl }}</td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td>@{{ status.dataPendaftaran.asesi.alamat }}</td>
                                        </tr>
                                        <tr>
                                            <td>Sekolah</td>
                                            <td>@{{ status.dataPendaftaran.asesi.sekolah }}</td>
                                        </tr>
                                        <tr>
                                            <td>Jurusan</td>
                                            <td>@{{ status.dataPendaftaran.asesi.jurusan }}</td>
                                        </tr>
                                        <tr>
                                            <td>Kelas</td>
                                            <td>@{{ status.dataPendaftaran.asesi.kelas }}</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-6">
                                    <h6>Data Uji Kompetensi</h6>
                                    <table class="table">
                                        <tr>
                                            <td>Nama</td>
                                            <td>@{{ status.dataPendaftaran.ujikom.nama }}</td>
                                        </tr>
                                        <tr>
                                            <td>Klaster</td>
                                            <td>@{{ status.dataPendaftaran.ujikom.skema_judul_klaster }}</td>
                                        </tr>
                                        <tr>
                                            <td>TUK</td>
                                            <td>@{{ status.dataPendaftaran.ujikom.tuk }}</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-6">
                                    <h6>Data Pendaftaran</h6>
                                    <table class="table">
                                        <tr>
                                            <td>Tanggal Daftar</td>
                                            <td>@{{ status.dataPendaftaran.pendaftaran.tgl_daftar }}</td>
                                        </tr>
                                        <tr>
                                            <td>Status</td>
                                            <td>@{{ status.dataPendaftaran.pendaftaran.tujuan_sertifikasi }}</td>
                                        </tr>
                                        <tr>
                                            <td>Tujuan Sertifikasi</td>
                                            <td>@{{ status.dataPendaftaran.pendaftaran.status }}</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-6">
                                    <h6>Rekomendasi Review</h6>
                                    <div class="form-group">
                                        <label for="form-label">Catatan</label>
                                        <textarea name="catatanreview" id="catatanreview" class="form-control" v-model="form.catatanReview" cols="30" rows="3" placeholder="Tuliskan Rekomendasi di sini" required></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning" @click="updateStatus('revisi')" >Revisi</button>
                            <button type="button" class="btn btn-danger" @click="updateStatus('ditolak')">Tolak</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-info" @click="updateStatus('review')">Review</button>
                        <button type="button" class="btn btn-success" @click="updateStatus('disetujui')">Setujui</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Card-->
        </div>
        
        

        
    </div>

@endsection


{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ url('js/custom/datatable/ajax.js') }}"></script>
    <script>
        let app = new Vue({
            el: '#app',
            data: {
                form: {
                    status: 'semua',                    
                    tahun_uji: '{{date("Y")}}',
                    sekolah_jejaring: "",
                    uji_kompetensi: "",
                    uji_kom_uid: "",
                    catatanReview: "Disetujui untuk melaksanakan Uji Kompetensi"
                },
                urls: {
                    utils_ujikom: `{{ route('utils.ujikom.get') }}`,
                    upstatus_pendaftaran: `{{ route('sertifikasi.aplikasi.update-status') }}`,
                    get_pendaftaran: `{{ route('sertifikasi.aplikasi.data') }}`
                },
                status: {
                    cardShown: true,
                    dataPendaftaran: {
                        asesi: {
                            nama: "Alfian Faiz",
                            sekolah: "SMK Negeri 1 Kandeman",
                            jurusan: "Teknik Audio Video",
                            kelas: "XII TAV 1",
                            no_hp: "087700860194",
                            ttl: '',
                            alamat: '',
                        },
                        pendaftaran: {
                            user_id: 1,
                            ujikom_id: 1,
                            status: "review",
                            jdwl_ujikom_id: 1,
                            tujuan_sertifikasi: "sertifikasi-baru",
                            tgl_daftar: "09-10-2020"
                        },
                        ujikom: {
                            nama: "UJI KOmpetensi KL1",
                            skema_judul_klaster: "Klaster 1 TAV",
                            tuk: "TUK TAV SMK Negeri 1 Kandeman",
                        }
                    }
                },
                elements: {
                    dataTablePendaftaran: null,
                    ktdt: null,
                    cardPencarian : null,
                    card_collapser: null,
                    modalPendaftaran: null
                },
                dataBase: {
                    daftar_ujikom: [],
                    daftar_pendaftaran: []
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
                                template: function(row, index) {
                                    return row.data_diri.nama
                                }
                            },
                            {
                                field: 'reg',
                                title: 'REG',
                                template: function(row, index) {
                                    return row.data_asesi.no_reg
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
                                            return `<span class="label label-warning label-dot mr-2"></span><span class="font-weight-bold ">revisi</span>`
                                        break;
                                        case 'disetujui' : 
                                            return `<span class="label label-success label-dot mr-2"></span><span class="font-weight-bold ">disetujui</span>`
                                        break;
                                        case 'ditolak' : 
                                            return `<span class="label label-danger label-dot mr-2"></span><span class="font-weight-bold ">ditolak</span>`
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
                                    return `<a href="#" data-id="${index}"  class="btn btn-sm btn-primary btnDetail" title="Klik untuk melihat detail">
                                                <i class="flaticon-list"></i> Detail
                                            </a>`;
                                },
                            }
                        ],
                        columns2: [
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
                this.initCardPencarian();
                vm.modalPendaftaran = $('#staticBackdrop')
                $(document).on('click','.btnDetail', function() {
                    vm.openModal()
                    const unique = $(this).data('id')
                    vm.showDetail(unique)
                })
            }, 
            methods: {
                initDataTable: async function() {
                    let vm = this
                    let url = `${this.urls.get_pendaftaran}`
                    this.elements.dataTablePendaftaran = $('#ktdt_pendaftaran');                    
                    if(this.elements.ktdt != null) {
                        // this.elements.ktdt.destroy();
                        swal.fire({
                            title: "Loading",
                            text: "Mengambil data"
                        })
                        swal.showLoading();
                        this.elements.ktdt.setDataSourceParam('status', this.form.status);
                        this.elements.ktdt.setDataSourceParam('ujikom', this.form.uji_kom_uid);
                        this.elements.ktdt.load()
                        return;
                    }
                    console.log("ELEMENT",this.elements.dataTablePendaftaran)
                    
                    this.elements.ktdt = CDatatableRemoteAjax.init(this.elements.dataTablePendaftaran, url, this.config.dataTable.columns);
                    this.elements.ktdt.on('datatable-on-ajax-done', function(event, data) {
                        vm.dataBase.daftar_pendaftaran = data;
                    })
                    this.elements.ktdt.on('datatable-on-reloaded', function() {
                        swal.close();
                    })
                },
                initCardPencarian: function() {
                    this.elements.card_collapser = $('#card_collapser')
                    let card = new KTCard('card_pencarian');
                    let vm = this
                    card.on('afterCollapse', function(card) {
                        vm.changeCardShownStatus(false)
                    })
                    card.on('afterExpand', function(card) {
                        vm.changeCardShownStatus(true)
                    })
                    
                    this.elements.cardPencarian  = card;
                }, 
                changeCardShownStatus: function(value) {
                    this.status.cardShown = value
                },
                openModal() {
                    this.modalPendaftaran.modal('show');
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


                    vm.initDataTable()                    
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
                },
                showDetail: async function(idx) {
                    let dataPendaftaran = this.dataBase.daftar_pendaftaran.find(function(it) {
                        return it.user_id == idx;
                    });
                    this.status.dataPendaftaran = {
                        asesi: {
                            nama: dataPendaftaran.profile.nama,
                            sekolah: "SMK Negeri 1 Kandeman",
                            jurusan: dataPendaftaran.data_asesi.jurusan,
                            kelas: dataPendaftaran.data_asesi.kelas,
                            no_hp:dataPendaftaran.profile.no_telp,
                            ttl:`${dataPendaftaran.profile.tempat_lahir}, ${dataPendaftaran.profile.tgl_lahir}`,
                            alamat: dataPendaftaran.profile.alamat,
                        },
                        pendaftaran: {
                            user_id: dataPendaftaran.user_id,
                            ujikom_id: dataPendaftaran.uji_kompetensi_id,
                            status: dataPendaftaran.status,
                            jdwl_ujikom_id: dataPendaftaran.jdwl_ujikom_id,
                            tujuan_sertifikasi: dataPendaftaran.tujuan_sertifikasi,
                            tgl_daftar: moment(dataPendaftaran.created_at).format('D MMMM Y LT')
                        },
                        ujikom: {
                            nama: dataPendaftaran.uji_kompetensi.nama,
                            skema_judul_klaster: dataPendaftaran.uji_kompetensi.skema.judul_klaster,
                            tuk: dataPendaftaran.uji_kompetensi.tuk.nama,
                        }
                    }
                },
                updateStatus: async function(status) {
                    console.log(status)
                    let vm = this
                    if(vm.form.catatanReview == "") {
                        swal.fire({
                            title:"Perhatian",
                            text: "Catatan Review harus diisi",
                            icon: "warning"
                        })
                        return
                    }
                    let data = {
                        _method: "PUT",
                        user_id: vm.status.dataPendaftaran.pendaftaran.user_id,
                        ujikom_id: vm.status.dataPendaftaran.pendaftaran.ujikom_id,
                        status: status,
                        catatan: vm.form.catatanReview
                    }
                    axios.put(vm.urls.upstatus_pendaftaran, data)
                        .then(response => {
                            if(response.status == 200) {
                                swal.fire({
                                    title: "Berhasil",
                                    text: "Ubah Status Pendaftaran Berhasil"
                                })
                                .then(() => {
                                    vm.elements.modalPendaftaran.modal('hide')
                                    vm.initDataTable()
                                })
                            }
                        })
                    // console.log([status, this.status.dataPendaftaran]);
                    console.log({
                        user_id: vm.status.dataPendaftaran.pendaftaran.user_id,
                        ujikom_id: vm.status.dataPendaftaran.pendaftaran.ujikom_id,
                        status: status
                    })
                }
            }
        })
    </script>
@endsection
