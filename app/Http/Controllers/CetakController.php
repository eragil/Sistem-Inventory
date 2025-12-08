<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Barang;
use App\Models\Barangkeluar;
use App\Models\Pembelian;
use App\Models\Penjualan;
use App\Exports\ExportPembelian;
use App\Exports\ExportPenjualan;
use Maatwebsite\Excel\Facades\Excel;


class CetakController extends Controller
{
    public function cetak($ada)
    {
        $pilihanLaporan = $ada;
        $semuaBarang = Barang::get();
        $semuaKeluar = Barangkeluar::get();
        $semuaPenjualan = Penjualan::get();
        $semuaPembelian = Pembelian::get();

        if ($pilihanLaporan == 'stok') {
            $pdf = PDF::loadView('cetak.cetak', [
                'pilihanLaporan' => $pilihanLaporan,
                'semuabarang' => $semuaBarang
            ]);
            return $pdf->stream('laporan-stok.pdf');
        }

        if ($pilihanLaporan == 'barangmasuk') {
            $pdf = PDF::loadView('cetak.cetak', [
                'pilihanLaporan' => $pilihanLaporan,
                'semuabarang' => $semuaBarang
            ]);
            return $pdf->stream('laporan-barang-masuk.pdf');
        }

        if ($pilihanLaporan == 'barangkeluar') {
            $pdf = PDF::loadView('cetak.cetak', [
                'pilihanLaporan' => $pilihanLaporan,
                'semuakeluar' => $semuaKeluar
            ]);
            return $pdf->stream('laporan-barang-keluar.pdf');
        }

        if ($pilihanLaporan == 'penjualan') {
            $pdf = PDF::loadView('cetak.cetak', [
                'pilihanLaporan' => $pilihanLaporan,
                'semuapenjualan' => $semuaPenjualan
            ]);
            return $pdf->stream('laporan-penjualan.pdf');
        }

        if ($pilihanLaporan == 'pembelian') {
            $pdf = PDF::loadView('cetak.cetak', [
                'pilihanLaporan' => $pilihanLaporan,
                'semuapembelian' => $semuaPembelian
            ]);
            return $pdf->stream('laporan-pembelian.pdf');
        }
    }
    public function excel($ada)
    {

        if ($ada == 'penjualan') {
            return Excel::download(new ExportPenjualan, 'laporan-penjualan.xlsx');
        }

        if ($ada == 'pembelian') {
            return Excel::download(new ExportPembelian, 'laporan-pembelian.xlsx');
        }
    }

    public function notaPenjualan($id)
    {
        $penjualan = Penjualan::findOrFail($id);
        $pdf = PDF::loadView('cetak.nota-penjualan', [
            'penjualan' => $penjualan
        ]);
        return $pdf->stream('nota-penjualan-' . $penjualan->id . '.pdf');
    }

    public function notaPembelian($id)
    {
        $pembelian = Pembelian::findOrFail($id);
        $pdf = PDF::loadView('cetak.nota-pembelian', [
            'pembelian' => $pembelian
        ]);
        return $pdf->stream('nota-pembelian-' . $pembelian->id . '.pdf');
    }
}
