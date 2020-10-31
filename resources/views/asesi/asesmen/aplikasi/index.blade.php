{{-- Extends layout --}}
@extends('layouts.member')

{{-- Content --}}
@section('content')

    {{-- Dashboard 1 --}}

    <div class="row" id="app">
        <div class="col-12">
            <!--begin::Card-->
            <div class="card card-custom gutter-b">
                <div class="card-body">
                    <div class="d-flex">
                        <!--begin: Pic-->
                        <div class="flex-shrink-0 mr-7 mt-lg-0 mt-3">
                            <div class="symbol symbol-50 symbol-lg-120">
                                <img alt="Pic" src="{{url('media/project-logos/3.png')}}"/>
                            </div>

                            <div class="symbol symbol-50 symbol-lg-120 symbol-primary d-none">
                                <span class="font-size-h3 symbol-label font-weight-boldest">JM</span>
                            </div>
                        </div>
                        <!--end: Pic-->

                        <!--begin: Info-->
                        <div class="flex-grow-1">
                            <!--begin: Title-->
                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                <div class="mr-3">
                                    <!--begin::Name-->
                                    <a href="#" class="d-flex align-items-center text-dark text-hover-primary font-size-h5 font-weight-bold mr-3">
                                        {{$data_ujikom->nama}} 
                                    </a>
                                    <!--end::Name-->

                                    <!--begin::Contacts-->
                                    <div class="d-flex flex-wrap my-2">
                                        <a href="#" class="text-muted text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                            <span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1"><!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-notification.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <path d="M21,12.0829584 C20.6747915,12.0283988 20.3407122,12 20,12 C16.6862915,12 14,14.6862915 14,18 C14,18.3407122 14.0283988,18.6747915 14.0829584,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12.0829584 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z" fill="#000000"/>
                                                    <circle fill="#000000" opacity="0.3" cx="19.5" cy="17.5" r="2.5"/>
                                                </g>
                                            </svg><!--end::Svg Icon--></span>                                jason@siastudio.com
                                                                        </a>
                                                                        <a href="#" class="text-muted text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                                                            <span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1"><!--begin::Svg Icon | path:assets/media/svg/icons/General/Lock.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <mask fill="white">
                                                        <use xlink:href="#path-1"/>
                                                    </mask>
                                                    <g/>
                                                    <path d="M7,10 L7,8 C7,5.23857625 9.23857625,3 12,3 C14.7614237,3 17,5.23857625 17,8 L17,10 L18,10 C19.1045695,10 20,10.8954305 20,12 L20,18 C20,19.1045695 19.1045695,20 18,20 L6,20 C4.8954305,20 4,19.1045695 4,18 L4,12 C4,10.8954305 4.8954305,10 6,10 L7,10 Z M12,5 C10.3431458,5 9,6.34314575 9,8 L9,10 L15,10 L15,8 C15,6.34314575 13.6568542,5 12,5 Z" fill="#000000"/>
                                                </g>
                                            </svg><!--end::Svg Icon--></span>                                PR Manager
                                                                        </a>
                                                                        <a href="#" class="text-muted text-hover-primary font-weight-bold">
                                                                            <span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1"><!--begin::Svg Icon | path:assets/media/svg/icons/Map/Marker2.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <path d="M9.82829464,16.6565893 C7.02541569,15.7427556 5,13.1079084 5,10 C5,6.13400675 8.13400675,3 12,3 C15.8659932,3 19,6.13400675 19,10 C19,13.1079084 16.9745843,15.7427556 14.1717054,16.6565893 L12,21 L9.82829464,16.6565893 Z M12,12 C13.1045695,12 14,11.1045695 14,10 C14,8.8954305 13.1045695,8 12,8 C10.8954305,8 10,8.8954305 10,10 C10,11.1045695 10.8954305,12 12,12 Z" fill="#000000"/>
                                                </g>
                                            </svg><!--end::Svg Icon--></span>                                Melbourne
                                        </a>
                                    </div>
                                    <!--end::Contacts-->
                                </div>
                                <div class="my-lg-0 my-1">
                                    @switch($data_ujikom->status)
                                        @case('disetujui')
                                            <a href="#" class="btn btn-sm btn-success font-weight-bolder text-uppercase mr-3">DISETUJUI</a>
                                            @break
                                        @case('revisi')
                                            <a href="#" class="btn btn-sm btn-warning font-weight-bolder text-uppercase">REVISI</a>
                                            @break
                                        @case('ditolak')
                                            <a href="#" class="btn btn-sm btn-danger font-weight-bolder text-uppercase">DITOLAK</a>
                                            @break
                                        @default
                                            <a href="#" class="btn btn-sm btn-info font-weight-bolder text-uppercase">SEDANG PROSES REVIEW</a>                                            
                                    @endswitch
                                </div>
                            </div>
                            <!--end: Title-->

                            <!--begin: Content-->
                            <div class="d-flex align-items-center flex-wrap justify-content-between">
                                <div class="flex-grow-1 font-weight-bold text-dark-50 py-5 py-lg-2 mr-5">
                                    I distinguish three main text objectives could be merely to inform people.<br/>
                                    A second could be persuade people. You want people to bay objective.
                                </div>

                                <div class="d-flex flex-wrap align-items-center py-2">
                                    <div class="d-flex align-items-center mr-10">
                                        <div class="mr-6">
                                            <div class="font-weight-bold mb-2">Tgl Mulai</div>
                                            <span class="btn btn-sm btn-text btn-light-primary text-uppercase font-weight-bold">{{$data_ujikom->tgl_awal}}</span>
                                        </div>
                                        <div class="">
                                            <div class="font-weight-bold mb-2">Tgl Akhir</div>
                                            <span class="btn btn-sm btn-text btn-light-danger text-uppercase font-weight-bold">{{$data_ujikom->tgl_akhir}}</span>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <!--end: Content-->
                        </div>
                        <!--end: Info-->
                    </div>

                    <div class="separator separator-solid my-7"></div>

                    <!--begin: Items-->
                    <div class="d-flex align-items-center flex-wrap">
                        <!--begin: Item-->
                        <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                            <span class="mr-4">
                                <i class="flaticon-piggy-bank icon-2x text-muted font-weight-bold"></i>
                            </span>
                            <div class="d-flex flex-column text-dark-75">
                                <span class="font-weight-bolder font-size-sm">Earnings</span>
                                <span class="font-weight-bolder font-size-h5"><span class="text-dark-50 font-weight-bold">$</span>249,500</span>
                            </div>
                        </div>
                        <!--end: Item-->

                        <!--begin: Item-->
                        <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                            <span class="mr-4">
                                <i class="flaticon-confetti icon-2x text-muted font-weight-bold"></i>
                            </span>
                            <div class="d-flex flex-column text-dark-75">
                                <span class="font-weight-bolder font-size-sm">Expenses</span>
                                <span class="font-weight-bolder font-size-h5"><span class="text-dark-50 font-weight-bold">$</span>164,700</span>
                            </div>
                        </div>
                        <!--end: Item-->

                        <!--begin: Item-->
                        <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                            <span class="mr-4">
                                <i class="flaticon-pie-chart icon-2x text-muted font-weight-bold"></i>
                            </span>
                            <div class="d-flex flex-column text-dark-75">
                                <span class="font-weight-bolder font-size-sm">Net</span>
                                <span class="font-weight-bolder font-size-h5"><span class="text-dark-50 font-weight-bold">$</span>782,300</span>
                            </div>
                        </div>
                        <!--end: Item-->

                        <!--begin: Item-->
                        <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                            <span class="mr-4">
                                <i class="flaticon-file-2 icon-2x text-muted font-weight-bold"></i>
                            </span>
                            <div class="d-flex flex-column flex-lg-fill">
                                <span class="text-dark-75 font-weight-bolder font-size-sm">73 Tasks</span>
                                <a href="#" class="text-primary font-weight-bolder">View</a>
                            </div>
                        </div>
                        <!--end: Item-->

                        <!--begin: Item-->
                        <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                            <span class="mr-4">
                                <i class="flaticon-chat-1 icon-2x text-muted font-weight-bold"></i>
                            </span>
                            <div class="d-flex flex-column">
                                <span class="text-dark-75 font-weight-bolder font-size-sm">648 Comments</span>
                                <a href="#" class="text-primary font-weight-bolder">View</a>
                            </div>
                        </div>
                        <!--end: Item-->

                        <!--begin: Item-->
                        <div class="d-flex align-items-center flex-lg-fill my-1">
                            <span class="mr-4">
                                <i class="flaticon-network icon-2x text-muted font-weight-bold"></i>
                            </span>
                            <div class="symbol-group symbol-hover">
                                <div class="symbol symbol-30 symbol-circle" data-toggle="tooltip" title="Mark Stone">
                                    <img alt="Pic" src="{{ url('/media/users/300_25.jpg') }}"/>
                                </div>
                                <div class="symbol symbol-30 symbol-circle" data-toggle="tooltip" title="Charlie Stone">
                                    <img alt="Pic" src="{{ url('/media/users/300_19.jpg') }}"/>
                                </div>
                                <div class="symbol symbol-30 symbol-circle" data-toggle="tooltip" title="Luca Doncic">
                                    <img alt="Pic" src="{{ url('/media/users/300_22.jpg') }}"/>
                                </div>
                                <div class="symbol symbol-30 symbol-circle" data-toggle="tooltip" title="Nick Mana">
                                    <img alt="Pic" src="{{ url('/media/users/300_23.jpg') }}"/>
                                </div>
                                <div class="symbol symbol-30 symbol-circle" data-toggle="tooltip" title="Teresa Fox">
                                    <img alt="Pic" src="{{ url('/media/users/300_18.jpg') }}"/>
                                </div>
                                <div class="symbol symbol-30 symbol-circle symbol-light">
                                    <span class="symbol-label font-weight-bold">5+</span>
                                </div>
                            </div>
                        </div>
                        <!--end: Item-->
                    </div>
                    <!--begin: Items-->
                </div>
            </div>
            <!--end::Card-->
        </div>
        <div class="col-8">
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        <span class="card-icon">
                            <i class="flaticon2-chat-1 text-primary"></i>
                        </span>
                        <h3 class="card-label">Data Skema Sertifikasi</h3>                        
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>Nama Skema</th>
                            <th>{{ $data_ujikom->skema->nama }}</th>
                        </tr>
                        <tr>
                            <td>Judul Klaster</td>
                            <td>{{ $data_ujikom->skema->judul_klaster }}</td>
                        </tr>
                    </table>
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
                            @foreach ($data_ujikom->skema->unitKompetensi as $key => $uk)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$uk->kode}}</td>
                                <td>{{$uk->judul}}</td>
                                <td>{{$uk->jenis_standar}}</td>
                            </tr> 
                            @endforeach 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection


{{-- Scripts Section --}}
@section('scripts')
    
@endsection
