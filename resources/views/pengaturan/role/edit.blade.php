{{-- Extends layout --}}
@extends('layouts.manager')

{{-- Content --}}
@section('content')

    {{-- Dashboard 1 --}}

    <div class="row">
        <div class="col-12 col-sm-8 col-md-5">
            <div class="card card-custom gutter-b">
                <div class="card-header border-0">
                    <div class="card-title">
                        <h3 class="card-label">Edit Role Akses</h3>
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
                            <input type="text" name="name" class="form-control" placeholder="Nama role" value="{{ $role->name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="guard">Guard</label>
                            <select name="guard" id="guard" class="form-control">
                                <option value="">Pilih Guard</option>
                                <option value="web" {{ $role->guard_name === "web" ? "selected" : ''}} >Web</option>
                                <option value="api" {{ $role->guard_name === "web" ? "api" : ''}} >api</option>
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

        <div class="col-md-7" id="permissionManager">
            <div class="card card-custom gutter-b">
                <div class="card-header border-0">
                    <div class="card-title">
                        <h3 class="card-label">Permission List</h3>
                    </div>
                    
                    <div class="card-toolbar">
                        <!--begin::Button-->
                        <button class="btn btn-light-success font-weight-bolder"  data-toggle="modal" data-target="#exampleModal">
                            <i class="fa fa-plus"></i>
                            Assign More
                        </button>
                        <!--end::Button-->
                    </div>
                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <div class="datatable datatable-bordered datatable-head-custom" id="kt_datatable" v-once>
                    </div>
                    <!--end: Datatable-->
                </div>
            </div>

            <!-- Modal-->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Assign More Permissions</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <i aria-hidden="true" class="ki ki-close"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="datatable datatable-bordered datatable-head-custom" id="kt_datatable_assign" v-once>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary font-weight-bold">Assign to Role</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


{{-- Scripts Section --}}
@section('scripts')

    <script src="{{ url('js/custom/datatable/local.js') }}"></script>
    <script>
        const roleObj = JSON.parse('{!! json_encode($role) !!}')
        const element = $('#kt_datatable')
        let permissionList = JSON.parse('{!! json_encode($permissions) !!}')
        let datatableObj;

        let columns = [{
                field: 'name',
                title: 'Nama', 
            },
            {
                field: 'category',
                title: 'Kategori', 
                width: 80,
            },
            {
                field: 'isActive',
                title: 'Revoke',
                width: 55,
                template: function(row) {
                    return `<a href="javascript:;" data-id="`+row.id+`" class="btn btn-xs btn-light-danger btn-icon mr-2 btnRevoke" title="Edit details">
                                <span class="svg-icon svg-icon-danger svg-icon-md">
                                    <i class="fas fa-times"></i>
                                </span>
                            </a>`
                    
                }
            },
        ]
        
        jQuery(document).ready(function() {
            console.log(CDataTable)
            datatableObj = CDataTable.init(element, permissionList, columns);

            $(document).on('click', '.btnRevoke', function() {
                const permissionID = $(this).data('id');
                console.log(`Revoke Role ${roleObj.id} for permission ${permissionID} `)
                axios.post(`{{ url("m/pengaturan/role/") }}/${roleObj.id}/revoke`,{permissionID:permissionID})
                    .then(response => {
                        permissionList = response.data.permissions
                        
                        Swal.fire({
                            title: "Berhasil",
                            text: "Berhasil Revoke Permission",
                            icon: "success"
                        }).then(() => window.location.reload())
                    })
                    .catch(e => {
                        Swal.fire({
                            title: "Gagal",
                            text: "Gagal Revoke Permission",
                            icon: "error"
                        })
                    })
            })
        })
    
    </script>
@endsection
