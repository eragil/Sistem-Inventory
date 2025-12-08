&lt;?php

// Test script untuk create data pembelian
require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\Pembelian;

try {
    $pembelian = new Pembelian();
    $pembelian->nama = 'Test Barang';
    $pembelian->jumlah = 10;
    $pembelian->ukuran = '100cm';
    $pembelian->foto = 'no-image.png';
    $pembelian->harga = 50000;
    $pembelian->tanggal_masuk = date('Y-m-d');
    $pembelian->save();
    
    echo "✅ SUCCESS: Data berhasil disimpan dengan ID: " . $pembelian->id . "\n";
    echo "Nama: " . $pembelian->nama . "\n";
    echo "Jumlah: " . $pembelian->jumlah . "\n";
    
} catch (\Exception $e) {
    echo "❌ ERROR: " . $e->getMessage() . "\n";
    echo "File: " . $e->getFile() . "\n";
    echo "Line: " . $e->getLine() . "\n";
}
