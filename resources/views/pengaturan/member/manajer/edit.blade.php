{{-- Extends layout --}}
@extends('layouts.manager')

{{-- Content --}}
@section('content')

    {{-- Dashboard 1 --}}

    <div class="row" id="app">
        <div class="col-12">
            @if (Session::has('success'))
            <div class="alert alert-success">
                Data Manajer berhasil diubah
            </div>
            @endif
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-header border-0">
                        <div class="card-title">
                            <h3 class="card-label">Edit Manajer LSP</h3>
                        </div>
                    </div>
                </div>
                
                <div class="card-body">
                    <form class="form" action="{{ route('pengaturan.member.manager.update', ['uid' => $mgr->uid]) }}" method="post" id="f-akun">
                        @csrf
                        @method("PUT")
                        <div class="form-group row">
                            <label class="col-12 col-md-2">Nama</label>
                            <div class="col-12 col-md-9">
                                <input type="text" class="form-control" name="nama" value="{{ old('nama', $mgr->name) }}"  placeholder="Nama Lengkap" >
                                @error('nama')
                                <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12 col-md-2">Email</label>
                            <div class="col-12 col-md-9">
                                <input type="email" class="form-control" name="email" value="{{ old('email', $mgr->email) }}"  placeholder="Email" required>
                                @error('email')
                                <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12 col-md-2">Telp (aktif WA)</label>
                            <div class="col-12 col-md-9">
                                <input type="text" class="form-control" name="telp" value="{{ old('telp', $mgr->telp) }}"  placeholder="No. Telp" required>
                                @error('telp')
                                <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12 col-md-2">Password</label>
                            <div class="col-12 col-md-9">
                                <input type="password" class="form-control" name="password" placeholder="Password (isi jika ingin diubah)" minlength="8">
                                @error('password')
                                <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-right">
                    <a href="{{ route('pengaturan.member.manager.index') }}" class="btn btn-secondary">Batalkan</a>
                    <button type="submit" form="f-akun" class="btn btn-success" id="btnSimpanAkun">Simpan Member</button>
                </div>
            </div>
        </div>
    </div>


@endsection


{{-- Scripts Section --}}
@section('scripts')
    

@endsection
