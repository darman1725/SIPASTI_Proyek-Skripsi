<?php

namespace App\Http\Controllers\Menu;

use App\Http\Controllers\Controller;
use App\Models\Menu\DashboardUser;
use Illuminate\Http\Request;
use App\Models\Menu\Berita;
use App\Models\Menu\DataKegiatan;
use App\Models\Menu\Pendaftaran;
use App\Models\Management\DataPenilaian;
use Illuminate\Support\Facades\Auth;

class DashboardUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $beritas = Berita::latest()->take(3)->get();
        $jumlahKegiatan = DataKegiatan::count();

        $userId = Auth::id();
        $pendaftarans = Pendaftaran::where('id_data_user', $userId)->get();

        $totalPendaftaran = $pendaftarans->count();
        $totalSudahDinilai = 0;
        $totalBelumDinilai = 0;

        foreach ($pendaftarans as $pendaftaran) {
        $penilaian = DataPenilaian::where('id_pendaftaran', $pendaftaran->id)->first();
        if ($penilaian) {
          $totalSudahDinilai++;
        } else {
        $totalBelumDinilai++;
        }
    }
    
    return view('menu.dashboard_user.index', compact('beritas', 'jumlahKegiatan', 'totalPendaftaran', 'totalSudahDinilai', 'totalBelumDinilai'));
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
