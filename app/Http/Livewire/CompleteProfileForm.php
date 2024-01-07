<?php

namespace App\Http\Livewire;

use App\Models\Province;
use App\Models\TableData;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Livewire\Component;
use Livewire\WithFileUploads;

class CompleteProfileForm extends Component
{
    use WithFileUploads;
    public $jenis_pendanaan;
    public $email;
    public $foto_ktp;
    public $no_ktp;
    public $nama_ktp;
    public $t_tempat;
    public $t_lahir;
    public $agama;
    public $jk;
    public $no_hp;

    public $provinsi;
    public $alamat_ktp;

    public $status_pernikahan;
    public $ibu_kandung;
    public $nama_ahli_waris;
    public $nik_ahli_waris;
    public $hubungan_ahli_waris;
    public $alamat_ahli_waris;
    public $no_ahli_waris;

    public $pendidikan_terakhir;
    public $pekerjaan;
    public $bidang_pekerjaan;
    public $pendapatan_per_bulan;
    public $sumber_dana;
    public $pengalaman_kerja;
    public $alamat_pekerjaan;

    public $no_npwp;
    public $foto_npwp;

    public $nama_bank;
    public $no_rek;
    public $nama_pemilik;
    public $rekening_koran;
    public $no_gopay;
    public $no_dana;

    public $skck;
    public $skck2;
    public $slik_ojk;
    public $dokumen_lain;

    public $totalSteps = 7;
    public $currentStep = 1;

    public $provinces = [];

    public function mount()
    {
        $this->currentStep = 1;
        $this->provinces = Province::all();
    }

    public function render()
    {
        return view('livewire.complete-profile-form');
    }

    public function updated($property)
    {
        $this->validateOnly($property, [
            'foto_ktp' => ['required', 'image', 'mimes:jpg,jpeg,png', 'max:8192'],
            'rekening_koran' => ['required', 'image', 'mimes:jpg,jpeg,png', 'max:8192'],
            'foto_npwp' => ['required', 'image', 'mimes:jpg,jpeg,png', 'max:8192'],
            'skck' => ['image', 'mimes:jpg,jpeg,png', 'max:8192'],
            'slik_ojk' => ['image', 'mimes:jpg,jpeg,png', 'max:8192'],
        ]);
    }

    public function increaseStep()
    {
        $this->validateData();
        $this->currentStep++;
        if ($this->currentStep > $this->totalSteps) {
            $this->currentStep = $this->totalSteps;
        }
    }

    public function decreaseStep()
    {
        $this->currentStep--;
        if ($this->currentStep < 1) {
            $this->currentStep = 1;
        }
    }

    public function validateData()
    {
        if ($this->currentStep == 1) {
            $this->validate([
                'foto_ktp' => 'required|image|mimes:jpg,jpeg,png|max:8192',
                'no_ktp' => 'required|numeric',
                'nama_ktp' => 'required',
                't_tempat' => 'required',
                't_lahir' => 'required',
                'agama' => 'required',
                'jk' => 'required',
                'no_hp' => 'required|numeric',
            ]);
        } elseif ($this->currentStep == 2) {
            $this->validate([
                'provinsi' => 'required',
                'alamat_ktp' => 'required',
            ]);
        } elseif ($this->currentStep == 3) {
            $this->validate([
                'status_pernikahan' => 'required',
                'ibu_kandung' => 'required',
                'nama_ahli_waris' => 'required',
                'nik_ahli_waris' => 'required|numeric',
                'hubungan_ahli_waris' => 'required',
                'alamat_ahli_waris' => 'required',
                'no_ahli_waris' => 'required',
            ]);
        } elseif ($this->currentStep == 4) {
            $this->validate([
                'pendidikan_terakhir' => 'required',
                'pekerjaan' => 'required',
                'bidang_pekerjaan' => 'required',
                'pendapatan_per_bulan' => 'required',
                'alamat_pekerjaan' => 'required',
                'sumber_dana' => 'required',
                'pengalaman_kerja' => 'required',
            ]);
        } elseif ($this->currentStep == 5) {
            $this->validate([
                'no_npwp' => 'required',
                'foto_npwp' => 'required|image|mimes:jpg,jpeg,png|max:8192',
            ]);
        } elseif ($this->currentStep == 6) {
            $this->validate([
                'nama_bank' => 'required',
                'no_rek' => 'required',
                'nama_pemilik' => 'required',
                'rekening_koran' => 'required|image|mimes:jpg,jpeg,png|max:8192',
                // 'no_gopay' => 'required',
                // 'no_dana' => 'required',
            ]);
        } elseif ($this->currentStep == 7) {
            $this->validate([
                'skck' => 'image|mimes:jpg,jpeg,png|max:8192',
                'slik_ojk' => 'image|mimes:jpg,jpeg,png|max:8192',
            ]);
        }
    }

    public function formatNpwp(){
        $no_npwp = $this->no_npwp;
        $no_npwp = preg_replace('/[^0-9]+/', '', $no_npwp);
        $no_npwp = substr($no_npwp, 0, 15);
        $length = strlen($no_npwp);
        $formatted = "";
        for ($i = 0; $i < $length; $i++) { 
            $formatted .= $no_npwp[$i];
            if($i == 1 || $i == 4 || $i == 7 || $i == 11){
                $formatted .= ".";
            }
            if($i == 8){
                $formatted .= "-";
            }
        }
        $this->no_npwp = $formatted;
    }


    public function save()
    {
        $this->validate([
            'skck' => 'image|mimes:jpg,jpeg,png|max:8192',
            'slik_ojk' => 'image|mimes:jpg,jpeg,png|max:8192',
        ]);

        $data['user_id'] = Auth::user()->id;
        $data['email'] = Auth::user()->email;
        $data['jenis_pendanaan'] = Auth::user()->jenis_pendanaan;

        $data['foto_ktp'] = $this->foto_ktp ? $this->foto_ktp->store('dokumen', 'public') : null;
        $data['rekening_koran'] = $this->rekening_koran ? $this->rekening_koran->store('dokumen', 'public') : null;
        $data['foto_npwp'] = $this->foto_npwp ? $this->foto_npwp->store('dokumen', 'public') : null;
        $data['skck'] = $this->skck ? $this->skck->store('dokumen', 'public')  : null;
        $data['slik_ojk'] = $this->slik_ojk ? $this->slik_ojk->store('dokumen', 'public') : null;

        $data['no_ktp'] = $this->no_ktp;
        $data['nama_ktp'] = $this->nama_ktp;
        $data['t_tempat'] = $this->t_tempat;
        $data['t_lahir'] = $this->t_lahir;
        $data['agama'] = $this->agama;
        $data['jk'] = $this->jk;
        $data['no_hp'] = $this->no_hp;
        $data['provinsi'] = $this->provinsi;
        $data['alamat_ktp'] = $this->alamat_ktp;
        $data['status_pernikahan'] = $this->status_pernikahan;
        $data['ibu_kandung'] = $this->ibu_kandung;
        $data['nama_ahli_waris'] = $this->nama_ahli_waris;
        $data['nik_ahli_waris'] = $this->nik_ahli_waris;
        $data['hubungan_ahli_waris'] = $this->hubungan_ahli_waris;
        $data['alamat_ahli_waris'] = $this->alamat_ahli_waris;
        $data['no_ahli_waris'] = $this->no_ahli_waris;
        $data['pendidikan_terakhir'] = $this->pendidikan_terakhir;
        $data['pekerjaan'] = $this->pekerjaan;
        $data['bidang_pekerjaan'] = $this->bidang_pekerjaan;
        $data['pendapatan_per_bulan'] = $this->pendapatan_per_bulan;
        $data['alamat_pekerjaan'] = $this->alamat_pekerjaan;
        $data['sumber_dana'] = $this->sumber_dana;
        $data['pengalaman_kerja'] = $this->pengalaman_kerja;
        $data['nama_bank'] = $this->nama_bank;
        $data['no_rek'] = $this->no_rek;
        $data['nama_pemilik'] = $this->nama_pemilik;
        $data['no_npwp'] = $this->no_npwp;
        $data['no_gopay'] = $this->no_gopay;
        $data['no_dana'] = $this->no_dana;
        $data['is_complete'] = true;

        $saveDetail = TableData::updateOrCreate(['user_id' => Auth::user()->id], $data);

        if ($saveDetail) {
            return redirect()->route('complete-profile')->with('success', 'Data anda sudah lengkap');
        }
    }
}
