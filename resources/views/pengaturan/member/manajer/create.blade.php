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
                            <h3 class="card-label">Tambah Manajer LSP</h3>
                        </div>
                    </div>
                    <div class="card-toolbar">
                        
                        <a class="btn btn-light-success mx-2 font-weight-bolder" >
                            <i class="flaticon-plus"></i>
                            Simpan Manager
                        </a>
                        <!--end::Button-->
                    </div>
                </div>
                
                <div class="card-body">
                    
                    <div class="card border-1" id="kt_form_account_wrapper">
                        <div class="card-header">
                            <div class="card-title">
                                <h3 class="card-label">Data Akun</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <form class="form" action="{{ route('pengaturan.member.manager.store') }}" method="post" id="f-akun">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-12 col-md-2">Nama</label>
                                    <div class="col-12 col-md-9">
                                        <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" >
                                        @error('nama')
                                        <span class="form-text text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-md-2">Email</label>
                                    <div class="col-12 col-md-9">
                                        <input type="email" class="form-control" name="email" placeholder="Email" required>
                                        @error('email')
                                        <span class="form-text text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-md-2">Telp (aktif WA)</label>
                                    <div class="col-12 col-md-9">
                                        <input type="text" class="form-control" name="telp" placeholder="No. Telp" required>
                                        @error('telp')
                                        <span class="form-text text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-md-2">Password</label>
                                    <div class="col-12 col-md-9">
                                        <input type="password" class="form-control" name="password" placeholder="Password" required minlength="8">
                                        @error('password')
                                        <span class="form-text text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-secondary">Batalkan</button>
                            <button type="submit" form="f-akun" class="btn btn-success" id="btnSimpanAkun">Simpan Member</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection


{{-- Scripts Section --}}
@section('scripts')
    

@endsection
