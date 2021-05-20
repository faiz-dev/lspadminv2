{{-- Extends layout --}}
@extends('layouts.manager')

{{-- Content --}}
@section('content')

    {{-- Dashboard 1 --}}

    <div class="row" id="app">
        

        <div class="col-12">
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
                            <i class="flaticon-upload"></i>
                            Import Data
                        </a>
                        <a href="#"  class="btn btn-light-primary mx-2 font-weight-bolder ">
                            <i class="flaticon-download"></i>
                            Export Data
                        </a>
                        <a href="{{route('pengaturan.member.asesor.create')}}"  class="btn btn-light-success mx-2 font-weight-bolder ">
                            <i class="flaticon-plus"></i>
                            New Asesor
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
    <script src="{{ url('js/custom/datatable/ajax.js') }}"></script>
    
    <script>
        

        let app = new Vue({
            el: '#app',
            data: {
                elements: {
                    cardPencarian : null,
                    dataTableMember: null,
                    ktdt: null,
                    filterTableNama: null,
                    filterTableJurusan: null,
                    filterTableSekolah: null,
                    filterTableNoReg: null,
                    card_collapser: null
                },
                urls: {
                    get_member: '{{ route("pengaturan.member.asesor.fetch") }}',
                    base: '{{ route("pengaturan.member.asesor") }}'
                },
                status: {
                    cardShown: true
                },
                dataBase: {
                    daftarAsesi: []
                },
                config: {
                    urls: {
                        base: '{{ route("pengaturan.member.asesor") }}'
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
                                autoHide: false, 
                                template: function(row, index) {
                                    return (row.gelar_depan ? (row.gelar_depan+" ") : "") 
                                        + (row.nama_lengkap? row.nama_lengkap : "-")
                                        + (row.gelar_belakang ?  (", " +row.gelar_belakang) : '')
                                }
                            },
                            {
                                field: 'email',
                                title: 'email',    
                                width: 150,
                            },
                            {
                                field: 'met',
                                title: 'No.Reg', 
                                width: 150,
                                autoHide: false,
                            },
                            {
                                field: 'lsp_induk_nama',
                                title: 'LSP Induk', 
                                width: 150,
                                autoHide: true,
                            },
                            {
                                field: 'Actions',
                                title: 'Aksi', 
                                width: 80,
                                autoHide: false,
                                template: function(row, index) {
                                    return '<a href="javascript:;" data-id="'+row.uid+'" class="btn btn-sm btn-clean btn-icon mr-2 btnEdit" title="Edit details">\
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
                            }
                        ]
                    }
                }
            },
            mounted() {
                let vm = this;
                this.initDataTable()

                $(document).on('click','.btnEdit', function() {
                    const unique = $(this).data('id')
                    window.location.href = vm.urls.base+`/edit/${unique}`
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
                            return axios.post('{{ route("pengaturan.member.asesor.delete") }}',{'_method':"DELETE", 'unique': unique})  
                        }
                    })
                    .then(response => {
                        if(!response) return
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

                    // alert(unique);
                    // window.location.href = vm.urls.base+`/edit?q=${unique}`
                })
            }, 
            methods: {
                initDataTable: async function() {
                    let vm = this
                    let url = `${this.urls.get_member}`
                    this.elements.dataTableMember = $('#kt_datatable');              
                    if(this.elements.ktdt != null) {
                        // this.elements.ktdt.destroy();
                        swal.fire({
                            title: "Loading",
                            text: "Mengambil data"
                        })
                        swal.showLoading();
                        this.elements.ktdt.setDataSourceParam('met', this.form.no_registrasi);
                        this.elements.ktdt.load()
                        return;
                    }
                    console.log("ELEMENT",this.elements.dataTableMember)
                    
                    this.elements.ktdt = CDatatableRemoteAjax.init(this.elements.dataTableMember, url, this.config.dataTable.columns);
                    this.elements.ktdt.on('datatable-on-ajax-done', function(event, data) {
                        vm.dataBase.daftar_member = data;
                    })
                    this.elements.ktdt.on('datatable-on-reloaded', function() {
                        swal.close();
                    })
                },
                initDataTableToolbar: function() {
                    this.elements.filterTableNama = $('#filterTableNama')
                    console.log("initializing datatable toolbar", this.elements.filterTableNama)
                    CDataTable.initSearch(this.elements.dataTableMember, this.elements.filterTableNama, 'nama')
                },
                resetFilterTable() {
                    this.elements.filterTableNama.val(null)
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
