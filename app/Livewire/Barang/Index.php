<?php

namespace App\Livewire\Barang;

use App\Models\Barang;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class Index extends Component
{
    use LivewireAlert, WithFileUploads;
    public $suka, $selectedMode;
    //wiremodel dari barang/index.blade.php
    public $nama_barang, $jumlah, $ukuran, $foto_barang, $tanggal_masuk, $barang_selected, $harga;
    public function tambah()
    {
        $this->reset(['nama_barang', 'jumlah', 'ukuran', 'foto_barang', 'tanggal_masuk', 'harga']);
        $this->selectedMode = 'tambah';
    }
    public function batal()
    {
        $this->selectedMode = null;
    }
    public function simpan()
    {
        if ($this->selectedMode == 'tambah') {
            $this->validate([
                'nama_barang' => 'required',
                'jumlah' => 'required|numeric',
                'ukuran' => 'required',
                'foto_barang' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048',
                'tanggal_masuk' => 'required|date',
                'harga' => 'required|numeric'
            ]);
            $simpan = new Barang();
        } else {
            $this->validate([
                'nama_barang' => 'required',
                'jumlah' => 'required|numeric',
                'ukuran' => 'required',
                'tanggal_masuk' => 'required|date',
                'harga' => 'required|numeric'
            ]);
            $simpan = $this->barang_selected;
        }

        $simpan->nama = $this->nama_barang;
        $simpan->jumlah = $this->jumlah;
        $simpan->ukuran = $this->ukuran;
        if ($this->foto_barang) {
            $this->foto_barang->store('gambarbarang', 'public');
            $simpan->foto = $this->foto_barang->hashName();
        } else {
            $simpan->foto = 'no-image.png';
        }
        $simpan->harga = $this->harga;
        $simpan->tanggal_masuk = $this->tanggal_masuk;
        $simpan->save();

        $this->reset(['nama_barang', 'jumlah', 'ukuran', 'foto_barang', 'tanggal_masuk', 'selectedMode', 'harga']);
        $this->alert('success', 'Data Berhasil Disimpan');
    }
    public function edit($id)
    {
        $this->barang_selected = Barang::find($id);
        $this->nama_barang = $this->barang_selected->nama;
        $this->jumlah = $this->barang_selected->jumlah;
        $this->ukuran = $this->barang_selected->ukuran;
        $this->tanggal_masuk = $this->barang_selected->tanggal_masuk;
        $this->harga = $this->barang_selected->harga;
        $this->selectedMode = 'edit';
    }
    public function hapus($id)
    {
        $barang = Barang::find($id);
        $barang->delete();
        $this->alert('success', 'Data Berhasil Dihapus');
    }
    public function render()
    {
        $barangs = Barang::all();
        return view('livewire.barang.index')->with([
            'barangs' => $barangs
        ]);
    }
}
