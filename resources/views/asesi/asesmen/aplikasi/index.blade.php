{{-- Extends layout --}}
@extends('layouts.member')

{{-- Content --}}
@section('content')

    {{-- Dashboard 1 --}}

    <div class="row" id="app">
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
                elements: {
                    dataTablePendaftaran: null,
                },
                dataBase: {
                    daftarUji: JSON.parse(`{!! json_encode($daftar_pendaftaran) !!}`)
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
                vm.initDataTable();
            }, 
            methods: {
                initDataTable: async function() {
                    this.elements.dataTablePendaftaran = $('#ktdt_pendaftaran');
                    console.log(this.elements.dataTablePendaftaran)
                    CDataTable.init(this.elements.dataTablePendaftaran, this.dataBase.daftarUji, this.config.dataTable.columns);
                }
            }
        })
    </script>
@endsection
