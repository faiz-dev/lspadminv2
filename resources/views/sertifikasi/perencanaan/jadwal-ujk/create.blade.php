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
                        <h3 class="card-label">Penjadwalan UJK untuk Sertifikasi</h3>
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
                    <h3>Data Sertifikasi</h3>
                    
                    <table class="table">
                        <tr>
                            <td width="200">Judul</td>
                            <td><b>{{ $sertifikasi->nama }}</b></td>
                        </tr>
                        <tr>
                            <td>Tempat</td>
                            <td>{{ $sertifikasi->tuk->nama }}</td>
                        </tr>
                        <tr>
                            <td>Sekolah Peserta</td>
                            <td>{{ $sertifikasi->sekolah->nama }}</td>
                        </tr>
                        <tr>
                            <td>Tanggal</td>
                            <td>{{ date("d-F-Y", strtotime($sertifikasi->tgl_awal)) }} s.d. 
                                {{ date("d-F-Y", strtotime($sertifikasi->tgl_akhir)) }}</td>
                        </tr>
                    </table>
                    <form method="POST" action="{{ route('jadwal-ujk.store') }}?crt={{ $sertifikasi->uid }}"  id="kt_form">
                        @csrf
                        <h3>Data Uji</h3>
                        <div class="form-group row">
                            <label class="col-12 col-md-2">Asesor</label>
                            <div class="col-12 col-md-9">
                                <select name="asesor" class="form-control" required>
                                    <option value="">Pilih Asesor</option>
                                    @foreach ($daftar_asesor as $asesor)
                                    <option value="{{ $asesor->uid }}">{{$asesor->nama_lengkap}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-12 col-md-2">Tanggal Uji</label>
                            <div class="col-12 col-md-9">
                                <input type="date" class="form-control" name="tanggal" required min="{{ $sertifikasi->tgl_awal }}" max="{{ $sertifikasi->tgl_akhir }}">
                            </div>
                        </div>

                        <h3>Asesi</h3>
                        <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#pilih_asesi">Pilih Asesi</button>
                        <div class="form-group">

                        </div>
                    </form>
                </div>
                
                <div class="card-footer text-right">
                    <!--begin::Button-->
                    <a href="{{ route('mcert.show', ['mcert' => $sertifikasi->uid]) }}" class="btnSimpan btn btn-info">
                        <i class="fa fa-save"></i>
                        Kembali
                    </a>
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


    

    <!-- Modal -->
    <div class="modal fade" id="pilih_asesi"  data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Pilih Asesi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    
                </div>
                <div class="modal-footer">
                    
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!--end::Card-->
    
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
