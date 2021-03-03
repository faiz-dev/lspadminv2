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
                    <h3 class="card-title">Daftar Klaster</h3>             
                    <div class="card-toolbar">
                        <!--begin::Button-->
                        <a href="{{ route('mg-unit.create') }}"  class="btn btn-light-success mx-2 font-weight-bolder ">
                            <i class="flaticon-plus"></i>
                            Tambah Unit Kompetensi
                        </a>
                        <a href="#"  class="btn btn-light-primary mx-2 font-weight-bolder ">
                            <i class="flaticon-download"></i>
                            Export Data
                        </a>
                        
                        <!--end::Button-->
                    </div>
                </div>
                
                <div class="card-body">
                   <table class="table">
                       <tr>
                           <td>Nama Skema</td>
                           <td>
                               {{ $skema->nama }}
                           </td>
                       </tr>
                        <tr>
                            <td>Kode Skema</td>
                            <td>
                                {{ $skema->kode }}
                            </td>
                        </tr>
                        <tr>
                            <td>Level Skema</td>
                            <td>
                                {{ $skema->level_kkni }}
                            </td>
                        </tr>
                   </table>
                    <form method="POST" id="f-delete">
                        @csrf
                        @method("DELETE")
                    </form>
                </div>
            </div>
            @if ($skema->subSkema->count() > 0)
            <div class="card card-custom mt-3">
                <div class="card-header">
                    <h3 class="card-title">Daftar Klaster</h3>
                </div>
                <div class="card-body">
                     <table class="table" id="f-dt">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Jumlah Unit</th>
                                <th width="150">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($skema->subSkema as $key => $klaster)
                                <tr>
                                    <td> {{ $key + 1 }} </td>
                                    <td> {{ $klaster->judul_klaster }} </td>
                                    <td> {{ $klaster->unitKompetensi->count() }} </td>
                                    <td> 
                                        <a href="{{ route('mg-skema.edit', ['mg_skema'=> $skema->uid]) }}" class="btn btn-light-warning">Edit</a> 
                                        <button data-id="{{ $skema->uid }}" class="btn btn-light-danger btn-delete", function(event) {
                                            console.log($(event).data('id'));
                                            alert("Delete");
                                        }>Hapus</button> 
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!--end: Datatable-->
                </div>
            </div>
            @endif
            
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

        $(document).on('click', '.btn-delete', function(event) {
            $cfrm = confirm("Anda yakin akan menghapus data unit ini ?")
            if($cfrm) {
                const id = $(event.target).data('id');            
                const form = $('#f-delete')
                form.attr('action', '{{ route("mg-unit.index") }}/'+id)
                form.submit();
            }
            
        })
    </script>

@endsection
