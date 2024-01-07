<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Credit extends Model
{
    use Uuids;
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'installment_date',
        'customer_id',
        'customer_phone',
        'customer_no',
        'status',
        'transaction_date',
        'credit_database_number',
        'credit_item',
        'invoice',
        'administration',
        'bonds_value',
        'selling_price',
        'down_payment',
        'installment',
        'total_installment',
        'remaining_installment',
        'debt_profit',
        'running_revenue',
        'return_estimation',
        'tenor',
    ];
}
