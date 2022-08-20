<?php

namespace Modules\Admin\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\PasarSektorEkonomi;

class PasarSektorEkonomiController extends Controller
{
    /**
   * Display a listing of the resource.
   * @return Renderable
   */
  public function index()
  {
      return view('admin::Pasar.sektor_ekonomi.index',[
          'title' => 'Pengaturan Sektor Ekonomi Pasar',
          'sektors'=>PasarSektorEkonomi::all(),
      ]);
  }

  /**
   * Show the form for creating a new resource.
   * @return Renderable
   */
  public function create()
  {
      return view('admin::create');
  }

  /**
   * Store a newly created resource in storage.
   * @param Request $request
   * @return Renderable
   */
  public function store(Request $request)
  {
      $request -> validate([
          'kode_sektor_ekonomi'=> 'required',
          'nama_sektor_ekonomi'=> 'required',
      ]);

      $input=$request->all();

      PasarSektorEkonomi::create($input);
      return redirect()->back()->with('success', 'Data Sektor Berhasil Ditambahkan');
  }

  /**
   * Show the specified resource.
   * @param int $id
   * @return Renderable
   */
  public function show($id)
  {
      return view('admin::show');
  }

  /**
   * Show the form for editing the specified resource.
   * @param int $id
   * @return Renderable
   */
  public function edit($id)
  {
      return view('admin::edit');
  }

  /**
   * Update the specified resource in storage.
   * @param Request $request
   * @param int $id
   * @return Renderable
   */
  public function update(Request $request, $id)
  {
      //
  }

  /**
   * Remove the specified resource from storage.
   * @param int $id
   * @return Renderable
   */
  public function destroy($id)
  {
      //
  }
}

