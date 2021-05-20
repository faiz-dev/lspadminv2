<?php

namespace App\Http\Controllers\Administrasi;

use App\Http\Controllers\Controller;
use App\Services\UnitKompetensiService;
use Illuminate\Http\Request;

class UnitKomManController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $daftar_unit = UnitKompetensiService::getAll(["uid", "kode", "judul", "jenis_standar"]);
        $page_title = "Kelola Daftar Unit Kompetensi";
        $page_breadcrumbs= [
            [
                "page" =>  route('mg-unit.index'),
                "title" =>  'Daftar TUK'
            ],
        ];
        return view('md_administrasi.mg_unit.index', [
            'page_title'        =>  $page_title,
            'page_breadcrumbs'  =>  $page_breadcrumbs,
            'daftar_unit'       =>  $daftar_unit
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = "Tambah Unit Kompetensi";
        $page_breadcrumbs= [
            [
                "page" =>  route('mg-unit.index'),
                "title" =>  'Daftar Unit'
            ],
            [
                "page" =>  route('mg-unit.create'),
                "title" =>  'Tambah Unit'
            ],
        ];
        return view('md_administrasi.mg_unit.create', [
            'page_title'        =>  $page_title,
            'page_breadcrumbs'  =>  $page_breadcrumbs
        ]);
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
            'kode'          =>      'required|unique:unit_kompetensis',
            'judul'         =>      'required',
            'jenis_standar' =>      'required'
        ]);

        $unit = UnitKompetensiService::create((object) $request->all());
        if($unit) {
            return redirect(route('mg-unit.index'))->with('success', "Unit berhasil disimpan");
        } else {
            return redirect(route('mg-unit.create'))->withErrors("Tambah unit gagal");
        }
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
        $page_title = "Edit Unit Kompetensi";
        $page_breadcrumbs= [
            [
                "page" =>  route('mg-unit.index'),
                "title" =>  'Daftar Unit'
            ],
            [
                "page" =>  route('mg-unit.edit', ['mg_unit'=> $id]),
                "title" =>  'Edit Unit'
            ],
        ];
        $unit = UnitKompetensiService::getOne($id);        
        return view('md_administrasi.mg_unit.edit', [
            'page_title'        =>  $page_title,
            'page_breadcrumbs'  =>  $page_breadcrumbs,
            'unit'              =>  $unit,
        ]);
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
        $request->validate([
            'kode'          =>      'required',
            'judul'         =>      'required',
            'jenis_standar' =>      'required'
        ]);

        $unit = UnitKompetensiService::update((object) $request->all(), $id);
        if($unit) {
            return redirect(route('mg-unit.edit', ["mg_unit"=>$id]))->with('success', "Unit berhasil disimpan");
        } else {
            return redirect(route('mg-unit.edit', ["mg_unit"=>$id]))->withErrors("Tambah unit gagal");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(UnitKompetensiService::delete($id)) {
            return redirect(route('mg-unit.index'))->with("success", "Hapus data berhasil");
        } else {
            return redirect(route('mg-unit.index'))->withErrors("Hapus data gagal");
        }
    }
}
