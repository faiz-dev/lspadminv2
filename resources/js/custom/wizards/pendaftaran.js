"use strict";

const { default: Swal } = require("sweetalert2");

// Class definition
var KTWizard1 = function () {
	// Base elements
	var _wizardEl;
	var _formEl;
	var _wizard;
	var _validations = [];
	var _url; 

	// Private functions
	var initWizard = function (url) {
		_url = url
		// Initialize form wizard
		_wizard = new KTWizard(_wizardEl, {
			startStep: 1, // initial active step number
			clickableSteps: true  // allow step clicking
		});

		// Validation before going to next page
		_wizard.on('beforeNext', function (wizard) {
			console.log("beforenext")
			// Don't go to the next step yet
			_wizard.stop();

			// Validate form
			var validator = _validations[wizard.getStep() - 1]; // get validator for currnt step
			validator.validate().then(function (status) {
				if (status == 'Valid') {
					_wizard.goNext();
					KTUtil.scrollTop();
				} else {
					Swal.fire({
						text: "Maaf, cek kembali data anda",
						icon: "error",
						buttonsStyling: false,
						confirmButtonText: "Ok, saya perbaiki",
						customClass: {
							confirmButton: "btn font-weight-bold btn-light"
						}
					}).then(function () {
						console.log(status)
						KTUtil.scrollTop();
					});
				}
			});
		});

		// Submit event
		_wizard.on('submit', function (wizard) {
			Swal.fire({
				text: "Mengirimkan data pendaftaran",
				icon: "info",
			})
			Swal.showLoading();
			submitPendaftaran();
		});

		// Change event
		_wizard.on('change', function (wizard) {
			KTUtil.scrollTop();
		});

		
	}

	var initValidation = function () {
		// Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
		// Step 1
		_validations.push(FormValidation.formValidation(
			_formEl,
			{
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
                    jenis_kelamin: {
                        validators: {
                            notEmpty: {
                                message: 'Tidak boleh Kosong'
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
                    tgl_lahir: {
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
                    pendidikan: {
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
                    alamat: {
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
                    kota: {
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
                    kode_pos: {
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
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					bootstrap: new FormValidation.plugins.Bootstrap()
				}
			}
		));

		// Step 2
		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				fields: {
                    tujuan_sertifikasi: {
                        validators: {
                            notEmpty: {
                                message: 'Mohon pilih salah satu'
                            }
                        }
                    },
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					bootstrap: new FormValidation.plugins.Bootstrap()
				}
			}
		));

		// Step 3
		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				fields: {
					persetujuan_syarat: {
						validators: {
							notEmpty: {
								message: 'Setujui untuk memenuhi persyaratan agar dapat mendaftar uji sertifikasi ini'
							}
						}
					},
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					bootstrap: new FormValidation.plugins.Bootstrap()
				}
			}
		));

		// Step 4
		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				fields: {
					konfirmasi_akhir: {
						validators: {
							notEmpty: {
								message: 'Klik checklist ini jika menyetujui'
							}
						}
					}
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					bootstrap: new FormValidation.plugins.Bootstrap()
				}
			}
		));
	}

	var submitPendaftaran = function() {
		console.log(document.getElementById('kt_form'))
		let formData = new FormData(document.getElementById('kt_form'));
		console.log(_url);
		axios.post(_url, formData)
			.then(response => {
				Swal.fire({
					text: "Pendaftaran Berhasil, kami akan meninjau data anda.",
					icon: "success",
					buttonsStyling: false,
					confirmButtonText: "Saya Mengerti",
					customClass: {
						confirmButton: "btn font-weight-bold btn-light"
					}
				}).then(() => {
					window.location.href = response.data.redirect_target;
				})
			})
			.catch(e => {
				Swal.fire({
					text: "Maaf, Pendaftaran sedang terkendala. Coba beberapa saat lagi",
					icon: "error",
					buttonsStyling: false,
					confirmButtonText: "Saya Mengerti",
					customClass: {
						confirmButton: "btn font-weight-bold btn-light"
					}
				})
			})
	}

	return {
		// public functions
		init: function (url) {
			_wizardEl = KTUtil.getById('kt_wizard_v1');
			_formEl = KTUtil.getById('kt_form');

			initWizard(url);
			initValidation();
		}
	};
}();

jQuery(document).ready(function () {	
	window.KTWizard1 = KTWizard1;
});
