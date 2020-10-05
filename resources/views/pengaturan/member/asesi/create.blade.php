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
                            <h3 class="card-label">Tambah Asesi Baru</h3>
                        </div>
                        <div class="card-toolbar">
                            <!--begin::Button-->
                            <button id="btnSubmit" type="button" class="btn btn-primary font-weight-bolder">
                                <i class="fa fa-save"></i>
                                Simpan
                            </button>
                            <!--end::Button-->
                        </div>
                    </div>
                    
                </div>

                <div class="card border-1 mb-4">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">Data Diri</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form class="form" method="post" novalidate="novalidate" id="kt_form_umum">
                            <div class="form-group row">
                                <label for="nik" class="col-12 col-md-2">NIK</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="nik" placeholder="Nomor Induk Kependudukan">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama" class="col-12 col-md-2">Nama Lengkap</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="gelar" class="col-12 col-md-2 col-form-label">Gelar Depan</label>
                                <div class=" col-md-2">
                                    <input type="text" class="form-control" name="gelar_depan" placeholder="Gelar Depan">
                                </div>
                                <label for="gelar" class="col-12 col-md-1 col-form-label">Gelar Belakang</label>
                                <input type="text" class="form-control col-md-2" name="gelar_belakang" placeholder="Gelar Belakang">
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
                                    <input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat Tempat Lahir">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tanggal_lahir" class="col-12 col-md-2">Tanggal Lahir</label>
                                <div class="col-md-6">
                                    <input type="date" class="form-control" name="tanggal_lahir" placeholder="Tanggal Tanggal Lahir">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="pendidikan_terakhir" class="col-12 col-md-2">Pendidikan Terakhir</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="pendidikan_terakhir" placeholder="Pendidikan Pendidikan Terakhir">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="kewarganegaraan" class="col-12 col-md-2">Kewarganegaraan</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="kewarganegaraan" placeholder="Kewarganegaraan">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card border-1 mb-4">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">Data Pekerjaan</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form class="form" method="post" novalidate="novalidate" id="kt_form_pekerjaan">
                            <div class="form-group row">
                                <label for="pekerjaan_instansi" class="col-12 col-md-2">Instansi</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="pekerjaan_instansi" placeholder="Instansi">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="pekerjaan_jabatan" class="col-12 col-md-2">Jabatan</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="pekerjaan_jabatan" placeholder="Jabatan">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="pekerjaan_alamat" class="col-12 col-md-2">Alamat</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="pekerjaan_alamat" placeholder="Alamat">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="pekerjaan_telp" class="col-12 col-md-2">Nomor Telp</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="pekerjaan_telp" placeholder="Nomor Telp">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="pekerjaan_kode_pos" class="col-12 col-md-2">Kode Pos</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="pekerjaan_kode_pos" placeholder="Kode Pos">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card border-1 mb-4">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">Data Domisili</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form class="form" method="post" novalidate="novalidate" id="kt_form_domisili">
                            <div class="form-group row">
                                <label for="domisili_alamat" class="col-12 col-md-2">Alamat Domisili Asesi</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="domisili_alamat" placeholder="Alamat Domisili Asesi">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="domisili_provinsi" class="col-12 col-md-2">Provinsi Domisili</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="domisili_provinsi" placeholder="Provinsi Domisili">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="domisili_kota" class="col-12 col-md-2">Kota Domisili</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="domisili_kota" placeholder="Kota Domisili">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="domisili_kode_pos" class="col-12 col-md-2">Kode Pos Domisili</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="domisili_kode_pos" placeholder="Kode Pos Domisili">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card border-1 mb-4">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">Data KTP</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form class="form" method="post" novalidate="novalidate" id="kt_form_ktp">
                            <div class="form-group row">
                                <label for="ktp_alamat" class="col-12 col-md-2">Alamat KTP Asesi</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="ktp_alamat" placeholder="Alamat KTP Asesi">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="ktp_provinsi" class="col-12 col-md-2">Provinsi KTP</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="ktp_provinsi" placeholder="Provinsi KTP">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="ktp_kota" class="col-12 col-md-2">Kota KTP</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="ktp_kota" placeholder="Kota KTp">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="ktp_kode_pos" class="col-12 col-md-2">Kode Pos KTP</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="ktp_kode_pos" placeholder="Kode Pos KTP">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>

@endsection


{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ url('js/custom/bootstrapswitch/bootstrapswitch.js') }}"></script>
    <script>
        KTBootstrapSwitch.init()
        let validation = [];
        let form_umum = KTUtil.getById('kt_form_umum')
        let form_pekerjaan = KTUtil.getById('kt_form_pekerjaan')
        let form_domisili = KTUtil.getById('kt_form_domisili')
        let form_ktp = KTUtil.getById('kt_form_ktp')
        validation[0] = FormValidation.formValidation(form_umum, {
            fields: {
                nik: {
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
                }
            },
            plugins: {
                trigger: new FormValidation.plugins.Trigger(),
                defaultSubmit: new FormValidation.plugins
                        .DefaultSubmit(), // Uncomment this line to enable normal button submit after form validation
                bootstrap: new FormValidation.plugins.Bootstrap()
            }
        })

        validation[1] =  FormValidation.formValidation(form_pekerjaan, {
            fields: {
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
                }
            },
            plugins: {
                trigger: new FormValidation.plugins.Trigger(),
                defaultSubmit: new FormValidation.plugins
                        .DefaultSubmit(), // Uncomment this line to enable normal button submit after form validation
                bootstrap: new FormValidation.plugins.Bootstrap()
            }
        })
        validation[2] =  FormValidation.formValidation(form_domisili, {
            fields: {
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
                }
            },
            plugins: {
                trigger: new FormValidation.plugins.Trigger(),
                defaultSubmit: new FormValidation.plugins
                        .DefaultSubmit(), // Uncomment this line to enable normal button submit after form validation
                bootstrap: new FormValidation.plugins.Bootstrap()
            }
        })

        validation[3] =  FormValidation.formValidation(form_ktp, {
            fields: {
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

        $('#btnSubmit').on('click', function(e) {
            
            const promise0 = validation[0].validate()
            const promise1 = validation[1].validate()
            const promise2 = validation[2].validate()
            const promise3 = validation[3].validate()

            Promise.all([promise0, promise1, promise2, promise3]).then((res1, res2, res3, res4) => {
                console.log(res1, res2, res3, res4)
            })
            // validation[0].validate().then(function(status) {
            //     if (status == 'Valid') {
            //         $('#btnSubmit').submit();
            //     } else {
            //         swal.fire({
            //             text: "Maaf, terjadi kesalahan, silakan coba lagi.",
            //             icon: "error",
            //             buttonsStyling: false,
            //             confirmButtonText: "Ok",
            //             customClass: {
            //                 confirmButton: "btn font-weight-bold btn-light-primary"
            //             }
            //         }).then(function() {
            //             KTUtil.scrollTop();
            //         });
            //     }
            // });
        });

    </script>
@endsection
