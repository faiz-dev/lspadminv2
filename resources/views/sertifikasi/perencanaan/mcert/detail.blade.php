{{-- Extends layout --}}
@extends('layouts.manager')

{{-- Content --}}
@section('content')

    {{-- Dashboard 1 --}}

    <div class="row">
        <div class="col-md-8 mb-5">            
            <div class="card border-1" id="kt_form_wrapper">
                

                <div class="card-body">
                    <h2 class="font-size-h4">{{ $sertifikasi->nama }} <i class="flaticon2-correct text-success icon-md ml-2"></i></h2>
                    <p class="lead">({{ $sertifikasi->deskripsi }})</p>
                    <div class="separator separator-dashed"></div>
                        <div class="separator separator-solid">
                    </div>
                    <table class="table table-striped mt-5">
                        <tr>
                            <td>Skema</td>
                            <td>{{ $sertifikasi->skema->nama }}</td>
                        </tr>
                        <tr>
                            <td>Tempat Uji Kompetensi</td>
                            <td>{{ $sertifikasi->tuk->nama }}</td>
                        </tr>
                        <tr>
                            <td>Sekolah Peserta</td>
                            <td>{{ $sertifikasi->sekolah->nama }}</td>
                        </tr>
                    </table>
                </div>

                <div class="card-footer text-right">
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-custom mb-5">
                <div class="card-header">
                    <div class="card-title">Status Rencana</div>
                    <div class="card-toolbar">
                        <div class="badge badge-success font-size-lg">
                            Rencana Aktif
                        </div>
                    </div>
                </div>
            </div>
            <div class="card card-custom">
                <div class="card-body">
                    <div class="mb-5">
                        <h3 class="font-size-h6">Rencana Jadwal</h3>
                        <div class="d-flex align-items-center mr-10">
                            <div class="mr-6">
                                <div class="font-weight-bold mb-2">Tanggal Mulai</div>
                                <span class="btn btn-sm btn-text btn-light-primary text-uppercase font-weight-bold">{{ date('d F Y', strtotime($sertifikasi->tgl_awal)) }}</span>
                            </div>
                            <div class="">
                                <div class="font-weight-bold mb-2">Tanggal Berakhir</div>
                                <span class="btn btn-sm btn-text btn-light-danger text-uppercase font-weight-bold">{{ date('d F Y', strtotime($sertifikasi->tgl_akhir)) }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5">
                        <h3 class="font-size-h6">Kuota Asesi & Pendaftar</h3>
                        <div class="d-flex align-items-center flex-wrap">
                            <!--begin: Item-->
                            <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                                <span class="mr-4">
                                    <i class="flaticon-piggy-bank icon-2x text-muted font-weight-bold"></i>
                                </span>
                                <div class="d-flex flex-column text-dark-75">
                                    <span class="font-weight-bolder font-size-sm">Kuota</span>
                                    <span class="font-weight-bolder font-size-h5">
                                    <span class="text-dark-50 font-weight-bold">{{ $sertifikasi->jml_asesi }} Asesi
                                </div>
                            </div>
                            <!--end: Item-->
                            <!--begin: Item-->
                            <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                                <span class="mr-4">
                                    <i class="flaticon-confetti icon-2x text-muted font-weight-bold"></i>
                                </span>
                                <div class="d-flex flex-column text-dark-75">
                                    <span class="font-weight-bolder font-size-sm">Terdaftar</span>
                                    <span class="font-weight-bolder font-size-h5">
                                    <span class="text-dark-50 font-weight-bold">20 Asesi
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 mb-5">
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">Kelengkapan Administrasi</div>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <td width="40">No</td>
                                <td>Jenis Kelengkapan</td>
                                <td>Keterangan</td>
                                <td>Status</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>SK Pelaksanaan Sertifikasi</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>SK Penetapan TUK</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Materi Uji Kompetensi</td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-12 mb-5">
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">Asesor & Jadwal Pelaksanaan</div>
                    <div class="card-toolbar">
                        <a href="{{ route('jadwal-ujk.create') }}?crt={{ $sertifikasi->uid }}"  class="btn btn-light-success mx-2 font-weight-bolder ">
                            <i class="flaticon-plus"></i>
                            Tambah Jadwal
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <td width="40">No</td>
                                <td width="170">Tanggal</td>
                                <td>Asesor</td>
                                {{-- <td>Daftar Asesi</td> --}}
                                <td>Surat Tugas</td>
                                <td>Status</td>
                                <td width="100">Aksi</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($daftar_jadwal as $key => $j)
                            <tr>
                                <td>{{$key + 1}}</td>
                                <td>{{ date("l, d F Y", strtotime($j->tgl_pelaksanaan))}}</td>
                                <td>{{$j->asesor_nama}} <br> {{ $j->asesor_met}} </td>
                                {{-- <td><a href="#">5 Asesi</a></td> --}}
                                <td>
                                    @if ($j->url_surat_tugas)
                                    <a href="#">/LSP/V/2021</a>
                                    @else
                                    <a href="#" class="btn btn-sm btn-primary">Generate</a>
                                    @endif
                                </td>
                                <td>{{$j->status}}</td>
                                <td>
                                    <button class="btn btn-sm btn-light-danger">Cancel</button>
                                </td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>


    
@endsection


{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ url('js/custom/bootstrapswitch/bootstrapswitch.js') }}"></script>
    <script>
        // KTBootstrapSwitch.init()
        let validation_form, validation_form_account;
        let form = KTUtil.getById('kt_form')
        let formAkun = KTUtil.getById('kt_form_account')
        let currentAccount = {}

        let asesor = [];


        $('.kt_form').on('submit', function(e) {
            swal.fire({
                title: "Loading",
                text: "Menyimpan data rencana sertifikasi",
            })
            swal.showLoading();
        })


        // $(document).on('change','#sama_ktp', function(e) {
        //     console.log(e)
        // })

    </script>
@endsection
