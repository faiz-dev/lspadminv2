<?php

namespace App\Http\Controllers\Administrasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\SkemaService;

class SkemaManController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = "Kelola Skema Terlisensi";
        $page_breadcrumbs= [
            [
                "page" =>  route('mg-skema.index'),
                "title" =>  'Daftar Unit'
            ],
        ];

        $daftar_skema = SkemaService::getAll();
        return view('md_administrasi.mg_skema.index', [
            'page_title'        =>  $page_title,
            'page_breadcrumbs'  =>  $page_breadcrumbs,
            'daftar_skema'      =>  $daftar_skema
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page_title = "Kelola Skema Terlisensi";
        $page_breadcrumbs= [
            [
                "page" =>  route('mg-skema.index'),
                "title" =>  'Daftar Unit'
            ],
        ];

        $skema = SkemaService::getOne($id);
        // dd($skema);
        return view('md_administrasi.mg_skema.detail', [
            'page_title'        =>  $page_title,
            'page_breadcrumbs'  =>  $page_breadcrumbs,
            'skema'             =>  $skema
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }
}
