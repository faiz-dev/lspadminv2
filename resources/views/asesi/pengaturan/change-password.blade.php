{{-- Extends layout --}}
@extends('layouts.member')

{{-- Content --}}
@section('content')

    {{-- Dashboard 1 --}}

    <div class="row">
        <div class="col-12 col-md-9">
            <div class="card card-custom card-sticky" id="kt_page_sticky_card">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">Update Password Anda</h3>
                    </div>
                    <div class="card-toolbar">
                        {{-- <a href="{{route('asesi.welcome')}}" class="btn btn-light-primary font-weight-bolder mr-2">
                            <i class="ki ki-long-arrow-back icon-sm"></i>
                            Log Out
                        </a> --}}
                        <a class="btn btn-light-danger font-weight-bolder mr-2" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                                <i class="ki ki-close icon-sm"></i>
                                {{ __('Logout') }}
                            </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        <div class="btn-group">
                            <button type="button" id="btnSubmit" class="btn btn-primary font-weight-bolder">
                            <i class="ki ki-check icon-sm"></i>
                            Simpan Password
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-1"></div>
                        <div class="col-12 col-lg-10">
                            <form class="form" method="post" novalidate="novalidate" id="kt_form">
                                @csrf
                                <input type="hidden" name="_method" value="PUT">  
                                <span class="alert alert-custom bg-light-warning text-dark">
                                    Password lama anda tidak berlaku, tuliskan password baru anda untuk dapat menggunakan fasilitas pada website ini
                                </span>
                                <div class="form-group row">
                                    <label for="password" class="col-12 col-md-5">Password Baru<span class="reqstar">*</span> <br><small>Gunakan Password yang dapat anda ingat</small></label>
                                    <div class="col-md-7">
                                        <input type="password" class="form-control" name="password" placeholder="Password" title="Password">
                                    </div>
                                </div>
                                <div class="form-group row"> 
                                    <label for="nama" class="col-12 col-md-5">Konfirmasi Password<span class="reqstar">*</span> <small>Ketik kembali password baru anda</small></label>
                                    <div class="col-md-7">
                                        <input type="password" class="form-control" name="password_confirmation" placeholder="Konfirmasi Password" title="Konfirmasi Password">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


{{-- Scripts Section --}}
@section('scripts')
    <script>
        // KTBootstrapSwitch.init()
        let validation_form, validation_form_account;
        let form = KTUtil.getById('kt_form')
        let currentAccount = {}
        validation_form = FormValidation.formValidation(form, {
            fields: {
                password: {
                    validators: {
                        notEmpty: {
                            message: 'Tidak boleh Kosong'
                        },
                        stringLength: {
                            min:8,
                            max:16,
                            message: 'Panjang Minimal 8 dan maksimal 16 karakter'
                        }
                    }
                },
                password_confirmation: {
                    validators: {
                        identical: {
                            compare: function() {
                                return form.querySelector('[name="password"]').value;
                            },
                            message: 'The password and its confirm are not the same'
                        }
                    }
                }
            },
            plugins: {
                trigger: new FormValidation.plugins.Trigger(),                
                bootstrap: new FormValidation.plugins.Bootstrap()
            }
        })

        $('#btnSubmit').on('click', function(e) {
            
            validation_form.validate().then(function(status) {
                if(status == 'Valid') {
                    formData = new FormData(document.getElementById("kt_form"))
                    actionSubmit(formData)
                } else {
                    swal.fire({
                        text: "Maaf, terjadi kesalahan, silakan coba lagi.",
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
        });

        const actionSubmit = async function (formData) {
            swal.fire({
                text: "Mengirimkan data",
                icon: "info"
            })
            swal.showLoading();
            return axios.post('{{route("asesi.pengaturan.profil.action-password-reset")}}', formData)
                .then(response => {
                    console.log(response.data)
                    if(response.status == 200) {
                        swal.fire({
                            text: "Update Password Berhasil",
                            icon: "success",                            
                        }).then(function() {
                            KTUtil.scrollTop();
                            window.location.href = '{{ route('asesi.welcome') }}'
                        });  
                    }
                })
                .catch(e => {
                    swal.fire({
                        text: "Maaf, terjadi kesalahan, silakan coba lagi.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok",
                        customClass: {
                            confirmButton: "btn font-weight-bold btn-light-primary"
                        }
                    }).then(function() {
                        KTUtil.scrollTop();
                    });
                })
        }
    </script>
@endsection
