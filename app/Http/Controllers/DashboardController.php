<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\LaporanPenjualanService;
use App\Service\monitoringStokService;

class DashboardController extends Controller
{
    public function __construct(
        protected LaporanPenjualanService $laporanService,
        protected MonitoringStokService $stokService
    ) {}
    public function index()
    {
        $ringkasan = $this->laporanService->ringkasanHariIni();
        return view('dashboard', [
            'ringkasan' => $ringkasan,
            'produkTerlaris' => $this->stokService->produkTerlarisHariIni(),
            'produkStokHabis' => $this->stokService->produkStokHabis(), 
        ]);
    }
}
