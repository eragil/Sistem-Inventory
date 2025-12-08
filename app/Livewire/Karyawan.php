<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithFileUploads;
use App\Models\Role;

class Karyawan extends Component
{
    use LivewireAlert, WithFileUploads;
    public $suka, $selectedMode;
    //wiremodel dari karyawan/index.blade.php 
    public $nama, $email, $password, $user_selected, $peran;

    public function tambah()
    {
        $this->reset(['nama', 'email', 'password']);
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
                'nama' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6',
            ]);
            $simpan = new User();
            $simpan->password = bcrypt($this->password);
        } else {
            $this->validate([
                'nama' => 'required',
                'email' => 'required|email|unique:users,email,' . $this->user_selected->id,

            ]);
            $simpan = $this->user_selected;
            if ($this->password) {
                $simpan->password = bcrypt($this->password);
            }
        }

        $simpan->name = $this->nama;
        $simpan->email = $this->email;

        $simpan->save();
        $simpan->syncRoles([$this->peran]);

        $this->reset(['nama', 'email', 'password', 'selectedMode']);
        $this->alert('success', 'Data Karyawan Berhasil Disimpan');
    }

    public function edit($id)
    {
        $this->user_selected = User::find($id);
        $this->nama = $this->user_selected->name;
        $this->email = $this->user_selected->email;
        $this->selectedMode = 'edit';
    }

    public function hapus($id)
    {
        $user = User::find($id);
        $user->delete();
        $this->alert('success', 'Data Karyawan Berhasil Dihapus');
    }
    public function render()
    {
        $user = User::all();
        $roles = Role::all();
        return view('livewire.karyawan')->with([
            'users' => $user,
            'roles' => $roles
        ]);
    }
}
