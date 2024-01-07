<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;
use Livewire\Component;

class RegisterForm extends Component
{

    public $nama;
    public $username;
    public $email;
    public $jenis_pendanaan;
    public $password;
    public $password_confirmation;

    public function render()
    {
        return view('livewire.register-form');
    }

    public function registerPage()
    {
        return view('register');
    }
    public function save()
    {
        $this->validate([
            'nama' => 'required|max:191',
            'email' => 'required|email|unique:users',
            'username' => 'required|unique:users',
            'password' => 'required|confirmed|min:8',
            'jenis_pendanaan' => 'required',
        ]);

        $data['nama'] = $this->nama;
        $data['email'] = $this->email;
        $data['username'] = $this->username;
        $data['jenis_pendanaan'] = $this->jenis_pendanaan;
        $data['password'] = Hash::make($this->password);

        User::create($data);

        // User::create($data);
        return redirect()->route('login')->with('success', 'Registrasi akun berhasil, silahkan login'); ;
    }
}
