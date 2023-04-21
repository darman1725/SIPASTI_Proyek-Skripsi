<?php

namespace App\Http\Controllers\Menu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu\DataKegiatan;
use App\Models\Menu\DataKriteria;
use App\Models\Menu\DataSubKriteria;
use App\Http\Requests\DataSubKriteriaRequest;
use Illuminate\Support\Facades\Session;
use DB;

class DataSubKriteriaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $sub_kriteria = DataSubKriteria::with('guestDataKegiatan')->get();
        $kriteria = DataSubKriteria::get_kriteria();
        $count_kriteria = DataSubKriteria::count_kriteria();
        $kegiatan = DataKriteria::all();

        return view('menu.data_sub_kriteria.index', compact('sub_kriteria','kriteria','count_kriteria','kegiatan'));
    }

    public function store(DataSubKriteriaRequest $request)
    {
    $request->validate([
        'id_data_kegiatan' => 'required',
        'id_data_kriteria' => 'required',
        'deskripsi' => 'required',
        'nilai' => 'required'
    ]);

    $data = [
        'id_data_kegiatan' => $request->input('id_data_kegiatan'),
        'id_data_kriteria' => $request->input('id_data_kriteria'),
        'deskripsi' => $request->input('deskripsi'),
        'nilai' => $request->input('nilai')
    ];

    DataSubKriteria::create($data);

    return redirect()->route('data_sub_kriteria')->with('success', 'Data Sub Kriteria berhasil diupdate');
    }
    
    public function show($id)
    {
        //
    }

    public function update(DataSubKriteriaRequest $request, $id_data_sub_kriteria)
    {
        // TODO: implementasi update data berdasarkan $id_sub_kriteria
        $this->validate($request, [
            'id_data_kriteria' => 'required',
            'deskripsi' => 'required',
            'nilai' => 'required'
        ]);

        $sub_kriteria = DataSubKriteria::find($id_data_sub_kriteria);
        $sub_kriteria->id_data_kriteria = $request->get('id_data_kriteria');
        $sub_kriteria->deskripsi = $request->get('deskripsi');
        $sub_kriteria->nilai = $request->get('nilai');
        $sub_kriteria->save();

        return redirect()->route('data_sub_kriteria')->with('success', 'Data Sub Kriteria berhasil diupdate');
    }

    public function destroy($id)
    {
        $sub_kriteria = DataSubKriteria::find($id);
        $sub_kriteria->delete();

        return redirect()->route('data_sub_kriteria')->with('success', 'Data Sub Kriteria berhasil dihapus');
    }
}


