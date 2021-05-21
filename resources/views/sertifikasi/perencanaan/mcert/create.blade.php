{{-- Extends layout --}}
@extends('layouts.manager')

{{-- Content --}}
@section('content')

    {{-- Dashboard 1 --}}

    <div class="row">
        <div class="col-md-12">

            
            <div class="card card-custom gutter-b mb-4">
                <div class="card-header border-0">
                    <div class="card-title">
                        <h3 class="card-label">Tambah Rencana Sertifikasi Baru</h3>
                    </div>
                    <div class="card-toolbar">
                        
                    </div>
                </div>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger mb-5" role="alert">
                    @foreach ($errors->all() as $error)
                        {{ $error }} <br>
                    @endforeach
                </div>
            @endif
            
            <div class="card border-1 mb-4" id="kt_form_wrapper">
                
                <div class="card-body">
                    <form class="form" method="post" action="{{ route('mcert.store') }}" id="kt_form">
                        @csrf
                        <h3 class="card-label mb-5">Data Profil Sertifikasi</h3>
                        <div class="form-group row">
                            <label class="col-12 col-md-2">Judul Sertifikasi</label>
                            <div class="col-12 col-md-9">
                                <input type="text" class="form-control border border-success" name="judul" placeholder="Judul Sertifikasi" value="{{ old('judul', 'Pelaksanaan PSKK Paket 1 Tahun 2021') }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-12 col-md-2">Kuota Asesi</label>
                            <div class="col-12 col-md-9">
                                <input type="number" class="form-control border border-success" name="kuota" placeholder="Kuota Asesi (isikan 0 jika tidak dibatasi)"  value="{{ old('judul', '20') }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-12 col-md-2">Tanggal Awal</label>
                            <div class="col-12 col-md-9">
                                <input type="date" class="form-control border border-success" name="tgl_awal" value="{{ old('tgl_awal') }}" required>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-12 col-md-2">Tanggal Akhir</label>
                            <div class="col-12 col-md-9">
                                <input type="date" class="form-control border border-success" name="tgl_akhir" value="{{ old('tgl_akhir') }}" required>
                            </div>
                        </div>

                        <h4 class="card-label">Sekolah / Jejaring</h4>
                        <div class="form-group row">
                            <label for="pekerjaan_instansi" class="col-12 col-md-2">Nama Sekolah / Jejaring</label>
                            <div class="col-md-6">
                                <select name="sekolah" class="form-control border border-success" required>
                                    <option value="">Pilih Sekolah / Jejaring</option>
                                    @foreach ($daftar_sekolah as $skl)
                                    <option value="{{ $skl->uid }}"> {{$skl->nama}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <h4 class="card-label">Skema</h4>
                        <div class="form-group row">
                            <label for="pekerjaan_instansi" class="col-12 col-md-2">Skema Sertifikasi</label>
                            <div class="col-md-6">
                                <select name="skema" class="form-control border border-success" required>
                                    <option value="">Pilih Skema</option>
                                    @foreach ($daftar_skema as $skm)
                                    <option value="{{ $skm->uid }}"> {{$skm->nama}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        

                        <h4 class="card-label">TUK</h4>
                        <div class="form-group row">
                            <label for="pekerjaan_instansi" class="col-12 col-md-2">Tempat Uji Kompetensi</label>
                            <div class="col-md-6">
                                <select name="tuk" class="form-control border border-success" required>
                                    <option value="">Pilih TUK</option>
                                    @foreach ($daftar_tuk as $tuk)
                                    <option value="{{ $tuk->uid }}"> {{$tuk->nama}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{-- <h4 class="card-label">Data Asesor</h4>
                        <div class="row">
                            <div class="col-2">
                                <button class="btn btn-sm btn-info" type="button" data-toggle="modal" data-target="#modalPilihAsesor">Pilih Asesor</button>
                            </div>
                            <div class="col-6">
                                <table class="table table-sm table-bordered">
                                    <thead class="bg-secondary">
                                        <tr>
                                            <td width="40">No</td>
                                            <td >Nama</td>
                                            <td>No. Registrasi</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Amri Bustami</td>
                                            <td>MET. 000625 2019</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div> --}}

                        <h4 class="card-label">Keterangan</h4>
                        <div class="form-group row">
                            <label for="domisili_alamat" class="col-12 col-md-2">Keterangan </label>
                            <div class="col-md-6">
                                <textarea name="keterangan" rows="3" class="form-control border border-success"></textarea>
                            </div>
                        </div>

                        
                    </form>
                </div>
                <div class="card-footer text-right">
                    <!--begin::Button-->
                    <button form="kt_form" type="submit" name="mode" value="draft" class="btnSimpan btn btn-info">
                        <i class="fa fa-save"></i>
                        Simpan Draft
                    </button>
                    <button form="kt_form" type="submit" name="mode" value="submit" class="btnSimpan btn btn-success">
                        <i class="fa fa-save"></i>
                        Submit Rencana
                    </button>
                    <!--end::Button-->
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

        // $(document).ready(function() {
        //     console.log("WOOW");
        //     fetchAsesor()
            
        // })

        // let fetchAsesor = () => {
        //     return axios.get('{{ route("utils.asesor.get") }}')
        //         .then(response => {
        //             console.log(response.data)
        //         })
        // }


        $('.kt_form').on('submit', function(e) {
            swal.fire({
                title: "Loading",
                text: "Menyimpan data rencana sertifikasi",
            })
            swal.showLoading();
        })

        // $('#btnSubmit').on('click', function(e) {
            
        //     validation_form.validate().then(function(status) {
        //         if(status == 'Valid') {
        //             alert("OK Valid")
        //         } else {
        //             swal.fire({
        //                 text: "Maaf, terjadi kesalahan, silakan coba lagi.",
        //                 icon: "error",
        //                 buttonsStyling: false,
        //                 confirmButtonText: "Ok",
        //                 customClass: {
        //                     confirmButton: "btn font-weight-bold btn-light-primary"
        //                 }
        //             }).then(function() {
        //                 KTUtil.scrollTop();
        //             });
        //         }
        //     })
        // });

        $('input[name="jenis_kelamin"]').bootstrapSwitch({
            onSwitchChange: function(e) {
                
            }
        })

        $('#sama_ktp').bootstrapSwitch({
            onSwitchChange: function(e) {
                console.log(e.target.value)
                $('input[name="domisili_alamat"').val($('input[name="ktp_alamat"').val()).prop('disabled', true)
                $('input[name="domisili_provinsi"').val($('input[name="ktp_provinsi"').val()).prop('disabled', true)
                $('input[name="domisili_kota"').val($('input[name="ktp_kota"').val()).prop('disabled', true)
                $('input[name="domisili_kode_pos"').val($('input[name="ktp_kode_pos"').val()).prop('disabled', true)
            }
        })

        // $(document).on('change','#sama_ktp', function(e) {
        //     console.log(e)
        // })

    </script>
@endsection
