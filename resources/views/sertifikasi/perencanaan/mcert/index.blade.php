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
                        <button class="btn btn-light-info mx-2 font-weight-bolder " data-toggle="modal" data-target="#modalImport">
                            <i class="flaticon-upload"></i>
                            Import Data
                        </button>
                        <a href="#"  class="btn btn-light-success mx-2 font-weight-bolder ">
                            <i class="flaticon-upload"></i>
                            New Record
                        </a>
                        <!--begin::Button-->
                        <button id="card_collapser" class="btn btn-sm btn-light-primary mx-2 font-weight-bolder " data-card-tool="toggle">
                            <i class="ki ki-arrow-up icon-nm"></i>
                        </button>
                        <!--end::Button-->
                    </div>
                </div>
                <div class="card-body">

                    
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
