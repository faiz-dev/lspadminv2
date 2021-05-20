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
                        <h3 class="card-label">Edit Data Asesor</h3>
                    </div>
                    <div class="card-toolbar">
                        
                    </div>
                </div>
            </div>

            <div class="card border-1 mb-4" id="kt_form_account_wrapper">
                
                @if ($errors->any())
                    <div class="alert alert-danger mb-5" role="alert">
                        @foreach ($errors->all() as $error)
                            {{ $error }} <br>
                        @endforeach
                    </div>
                @endif

                @if (Session::has('success'))
                    <div class="alert alert-success">
                        {{Session::get('success')}}
                    </div>
                @endif
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">Data Akun</h3>
                    </div>
                </div>
                <div class="card-body">
                    
                    <form class="form" method="POST" novalidate="novalidate" id="kt_form_account" action="{{ route('pengaturan.member.asesor.update-account', ['uid' => $data_member->uid]) }}">
                        @csrf
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="unique" value="{{$data_member->uid}}">
                        
                        <div class="form-group row">
                            <label class="col-12 col-md-2">MET Asesor</label>
                            <div class="col-12 col-md-9">
                                <input type="text" class="form-control" name="met" placeholder="Nomor Registrasi BNSP (MET)" value="{{$data_member->asesor->met}}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12 col-md-2">LSP Induk</label>
                            <div class="col-12 col-md-9">
                                <select name="lsp_induk" id="" class="form-control" required>
                                    <option value="">Pilih Induk</option>
                                    @foreach ($daftar_sekolah as $skl)
                                    <option value="{{ $skl->uid }}" {{ $skl->id == $data_member->asesor->lsp_induk ? "selected" : ""}} >{{$skl->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12 col-md-2">Email</label>
                            <div class="col-12 col-md-9">
                                <input type="email" class="form-control" name="email" placeholder="Email" readonly value="{{$data_member->email}}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12 col-md-2">Password</label>
                            <div class="col-12 col-md-9">
                                <input type="password" class="form-control" name="password" placeholder="Password (isikan jika ingin diubah">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12 col-md-2">Confirm Password</label>
                            <div class="col-12 col-md-9">
                                <input type="password" class="form-control" name="password_confirmation" placeholder="Password (isikan jika ingin diubah">
                            </div>
                        </div>
                    </form>

                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-secondary">Batalkan</button>
                    <button class="btn btn-success" type="submit" id="btnSimpanAkun">Simpan Member</button>
                </div>
            </div>

            <div class="card border-1 " id="kt_form_wrapper">
                <div class="card-body">
                    <form class="form" method="post" action="{{ route('pengaturan.member.asesor.update-profile', ['uid' => $data_member->uid]) }}" novalidate="novalidate" id="kt_form">
                        @csrf
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="unique" value="{{$data_member->uid}}">
                        <h3 class="card-label">Data Profil</h3>
                        
                        <div class="form-group row">
                            <label for="nik" class="col-12 col-md-2">NIK</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="nik" placeholder="Nomor Induk Kependudukan" value="{{ $data_member->dataDiri->nik }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12 col-md-2">No Telpon</label>
                            <div class="col-12 col-md-9">
                                <input type="text" class="form-control" name="no_telp" placeholder="No Telpon" value="{{$data_member->dataDiri->no_telp}}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama" class="col-12 col-md-2">Nama Lengkap</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" value="{{ $data_member->dataDiri->nama }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="gelar" class="col-12 col-md-2 col-form-label">Gelar Depan</label>
                            <div class=" col-md-2">
                                <input type="text" class="form-control" name="gelar_depan" placeholder="Gelar Depan">
                            </div>
                            <label for="gelar" class="col-12 col-md-1 col-form-label">Gelar Belakang</label>
                            <input type="text" class="form-control col-md-2" name="gelar_belakang" placeholder="Gelar Belakang" value="{{ $data_member->dataDiri->gelar_belakang }}">
                        </div>
                        <div class="form-group row">
                            <label for="nik" class="col-12 col-md-2 ">Jenis Kelamin</label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <input data-switch="true" name="jenis_kelamin" type="checkbox" {{ $data_member->dataDiri->jenis_kelamin == 'L' ? 'checked="checked"' : '' }}" data-on-text="Laki-laki" data-off-text="Perempuan" data-off-color="success"   />
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="tempat_lahir" class="col-12 col-md-2">Tempat Lahir</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat Tempat Lahir" value="{{ $data_member->dataDiri->tempat_lahir }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tanggal_lahir" class="col-12 col-md-2">Tanggal Lahir</label>
                            <div class="col-md-6">
                                <input type="date" class="form-control" name="tanggal_lahir" placeholder="Tanggal Lahir" value="{{ date('Y-m-d', strtotime($data_member->dataDiri->tanggal_lahir)) }}">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="pendidikan_terakhir" class="col-12 col-md-2">Pendidikan Terakhir</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="pendidikan_terakhir" placeholder="Pendidikan Pendidikan Terakhir" value="{{ $data_member->dataDiri->pendidikan_terakhir }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="kewarganegaraan" class="col-12 col-md-2">Kewarganegaraan</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="kewarganegaraan" placeholder="Kewarganegaraan" value="{{ $data_member->dataDiri->kewarganegaraan }}">
                            </div>
                        </div>

                        <h4 class="card-label">Pekerjaan</h4>
                        <div class="form-group row">
                            <label for="pekerjaan_instansi" class="col-12 col-md-2">Instansi</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="pekerjaan_instansi" placeholder="Instansi" value="{{ $data_member->dataDiri->pekerjaan_instansi }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pekerjaan_jabatan" class="col-12 col-md-2">Jabatan</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="pekerjaan_jabatan" placeholder="Jabatan" value="{{ $data_member->dataDiri->pekerjaan_jabatan }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="pekerjaan_alamat" class="col-12 col-md-2">Alamat</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="pekerjaan_alamat" placeholder="Alamat" value="{{ $data_member->dataDiri->pekerjaan_alamat }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="pekerjaan_telp" class="col-12 col-md-2">Nomor Telp</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="pekerjaan_telp" placeholder="Nomor Telp" value="{{ $data_member->dataDiri->pekerjaan_telp }}">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="pekerjaan_kode_pos" class="col-12 col-md-2">Kode Pos</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="pekerjaan_kode_pos" placeholder="Kode Pos" value="{{ $data_member->dataDiri->pekerjaan_kode_pos }}">
                            </div>
                        </div>

                        <h4 class="card-label">Data KTP</h4>
                        <div class="form-group row">
                            <label for="ktp_alamat" class="col-12 col-md-2">Alamat KTP Asesi</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="ktp_alamat" placeholder="Alamat KTP Asesi" value="{{ $data_member->dataDiri->ktp_alamat }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ktp_provinsi" class="col-12 col-md-2">Provinsi KTP</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="ktp_provinsi" placeholder="Provinsi KTP" value="{{ $data_member->dataDiri->ktp_provinsi }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ktp_kota" class="col-12 col-md-2">Kota KTP</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="ktp_kota" placeholder="Kota KTP" value="{{ $data_member->dataDiri->ktp_kota }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ktp_kode_pos" class="col-12 col-md-2">Kode Pos KTP</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="ktp_kode_pos" placeholder="Kode Pos KTP" value="{{ $data_member->dataDiri->ktp_kode_pos }}">
                            </div>
                        </div>

                        <h4 class="card-label">Domisili</h4>

                        <div class="form-group row">
                            <label for="domisili_alamat" class="col-12 col-md-2">Alamat Domisili Asesor</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="domisili_alamat" placeholder="Alamat Domisili Asesi" value="{{ $data_member->dataDiri->domisili_alamat }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="domisili_provinsi" class="col-12 col-md-2">Provinsi Domisili</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="domisili_provinsi" placeholder="Provinsi Domisili" value="{{ $data_member->dataDiri->domisili_provinsi }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="domisili_kota" class="col-12 col-md-2">Kota Domisili</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="domisili_kota" placeholder="Kota Domisili" value="{{ $data_member->dataDiri->domisili_kota }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="domisili_kode_pos" class="col-12 col-md-2">Kode Pos Domisili</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="domisili_kode_pos" placeholder="Kode Pos Domisili" value="{{ $data_member->dataDiri->domisili_kode_pos }}">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-right">
                    <!--begin::Button-->
                    <button id="btnSubmit" form="kt_form" type="submit" class="btn btn-success font-weight-bolder">
                        <i class="fa fa-save"></i>
                        Simpan Data Diri Asesor
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
        // let form = KTUtil.getById('kt_form')
        let formAkun = KTUtil.getById('kt_form_account')
        let currentAccount = {}
        validation_form_account = FormValidation.formValidation(formAkun, {
            fields: { 
                met: {
                    validators: {
                        notEmpty: {
                            message: 'Tidak boleh kosong'
                        }
                    }
                },
                email: {
                    validators: {
                        notEmpty: {
                            message: 'Tidak boleh kosong'
                        },
                        emailAddress: {
                            message: 'Format Email harus benar'
                        }
                    }
                }, 
                lsp_induk: {
                    validators: {
                        notEmpty: {
                            message: 'Tidak boleh kosong'
                        }
                    }
                },
            },
            
            plugins: {
                trigger: new FormValidation.plugins.Trigger(),
                defaultSubmit: new FormValidation.plugins
                        .DefaultSubmit(), // Uncomment this line to enable normal button submit after form validation
                bootstrap: new FormValidation.plugins.Bootstrap()
            }
        })

        $('#btnSimpanAkun').on('click', function(e) {
            validation_form_account.validate().then(function(status) {
                if(status == 'Valid') {
                    swal.fire({
                        text: "Menyimpan data",
                        icon: "Info",
                    })
                    swal.showLoading();
                } else {
                    swal.fire({
                        text: "Maaf, terjadi kesalahan, silakan isikan form dengan benar.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok",
                        customClass: {
                            confirmButton: "btn font-weight-bold btn-light-primary"
                        }
                    }).then(function() {
                        KTUtil.scrollTop();
                    });
                }
            })
        })

        

        // $('#btnSimpanAkun').on('click', function(e) {
        //     validation_form_account.validate().then(function(status) {
        //         if(status == 'Valid') {
        //             alert("OK Valid 1")
        //             swal.fire({
        //                 text: "Akun member telah dibah",
        //                 icon: "success",
        //                 confirmButtonText: "OK",
        //                 cancelButtonText: 'Keluar',
        //                 showCloseButton: true,
        //                 showCancelButton: true,
        //             }).then(function(confirm) {
        //                 console.log("update finish")
        //                 // if(confirm.value) {
        //                 //     $('#kt_form_wrapper').removeClass('d-none')
        //                 //     $('#kt_form_account_wrapper').addClass('d-none')
        //                 // } else {

        //                 // }
        //             });
        //         } else {
        //             swal.fire({
        //                 text: "Maaf, terjadi kesalahan, silakan isikan form dengan benar.",
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
        // })


        $('input[name="jenis_kelamin"]').bootstrapSwitch({
            onSwitchChange: function(e) {
                
            }
        })

       
    </script>
@endsection
