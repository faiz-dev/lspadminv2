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


            <div class="card border-1 mb-4" id="kt_form_wrapper">
                
                <div class="card-body">
                    <form class="form" method="post" action="{{ route('mcert.store') }}" novalidate="novalidate" id="kt_form">
                        @csrf
                        <h3 class="card-label">Data Profil Sertifikasi</h3>
                        <div class="form-group row">
                            <label class="col-12 col-md-2">MET Asesor</label>
                            <div class="col-12 col-md-9">
                                <input type="text" class="form-control" name="met" placeholder="Nomor Registrasi BNSP (MET)" value="MET.000.004306 2019">
                            </div>
                        </div>
                        

                        <h4 class="card-label">Skema</h4>
                        <div class="form-group row">
                            <label for="pekerjaan_instansi" class="col-12 col-md-2">Instansi</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="pekerjaan_instansi" placeholder="Instansi" value="SMK N 1 Kandeman">
                            </div>
                        </div>
                        

                        <h4 class="card-label">TUK</h4>
                        <div class="form-group row">
                            <label for="domisili_alamat" class="col-12 col-md-2">Alamat sama dengan KTP ? </label>
                            <div class="col-md-6">
                                <input data-switch="true" id="sama_ktp" name="sama_ktp" type="checkbox" data-on-text="Sama" data-off-text="Berbeda" data-off-color="success"   />
                            </div>
                        </div>

                        <h4 class="card-label">Asesor</h4>
                        <div class="form-group row">
                            <label for="domisili_alamat" class="col-12 col-md-2">Alamat sama dengan KTP ? </label>
                            <div class="col-md-6">
                                <input data-switch="true" id="sama_ktp" name="sama_ktp" type="checkbox" data-on-text="Sama" data-off-text="Berbeda" data-off-color="success"   />
                            </div>
                        </div>

                        
                    </form>
                </div>
                <div class="card-footer text-right">
                    <!--begin::Button-->
                    <button id="btnSubmit" type="button" class="btn btn-success font-weight-bolder">
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
        let form = KTUtil.getById('kt_form')
        let formAkun = KTUtil.getById('kt_form_account')
        let currentAccount = {}

        validation_form = FormValidation.formValidation(form, {
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
                password: {
                    validators: {
                        notEmpty: {
                            message: 'Tidak boleh kosong'
                        },
                        stringLength: {
                            min: 8,
                            message: "Minimal 8 Karakter"
                        }
                    }
                },
                tipe: {
                    validators: {
                        notEmpty: {
                            message: 'Tidak boleh kosong'
                        }
                    }
                },
                nik: {
                    validators: {
                        notEmpty: {
                            message: 'Tidak boleh Kosong'
                        }
                    }
                },
                no_telp: {
                    validators: {
                        notEmpty: {
                            message: 'Tidak boleh Kosong'
                        }
                    }
                },
                nama: {
                    validators: {
                        notEmpty: {
                            message: 'Tidak boleh Kosong'
                        }
                    }
                },
                gelar_depan: {
                    validators: {
                        stringLength: {
                            max: 3,
                            message: 'Maksimal 10 Karakter'
                        }
                    }
                },
                gelar_belakng: {
                    validators: {
                        stringLength: {
                            max: 10,
                            message: 'Maksimal 10 Karakter'
                        }
                    }
                },
                tempat_lahir: {
                    validators: {
                        stringLength: {
                            max: 10,
                            message: 'Maksimal 10 Karakter'
                        }
                    }
                },
                tanggal_lahir: {
                    validators: {
                        notEmpty: {
                            message: 'Tidak boleh Kosong'
                        }
                    }
                },
                pendidikan_terakhir: {
                    validators: {
                        notEmpty: {
                            message: 'Tidak boleh Kosong'
                        },
                        stringLength: {
                            max: 10,
                            message: 'Maksimal 10 Karakter'
                        }
                    }
                },
                kewarganegaraan: {
                    validators: {
                        stringLength: {
                            max: 20,
                            message: 'Maksimal 20 Karakter'
                        }
                    }
                },
                pekerjaan_instansi: {
                    validators: {
                        notEmpty: {
                            message: 'Tidak boleh Kosong'
                        },
                        stringLength: {
                            max: 50,
                            message: 'Maksimal 50 Karakter'
                        }
                    }
                },
                pekerjaan_jabatan: {
                    validators: {
                        notEmpty: {
                            message: 'Tidak boleh Kosong'
                        },
                        stringLength: {
                            max: 30,
                            message: 'Maksimal 30 Karakter'
                        }
                    }
                },
                pekerjaan_alamat: {
                    validators: {
                        notEmpty: {
                            message: 'Tidak boleh Kosong'
                        },
                        stringLength: {
                            max: 250,
                            message: 'Maksimal 250 Karakter'
                        }
                    }
                },
                pekerjaan_telp: {
                    validators: {
                        notEmpty: {
                            message: 'Tidak boleh Kosong'
                        },
                        stringLength: {
                            max: 20,
                            message: 'Maksimal 20 Karakter'
                        }
                    }
                },
                pekerjaan_kode_pos: {
                    validators: {
                        notEmpty: {
                            message: 'Tidak boleh Kosong'
                        },
                        stringLength: {
                            max: 7,
                            message: 'Maksimal 7 Karakter'
                        }
                    }
                },
                domisili_alamat: {
                    validators: {
                        notEmpty: {
                            message: 'Tidak boleh Kosong'
                        },
                        stringLength: {
                            max: 250,
                            message: 'Maksimal 250 Karakter'
                        }
                    }
                },
                domisili_provinsi: {
                    validators: {
                        notEmpty: {
                            message: 'Tidak boleh Kosong'
                        },
                        stringLength: {
                            max: 20,
                            message: 'Maksimal 20 Karakter'
                        }
                    }
                },
                domisili_kota: {
                    validators: {
                        notEmpty: {
                            message: 'Tidak boleh Kosong'
                        },
                        stringLength: {
                            max: 30,
                            message: 'Maksimal 30 Karakter'
                        }
                    }
                },
                domisili_kode_pos: {
                    validators: {
                        notEmpty: {
                            message: 'Tidak boleh Kosong'
                        },
                        stringLength: {
                            max: 10,
                            message: 'Maksimal 10 Karakter'
                        }
                    }
                },
                ktp_alamat: {
                    validators: {
                        notEmpty: {
                            message: 'Tidak boleh Kosong'
                        }
                    }
                },
                ktp_provinsi: {
                    validators: {
                        notEmpty: {
                            message: 'Tidak boleh Kosong'
                        },
                        stringLength: {
                            max: 20,
                            message: 'Maksimal 20 Karakter'
                        }
                    }
                },
                ktp_kota: {
                    validators: {
                        notEmpty: {
                            message: 'Tidak boleh Kosong'
                        },
                        stringLength: {
                            max: 30,
                            message: 'Maksimal 30 Karakter'
                        }
                    }
                },
                ktp_kode_pos: {
                    validators: {
                        notEmpty: {
                            message: 'Tidak boleh Kosong'
                        },
                        stringLength: {
                            max: 7,
                            message: 'Maksimal 7 Karakter'
                        }
                    }
                }
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
                        text: "Akun member telah dibuat dengan email tersebut, isi data diri atau keluar?",
                        icon: "success",
                        confirmButtonText: "Isi data Diri",
                        cancelButtonText: 'Keluar',
                        showCloseButton: true,
                        showCancelButton: true,
                    }).then(function(confirm) {
                        if(confirm.value) {
                            $('#kt_form_wrapper').removeClass('d-none')
                            $('#kt_form_account_wrapper').addClass('d-none')
                        } else {

                        }
                    });
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

        $('#btnSubmit').on('click', function(e) {
            
            validation_form.validate().then(function(status) {
                if(status == 'Valid') {
                    alert("OK Valid")
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
