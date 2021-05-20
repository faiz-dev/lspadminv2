{{-- Extends layout --}}
@extends('layouts.manager')

{{-- Content --}}
@section('content')

    {{-- Dashboard 1 --}}

    <div class="row" id="app">
        <div class="col-12 col-sm-12 col-xl-12">
            <div class="card card-custom gutter-b" id="card_pencarian">
                <div class="card-header border-0">
                    <div class="card-title">
                        <h3 class="card-label">Perencanaan Uji Kompetensi (Sertifikasi)</h3>
                    </div>
                    <div class="card-toolbar">
                        {{-- <button class="btn btn-light-info mx-2 font-weight-bolder " data-toggle="modal" data-target="#modalImport">
                            <i class="flaticon-upload"></i>
                            Export Data
                        </button> --}}
                        <a href="{{route('mcert.create')}}"  class="btn btn-light-success mx-2 font-weight-bolder ">
                            <i class="flaticon-plus"></i>
                            Tambah Rencana
                        </a>
                        <!--begin::Button-->
                        <button id="card_collapser" class="btn btn-sm btn-light-primary mx-2 font-weight-bolder " data-card-tool="toggle">
                            <i class="ki ki-arrow-up icon-nm"></i>
                        </button>
                        <!--end::Button-->
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <select class="form-control" name="daftar_sekolah" id="inputSkl">
                                    <option value="">Semua Sekolah</option>
                                    @foreach ($daftar_sekolah as $skl)
                                    <option value="{{ $skl->uid }}" > {{$skl->nama}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <select class="form-control" name="tahun_uji" id="inputThn">
                                    <option value="">Semua Sekolah</option>
                                    @for($y=2020; $y <= date('Y'); $y++) 
                                    <option {{ $y == date('Y') ? 'selected' : '' }} value="{{$y}}" > Tahun {{$y}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div>
                        <table class="table table-bordered" id="f-dt">
                            <thead>
                                <tr>
                                    <td width="40" >No</td>
                                    <td>Judul</td>
                                    <td width="200">Skema</td>
                                    <td width="100" >TUK</td>
                                    <td width="80">Status</td>
                                    <td width="80">Aksi</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($daftar_ujikom as $key => $uji)
                                <tr>
                                    <td> {{$key+1}} </td>
                                    <td> {{$uji->nama}} </td>
                                    <td> {{$uji->s_nama}} </td>
                                    <td> {{$uji->t_nama}} </td>
                                    <td> Status </td>
                                    <td>
                                        <button class="btn btn-info">Detail</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer" >
                    
                    
                </div>
            </div>
        </div>
        
        

        
    </div>

@endsection


{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ url('js/custom/datatable/ajax.js') }}"></script>
@endsection
