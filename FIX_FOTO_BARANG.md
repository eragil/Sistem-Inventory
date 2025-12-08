# Fix Foto Barang - Image Display Issues

## Masalah yang Diperbaiki

Foto barang tidak menampilkan di halaman ketika dilihat. Masalah ini terjadi karena:

1. **Broken Symbolic Link**: File `public/storage` adalah symbolic link yang rusak dan tidak menunjuk ke folder yang benar
2. **Path Mismatch**: Beberapa view menggunakan path `/storage/gambarbarang/` yang tidak sesuai dengan struktur

## Solusi yang Diterapkan

### 1. Copy Folder Gambar ke Public
Folder `storage/app/public/gambarbarang` di-copy ke `public/gambarbarang` sehingga foto dapat diakses langsung dari public folder.

```
storage/app/public/gambarbarang/  →  public/gambarbarang/
```

### 2. Update Path di Semua View

**File yang diperbaiki:**
- `resources/views/livewire/barang/index.blade.php`
- `resources/views/livewire/penjualan.blade.php`
- `resources/views/livewire/pembelian.blade.php`
- `resources/views/cetak/cetak.blade.php`

**Perubahan path:**
```blade
# SEBELUM (tidak bekerja)
{{ asset('/storage/gambarbarang/' . $barang->foto) }}

# SESUDAH (bekerja dengan baik)
{{ asset('/gambarbarang/' . $barang->foto) }}
```

### 3. Auto-Sync Script

Untuk memastikan foto yang baru diupload juga tersedia di public folder, dua helper telah dibuat:

#### PowerShell Script (Windows)
```powershell
# File: sync-images.ps1
# Jalankan untuk sync manual: .\sync-images.ps1
```

#### Laravel Command (Recommended)
```bash
# Jalankan command untuk sync manual:
php artisan images:sync

# Atau tambahkan ke scheduler di app/Console/Kernel.php untuk auto-sync:
$schedule->command('images:sync')->daily();
```

## Folder Structure Setelah Fix

```
public/
├── gambarbarang/          ← Foto barang disimpan di sini (accessible)
│   ├── 24adyboON9aR1y0hn1tpjGeySr5AP48ijYTXnJMe.png
│   ├── DaNb8r4FYgxhAi83cna14nSjj5lK3yec0dSqhDS6.png
│   └── ... (file lainnya)
└── ... (public files lainnya)

storage/app/public/
├── gambarbarang/          ← Foto disimpan saat upload (storage original)
│   ├── 24adyboON9aR1y0hn1tpjGeySr5AP48ijYTXnJMe.png
│   ├── DaNb8r4FYgxhAi83cna14nSjj5lK3yec0dSqhDS6.png
│   └── ... (file lainnya)
└── ... (storage files lainnya)
```

## Cara Kerja Upload Foto

1. User upload foto di form barang/penjualan/pembelian
2. Livewire menyimpan ke: `storage/app/public/gambarbarang/` dengan nama hash
3. Database menyimpan nama file hash
4. Saat tampil, Laravel mengakses dari: `public/gambarbarang/`

## Testing

Untuk memverifikasi foto sudah tampil:

1. Buka halaman **Barang** - klik menu "Barang Masuk/Keluar"
2. Lihat table kolom **Foto** - seharusnya menampilkan gambar thumbnail
3. Buka halaman **Penjualan** atau **Pembelian**
4. Klik **Laporan** untuk print PDF - foto juga harus tampil

## Troubleshooting

### Foto masih tidak tampil?

1. **Clear browser cache:**
   - Tekan `Ctrl + F5` (hard refresh)

2. **Verify file exists:**
   ```powershell
   Get-ChildItem "C:\xampp\htdocs\Inventory dan Penjualan\public\gambarbarang"
   ```

3. **Run sync command:**
   ```bash
   php artisan images:sync
   ```

4. **Check file permissions:**
   - Folder `public/gambarbarang` harus readable oleh web server

### Foto lama tidak tampil tapi baru oke?

Jalankan sync command untuk copy foto yang sebelumnya:
```bash
php artisan images:sync
```

## Technical Details

- **Upload disk**: `public` (Livewire WithFileUploads)
- **Upload path**: `gambarbarang`
- **Access URL**: `/gambarbarang/{filename}`
- **Full path**: `public_path('gambarbarang')`
- **Storage path**: `storage_path('app/public/gambarbarang')`

## Next Steps (Optional)

Untuk production yang lebih robust, pertimbangkan:

1. **Setup proper symbolic link** (requires admin):
   ```bash
   php artisan storage:link
   ```

2. **Configure storage disk** di `config/filesystems.php` untuk auto-create symbolic link

3. **Add image processing** - resize/optimize uploaded images dengan:
   ```php
   use Intervention\Image\Facades\Image;
   Image::make($path)->resize(400, null)->save();
   ```

