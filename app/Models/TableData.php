<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TableData extends Model
{
   /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'table_data';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'jenis_pendanaan',
        'email',
        'nama_ktp',
        't_tempat',
        't_lahir',
        'agama',
        'jk',
        'no_ktp',
        'no_hp',
        'foto_ktp',
        'skck',
        'slik_ojk',
        'ibu_kandung',
        'status_pernikahan',
        'pendidikan terakhir',
        'pekerjaan',
        'bidang_pekerjaan',
        'pendapatan_per_bulan',
        'sumber_dana',
        'pengalaman_kerja',
        'no_npwp',
        'foto_npwp',
        'provinsi',
        'alamat_ktp',
        'nama_bank',
        'no_rek',
        'nama_pemilik',
        'rekening_koran',
        'no_gopay',
        'no_dana',
        'nama_ahli_waris',
        'nik_ahli_waris',
        'hubungan_ahli_waris',
        'alamat_ahli_waris',
        'no_ahli_waris',
    ];

    
}
