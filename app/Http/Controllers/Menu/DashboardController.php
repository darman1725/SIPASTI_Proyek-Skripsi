<?php

namespace App\Http\Controllers\Menu;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Management\DataPenilaianController;
use App\Models\Menu\Dashboard;
use Illuminate\Http\Request;
use App\Models\Menu\Berita;
use App\Models\Menu\Pendaftaran;
use App\Models\Menu\DataKegiatan;
use App\Models\Information\User;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $jumlahBerita = Berita::count();
        $beritas = Berita::latest()->take(3)->get();
        $jumlahKegiatan = DataKegiatan::count();

        // Mendapatkan data penilaian counts
        $penilaianCounts = $this->getDataPenilaianCounts();
        
        return view('menu.dashboard.index', compact('jumlahBerita', 'beritas', 'jumlahKegiatan') + $penilaianCounts);
    }

    public function getDataPenilaianCounts()
    {
        $dataPenilaianController = new DataPenilaianController();
        $request = new Request(); // Inisialisasi instance Request baru
        $dataPenilaian = $dataPenilaianController->index($request);
    
        $count_dash = $dataPenilaian->getData()['count_dash'];
        $countIncomplete_dash = $dataPenilaian->getData()['countIncomplete_dash'];

         return compact('count_dash', 'countIncomplete_dash');
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
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function show(Dashboard $dashboard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function edit(Dashboard $dashboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dashboard $dashboard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dashboard $dashboard)
    {
        //
    }
}
