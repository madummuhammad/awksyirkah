<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
   /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'wilayah_provinsi';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    ];

    
}
