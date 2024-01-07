<?php

namespace App\Http\Livewire;

use App\Models\Credit;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use MathPHP\Finance;
use PhpOffice\PhpSpreadsheet\Calculation\Financial\CashFlow\Constant\Periodic;
use PhpOffice\PhpSpreadsheet\Calculation\Financial\CashFlow\Constant\Periodic\Payments;

class GoodsCredit extends Component
{
    // 'installment_date',
    // 'customer_id',
    // 'customer_phone',
    // 'customer_no',
    // 'status',
    // 'transaction_date',
    // 'credit_database_number',
    // 'credit_item',
    // 'invoice',
    // 'administration',
    // 'bonds_value',
    // 'selling_price',
    // 'down_payment',
    // 'installment',
    // 'total_installment',
    // 'remaining_installment',
    // 'debt_profit',
    // 'running_revenue',
    // 'return_estimation',
    // 'tenor',

    public $credit_item;
    public $invoice;
    public $down_payment;
    public $tenor;
    public $selected_commodity;
    public $selected_commodity_price;
    public $return_rate;
    public $creditSimulation;

    public function render()
    {
        return view('livewire.goods-credit');
    }

    public function simulate(){
        if($this->invoice < 5000000){
          
            for ($x = 1; $x <= 24; $x++) {
            $rate = 1/12;
            $payment = 1000000;
            $periods = 2 * 12;
            $present_value = 1000000;
            $periods = Finance::periods($rate, $payment, $present_value, 0, false);
            $rate      = Finance::rate($periods, $payment, $present_value, 0, false);
            $present_value = Finance::pv($rate, $periods, $payment, 0, false);
            $hit = Finance::pmt($rate,$x, 100000, 0, false);
               $tes[] = ['urutan' => $x, 'val' => round(-$hit), 'finalval' => round(-$hit*$x)];
            }
            $this->creditSimulation = $tes;
            
            
        } else {
            $this->return_rate = 0.68;
        }
    }

    public function save()
    {
        // $this->validate([
        //     'credit_item' => 'required',
        //     'invoice' => 'required',
        //     'down_payment' => 'required',
        //     'tenor' => 'required',
        //     'selected_community' => 'required',
        //     'selected_community_price' => 'required',
        // ]);

        $data['credit'] = $this->credit;
        $data['invoice'] = $this->invoice;
        $data['down_payment'] = $this->down_payment;
        $data['tenor'] = $this->tenor;
        $data['selected_commodity'] = $this->selected_commodity;
        $data['selected_commodity_price'] = $this->selected_commodity_price;

        Credit::create($data);

        // User::create($data);
        return redirect()->route('login')->with('success', 'Registrasi akun berhasil, silahkan login'); ;
    }
}
