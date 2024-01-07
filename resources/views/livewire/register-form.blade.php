<div>

  <div class="row gx-4 gx-5 justify-content-center mb-5">
    <form wire:submit.prevent="save" method="POST">
      @csrf
      <div class="form-group my-3">
        <label for="nama" class="text-success"><strong>Jenis Pendanaan</strong></label>
        <select class="form-control" wire:model='jenis_pendanaan'>
          <option value="">Pilih Jenis Pendanaan</option>
          <option value="Kredit">Kredit</option>
          <option value="Debit">Debit</option>
        </select>
        <span class="text-danger mb-3">
          @error('jenis_pendanaan')
            {{ $message }}
          @enderror
        </span>
      </div>
      <div class="form-group my-3">
        <label for="nama" class="text-success"><strong>Nama</strong></label>
        <input type="text" name="nama" id="nama" class="form-control" wire:model='nama'>
        <span class="text-danger mb-3">
          @error('nama')
            {{ $message }}
          @enderror
        </span>
      </div>
      <div class="form-group my-3">
        <label for="username" class="text-success"><strong>Username</strong> </label> <sup>*</sup>Tidak boleh ada spasi
        <input type="text" name="username" id="username" class="form-control" wire:model='username'>
        <span class="text-danger mb-3">
          @error('username')
            {{ $message }}
          @enderror
        </span>
      </div>
      <div class="form-group my-3">
        <label for="email"class="text-success"><strong>Email</strong></label>
        <input type="email" name="email" id="email" class="form-control" wire:model='email'>
        <span class="text-danger mb-3">
          @error('email')
            {{ $message }}
          @enderror
        </span>
      </div>
      <div class="form-group my-3">
        <label for="password"class="text-success"><strong>Password</strong></label>
        <input type="password" name="password" id="password" class="form-control" wire:model='password'>
        <span class="text-danger mb-3">
          @error('password')
            {{ $message }}
          @enderror
        </span>
      </div>
      <div class="form-group my-3">
        <label for="password"class="text-success"><strong>Konfirmasi Password</strong></label>
        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"
          wire:model='password_confirmation'>
        <span class="text-danger mb-3">
          @error('nama')
            {{ $message }}
          @enderror
        </span>
      </div>
      <button type="submit" class="btn btn-success mt-1">
        Daftar
      </button>

      Klik <a href="{{ route('login') }}">LOGIN</a> jika sudah mendaftar
    </form>
  </div>
</div>
