{{-- Extends layout --}}
@extends('layouts.manager')

{{-- Content --}}
@section('content')

    {{-- Dashboard 1 --}}

    <div class="row" id="app">
        

        <div class="col-12" >
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-header border-0">
                        <div class="card-title">
                            <h3 class="card-label">Daftar Sekolah & Jejaring</h3>
                        </div>
                    </div>
                    <div class="card-toolbar">
                        <!--begin::Button-->
                        <a href="#"  class="btn btn-light-primary mx-2 font-weight-bolder ">
                            <i class="flaticon-download"></i>
                            Export Data
                        </a>
                        <button class="btn btn-primary mx-2 font-weight-bolder " data-toggle="modal" data-target="#modalImport">
                            <i class="flaticon-upload"></i>
                            Import Data
                        </button>
                        
                        
                        <!--end::Button-->
                    </div>
                </div>
                
                <div class="card-body">
                    {{-- // table toolbar --}}
                    <div class="row align-items-center">
                        <div class="col-md-4 my-2 my-md-0">
                            <div class="input-icon">
                                <input type="text" class="form-control" placeholder="Search Nama..." id="filterTableNama" />
                                <span>
                                    <i class="flaticon2-search-1 text-muted"></i>
                                </span>
                            </div>
                        </div>
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
                    dataTableSekolah: null,
                    filterTableNama: null,
                },
                dataBase: {
                    daftarSekolah: JSON.parse('{!! $daftar_sekolah !!}')
                },
                config: {
                    urls: {
                        base: '{{ route("pengaturan.sekolahjejaring.sekolah.index") }}'
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
                                field: 'nama',
                                title: 'Valid', 
                                width: 150,
                                autoHide: false,
                            }, 
                            {
                                field: 'email',
                                title: 'Manager',    
                                width: 150,
                            },
                            {
                                field: 'no_telp',
                                title: 'Telp', 
                                width: 200,
                                autoHide: false,
                                template: function(row) {
                                    return row.sekolah;
                                }
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
                this.initDataTable();
                let vm = this;
            }, 
            methods: {
                initDataTable: async function() {
                    this.elements.dataTableSekolah = $('#kt_datatable');
                    console.log(this.elements.dataTableSekolah)
                    CDataTable.init(this.elements.dataTableSekolah, this.dataBase.daftarSekolah, this.config.dataTable.columns);
                },
                initDataTableToolbar: function() {
                    this.elements.filterTableNama = $('#filterTableNama')
                    console.log("initializing datatable toolbar", this.elements.filterTableNama)
                    CDataTable.initSearch(this.elements.dataTableSekolah, this.elements.filterTableNama, 'nama')
                },
                resetFilterTable() {
                    this.elements.filterTableNama.val(null)
                    this.elements.filterTableNoReg.val(null)
                    // this.elements.dataTableSekolah.reload();
                }
            }
        })
    </script>
@endsection
