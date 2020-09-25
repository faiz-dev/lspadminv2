{{-- Extends layout --}}
@extends('layouts.manager')

{{-- Content --}}
@section('content')

    {{-- Dashboard 1 --}}

    <div class="row">
        <div class="col-md-5">
            <div class="card card-custom gutter-b">
                <div class="card-header border-0">
                    <div class="card-title">
                        <h3 class="card-label">Tambah Role Akses</h3>
                    </div>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            @foreach ($errors->all() as $error)
                                {{ $error }} <br>
                            @endforeach
                        </div>
                    @endif
                    <form action="{{ route('role.store')}}" method="post" id="addRole">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama Role</label>
                            <input type="text" name="name" class="form-control" placeholder="Nama role" required>
                        </div>
                        <div class="form-group">
                            <label for="guard">Guard</label>
                            <select name="guard" id="guard" class="form-control">
                                <option value="">Pilih Guard</option>
                                <option value="web">Web</option>
                                <option value="api">api</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <button type="submit" form="addRole" class="btn btn-primary mr-2">Simpan</button>
                    <button type="reset" form="addRole" class="btn btn-secondary mr-2">Reset</button>
                </div>
            </div>
        </div>
    </div>

@endsection


{{-- Scripts Section --}}
@section('scripts')
    
@endsection
