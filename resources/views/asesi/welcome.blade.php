{{-- Extends layout --}}
@extends('layouts.member')

{{-- Content --}}
@section('content')

    {{-- Dashboard 1 --}}

    <div class="row">
        <div class="col-12">
            <div class="card card-custom mb-5">
                <div class="card-body">
                    <h1>Selamat Datang, {{Auth::user()->name}}</h1>
                </div>
            </div>

            @if (Auth::user()->dataDiri == null)
                <div class="alert alert-danger mb-5 p-5" role="alert">
                    <h4 class="alert-heading">Anda belum melengkapi Profil!</h4>
                    <p>Klik Tombol di bawah ini untuk melengkapi profil anda !</p>
                    <div class="border-bottom border-white opacity-20 mb-5"></div>
                    <a href="{{ route('asesi.pengaturan.profil') }}" class="btn btn-secondary">Lengkapi Profil</a>
                </div>    
            @endif
        </div>
        <div class="col-12 col-md-4">
            <div class="card card-custom mb-5">
                <div class="card-header">
                    <div class="card-title">
                        <span class="card-icon">
                            <i class="flaticon2-chat-1 text-primary"></i>
                        </span>
                        <h3 class="card-label">Sedang dilaksanakan</h3>
                    </div>
                </div>
                <div class="card-body">
                    
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="card card-custom mb-5">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">Selesai</h3>
                    </div>
                </div>
                <div class="card-body">
                    
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="card card-custom mb-5">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">Skill Passport</h3>
                    </div>
                </div>
                <div class="card-body">
                    
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card card-custom mb-5">
                <div class="card-header">
                    <div class="card-title">
                        <span class="card-icon">
                            <i class="flaticon2-chat-1 text-primary"></i>
                        </span>
                        <h3 class="card-label">Informasi Uji Kompetensi</h3>
                    </div>
                </div>
                <div class="card-body">
                    
                </div>
            </div>
        </div>
    </div>

@endsection


{{-- Scripts Section --}}
@section('scripts')
    
@endsection
