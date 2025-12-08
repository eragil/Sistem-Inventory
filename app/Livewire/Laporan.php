<?php

namespace App\Livewire;

use App\Models\Barang;
use App\Models\Barangkeluar;
use App\Models\Pembelian;
use App\Models\Penjualan;
use Livewire\Component;
use Barryvdh\DomPDF\Facade\Pdf;

class Laporan extends Component
{
    public $pilihanLaporan, $bulan;
    public function pilihLaporan($laporan)
    {
        $this->pilihanLaporan = $laporan;
        $this->reset('bulan');
    }


    public function render()
    {

        if ($this->bulan) {
            $semuaBarang = Barang::whereMonth('created_at', $this->bulan)->get();
            $semuaKeluar = Barangkeluar::whereMonth('created_at', $this->bulan)->get();
            $semuaPenjualan = Penjualan::whereMonth('created_at', $this->bulan)->get();
            $semuaPembelian = Pembelian::whereMonth('created_at', $this->bulan)->get();
        } else {
            $semuaBarang = Barang::get();
            $semuaKeluar = Barangkeluar::get();
            $semuaPenjualan = Penjualan::get();
            $semuaPembelian = Pembelian::get();
        }
        return view('livewire.laporan')->with([
            'semuabarang' => $semuaBarang,
            'semuakeluar' => $semuaKeluar,
            'semuapenjualan' => $semuaPenjualan,
            'semuapembelian' => $semuaPembelian,
        ]);
    }
}
