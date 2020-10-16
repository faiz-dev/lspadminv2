{{-- Extends layout --}}
@extends('layouts.member')

{{-- Content --}}
@section('content')

    {{-- Dashboard 1 --}}

    <div class="row">
        @if(Auth::user()->dataDiri != null)
        <div class="col-md-3">
                <div class="card card-custom mb-5">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">Ringkasan Data Member</h3>
                        </div>
                    </div> 
                    <div class="card-body p-1 pt-5 d-flex flex-column align-items-center profilebox">
                        <img src="{{ url("/media/users/300_21.jpg") }}" width="200px" alt="">

                        <table class="table mt-5">
                            <tr>
                                <td>Nama</td>
                                <td align="right">Alfian Faiz</td>
                            </tr>
                            <tr>
                                <td>Tipe Member</td>
                                <td align="right">Asesi</td>
                            </tr>
                            <tr>
                                <td>Instansi</td>
                                <td align="right">SMK Negeri 1 Kandeman</td>
                            </tr>
                            <tr>
                                <td>No REG</td>
                                <td align="right"><span class="label label-warning label-inline font-weight-bolder mr-2">0000014 2020</span></td>
                            </tr>
                        </table>
                        <button class="btn btn-block btn-light-primary font-weight-bolder">
                            <i class="flaticon2-photo-camera"></i> Ganti Foto
                        </button>
                        <button class="btn btn-block btn-light-primary font-weight-bolder">
                            <i class="flaticon-download"></i> Download Kartu member
                        </button>
                    </div>
                </div>
            </div>
        @else
            <div class="col-md-1"></div>
        @endif
        <div class="col-12 col-md-9">
            <div class="card card-custom card-sticky" id="kt_page_sticky_card">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">Data Profil Member</h3>
                    </div>
                    <div class="card-toolbar">
                        <a href="#" class="btn btn-light-primary font-weight-bolder mr-2">
                            <i class="ki ki-long-arrow-back icon-sm"></i>
                            Dashboard
                        </a>
                        <div class="btn-group">
                            <button type="button" id="btnSubmit" class="btn btn-primary font-weight-bolder">
                            <i class="ki ki-check icon-sm"></i>
                            Simpan Profil
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
                                <h4 class="card-label">Profil</h4>
                                <div class="form-group row">
                                    <label for="nik" class="col-12 col-md-3">NIK<span class="reqstar">*</span></label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="nik" placeholder="Nomor Induk Kependudukan" value="3326160810950003">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nama" class="col-12 col-md-3">Nama Lengkap<span class="reqstar">*</span></label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" value="alfian">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nik" class="col-12 col-md-3 ">Jenis Kelamin<span class="reqstar">*</span></label>
                                    <div class="col-lg-9 col-md-9 col-sm-12">
                                        <input data-switch="true" name="jenis_kelamin" type="checkbox" checked="checked" data-on-text="Laki-laki" data-off-text="Perempuan" data-off-color="success"   />
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="tempat_lahir" class="col-12 col-md-3">Tempat Lahir<span class="reqstar">*</span></label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat Tempat Lahir" value="pekalonga">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tanggal_lahir" class="col-12 col-md-3">Tanggal Lahir<span class="reqstar">*</span></label>
                                    <div class="col-md-6">
                                        <input type="date" class="form-control" name="tanggal_lahir" placeholder="Tanggal Tanggal Lahir">
                                    </div>
                                </div>

                                <h4 class="card-label">Pekerjaan</h4>
                                <div class="form-group row">
                                    <label for="pekerjaan_instansi" class="col-12 col-md-3">Instansi</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="pekerjaan_instansi" placeholder="Instansi" value="SMK Negeri 1 Kandeman" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="pekerjaan_jabatan" class="col-12 col-md-3">Jabatan</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="pekerjaan_jabatan" placeholder="Jabatan" value="Pelajar" readonly>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="jurusan" class="col-12 col-md-3">Jurusan</label>
                                    <div class="col-md-6">
                                        <select name="jurusan" class="form-control">
                                            <option value="">Pilih Jurusan</option>
                                            <option value="tav" selected>Teknik Audio Video</option>
                                            <option value="tkr">Teknik Kendaraan Ringan</option>
                                            <option value="tp">Teknik Pemesinan</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="kelas" class="col-12 col-md-3">Kelas</label>
                                    <div class="col-md-6">
                                        <select name="kelas" class="form-control">
                                            <option value="">Pilih Kelas</option>
                                            <option value="tav1" selected>XII TAV 1</option>
                                            <option value="tav2">XII TAV 2</option>
                                            <option value="tkro1">XII TKRO 1</option>
                                            <option value="tkro2">XII TKRO 2</option>
                                            <option value="tkro3">XII TKRO 3</option>
                                            <option value="tp1">XII TP 1</option>
                                            <option value="tp2">XII TP 2</option>
                                        </select>
                                    </div>
                                </div>
        
                                <div class="form-group row">
                                    <label for="pekerjaan_alamat" class="col-12 col-md-3">Alamat</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="pekerjaan_alamat" placeholder="Alamat" value="JL. Raya Kandeman KM 04 Kecamatan Kandeman" readonly>
                                    </div>
                                </div>
        
                                <div class="form-group row">
                                    <label for="pekerjaan_telp" class="col-12 col-md-3">Nomor Telp</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="pekerjaan_telp" placeholder="Nomor Telp" value="(0285) 392274" readonly>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="pekerjaan_kode_pos" class="col-12 col-md-3">Kode Pos</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="pekerjaan_kode_pos" placeholder="Kode Pos" value="51261" readonly>
                                    </div>
                                </div>
        
                                <h4 class="card-label">Data KTP</h4>
                                <div class="form-group row">
                                    <label for="ktp_alamat" class="col-12 col-md-3">Alamat KTP Asesi<span class="reqstar">*</span></label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="ktp_alamat" placeholder="Alamat KTP Asesi">
                                    </div>
                                </div>
        
                                <div class="form-group row">
                                    <label for="ktp_provinsi" class="col-12 col-md-3">Provinsi KTP<span class="reqstar">*</span></label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="ktp_provinsi" placeholder="Provinsi KTP">
                                    </div>
                                </div>
        
                                <div class="form-group row">
                                    <label for="ktp_kota" class="col-12 col-md-3">Kota KTP<span class="reqstar">*</span></label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="ktp_kota" placeholder="Kota KTp">
                                    </div>
                                </div>
        
                                <div class="form-group row">
                                    <label for="ktp_kode_pos" class="col-12 col-md-3">Kode Pos KTP<span class="reqstar">*</span></label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="ktp_kode_pos" placeholder="Kode Pos KTP">
                                    </div>
                                </div>
        
                                <h4 class="card-label">Domisili</h4>
                                <div class="form-group row">
                                    <label for="domisili_alamat" class="col-12 col-md-3">Apakah alamat anda <br>sama dengan alamat di KTP ? </label>
                                    <div class="col-md-6">
                                        <input data-switch="true" id="sama_ktp" name="sama_ktp" type="checkbox" checked="checked" data-on-text="Berbeda" data-off-text="Sama" data-off-color="success"   />
                                    </div>
                                </div>
        
                                <div class="form-group row">
                                    <label for="domisili_alamat" class="col-12 col-md-3">Alamat Domisili Asesi<span class="reqstar">*</span></label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="domisili_alamat" placeholder="Alamat Domisili Asesi">
                                    </div>
                                </div>
        
                                <div class="form-group row">
                                    <label for="domisili_provinsi" class="col-12 col-md-3">Provinsi Domisili<span class="reqstar">*</span></label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="domisili_provinsi" placeholder="Provinsi Domisili">
                                    </div>
                                </div>
        
                                <div class="form-group row">
                                    <label for="domisili_kota" class="col-12 col-md-3">Kota Domisili<span class="reqstar">*</span></label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="domisili_kota" placeholder="Kota Domisili">
                                    </div>
                                </div>
        
                                <div class="form-group row">
                                    <label for="domisili_kode_pos" class="col-12 col-md-3">Kode Pos Domisili<span class="reqstar">*</span></label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="domisili_kode_pos" placeholder="Kode Pos Domisili">
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

@section('styles')
    <style>
        .profilebox > img {
            max-width: 200px;
            border-radius: 10px;
        }
    </style>
@endsection


{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ url('js/custom/bootstrapswitch/bootstrapswitch.js') }}"></script>
    <script>
        // KTBootstrapSwitch.init()
        let validation_form, validation_form_account;
        let form = KTUtil.getById('kt_page_sticky_card')
        let currentAccount = {}
        validation_form = FormValidation.formValidation(form, {
            fields: {
                nik: {
                    validators: {
                        notEmpty: {
                            message: 'Tidak boleh Kosong'
                        },
                        stringLength: {
                            min:16,
                            max:16,
                            message: 'Panjang NIK 16 karakter'
                        },
                        integer: {
                            message: "Harus berisi angka"
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
            return axios.post('{{route("asesi.pengaturan.profil.update")}}', formData)
                .then(response => {
                    console.log(response.data)
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

        $('input[name="jenis_kelamin"]').bootstrapSwitch({
            onSwitchChange: function(e) {
                
            }
        })

        $('#sama_ktp').bootstrapSwitch({
            onSwitchChange: function(e) {
                if(!this.checked) {
                    $('input[name="domisili_alamat"').val($('input[name="ktp_alamat"').val()).prop('readonly', true)
                    $('input[name="domisili_provinsi"').val($('input[name="ktp_provinsi"').val()).prop('readonly', true)
                    $('input[name="domisili_kota"').val($('input[name="ktp_kota"').val()).prop('readonly', true)
                    $('input[name="domisili_kode_pos"').val($('input[name="ktp_kode_pos"').val()).prop('readonly', true)
                } else {
                    $('input[name="domisili_alamat"').prop('readonly', false)
                    $('input[name="domisili_provinsi"').prop('readonly', false)
                    $('input[name="domisili_kota"').prop('readonly', false)
                    $('input[name="domisili_kode_pos"').prop('readonly', false)
                }
                
            }
        })

        // $(document).on('change','#sama_ktp', function(e) {
        //     console.log(e)
        // })

    </script>
@endsection
