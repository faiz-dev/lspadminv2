{{-- Extends layout --}}
@extends('layouts.member')

{{-- Content --}}
@section('content')

    {{-- Dashboard 1 --}}

    <div class="card">
       <div class="card-body">
        <!--begin::Wizard-->
       <div class="wizard wizard-1" id="kt_wizard_v1" data-wizard-state="step-first" data-wizard-clickable="false">
        <!--begin::Wizard Nav-->
        <div class="wizard-nav border-bottom">
            <div class="wizard-steps p-8 p-lg-10">
                <!--begin::Wizard Step 1 Nav-->
                <div class="wizard-step" data-wizard-type="step" data-wizard-state="current">
                    <div class="wizard-label">
                        <i class="wizard-icon flaticon-profile-1"></i>
                        <h3 class="wizard-title">1. Data Diri Pemohon</h3>
                    </div>
                    <span class="svg-icon svg-icon-xl wizard-arrow"><!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon points="0 0 24 0 24 24 0 24"/>
                            <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000) " x="11" y="5" width="2" height="14" rx="1"/>
                            <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997) "/>
                        </g>
                        </svg><!--end::Svg Icon-->
                    </span>                    
                </div>
                <!--end::Wizard Step 1 Nav-->

                <!--begin::Wizard Step 2 Nav-->
                <div class="wizard-step" data-wizard-type="step">
                    <div class="wizard-label">
                        <i class="wizard-icon flaticon-list"></i>
                        <h3 class="wizard-title">2. Skema Uji Kompetensi</h3>
                    </div>
                    <span class="svg-icon svg-icon-xl wizard-arrow"><!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon points="0 0 24 0 24 24 0 24"/>
                            <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000) " x="11" y="5" width="2" height="14" rx="1"/>
                            <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997) "/>
                        </g>
                        </svg><!--end::Svg Icon-->
                    </span>                    
                </div>
                <!--end::Wizard Step 2 Nav-->

                <!--begin::Wizard Step 3 Nav-->
                <div class="wizard-step" data-wizard-type="step">
                    <div class="wizard-label">
                        <i class="wizard-icon flaticon-interface-3"></i>
                        <h3 class="wizard-title">3. Persyaratan</h3>
                    </div>
                    <span class="svg-icon svg-icon-xl wizard-arrow"><!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon points="0 0 24 0 24 24 0 24"/>
                            <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000) " x="11" y="5" width="2" height="14" rx="1"/>
                            <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997) "/>
                        </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span>                    
                </div>
                <!--end::Wizard Step 3 Nav-->

                <!--begin::Wizard Step 4 Nav-->
                <div class="wizard-step" data-wizard-type="step">
                    <div class="wizard-label">
                        <i class="wizard-icon flaticon-paper-plane-1"></i>
                        <h3 class="wizard-title">4. Ajukan Pendaftaran</h3>
                    </div>
                                    
                </div>
                <!--end::Wizard Step 4 Nav-->

            </div>
        </div>
        <!--end::Wizard Nav-->

        <!--begin::Wizard Body-->
        <div class="row justify-content-center my-10 px-8 my-lg-15 px-lg-10">
            <div class="col-xl-12 col-xxl-10">
                <!--begin::Wizard Form-->
                <form class="form" action="/" id="kt_form">
                    @csrf
                    <!--begin::Wizard Step 1-->
                    <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
                        <h3 class="mb-10 font-weight-bold text-dark">Lengkapi dan Pastikan data di bawah ini benar</h3>
                        <!--begin::Input-->
                        <div class="form-group">
                            <label>Nama Lengkap <span class="reqstar">*</span></label>
                            <input type="text" class="form-control form-control-solid form-control-lg" name="nama" placeholder="Nama Lengkap" value="{{$data_diri->nama_lengkap}}" />
                            <span class="form-text text-muted">Pastikan Nama anda benar untuk keperluan cetak sertifikat</span>
                        </div>
                        <!--end::Input-->

                        <!--begin::Input-->
                        <div class="form-group">
                            <label>NIK <span class="reqstar">*</span></label>
                            <input type="text" class="form-control form-control-solid form-control-lg" name="nik" placeholder="Nomor Induk Kependudukan" value="{{$data_diri->nik}}" readonly />
                            <span class="form-text text-muted">Anda tidak dapat mengubah NIK, hubungi admin apabila terdapat kesalahan</span>
                        </div>
                        <!--end::Input-->
                        <div class="row">
                            <div class="col-xl-6">
                                <!--begin::Input-->
                                <div class="form-group">
                                    <label>Tempat Lahir <span class="reqstar">*</span></label>
                                    <input type="text" class="form-control form-control-solid form-control-lg" name="tempat_lahir" placeholder="Tempat Lahir" value="{{$data_diri->tempat_lahir}}" />                                    
                                </div>
                                <!--end::Input-->
                            </div>
                            <div class="col-xl-6">
                                <!--begin::Input-->
                                <div class="form-group">
                                    <label>Tanggal Lahir <span class="reqstar">*</span></label>
                                    <input type="date" class="form-control form-control-solid form-control-lg" name="tgl_lahir" value="{{$data_diri->tanggal_lahir}}" />                                    
                                </div>
                                <!--end::Input-->
                            </div>
                        </div>
                        <!--begin::Input-->
                        <div class="form-group">
                            <label>Jenis Kelamin <span class="reqstar">*</span></label>                            
                            <select name="jenis_kelamin" class="form-control form-control-solid form-control-lg">
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="l" {{$data_diri->jenis_kelamin == "L" ? 'selected' : ''}} >Laki-laki</option>
                                <option value="p" {{$data_diri->jenis_kelamin == "P " ? 'selected' : ''}}>Perempuan</option>
                            </select>                            
                        </div>
                        <!--end::Input-->

                        <!--begin::Input-->
                        <div class="form-group">
                            <label>Pendidikan Terakhir <span class="reqstar">*</span></label>
                            <select name="pendidikan" class="form-control form-control-solid form-control-lg">
                                <option value="">Pilih Pendidikan Terakhir</option>
                                <option value="sma" selected>SMA/SMK Sederajat</option>                                
                                <option value="d2">D2</option>
                                <option value="d3">D3</option>
                                <option value="s1">S1/D4</option>
                                <option value="s2">S2</option>
                                <option value="s2">S3</option>
                            </select>
                        </div>
                        <!--end::Input-->

                        <!--begin::Input-->
                        <div class="form-group">
                            <label>Kewarganegaraan <span class="reqstar">*</span></label>                            
                            <select name="kewarganegaraan" class="form-control form-control-solid form-control-lg">
                                <option value="">Select</option>
                                <option value="AF">Afghanistan</option>
                                <option value="AX">Åland Islands</option>
                                <option value="AL">Albania</option>
                                <option value="DZ">Algeria</option>
                                <option value="AS">American Samoa</option>
                                <option value="AD">Andorra</option>
                                <option value="AO">Angola</option>
                                <option value="AI">Anguilla</option>
                                <option value="AQ">Antarctica</option>
                                <option value="AG">Antigua and Barbuda</option>
                                <option value="AR">Argentina</option>
                                <option value="AM">Armenia</option>
                                <option value="AW">Aruba</option>
                                <option value="AU" selected>Australia</option>
                                <option value="AT">Austria</option>
                                <option value="AZ">Azerbaijan</option>
                                <option value="BS">Bahamas</option>
                                <option value="BH">Bahrain</option>
                                <option value="BD">Bangladesh</option>
                                <option value="BB">Barbados</option>
                                <option value="BY">Belarus</option>
                                <option value="BE">Belgium</option>
                                <option value="BZ">Belize</option>
                                <option value="BJ">Benin</option>
                                <option value="BM">Bermuda</option>
                                <option value="BT">Bhutan</option>
                                <option value="BO">Bolivia, Plurinational State of</option>
                                <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                                <option value="BA">Bosnia and Herzegovina</option>
                                <option value="BW">Botswana</option>
                                <option value="BV">Bouvet Island</option>
                                <option value="BR">Brazil</option>
                                <option value="IO">British Indian Ocean Territory</option>
                                <option value="BN">Brunei Darussalam</option>
                                <option value="BG">Bulgaria</option>
                                <option value="BF">Burkina Faso</option>
                                <option value="BI">Burundi</option>
                                <option value="KH">Cambodia</option>
                                <option value="CM">Cameroon</option>
                                <option value="CA">Canada</option>
                                <option value="CV">Cape Verde</option>
                                <option value="KY">Cayman Islands</option>
                                <option value="CF">Central African Republic</option>
                                <option value="TD">Chad</option>
                                <option value="CL">Chile</option>
                                <option value="CN">China</option>
                                <option value="CX">Christmas Island</option>
                                <option value="CC">Cocos (Keeling) Islands</option>
                                <option value="CO">Colombia</option>
                                <option value="KM">Comoros</option>
                                <option value="CG">Congo</option>
                                <option value="CD">Congo, the Democratic Republic of the</option>
                                <option value="CK">Cook Islands</option>
                                <option value="CR">Costa Rica</option>
                                <option value="CI">Côte d'Ivoire</option>
                                <option value="HR">Croatia</option>
                                <option value="CU">Cuba</option>
                                <option value="CW">Curaçao</option>
                                <option value="CY">Cyprus</option>
                                <option value="CZ">Czech Republic</option>
                                <option value="DK">Denmark</option>
                                <option value="DJ">Djibouti</option>
                                <option value="DM">Dominica</option>
                                <option value="DO">Dominican Republic</option>
                                <option value="EC">Ecuador</option>
                                <option value="EG">Egypt</option>
                                <option value="SV">El Salvador</option>
                                <option value="GQ">Equatorial Guinea</option>
                                <option value="ER">Eritrea</option>
                                <option value="EE">Estonia</option>
                                <option value="ET">Ethiopia</option>
                                <option value="FK">Falkland Islands (Malvinas)</option>
                                <option value="FO">Faroe Islands</option>
                                <option value="FJ">Fiji</option>
                                <option value="FI">Finland</option>
                                <option value="FR">France</option>
                                <option value="GF">French Guiana</option>
                                <option value="PF">French Polynesia</option>
                                <option value="TF">French Southern Territories</option>
                                <option value="GA">Gabon</option>
                                <option value="GM">Gambia</option>
                                <option value="GE">Georgia</option>
                                <option value="DE">Germany</option>
                                <option value="GH">Ghana</option>
                                <option value="GI">Gibraltar</option>
                                <option value="GR">Greece</option>
                                <option value="GL">Greenland</option>
                                <option value="GD">Grenada</option>
                                <option value="GP">Guadeloupe</option>
                                <option value="GU">Guam</option>
                                <option value="GT">Guatemala</option>
                                <option value="GG">Guernsey</option>
                                <option value="GN">Guinea</option>
                                <option value="GW">Guinea-Bissau</option>
                                <option value="GY">Guyana</option>
                                <option value="HT">Haiti</option>
                                <option value="HM">Heard Island and McDonald Islands</option>
                                <option value="VA">Holy See (Vatican City State)</option>
                                <option value="HN">Honduras</option>
                                <option value="HK">Hong Kong</option>
                                <option value="HU">Hungary</option>
                                <option value="IS">Iceland</option>
                                <option value="IN">India</option>
                                <option value="ID" selected>Indonesia</option>
                                <option value="IR">Iran, Islamic Republic of</option>
                                <option value="IQ">Iraq</option>
                                <option value="IE">Ireland</option>
                                <option value="IM">Isle of Man</option>
                                <option value="IL">Israel</option>
                                <option value="IT">Italy</option>
                                <option value="JM">Jamaica</option>
                                <option value="JP">Japan</option>
                                <option value="JE">Jersey</option>
                                <option value="JO">Jordan</option>
                                <option value="KZ">Kazakhstan</option>
                                <option value="KE">Kenya</option>
                                <option value="KI">Kiribati</option>
                                <option value="KP">Korea, Democratic People's Republic of</option>
                                <option value="KR">Korea, Republic of</option>
                                <option value="KW">Kuwait</option>
                                <option value="KG">Kyrgyzstan</option>
                                <option value="LA">Lao People's Democratic Republic</option>
                                <option value="LV">Latvia</option>
                                <option value="LB">Lebanon</option>
                                <option value="LS">Lesotho</option>
                                <option value="LR">Liberia</option>
                                <option value="LY">Libya</option>
                                <option value="LI">Liechtenstein</option>
                                <option value="LT">Lithuania</option>
                                <option value="LU">Luxembourg</option>
                                <option value="MO">Macao</option>
                                <option value="MK">Macedonia, the former Yugoslav Republic of</option>
                                <option value="MG">Madagascar</option>
                                <option value="MW">Malawi</option>
                                <option value="MY">Malaysia</option>
                                <option value="MV">Maldives</option>
                                <option value="ML">Mali</option>
                                <option value="MT">Malta</option>
                                <option value="MH">Marshall Islands</option>
                                <option value="MQ">Martinique</option>
                                <option value="MR">Mauritania</option>
                                <option value="MU">Mauritius</option>
                                <option value="YT">Mayotte</option>
                                <option value="MX">Mexico</option>
                                <option value="FM">Micronesia, Federated States of</option>
                                <option value="MD">Moldova, Republic of</option>
                                <option value="MC">Monaco</option>
                                <option value="MN">Mongolia</option>
                                <option value="ME">Montenegro</option>
                                <option value="MS">Montserrat</option>
                                <option value="MA">Morocco</option>
                                <option value="MZ">Mozambique</option>
                                <option value="MM">Myanmar</option>
                                <option value="NA">Namibia</option>
                                <option value="NR">Nauru</option>
                                <option value="NP">Nepal</option>
                                <option value="NL">Netherlands</option>
                                <option value="NC">New Caledonia</option>
                                <option value="NZ">New Zealand</option>
                                <option value="NI">Nicaragua</option>
                                <option value="NE">Niger</option>
                                <option value="NG">Nigeria</option>
                                <option value="NU">Niue</option>
                                <option value="NF">Norfolk Island</option>
                                <option value="MP">Northern Mariana Islands</option>
                                <option value="NO">Norway</option>
                                <option value="OM">Oman</option>
                                <option value="PK">Pakistan</option>
                                <option value="PW">Palau</option>
                                <option value="PS">Palestinian Territory, Occupied</option>
                                <option value="PA">Panama</option>
                                <option value="PG">Papua New Guinea</option>
                                <option value="PY">Paraguay</option>
                                <option value="PE">Peru</option>
                                <option value="PH">Philippines</option>
                                <option value="PN">Pitcairn</option>
                                <option value="PL">Poland</option>
                                <option value="PT">Portugal</option>
                                <option value="PR">Puerto Rico</option>
                                <option value="QA">Qatar</option>
                                <option value="RE">Réunion</option>
                                <option value="RO">Romania</option>
                                <option value="RU">Russian Federation</option>
                                <option value="RW">Rwanda</option>
                                <option value="BL">Saint Barthélemy</option>
                                <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
                                <option value="KN">Saint Kitts and Nevis</option>
                                <option value="LC">Saint Lucia</option>
                                <option value="MF">Saint Martin (French part)</option>
                                <option value="PM">Saint Pierre and Miquelon</option>
                                <option value="VC">Saint Vincent and the Grenadines</option>
                                <option value="WS">Samoa</option>
                                <option value="SM">San Marino</option>
                                <option value="ST">Sao Tome and Principe</option>
                                <option value="SA">Saudi Arabia</option>
                                <option value="SN">Senegal</option>
                                <option value="RS">Serbia</option>
                                <option value="SC">Seychelles</option>
                                <option value="SL">Sierra Leone</option>
                                <option value="SG">Singapore</option>
                                <option value="SX">Sint Maarten (Dutch part)</option>
                                <option value="SK">Slovakia</option>
                                <option value="SI">Slovenia</option>
                                <option value="SB">Solomon Islands</option>
                                <option value="SO">Somalia</option>
                                <option value="ZA">South Africa</option>
                                <option value="GS">South Georgia and the South Sandwich Islands</option>
                                <option value="SS">South Sudan</option>
                                <option value="ES">Spain</option>
                                <option value="LK">Sri Lanka</option>
                                <option value="SD">Sudan</option>
                                <option value="SR">Suriname</option>
                                <option value="SJ">Svalbard and Jan Mayen</option>
                                <option value="SZ">Swaziland</option>
                                <option value="SE">Sweden</option>
                                <option value="CH">Switzerland</option>
                                <option value="SY">Syrian Arab Republic</option>
                                <option value="TW">Taiwan, Province of China</option>
                                <option value="TJ">Tajikistan</option>
                                <option value="TZ">Tanzania, United Republic of</option>
                                <option value="TH">Thailand</option>
                                <option value="TL">Timor-Leste</option>
                                <option value="TG">Togo</option>
                                <option value="TK">Tokelau</option>
                                <option value="TO">Tonga</option>
                                <option value="TT">Trinidad and Tobago</option>
                                <option value="TN">Tunisia</option>
                                <option value="TR">Turkey</option>
                                <option value="TM">Turkmenistan</option>
                                <option value="TC">Turks and Caicos Islands</option>
                                <option value="TV">Tuvalu</option>
                                <option value="UG">Uganda</option>
                                <option value="UA">Ukraine</option>
                                <option value="AE">United Arab Emirates</option>
                                <option value="GB">United Kingdom</option>
                                <option value="US">United States</option>
                                <option value="UM">United States Minor Outlying Islands</option>
                                <option value="UY">Uruguay</option>
                                <option value="UZ">Uzbekistan</option>
                                <option value="VU">Vanuatu</option>
                                <option value="VE">Venezuela, Bolivarian Republic of</option>
                                <option value="VN">Viet Nam</option>
                                <option value="VG">Virgin Islands, British</option>
                                <option value="VI">Virgin Islands, U.S.</option>
                                <option value="WF">Wallis and Futuna</option>
                                <option value="EH">Western Sahara</option>
                                <option value="YE">Yemen</option>
                                <option value="ZM">Zambia</option>
                                <option value="ZW">Zimbabwe</option>
                            </select>
                        </div>
                        <!--end::Input-->

                        <!--begin::Input-->
                        <div class="form-group">
                            <label>Alamat Rumah <span class="reqstar">*</span></label>
                            <input type="text" class="form-control form-control-solid form-control-lg" name="alamat" placeholder="Alamat Rumah (Domisili)" value="{{$data_diri->domisili_alamat}}" />                        
                        </div>
                        <!--end::Input-->

                        <div class="row">
                            <div class="col-xl-6">
                                <!--begin::Input-->
                                <div class="form-group">
                                    <label>Kota <span class="reqstar">*</span></label>
                                    <input type="text" class="form-control form-control-solid form-control-lg" name="kota" placeholder="Kota" value="{{$data_diri->domisili_kota}}" />
                                    <span class="form-text text-muted">Please enter your Postcode.</span>
                                </div>
                                <!--end::Input-->
                            </div>
                            <div class="col-xl-6">
                                <!--begin::Input-->
                                <div class="form-group">
                                    <label>Kode Pos <span class="reqstar">*</span></label>
                                    <input type="text" class="form-control form-control-solid form-control-lg" name="kode_pos" placeholder="Kode Pos" value="{{$data_diri->domisili_kode_pos}}" />                                    
                                </div>
                                <!--end::Input-->
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-6">
                                <!--begin::Input-->
                                <div class="form-group">
                                    <label>No Telp <span class="reqstar">*</span></label>
                                    <input type="text" class="form-control form-control-solid form-control-lg" name="no_telp" placeholder="Nomor Telpon" value="{{$data_diri->no_telp}}" />
                                    <span class="form-text text-muted">Pastikan nomor yang anda daftarkan aktif</span>
                                </div>
                                <!--end::Input-->
                            </div>
                            <div class="col-xl-6">
                                <!--begin::Input-->
                                <div class="form-group">
                                    <label>Email <span class="reqstar">*</span></label>
                                    <input type="text" class="form-control form-control-solid form-control-lg" name="email" placeholder="Email" value="{{Auth::user()->email}}" readonly />
                                    <span class="form-text text-muted">Anda tidak bisa mengubah email, hubungi admin apabila terdapat kesalahan</span>
                                </div>
                                <!--end::Input-->
                            </div>
                        </div>

                        <h4 class="mb-10">Data Pekerjaan</h4>
                        <div class="row">
                            <div class="col-xl-6">
                                <!--begin::Input-->
                                <div class="form-group">
                                    <label>Instansi <span class="reqstar">*</span></label>
                                    <input type="text" class="form-control form-control-solid form-control-lg" name="pekerjaan_instansi" placeholder="Instansi tempat bekerja" value="{{$data_diri->pekerjaan_instansi}}" readonly />                            
                                </div>
                                <!--end::Input-->
                            </div>
                            <div class="col-xl-6">
                                <!--begin::Input-->
                                <div class="form-group">
                                    <label>Jabatan <span class="reqstar">*</span></label>
                                    <input type="text" class="form-control form-control-solid form-control-lg" name="pekerjaan_jabatan" placeholder="Jabatan" value="{{$data_diri->pekerjaan_jabatan}}" readonly />                            
                                </div>
                                <!--end::Input-->
                            </div>
                        </div>                        

                        <div class="row">
                            <div class="col-xl-6">
                                <!--begin::Input-->
                                <div class="form-group">
                                    <label>Alamat <span class="reqstar">*</span></label>
                                    <input type="text" class="form-control form-control-solid form-control-lg" name="pekerjaan_alamat" placeholder="Alamat" value="{{$data_diri->pekerjaan_alamat}}" readonly />                            
                                </div>
                                <!--end::Input-->
                            </div>
                            <div class="col-xl-6">
                                <!--begin::Input-->
                                <div class="form-group">
                                    <label>Kode Pos <span class="reqstar">*</span></label>
                                    <input type="text" class="form-control form-control-solid form-control-lg" name="pekerjaan_kode_pos" placeholder="Kode Pos" value="{{$data_diri->pekerjaan_kode_pos}}" readonly />                            
                                </div>
                                <!--end::Input-->
                            </div>
                        </div>   

                        <div class="row">
                            <div class="col-xl-6">
                                <!--begin::Input-->
                                <div class="form-group">
                                    <label>No Telp <span class="reqstar">*</span></label>
                                    <input type="text" class="form-control form-control-solid form-control-lg" name="pekerjaan_telp" placeholder="Nomor Telpon" value="{{$data_diri->pekerjaan_telp}}" readonly />                            
                                </div>
                                <!--end::Input-->
                            </div>                            
                        </div>
                        
                        <div class="row">
                            <div class="col-xl-6">
                                Apabila terdapat kekeliruan data di atas, klik tombol berikut: <a href="{{ route('asesi.pengaturan.profil') }}" class="btn btn-sm btn-light-info">Ubah Profil Member</a>
                            </div>                            
                        </div>

                    </div>
                    <!--end::Wizard Step 1-->

                    <!--begin::Wizard Step 2-->
                    <div class="pb-5" data-wizard-type="step-content">
                        <h4 class="mb-10 font-weight-bold text-dark">Baca dan pahami Skema Uji Sertifikasi di bawah ini</h4>

                        <p class="alert alert-info">Anda akan mendaftar pada Uji Kompetensi Keahlian dengan skema di bawah ini</p>

                        <h5 class="mt-10 font-weight-bold text-dark">Nama Skema</h5>
                        <p>{{ $data_skema->nama }}</p>

                        <h5 class="mt-10 font-weight-bold text-dark">Klaster</h5>
                        <p>{{ $data_skema->judul_klaster }}</p>
                        
                        <h5 class="mt-10 font-weight-bold text-dark">Daftar Unit Kompetensi</h5>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th width="50">No</th>
                                    <th>Kode Unit</th>
                                    <th>Judul Unit</th>
                                    <th>Jenis Standar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_skema->unitKompetensi as $key => $uk)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$uk->kode}}</td>
                                    <td>{{$uk->judul}}</td>
                                    <td>{{$uk->jenis_standar}}</td>
                                </tr> 
                                @endforeach 
                            </tbody>
                        </table>

                        <h5 class="mt-10 font-weight-bold text-dark">Tujuan Sertifikasi</h5>
                        <!--begin::Input-->
                        <div class="form-group">
                            <label>Sertifikasi Baru / Sertifkasi Ulang <span class="reqstar">*</span></label>                            
                            <select name="tujuan_sertifikasi" class="form-control form-control-solid form-control-lg">
                                <option value="">Pilih Tujuan Sertifikasi</option>
                                <option value="sertifikasi-baru">Sertifikasi Baru</option>
                                <option value="sertifikasi-ulang">Sertifikasi Ulang</option>
                            </select>                            
                        </div>
                        <!--end::Input-->
                    </div>
                    <!--end::Wizard Step 2-->

                    <!--begin::Wizard Step 3-->
                    <div class="pb-5" data-wizard-type="step-content">
                        <h4 class="mb-10 font-weight-bold text-dark">Persyaratan / Bukti Kelengkapan Pemohon</h4>                        

                        <h5 class="mt-10 font-weight-bold text-dark">Nama Skema</h5>
                        <p>{{ $data_skema->nama }}</p>

                        <h5 class="mt-10 font-weight-bold text-dark">Daftar Kelengkapan</h5>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="50">No</th>
                                    <th>Bukti Persyaratan</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Fotocopy Kartu Pelajar</td>
                                    <td><b>(Wajib)</b></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Sertifikat Prakerin</td>
                                    <td>(Jika memiliki)</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Fotocopy Rapot Semester 1 - 4</td>
                                    <td><b>Wajib</b></td>
                                </tr>
                            </tbody>
                        </table>
                        <h5 class="mt-10 font-weight-bold text-dark">Informasi</h5>
                        <div class="alert alert-custom alert-outline-danger">
                            <div class="alert-text">
                                Siapkan seluruh persyaratan, <b>letakkan dalam stofmap berwarna biru</b> lalu serahkan ke bagian administrasi <br> LSP P1 SMK Negeri 1 Kandeman
                            </div> 
                        </div>

                        <h5 class="mt-10 font-weight-bold text-dark">Konfirmasi</h5>
                        
                        <div class="form-group">
                            <label class="col-form-label">Apakah anda akan memenuhi persyaratan di atas?</label>
                            <div class="checkbox-inline">
                                <label class="checkbox checkbox-rounded">
                                    <input type="checkbox" name="persetujuan_syarat"/>
                                    <span></span>
                                    Saya akan memenuhi persyaratan di atas sesuai instruksi yang ada
                                </label>
                            </div>                            
                        </div>
                    </div>
                    <!--end::Wizard Step 3-->

                    <!--begin::Wizard Step 4-->
                    <div class="pb-5" data-wizard-type="step-content">
                        <!--begin::Section-->
                        <h4 class="mb-10 font-weight-bold text-dark">Konfirmasi Pendaftaran</h4>                                                
                        <!--end::Section-->

                        <!--begin::Section-->
                        <h6 class="font-weight-bolder mb-3">
                            Skema Sertifikasi:
                        </h6>
                        <div class="text-dark-50 line-height-lg">
                            <div>{{$data_skema->nama}}</div>
                            <div>{{$data_skema->judul_klaster}}</div>                            
                        </div>
                        <div class="separator separator-dashed my-5"></div>
                        <!--end::Section-->

                        <div class="form-group">                            
                            <div class="checkbox-inline">
                                <label class="checkbox checkbox-rounded">
                                    <input type="checkbox" name="konfirmasi_akhir"/>
                                    <span></span>
                                    Dengan ini saya menyatakan seluruh data yang saya masukkan adalah benar
                                </label>
                            </div>                            
                        </div>
                    </div>
                    <!--end::Wizard Step 4-->

                    <!--begin::Wizard Actions-->
                    <div class="d-flex justify-content-between border-top mt-5 pt-10">
                        <div class="mr-2">
                            <button type="button" class="btn btn-light-primary font-weight-bold text-uppercase px-9 py-4" data-wizard-type="action-prev">
                                Previous
                            </button>
                        </div>
                        <div>
                            <button type="button" class="btn btn-success font-weight-bold text-uppercase px-9 py-4" data-wizard-type="action-submit">
                                Submit
                            </button>
                            <button type="button" class="btn btn-primary font-weight-bold text-uppercase px-9 py-4" data-wizard-type="action-next">
                                Next
                            </button>
                        </div>
                    </div>
                    <!--end::Wizard Actions-->
                </form>
                <!--end::Wizard Form-->
            </div>
        </div>
        <!--end::Wizard Body-->
    </div>
    <!--end::Wizard-->
       </div>
    </div>
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ url('css/pages/wizard/wizard-1.css') }}">
    <style>
        .profilebox > img {
            max-width: 200px;
            border-radius: 10px;
        }
    </style>
@endsection


{{-- Scripts Section --}}
@section('scripts') 
<script src="{{ url('js/custom/wizards/pendaftaran2.js')}}"></script>
<script>
    jQuery(document).ready(function () {	
        KTWizard1.init("{{route('asesi.asesmen.action-pendaftaran').'?q='.$data_ujikom->uid}}")    
    });
</script>
@endsection
