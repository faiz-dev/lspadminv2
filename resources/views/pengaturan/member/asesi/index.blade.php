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
                        <h3 class="card-label">Pencarian Member Asesi</h3>
                    </div>
                    <div class="card-toolbar">
                        <button class="btn btn-light-info mx-2 font-weight-bolder " data-toggle="modal" data-target="#modalImport">
                            <i class="flaticon-upload"></i>
                            Import Data
                        </button>
                        <a href="{{route('pengaturan.member.asesi.create')}}"  class="btn btn-light-success mx-2 font-weight-bolder ">
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
                            <label for="tipe_pencarian" class="col-2 col-form-label">Jenis Member Asesi</label>
                            <div class="col-md-10">
                                <div class="btn-group">
                                    <button class="btn" :class="{'btn-primary' : form.jenis_asesi == 'sendiri'}" type="button" @click="form.jenis_asesi = 'sendiri'" id="btnSiswaSendiri">Siswa Sendiri</button>
                                    <button class="btn" :class="{'btn-primary' : form.jenis_asesi == 'jejaring'}" type="button" @click="form.jenis_asesi = 'jejaring'" id="btnSiswaJejaring">Siswa Jejaring</button>
                                </div>
                            </div>                      
                        </div>
                        <div class="form-group row">
                            <label for="tipe_pencarian" class="col-2 col-form-label">No Registrasi</label>
                            <div class="col-md-10">
                                <input type="text" v-model="form.no_registrasi" class="form-control" name="no_registrasi" placeholder="Nomor Registrasi" required>
                            </div>                      
                        </div>
                        
                        <div class="form-group row">
                            <label for="tipe_pencarian" class="col-2 col-form-label">Tahun Daftar</label>
                            <div class="col-md-10">
                                <select v-model="form.tahun_daftar" name="tahun_daftar" id="" class="form-control" required>
                                    @for ($i = date('Y'); $i >= 2019 ; $i--)
                                        <option>{{$i}}</option>
                                    @endfor
                                </select>
                            </div>         
                        </div>
                        
                        <div class="form-group row">
                            <label for="jurusan" class="col-2 col-form-label">Jurusan</label>
                            <div class="col-md-10">
                                <select v-model="form.jurusan" name="jurusan" id="" class="form-control" required>
                                    <option value="tav">Teknik Audio Video</option>
                                    <option value="tkr">Teknik Kendaraan Ringan</option>
                                    <option value="tp">Teknik Pemesinan</option>
                                </select>
                            </div>         
                        </div>

                        <div class="form-group row" v-if="form.jenis_asesi == 'jejaring'">
                            <label for="sekolah_jejaring" class="col-2 col-form-label">Sekolah Jejaring</label>
                            <div class="col-md-10">
                                <select v-model="form.sekolah_jejaring" name="sekolah_jejaring" id="" class="form-control" required>
                                    <option value="fa212d">SMK Negeri X</option>
                                    <option value="afe2">SMK Negeri Y</option>
                                    <option value="fa21hrf2d">SMK Negeri Z</option>
                                </select>
                            </div>         
                        </div>
                    </form>
                </div>
                <div class="card-footer" >
                    <div v-if="!status.cardShown">
                        Hasil Pencarian untuk filter : 
                        <button class="btn btn-sm btn-success" v-if="form.jenis_asesi"> Jenis Asesi : @{{form.jenis_asesi}}  </button>
                        <button class="btn btn-sm btn-success" @click="form.no_registrasi=''" v-if="form.no_registrasi"> <i class="flaticon-close"></i> NoReg : @{{form.no_registrasi}}</button>
                        <button class="btn btn-sm btn-success" @click="form.tahun_daftar=''" v-if="form.tahun_daftar"> <i class="flaticon-close"></i> Tahun Daftar : @{{form.tahun_daftar}}</button>
                        <button class="btn btn-sm btn-success" @click="form.jurusan=''" v-if="form.jurusan"> <i class="flaticon-close"></i> Jurusan : @{{form.jurusan}}</button>
                        <button class="btn btn-sm btn-success" @click="form.sekolah_jejaring=''" v-if="form.jenis_asesi == 'jejaring' && form.sekolah_jejaring"> <i class="flaticon-close"></i> Sekolah Jejaring : @{{form.sekolah_jejaring}}</button>
                    </div>
                    <a href="{{route('role.create')}}" v-if="status.cardShown" class="btn btn-primary mx-2 font-weight-bolder ">
                        Reload
                    </a>
                    <button v-if="status.cardShown" @click="fetchDB" class="btn btn-primary mx-2 font-weight-bolder ">
                        Cari Asesi
                    </button>
                </div>
            </div>
        </div>

        <div class="col-12" :class="{'d-none':status.cardShown}">
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-header border-0">
                        <div class="card-title">
                            <h3 class="card-label">Daftar Member Asesi</h3>
                        </div>
                    </div>
                    <div class="card-toolbar">
                        <!--begin::Button-->
                        <a href="#"  class="btn btn-light-primary mx-2 font-weight-bolder ">
                            <i class="flaticon-download"></i>
                            Export Data
                        </a>
                        
                        
                        <!--end::Button-->
                    </div>
                </div>
                
                <div class="card-body">
                    {{-- // table toolbar --}}
                    <div class="row align-items-center">
                        <div class="col-md-2 my-2 my-md-0">
                            <div class="input-icon">
                                <input type="text" class="form-control" placeholder="Search Nama..." id="filterTableNama" />
                                <span>
                                    <i class="flaticon2-search-1 text-muted"></i>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-2 my-2 my-md-0">
                            <div class="input-icon">
                                <input type="text" class="form-control" placeholder="Search No Reg..." id="filterTableNoReg" />
                                <span>
                                    <i class="flaticon2-search-1 text-muted"></i>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-3 my-2 my-md-0">
                            <div class="d-flex align-items-center">
                                <label class="mr-3 mb-0 d-none d-md-block">Jurusan:</label>
                                <select class="form-control" id="filterTableJurusan">
                                    <option value="">All</option>
                                    <option value="tav">Teknik Audio Video</option>
                                    <option value="tkr">Teknik Kendaraan Ringan</option>
                                    <option value="tp">Teknik Pemesinan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 my-2 my-md-0">
                            <div class="d-flex align-items-center">
                                <label class="mr-3 mb-0 d-none d-md-block">Sekolah</label>
                                <select class="form-control" id="filterTableSekolah">
                                    <option value="">All</option>
                                    <option value="fa212d">SMK Negeri X</option>
                                    <option value="afe2">SMK Negeri Y</option>
                                    <option value="fa21hrf2d">SMK Negeri Z</option>
                                </select>
                            </div>
                        </div>
                        {{-- <div class="col-md-1 my-2 my-md-0">
                            <div class="d-flex align-items-center">
                                <button class="btn btn-light-danger" @click="resetFilterTable">Reset</button>
                            </div>
                        </div> --}}
                    </div>
                    {{-- // table toolbar --}}

                    <!--begin: Datatable-->
                    <div class="datatable datatable-bordered datatable-head-custom" id="kt_datatable">
                    </div>
                    <!--end: Datatable-->
                </div>
            </div>
        </div>
    </div>

    <!-- Modal-->
    <div class="modal fade" id="modalImport" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Import Data Asesi Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Fasilitas import ini digunakan untuk menambahkan asesi yang benar-benar baru dan belum memiliki data member pada sistem. Apabila ditemukan data dengan NIK yang sama penambahan data akan langsung dibatalkan.</p>
                    <p class="alert alert-custom alert-light-warning">Ikuti format excel berikut untuk mengambahkan data. dilarang menambahkan kolom </p>
                    <a href="#" class="btn btn-block btn-light-primary"><i class="flaticon-download"></i> Download Template Import Asesi (.XLSX)</a>

                    <hr>
                    <div class="alert alert-custom alert-light-primary">
                        <label for="">Upload File di sini</label>
                        <input type="file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary font-weight-bold">Mulai Import Data</button>
                </div>
            </div>
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
                    jenis_asesi: 'sendiri',
                    no_registrasi: '',
                    tahun_daftar: '{{date("Y")}}',
                    jurusan: 'tav',
                    sekolah_jejaring: 'fa212d',
                },
                elements: {
                    cardPencarian : null,
                    dataTableMember: null,
                    filterTableNama: null,
                    filterTableJurusan: null,
                    filterTableSekolah: null,
                    filterTableNoReg: null,
                    card_collapser: null
                },
                status: {
                    cardShown: true
                },
                dataBase: {
                    daftarAsesi: [
                        {
                            nama: 'Alfian Faiz',
                            no_reg: "1142500 2020",
                            tipe: 'sendiri',
                            jurusan: 'RPL',
                            sekolah: "SMK Negeri 2 Pekalongan"
                        },
                        {
                            nama: 'Vidiya',
                            no_reg: "1142500 2020",
                            tipe: 'sendiri',
                            jurusan: 'TAV',
                            sekolah: "SMK Negeri 2 Pekalongan"
                        },
                        {
                            nama: 'Alfian Faiz',
                            no_reg: "1142500 2020",
                            tipe: 'sendiri',
                            jurusan: 'RPL',
                            sekolah: "SMK Negeri 2 Pekalongan"
                        },
                        {
                            nama: 'Alfian Faiz',
                            no_reg: "5411 2020",
                            tipe: 'sendiri',
                            jurusan: 'RPL',
                            sekolah: "SMK Negeri 2 Pekalongan"
                        }
                    ]
                },
                config: {
                    urls: {
                        base: '{{ route("pengaturan.member.asesi") }}'
                    },
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
                                width: 150,
                            },
                            {
                                field: 'no_reg',
                                title: 'No.Reg', 
                                width: 150,
                                autoHide: false,
                            }, 
                            {
                                field: 'email',
                                title: 'email',    
                                width: 150,
                            },
                            {
                                field: 'tipe',
                                title: 'Sekolah', 
                                width: 200,
                                autoHide: false,
                                template: function(row) {
                                    return row.sekolah;
                                }
                            },
                            {
                                field: 'jurusan',
                                title: 'Jurusan', 
                                width: 150,
                                autoHide: false,
                            },
                            {
                                field: 'Actions',
                                title: 'Aksi', 
                                width: 80,
                                autoHide: false,
                                template: function(row, index) {
                                    return '<a href="javascript:;" data-id="'+index+'" class="btn btn-sm btn-clean btn-icon mr-2 btnEdit" title="Edit details">\
                                                <span class="svg-icon svg-icon-md">\
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
                                                            <rect x="0" y="0" width="24" height="24"/>\
                                                            <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero"\ transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>\
                                                            <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>\
                                                        </g>\
                                                    </svg>\
                                                </span>\
                                            </a>\
                                            <a href="javascript:;" data-id="'+index+'" class="btn btn-sm btn-clean btn-icon btnDelete" title="Delete">\
                                                <i class="fa fa-trash"></i>\
                                            </a>\
                                        ';
                                },
                            }
                        ]
                    }
                }
            },
            mounted() {
                this.initCardPencarian();
                let vm = this;
            }, 
            methods: {
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
                initDataTable: async function() {
                    this.elements.dataTableMember = $('#kt_datatable');
                    console.log(this.elements.dataTableMember)
                    CDataTable.init(this.elements.dataTableMember, this.dataBase.daftarAsesi, this.config.dataTable.columns);
                },
                initDataTableToolbar: function() {
                    this.elements.filterTableNama = $('#filterTableNama')
                    this.elements.filterTableNoReg = $('#filterTableNoReg')
                    this.elements.filterTableJurusan = $('#filterTableJurusan')
                    this.elements.filterTableSekolah = $('#filterTableSekolah')
                    console.log("initializing datatable toolbar", this.elements.filterTableNama)
                    CDataTable.initSearch(this.elements.dataTableMember, this.elements.filterTableNama, 'nama')
                    CDataTable.initSearch(this.elements.dataTableMember, this.elements.filterTableNoReg, 'no_reg')
                    CDataTable.initSearch(this.elements.dataTableMember, this.elements.filterTableJurusan, 'jurusan')
                    CDataTable.initSearch(this.elements.dataTableMember, this.elements.filterTableSekolah, 'tipe')
                },
                resetFilterTable() {
                    this.elements.filterTableNama.val(null)
                    this.elements.filterTableNoReg.val(null)
                    // this.elements.dataTableMember.reload();
                },
                fetchDB() {
                    this.elements.card_collapser.trigger('click')
                    let vm = this;
                    this.initDataTable()
                    .then(() => {
                        vm.initDataTableToolbar();    
                    });
                }
            }
        })
    </script>

    {{-- <script>
        let element = $('#kt_datatable')
        let dataJSONArray = JSON.parse('{!!  $roles !!}');
        const url = '{{route("role.index")}}';
        
        let columns = [{
            field: 'name',
            title: 'Nama',
            
        }, {
            field: 'guard_name',
            title: 'Guard',
            width: 80,
        },
        {
            field: 'isActive',
            title: 'Active',
            width: 50,
            template: function(row) {
                if(!row.isActive) {
                    return `<a href="javascript:;" class="btn btn-sm btn-clean btn-icon mr-2" title="Edit details">
                            <span class="svg-icon svg-icon-danger svg-icon-md">
                                <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-09-15-014444/theme/html/demo1/dist/../src/media/svg/icons/Electric/Shutdown.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path d="M7.62302337,5.30262097 C8.08508802,5.000107 8.70490146,5.12944838 9.00741543,5.59151303 C9.3099294,6.05357769 9.18058801,6.67339112 8.71852336,6.97590509 C7.03468892,8.07831239 6,9.95030239 6,12 C6,15.3137085 8.6862915,18 12,18 C15.3137085,18 18,15.3137085 18,12 C18,9.99549229 17.0108275,8.15969002 15.3875704,7.04698597 C14.9320347,6.73472706 14.8158858,6.11230651 15.1281448,5.65677076 C15.4404037,5.20123501 16.0628242,5.08508618 16.51836,5.39734508 C18.6800181,6.87911023 20,9.32886071 20,12 C20,16.418278 16.418278,20 12,20 C7.581722,20 4,16.418278 4,12 C4,9.26852332 5.38056879,6.77075716 7.62302337,5.30262097 Z" fill="#000000" fill-rule="nonzero"/>
                                        <rect fill="#000000" opacity="0.3" x="11" y="3" width="2" height="10" rx="1"/>
                                    </g>
                                </svg> Off
                            </span>
                        </a>`;
                } else {
                    return `<a href="javascript:;" class="btn btn-sm btn-clean btn-icon mr-2" title="Edit details">
                            <span class="svg-icon svg-icon-primary svg-icon-md">
                                <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-09-15-014444/theme/html/demo1/dist/../src/media/svg/icons/Electric/Shutdown.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path d="M7.62302337,5.30262097 C8.08508802,5.000107 8.70490146,5.12944838 9.00741543,5.59151303 C9.3099294,6.05357769 9.18058801,6.67339112 8.71852336,6.97590509 C7.03468892,8.07831239 6,9.95030239 6,12 C6,15.3137085 8.6862915,18 12,18 C15.3137085,18 18,15.3137085 18,12 C18,9.99549229 17.0108275,8.15969002 15.3875704,7.04698597 C14.9320347,6.73472706 14.8158858,6.11230651 15.1281448,5.65677076 C15.4404037,5.20123501 16.0628242,5.08508618 16.51836,5.39734508 C18.6800181,6.87911023 20,9.32886071 20,12 C20,16.418278 16.418278,20 12,20 C7.581722,20 4,16.418278 4,12 C4,9.26852332 5.38056879,6.77075716 7.62302337,5.30262097 Z" fill="#000000" fill-rule="nonzero"/>
                                        <rect fill="#000000" opacity="0.3" x="11" y="3" width="2" height="10" rx="1"/>
                                    </g>
                                </svg> On
                            </span>
                        </a>`;
                }
                
            }
        },
        {
            field: 'Actions',
            title: 'Action',
            sortable: false,
            width: 80,
            overflow: 'visible',
            autoHide: false,
            template: function(row) {
                return '<a href="javascript:;" data-id="'+row.id+'" class="btn btn-sm btn-clean btn-icon mr-2 btnEdit" title="Edit details">\
                            <span class="svg-icon svg-icon-md">\
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
                                        <rect x="0" y="0" width="24" height="24"/>\
                                        <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero"\ transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>\
                                        <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>\
                                    </g>\
                                </svg>\
                            </span>\
                        </a>\
                        <a href="javascript:;" data-id="'+row.id+'" class="btn btn-sm btn-clean btn-icon btnDelete" title="Delete">\
                            <i class="fa fa-trash"></i>\
                        </a>\
                    ';
            },
        }]

        jQuery(document).ready(function() {
            CDataTable.init(element, dataJSONArray, columns);
            $(document).on('click','.btnEdit', function() {
                const unique = $(this).data('id')
                window.location.href = url+`/${unique}/edit`
            })
            $(document).on('click','.btnDelete', function() {
                const unique = $(this).data('id')
                Swal.fire({
                    title: 'Konfirmasi',
                    text: 'Anda yakin akan menghapus data ini ?',
                    icon: 'warning',
                    showCloseButton: true,
                    showCancelButton: true,
                    cancelButtonText: 'Batal'
                })
                .then(response => {
                    if(response.isConfirmed) {
                        Swal.showLoading();
                        return axios.post('{{ url("m/pengaturan/role") }}/'+unique,{'_method':"DELETE"})  
                    }
                })
                .then(response => {
                    Swal.fire({
                        title: "Berhasil",
                        text: "Hapus data berhasil",
                        icon: "success"
                    })
                    .then(() => {
                        window.location.reload();
                    })
                   
                })
                .catch(err => {
                    Swal.fire({
                        title: "Gagal",
                        text: "Hapus data gagal",
                        icon: "error"
                    })
                })
            })
        });

    </script> --}}
@endsection
