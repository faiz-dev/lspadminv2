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
                            <h3 class="card-label">Daftar TUK LSP</h3>
                        </div>
                    </div>
                    <div class="card-toolbar">
                        <!--begin::Button-->
                        <a href="{{ route('mg-tuk.create') }}"  class="btn btn-light-success mx-2 font-weight-bolder ">
                            <i class="flaticon-download"></i>
                            Tambah TUK
                        </a>
                        <a href="#"  class="btn btn-light-primary mx-2 font-weight-bolder ">
                            <i class="flaticon-download"></i>
                            Export Data
                        </a>
                        
                        
                        <!--end::Button-->
                    </div>
                </div>
                
                <div class="card-body">
                    <table class="table" id="f-dt">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama TUK</th>
                                <th>Jenis</th>
                                <th>Telp</th>
                                <th>Induk</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($daftar_tuk as $key => $tuk)
                                <tr>
                                    <td> {{ $key + 1 }} </td>
                                    <td> {{ $tuk->nama }} </td>
                                    <td> {{ $tuk->jenis }} </td>
                                    <td> {{ $tuk->telp }} </td>
                                    <td> {{ $tuk->skl_nama }} </td>
                                    <td> 
                                        <a href="{{ route('mg-tuk.edit', ['mg_tuk'=> $tuk->tuk_uid]) }}" class="btn btn-light-warning">Edit</a> 
                                        <button class="btn btn-light-danger">Suspend</button> 
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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

@section('styles')
    <link rel="stylesheet" href="{{ url('plugins/custom/datatables/datatables.bundle.css') }}">
@endsection

{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ url('plugins/custom/datatables/datatables.bundle.js') }}"></script>
    
    <script>
        $('#f-dt').DataTable({
            responsive: true
        })

        // let app = new Vue({
        //     el: '#app',
        //     data: {
        //         form: {
        //             jenis_asesi: 'sendiri',
        //             no_registrasi: '',
        //             tahun_daftar: '{{date("Y")}}',
        //             jurusan: 'tav',
        //             sekolah_jejaring: 'fa212d',
        //         },
        //         elements: {
        //             cardPencarian : null,
        //             dataTableMember: null,
        //             ktdt: null,
        //             filterTableNama: null,
        //             filterTableJurusan: null,
        //             filterTableSekolah: null,
        //             filterTableNoReg: null,
        //             card_collapser: null
        //         },
        //         urls: {
        //             get_member: '{{ route("pengaturan.member.asesi.fetch") }}',
        //             base: '{{ route("pengaturan.member.asesi") }}'
        //         },
        //         status: {
        //             cardShown: true
        //         },
        //         dataBase: {
        //             daftarAsesi: []
        //         },
        //         config: {
        //             urls: {
        //                 base: '{{ route("pengaturan.member.asesi") }}'
        //             },
        //             dataTable: {
        //                 columns: [
        //                     {
        //                         field: 'No',
        //                         title: 'No',    
        //                         width: 30,
        //                         sortable: true,
        //                         overflow: 'visible',
        //                         template: function(row, index) {
        //                             return index + 1;
        //                         }
        //                     },
        //                     {
        //                         field: 'nama',
        //                         title: 'Nama',    
        //                         width: 150,
        //                         autoHide: false, 
        //                         template: function (row, index) {
        //                             if(row.data_diri) {
        //                                 return row.data_diri.nama+` <i class="la la-check-circle text-primary"></i>`
        //                             } else {
        //                                 return row.name+` <i class="la la-exclamation-circle text-warning"></i>`
        //                             }
        //                         }
        //                     },
        //                     {
        //                         field: 'email',
        //                         title: 'email',    
        //                         width: 150,
        //                     },
        //                     {
        //                         field: 'no_reg',
        //                         title: 'No.Reg', 
        //                         width: 150,
        //                         autoHide: false,
        //                         template: function (row, index) {
        //                             if(row.asesi) {
        //                                 return row.asesi.no_reg
        //                             } else {
        //                                 return "-"
        //                             }
        //                         }
        //                     },
        //                     {
        //                         field: 'asesi.jurusan',
        //                         title: 'Jurusan', 
        //                         width: 150,
        //                         autoHide: true,
        //                         template: function (row, index) {
        //                             if(row.asesi) {
        //                                 return row.asesi.jurusan ? row.asesi.jurusan.toUpperCase() : "-"
        //                             } else {
        //                                 return "-"
        //                             }
        //                         }
        //                     },
        //                     {
        //                         field: 'Actions',
        //                         title: 'Aksi', 
        //                         width: 80,
        //                         autoHide: false,
        //                         template: function(row, index) {
        //                             return '<a href="javascript:;" data-id="'+row.uid+'" class="btn btn-sm btn-clean btn-icon mr-2 btnEdit" title="Edit details">\
        //                                         <span class="svg-icon svg-icon-md">\
        //                                             <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
        //                                                 <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
        //                                                     <rect x="0" y="0" width="24" height="24"/>\
        //                                                     <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero"\ transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>\
        //                                                     <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>\
        //                                                 </g>\
        //                                             </svg>\
        //                                         </span>\
        //                                     </a>\
        //                                     <a href="javascript:;" data-id="'+index+'" class="btn btn-sm btn-clean btn-icon btnDelete" title="Delete">\
        //                                         <i class="fa fa-trash"></i>\
        //                                     </a>\
        //                                 ';
        //                         },
        //                     }
        //                 ]
        //             }
        //         }
        //     },
        //     mounted() {
        //         this.initCardPencarian();
        //         let vm = this;
        //         this.initDataTable()

        //         $(document).on('click','.btnEdit', function() {
        //             const unique = $(this).data('id')
        //             window.location.href = vm.urls.base+`/edit?q=${unique}`
        //         })
        //     }, 
        //     methods: {
        //         initCardPencarian: function() {
        //             this.elements.card_collapser = $('#card_collapser')
        //             let card = new KTCard('card_pencarian');
        //             let vm = this
        //             card.on('afterCollapse', function(card) {
        //                 vm.changeCardShownStatus(false)
        //             })
        //             card.on('afterExpand', function(card) {
        //                 vm.changeCardShownStatus(true)
        //             })
                    
        //             this.elements.cardPencarian  = card;
        //         }, 
        //         changeCardShownStatus: function(value) {
        //             this.status.cardShown = value
        //         },
        //         initDataTable: async function() {
        //             let vm = this
        //             let url = `${this.urls.get_member}`
        //             this.elements.dataTableMember = $('#kt_datatable');              
        //             if(this.elements.ktdt != null) {
        //                 // this.elements.ktdt.destroy();
        //                 swal.fire({
        //                     title: "Loading",
        //                     text: "Mengambil data"
        //                 })
        //                 swal.showLoading();
        //                 this.elements.ktdt.setDataSourceParam('no_reg', this.form.no_registrasi);
        //                 this.elements.ktdt.setDataSourceParam('tahun_daftar', this.form.tahun_daftar);
        //                 this.elements.ktdt.setDataSourceParam('jurusan_slug', this.form.jurusan);
        //                 this.elements.ktdt.load()
        //                 return;
        //             }
        //             console.log("ELEMENT",this.elements.dataTableMember)
                    
        //             this.elements.ktdt = CDatatableRemoteAjax.init(this.elements.dataTableMember, url, this.config.dataTable.columns);
        //             this.elements.ktdt.on('datatable-on-ajax-done', function(event, data) {
        //                 vm.dataBase.daftar_member = data;
        //             })
        //             this.elements.ktdt.on('datatable-on-reloaded', function() {
        //                 swal.close();
        //             })
        //         },
        //         initDataTableToolbar: function() {
        //             this.elements.filterTableNama = $('#filterTableNama')
        //             this.elements.filterTableNoReg = $('#filterTableNoReg')
        //             this.elements.filterTableJurusan = $('#filterTableJurusan')
        //             this.elements.filterTableSekolah = $('#filterTableSekolah')
        //             console.log("initializing datatable toolbar", this.elements.filterTableNama)
        //             CDataTable.initSearch(this.elements.dataTableMember, this.elements.filterTableNama, 'nama')
        //             CDataTable.initSearch(this.elements.dataTableMember, this.elements.filterTableNoReg, 'no_reg')
        //             CDataTable.initSearch(this.elements.dataTableMember, this.elements.filterTableJurusan, 'jurusan')
        //             CDataTable.initSearch(this.elements.dataTableMember, this.elements.filterTableSekolah, 'tipe')
        //         },
        //         resetFilterTable() {
        //             this.elements.filterTableNama.val(null)
        //             this.elements.filterTableNoReg.val(null)
        //             // this.elements.dataTableMember.reload();
        //         },
        //         fetchDB() {
        //             this.elements.card_collapser.trigger('click')
        //             let vm = this;
        //             this.initDataTable()
        //             .then(() => {
        //                 vm.initDataTableToolbar();    
        //             });
        //         }
        //     }
        // })
    </script>

@endsection
