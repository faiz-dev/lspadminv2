<?php

namespace App\Http\Controllers\Pengaturan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\{Role, Permission};

class RoleManController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = 'Pengaturan Role Akses';
        $page_breadcrumbs= [
            [
                "page" =>  route('role.index'),
                "title" =>  'Role Akses'
            ]
        ];
        $roles = Role::all();
        // dd($roles);
        return view('pengaturan.role.index', compact('page_title','page_breadcrumbs', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = 'Tambah Role Akses';
        $page_breadcrumbs= [
            [
                "page" =>  route('role.index'),
                "title" =>  'Role Akses'
            ],
            [
                "page" =>  route('role.create'),
                "title" =>  'Tambah'
            ]
        ];
        return view('pengaturan.role.create', compact('page_title','page_breadcrumbs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'  =>  'regex:/^[a-zA-Z ]*$/|unique:roles|max:20',
            'guard' =>  'in:web,api'
        ]);
        $role = new Role();
        $role->name = $request->name;
        $role->guard_name = $request->guard;
        
        $role->save();
        return redirect(route('role.index'))->with('success', 'Role barhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page_title = 'Tambah Role Akses';
        
        $page_breadcrumbs= [
            [
                "page" =>  route('role.index'),
                "title" =>  'Role Akses'
            ],
            [
                "page" =>  route('role.edit',["role"=>$id]),
                "title" =>  'Edit'
            ]
        ];


        $role = Role::findOrFail($id);
        $permissions = $role->getAllPermissions();
        return view('pengaturan.role.edit', compact('page_title','page_breadcrumbs', 'role','permissions'));
    }

    public function revokePermission(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        $permission = Permission::findOrFail($request->permissionID); 

        return response()->json($role->revokePermissionTo($permission));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        
        return response($role->delete());
    }


    public function disable($id)
    {
        // $role
    }
}
