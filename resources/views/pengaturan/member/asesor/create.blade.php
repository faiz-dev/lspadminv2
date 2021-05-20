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
                        <h3 class="card-label">Tambah Asesor Baru</h3>
                    </div>
                    <div class="card-toolbar">
                        
                    </div>
                </div>
            </div>


            <div class="card border-1 mb-4" id="kt_form_wrapper">
                
                <div class="card-body">
                    <form class="form" method="post" action="{{ route('pengaturan.member.asesor.store') }}" novalidate="novalidate" id="kt_form">
                        @csrf
                        <h3 class="card-label">Data Akun</h3>
                        <div class="form-group row">
                            <label class="col-12 col-md-2">MET Asesor</label>
                            <div class="col-12 col-md-9">
                                <input type="text" class="form-control" name="met" placeholder="Nomor Registrasi BNSP (MET)" value="MET.000.004306 2019">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12 col-md-2">Email</label>
                            <div class="col-12 col-md-9">
                                <input type="email" class="form-control" name="email" placeholder="Email" value="amribustamismk@gmail.com">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12 col-md-2">No Telpon</label>
                            <div class="col-12 col-md-9">
                                <input type="text" class="form-control" name="no_telp" placeholder="No Telpon" value="087700860194">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12 col-md-2">Password</label>
                            <div class="col-12 col-md-9">
                                <input type="password" class="form-control" name="password" placeholder="Password" value="123456789">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12 col-md-2">LSP Induk</label>
                            <div class="col-12 col-md-9">
                                <select name="lsp_induk" id="" class="form-control">
                                    <option value="">Pilih Induk</option>
                                    @foreach ($daftar_sekolah as $skl)
                                    <option value="{{ $skl->uid }}">{{$skl->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <hr>
                        <h3 class="card-label">Profil</h3>
                        <div class="form-group row">
                            <label for="nik" class="col-12 col-md-2">NIK</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="nik" placeholder="Nomor Induk Kependudukan" value="33.25.10.280571.0001">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama" class="col-12 col-md-2">Nama Lengkap</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" value="Amri Bustami">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="gelar" class="col-12 col-md-2 col-form-label">Gelar Depan</label>
                            <div class=" col-md-2">
                                <input type="text" class="form-control" name="gelar_depan" placeholder="Gelar Depan">
                            </div>
                            <label for="gelar" class="col-12 col-md-1 col-form-label">Gelar Belakang</label>
                            <input type="text" class="form-control col-md-2" name="gelar_belakang" placeholder="Gelar Belakang" value="S. Pd.">
                        </div>
                        <div class="form-group row">
                            <label for="nik" class="col-12 col-md-2 ">Jenis Kelamin</label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <input data-switch="true" name="jenis_kelamin" type="checkbox" checked="checked" data-on-text="Laki-laki" data-off-text="Perempuan" data-off-color="success"   />
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="tempat_lahir" class="col-12 col-md-2">Tempat Lahir</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat Tempat Lahir" value="Sleman">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tanggal_lahir" class="col-12 col-md-2">Tanggal Lahir</label>
                            <div class="col-md-6">
                                <input type="date" class="form-control" name="tanggal_lahir" placeholder="Tanggal Tanggal Lahir" value="1971-05-28">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="pendidikan_terakhir" class="col-12 col-md-2">Pendidikan Terakhir</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="pendidikan_terakhir" placeholder="Pendidikan Pendidikan Terakhir" value="S1">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="kewarganegaraan" class="col-12 col-md-2">Kewarganegaraan</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="kewarganegaraan" placeholder="Kewarganegaraan" value="Indonesia">
                            </div>
                        </div>

                        <h4 class="card-label">Pekerjaan</h4>
                        <div class="form-group row">
                            <label for="pekerjaan_instansi" class="col-12 col-md-2">Instansi</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="pekerjaan_instansi" placeholder="Instansi" value="SMK N 1 Kandeman">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pekerjaan_jabatan" class="col-12 col-md-2">Jabatan</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="pekerjaan_jabatan" placeholder="Jabatan" value="Guru">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="pekerjaan_alamat" class="col-12 col-md-2">Alamat</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="pekerjaan_alamat" placeholder="Alamat" value="Jl. Raya Kandeman KM 04 Kabupaten Batang">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="pekerjaan_telp" class="col-12 col-md-2">Nomor Telp</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="pekerjaan_telp" placeholder="Nomor Telp" value="087700860194">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="pekerjaan_kode_pos" class="col-12 col-md-2">Kode Pos</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="pekerjaan_kode_pos" placeholder="Kode Pos" value="51261">
                            </div>
                        </div>

                        <h4 class="card-label">Data KTP</h4>
                        <div class="form-group row">
                            <label for="ktp_alamat" class="col-12 col-md-2">Alamat KTP Asesi</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="ktp_alamat" placeholder="Alamat KTP Asesi" value="Jl. Raya Kandeman KM 04 Kabupaten Batang">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ktp_provinsi" class="col-12 col-md-2">Provinsi KTP</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="ktp_provinsi" placeholder="Provinsi KTP" value="Jawa Tengah">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ktp_kota" class="col-12 col-md-2">Kota KTP</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="ktp_kota" placeholder="Kota KTP" value="Kabupaten Batang">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ktp_kode_pos" class="col-12 col-md-2">Kode Pos KTP</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="ktp_kode_pos" placeholder="Kode Pos KTP" value="51261">
                            </div>
                        </div>

                        <h4 class="card-label">Domisili</h4>
                        <div class="form-group row">
                            <label for="domisili_alamat" class="col-12 col-md-2">Alamat sama dengan KTP ? </label>
                            <div class="col-md-6">
                                <input data-switch="true" id="sama_ktp" name="sama_ktp" type="checkbox" data-on-text="Sama" data-off-text="Berbeda" data-off-color="success"   />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="domisili_alamat" class="col-12 col-md-2">Alamat Domisili Asesi</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="domisili_alamat" placeholder="Alamat Domisili Asesi" value="Jl. Raya Kandeman KM 04 Kabupaten Batang">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="domisili_provinsi" class="col-12 col-md-2">Provinsi Domisili</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="domisili_provinsi" placeholder="Provinsi Domisili" value="Jawa Tengah">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="domisili_kota" class="col-12 col-md-2">Kota Domisili</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="domisili_kota" placeholder="Kota Domisili" value="Kabupaten Batang">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="domisili_kode_pos" class="col-12 col-md-2">Kode Pos Domisili</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="domisili_kode_pos" placeholder="Kode Pos Domisili" value="51261">
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
