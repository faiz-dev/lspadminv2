{{-- Extends layout --}}
@extends('layouts.manager')

{{-- Content --}}
@section('content')

    {{-- Dashboard 1 --}}

    <div class="row" id="app">
        
        <div class="col-12">
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-header border-0">
                        <div class="card-title">
                            <h3 class="card-label">Tambah TUK LSP</h3>
                        </div>
                    </div>
                    <div class="card-toolbar">
                        <!--begin::Button-->
                        <a href="{{ route('mg-unit.index') }}"  class="btn btn-light-primary mx-2 font-weight-bolder ">
                            <i class="ki ki-long-arrow-back icon-sm"></i>
                            Kembali
                        </a>
                        <button type="submit" form="f-tambah"  class="btn btn-light-success mx-2 font-weight-bolder ">
                            <i class="flaticon-download"></i>
                            Simpan
                        </a>
                        
                        
                        <!--end::Button-->
                    </div>
                </div>
                
                <div class="card-body">
                    <form action="{{ route('mg-unit.store') }}" method="POST" id="f-tambah">
                        @csrf
                        <div class="form-group row">
                            <label for="kode" class="col-12 col-md-2">Kode</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="kode" value="{{ old('kode') }}" placeholder="Kode Unit Kompetensi">
                                @error('kode')
                                    <span class="form-text text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="judul" class="col-12 col-md-2">Judul</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="judul" value="{{ old('judul') }}" placeholder="Judul Unit Kompetensi">
                                @error('judul')
                                    <span class="form-text text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jenis_standar" class="col-12 col-md-2">Jenis Standar</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="jenis_standar" value="{{ old('jenis_standar') }}" placeholder="Kode Unit Kompetensi">
                                @error('jenis_standar')
                                    <span class="form-text text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('styles')
    <link rel="stylesheet" href="{{ url('plugins/custom/datatables/datatables.bundle.css') }}">
@endsection

{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ url('plugins/custom/datatables/datatables.bundle.js') }}"></script>
    
    <script>
        $('#f-dt').DataTable({
            responsive: true
        })

    </script>

@endsection
