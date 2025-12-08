<?php

namespace App\Livewire;

use App\Models\Barang;
use App\Models\Penjualan;
use App\Models\Pembelian;
use App\Models\Barangkeluar;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Dashboard extends Component
{
    public $totalBarang = 0;
    public $totalPenjualan = 0;
    public $totalPembelian = 0;
    public $totalBarangKeluar = 0;
    
    public $pendapatanBulanIni = 0;
    public $pengeluaranBulanIni = 0;
    
    public $chartDataPenjualan = [];
    public $chartDataPembelian = [];
    public $topBarang = [];
    public $barangMenipis = [];

    public function mount()
    {
        $this->loadDashboardData();
    }

    public function loadDashboardData()
    {
        // Total Barang
        $this->totalBarang = Barang::sum('jumlah') ?? 0;
        
        // Total Transaksi
        $this->totalPenjualan = Penjualan::count() ?? 0;
        $this->totalPembelian = Pembelian::count() ?? 0;
        $this->totalBarangKeluar = Barangkeluar::count() ?? 0;

        // Pendapatan & Pengeluaran Bulan Ini
        $bulanIni = Carbon::now()->month;
        $tahunIni = Carbon::now()->year;
        
        $this->pendapatanBulanIni = Penjualan::whereMonth('created_at', $bulanIni)
            ->whereYear('created_at', $tahunIni)
            ->sum(DB::raw('jumlah * harga')) ?? 0;

        $this->pengeluaranBulanIni = Pembelian::whereMonth('created_at', $bulanIni)
            ->whereYear('created_at', $tahunIni)
            ->sum(DB::raw('jumlah * harga')) ?? 0;

        // Chart Data - Penjualan per hari (7 hari terakhir)
        $this->chartDataPenjualan = $this->getPenjualanChart();
        $this->chartDataPembelian = $this->getPembelianChart();

        // Top 5 Barang Terjual
        $this->topBarang = Penjualan::select('nama', DB::raw('SUM(jumlah) as total_jumlah'))
            ->groupBy('nama')
            ->orderByDesc('total_jumlah')
            ->limit(5)
            ->get()
            ->toArray();

        // Barang yang Menipis (stok < 10)
        $this->barangMenipis = Barang::where('jumlah', '<', 10)
            ->orderBy('jumlah', 'asc')
            ->limit(5)
            ->get()
            ->toArray();
    }

    private function getPenjualanChart()
    {
        $data = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i)->format('Y-m-d');
            $count = Penjualan::whereDate('created_at', $date)->sum('jumlah') ?? 0;
            $data[] = [
                'label' => Carbon::now()->subDays($i)->format('D'),
                'value' => $count
            ];
        }
        return json_encode($data);
    }

    private function getPembelianChart()
    {
        $data = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i)->format('Y-m-d');
            $count = Pembelian::whereDate('created_at', $date)->sum('jumlah') ?? 0;
            $data[] = [
                'label' => Carbon::now()->subDays($i)->format('D'),
                'value' => $count
            ];
        }
        return json_encode($data);
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
