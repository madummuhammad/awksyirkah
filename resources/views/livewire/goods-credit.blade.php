<div>

    <div class="row gx-4 gx-5 justify-content-center mb-5">
        <form action="#" method="POST">
            @csrf
            <div class="form-group my-3">
              <label for="credit_item" class="text-success"><strong>Jenis Barang</strong></label>
              <input type="text" name="credit_item" id="credit_item" class="form-control" wire:model='credit_item'>
              <span class="text-danger mb-3">
                @error('credit_item')
                  {{ $message }}
                @enderror
              </span>
            </div>
            <div class="form-group my-3">
              <label for="invoice" class="text-success"><strong>Harga Barang</strong></label>
              <input type="text" name="invoice" id="invoice" class="form-control" wire:model='invoice'>
              <span class="text-danger mb-3">
                @error('invoice')
                  {{ $message }}
                @enderror
              </span>
            </div>
            <div class="form-group my-3">
              <label for="down_payment" class="text-success"><strong>Uang Muka (DP)</strong></label>
              <input type="text" name="down_payment" id="down_payment" class="form-control" wire:model='down_payment'>
              <span class="text-danger mb-3">
                @error('down_payment')
                  {{ $message }}
                @enderror
              </span>
            </div>
            <button type="button" class="btn btn-primary" wire:click="simulate()" >Simulasi</button>
            <table class="table table-bordered table-stripped my-2">
              <tr>
                <td>Tenor</td>
                <td>Angsuran</td>
                <td>Harga Jual</td>
              </tr>
              @if($creditSimulation != null)
              @foreach ($creditSimulation as $item)
              {{-- {{$item['urutan'].'-'.$item['val'].'-'.$item['finalval'] }} <br/> --}}
              <tr>
                <td>{{$item['urutan']}}</td>
                <td>{{$item['val']}}</td>
                <td>{{$item['finalval']}}</td>
              </tr>
              @endforeach
              @endif
            </table>
        </form>
    </div>
</div>
