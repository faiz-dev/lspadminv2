{{-- Extends layout --}}
@extends('layouts.manager')

{{-- Content --}}
@section('content')

    {{-- Dashboard 1 --}}

    <div class="row" id="app">
        
        <div class="col-12">

            @if(Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif

            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-header border-0">
                        <div class="card-title">
                            <h3 class="card-label">Tambah TUK LSP</h3>
                        </div>
                    </div>
                    <div class="card-toolbar">
                        <!--begin::Button-->
                        <a href="{{ route('mg-tuk.index') }}"  class="btn btn-light-primary mx-2 font-weight-bolder ">
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
                    <form action="{{ route('mg-tuk.update', ['mg_tuk'   => $tuk->tuk_uid]) }}" method="POST" id="f-tambah">
                        @csrf
                        @method('PUT')
                        @if($errors->any())
                        {{ implode('', $errors->all('<div>:message</div>')) }}
                        @endif
                        <div class="form-group row">
                            <label for="nama" class="col-12 col-md-2">Nama TUK</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="nama" value="{{ old('nama', $tuk->nama) }}" placeholder="Nama TUK">
                                @error('nama')
                                    <span class="form-text text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="telp" class="col-12 col-md-2">No Telpon</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="telp" value="{{ old('telp', $tuk->telp) }}" placeholder="Nomor Telpon TUK">
                                @error('telp')
                                    <span class="form-text text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jenis" class="col-12 col-md-2">Jenis TUK</label>
                            <div class="col-md-9">
                                <select name="jenis" class="form-control" id="">
                                    <option value="">Pilih Jenis</option>
                                    <option value="sewaktu" selected>Sewaktu</option>
                                </select>
                                @error('jenis')
                                    <span class="form-text text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="induk" class="col-12 col-md-2">Induk</label>
                            <div class="col-md-9">
                                <select name="induk" class="form-control" id="">
                                    <option value="">Pilih Induk</option>
                                    @foreach ($daftar_sekolah as $sekolah)
                                        <option value="{{$sekolah->uid}}" {{ old('induk', $tuk->sekolah_id) == $sekolah->id ? "selected" : '' }}>{{$sekolah->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alamat" class="col-12 col-md-2">Alamat</label>
                            <div class="col-md-9">
                                <textarea name="alamat" cols="30" rows="2" class="form-control" placeholder="Alamat" maxlength="200">{{ old('alamat', $sekolah->alamat) }}</textarea>
                                @error('alamat')
                                    <span class="form-text text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kota" class="col-12 col-md-2">Kota</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="kota" placeholder="Kota" value="{{ old('kota', $tuk->kota) }}">
                                @error('kota')
                                    <span class="form-text text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="provinsi" class="col-12 col-md-2">Provinsi</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="provinsi" placeholder="Provinsi" value="{{ old('provinsi', $tuk->provinsi) }}">
                                @error('provinsi')
                                    <span class="form-text text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kode_pos" class="col-12 col-md-2">Kode POS</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="kode_pos" placeholder="Kode POS" value="{{ old('kode_pos', $tuk->kode_pos) }}">
                                @error('kode_pos')
                                    <span class="form-text text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal-->
    <div class="modal fade" id="modalImport" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Import Data Asesi Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Fasilitas import ini digunakan untuk menambahkan asesi yang benar-benar baru dan belum memiliki data member pada sistem. Apabila ditemukan data dengan NIK yang sama penambahan data akan langsung dibatalkan.</p>
                    <p class="alert alert-custom alert-light-warning">Ikuti format excel berikut untuk mengambahkan data. dilarang menambahkan kolom </p>
                    <a href="#" class="btn btn-block btn-light-primary"><i class="flaticon-download"></i> Download Template Import Asesi (.XLSX)</a>

                    <hr>
                    <div class="alert alert-custom alert-light-primary">
                        <label for="">Upload File di sini</label>
                        <input type="file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary font-weight-bold">Mulai Import Data</button>
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
