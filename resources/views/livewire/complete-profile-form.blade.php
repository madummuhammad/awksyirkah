<div class="mt-5">
  @if (Session::has('success'))
  <div class="alert alert-info">{{ Session::get('success') }}</div>
  @endif
  <form action="#" enctype="multipart/form-data">
    @csrf
    @if ($currentStep == 1)
    <div class="step-one">
      <div class="card">
        <div class="card-header bg-success text-white">
          Step 1/7 - Biodata Diri
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group my-2">
                <label for="">Foto KTP (Maks 8MB)</label>
                <input type="file" accept="image/*" class="form-control" wire:model='foto_ktp'>
                <div wire:loading wire:target="foto_ktp">
                  <div class="my-3 spinner-border text-success" role="status">
                    <span class="visually-hidden">Loading...</span>
                  </div>
                </div>
                <span class="text-danger mb-3">
                  @error('foto_ktp')
                  {{ $message }}
                  @enderror
                </span>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group my-2">
                <label for="">NIK</label>
                <input type="number" class="form-control" placeholder="NIK" wire:model='no_ktp'>
                <span class="text-danger mb-3">
                  @error('no_ktp')
                  {{ $message }}
                  @enderror
                </span>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group my-2">
                <label for="">Nama Sesuai KTP</label>
                <input type="text" class="form-control" placeholder="Nama Sesuai KTP" wire:model='nama_ktp'>
                <span class="text-danger mb-3">
                  @error('nama_ktp')
                  {{ $message }}
                  @enderror
                </span>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group my-2">
                <label for="">Tempat Lahir</label>
                <input type="text" class="form-control" placeholder="Tempat Lahir" wire:model='t_tempat'>
                <span class="text-danger mb-3">
                  @error('t_tempat')
                  Tempat lahir harus diisi
                  @enderror
                </span>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group my-2">
                <label for="">Tanggal Lahir</label>
                <input type="date" class="form-control" wire:model='t_lahir'>
                <span class="text-danger mb-3">
                  @error('t_lahir')
                  Tanggal lahir harus diisi
                  @enderror
                </span>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group my-2">
                <label for="">Jenis Kelamin</label>
                <select name="" id="" class="form-control" wire:model='jk'>
                  <option value="">-Pilih Jenis Kelamin-</option>
                  <option value="Laki-laki">Laki-laki</option>
                  <option value="Perempuan">Perempuan</option>
                </select>
                <span class="text-danger mb-3">
                  @error('jk')
                  Jenis Kelamin harus diisi
                  @enderror
                </span>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group my-2">
                <label for="">Agama</label>
                <select name="" id="" class="form-control" wire:model='agama'>
                  <option value="">-Pilih Agama-</option>
                  <option value="Islam">Islam</option>
                  <option value="Kristen">Kristen</option>
                  <option value="Katolik">Katolik</option>
                  <option value="Hindu">Hindu</option>
                  <option value="Buddha">Buddha</option>
                  <option value="Konghuchu">Konghuchu</option>
                </select>
                <span class="text-danger mb-3">
                  @error('agama')
                  {{ $message }}
                  @enderror
                </span>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group my-2">
                <label for="">No HP</label>
                <input type="number" class="form-control" placeholder="No HP" wire:model='no_hp'>
                <span class="text-danger mb-3">
                  @error('no_hp')
                  {{ $message }}
                  @enderror
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endif

    @if ($currentStep == 2)
    <div class="step-two">
      <div class="card">
        <div class="card-header bg-success text-white">
          Step 2/7 - Alamat
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group my-2">
                <label for="">Provinsi</label>
                <select class="form-control" name="provinsi" title="Pilih Provinsi" wire:model='provinsi'>
                  <option value="">-Pilih Provinsi-</option>
                  @foreach ($provinces as $item)
                  <option value="{{$item->nama}}">{{$item->nama}}</option>
                  @endforeach
                </select>
                <span class="text-danger mb-3">
                  @error('provinsi')
                  {{ $message }}
                  @enderror
                </span>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group my-2">
                <label for="">Alamat Sesuai KTP</label>
                <textarea type="text" class="form-control" placeholder="Alamat Sesuai KTP"
                  wire:model='alamat_ktp'></textarea>
                <span class="text-danger mb-3">
                  @error('alamat_ktp')
                  {{ $message }}
                  @enderror
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endif

    @if ($currentStep == 3)
    <div class="step-three">
      <div class="card">
        <div class="card-header bg-success text-white">
          Step 3/7 - Biodata Keluarga
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group my-2">
                <label for="">Status Pernikahan</label>
                <select name="" id="" class="form-control" wire:model='status_pernikahan'>
                  <option value=""> -Pilih Status- </option>
                  <option value="Belum Menikah">Belum Menikah</option>
                  <option value="Sudah Menikah">Sudah Menikah</option>
                </select>
                <span class="text-danger mb-3">
                  @error('status_pernikahan')
                  {{ $message }}
                  @enderror
                </span>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group my-2">
                <label for="">Nama Ibu Kandung</label>
                <input type="text" class="form-control" placeholder="Nama Ibu Kandung" wire:model='ibu_kandung'>
                <span class="text-danger mb-3">
                  @error('ibu_kandung')
                  {{ $message }}
                  @enderror
                </span>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group my-2">
                <label for="">Nama Ahli Waris</label>
                <input type="text" class="form-control" placeholder="Nama Ahli Waris" wire:model='nama_ahli_waris'>
                <span class="text-danger mb-3">
                  @error('nama_ahli_waris')
                  {{ $message }}
                  @enderror
                </span>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group my-2">
                <label for="">NIK Ahli Waris</label>
                <input type="number" class="form-control" placeholder="NIK Ahli Waris" wire:model='nik_ahli_waris'>
                <span class="text-danger mb-3">
                  @error('nik_ahli_waris')
                  {{ $message }}
                  @enderror
                </span>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group my-2">
                <label for="">No Ahli Waris</label>
                <input type="number" class="form-control" placeholder="No Ahli Waris" wire:model='no_ahli_waris'>
                <span class="text-danger mb-3">
                  @error('no_ahli_waris')
                  {{ $message }}
                  @enderror
                </span>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group my-2">
                <label for="">Hubungan Ahli Waris</label>
                <input type="text" class="form-control" placeholder="Hubungan Ahli Waris"
                  wire:model='hubungan_ahli_waris'>
                <span class="text-danger mb-3">
                  @error('hubungan_ahli_waris')
                  {{ $message }}
                  @enderror
                </span>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group my-2">
                <label for="alamat_ahli_waris">Alamat Ahli Waris</label>
                <textarea type="text" class="form-control" placeholder="Alamat Ahli Waris"
                  wire:model='alamat_ahli_waris'></textarea>
                <span class="text-danger mb-3">
                  @error('alamat_ahli_waris')
                  {{ $message }}
                  @enderror
                </span>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
    @endif

    @if ($currentStep == 4)
    <div class="step-four">
      <div class="card">
        <div class="card-header bg-success text-white">
          Step 4/7 - Pekerjaan
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group my-2">
                <label for="">Pendidikan Terakhir</label>
                <select name="" id="" class="form-control" wire:model='pendidikan_terakhir'>
                  <option value="">-Pilih Pendidikan Terakhir-</option>
                  <option value="SD">SD</option>
                  <option value="SMP">SMP</option>
                  <option value="SMA">SMA</option>
                  <option value="SMK">SMK</option>
                  <option value="Diploma">Diploma</option>
                  <option value="S1">S1</option>
                  <option value="S2">S2</option>
                  <option value="S3">S3</option>
                </select>
                @error('pekerjaan')
                {{ $message }}
                @enderror
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group my-2">
                <label for="">Pekerjaan</label>
                <select name="" id="" class="form-control" wire:model='pekerjaan'>
                  <option value="">-Pilih Pekerjaan-</option>
                  <option value="PNS">PNS</option>
                  <option value="TNI/POLRI">TNI/POLRI</option>
                  <option value="Karyawan BUMN">Karyawan BUMN</option>
                  <option value="Karyawan Swasta">Karyawan Swasta</option>
                  <option value="Wiraswasta">Wiraswasta</option>
                  <option value="Pelajar/Mahasiswa">Pelajar/Mahasiswa</option>
                  <option value="Belum Bekerja">Belum Bekerja</option>
                </select>
                @error('pekerjaan')
                {{ $message }}
                @enderror
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group my-2">
                <label for="">Bidang Pekerjaan</label>
                <input type="text" class="form-control" placeholder="Bidang Pekerjaan" wire:model='bidang_pekerjaan'>
                <span class="text-danger mb-3">
                  @error('bidang_pekerjaan')
                  {{ $message }}
                  @enderror
                </span>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group my-2">
                <label for="">Pendapatan Per bulan</label>
                <select name="" id="" class="form-control" wire:model='pendapatan_per_bulan'>
                  <option value="">-Pilih Pendapatan-</option>
                  <option value="0 - Rp 2.950.000">0 - Rp 2.950.000</option>
                  <option value="Rp 2.950.001 - Rp 5.935.000">Rp 2.950.001 - Rp 5.935.000</option>
                  <option value="Rp 5.935.001 - Rp 11.865.000">Rp 5.935.001 - Rp 11.865.000</option>
                  <option value="Rp 11.865.001 - Rp 24.988.000">Rp 11.865.001 - Rp 24.988.000</option>
                  <option value="Rp 24.988.001 - Rp 208.330.000">Rp 24.988.001 - Rp 208.330.000</option>
                  <option value="Rp 208.330.001 - Rp 4.000.233.000">Rp 208.330.001 - Rp 4.000.233.000</option>
                  <option value=">4.000.233.000">>4.000.233.000</option>
                </select>
                @error('pendapatan_per_bulan')
                {{ $message }}
                @enderror
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group my-2">
                <label for="">Alamat Pekerjaan</label>
                <textarea row="5" type="text" class="form-control" placeholder="Alamat Pekerjaan"
                  wire:model='alamat_pekerjaan'></textarea>
                <span class="text-danger mb-3">
                  @error('alamat_pekerjaan')
                  {{ $message }}
                  @enderror
                </span>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group my-2">
                <label for="">Sumber Dana</label>
                <input type="text" class="form-control" placeholder="Sumber Dana" wire:model='sumber_dana'>
                <span class="text-danger mb-3">
                  @error('sumber_dana')
                  {{ $message }}
                  @enderror
                </span>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group my-2">
                <label for="">-Pengalaman Kerja-</label>
                <select name="" id="" class="form-control" wire:model='pengalaman_kerja'>
                  <option value="">-Pilih Pengalaman Kerja-</option>
                  <option value="Pelajar/ belum pernah bekerja">Pelajar/Belum pernah bekerja</option>
                  <option value="<1 tahun">
                    < 1 tahun </option>
                  <option value="1-2 tahun">1-2 tahun</option>
                  <option value="2-3 tahun">2-3 tahun</option>
                  <option value=">3 tahun"> > 3 tahun</option>
                </select>
                @error('pengalaman_kerja')
                {{ $message }}
                @enderror
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endif

    @if ($currentStep == 5)
    <div class="step-five">
      <div class="card">
        <div class="card-header bg-success text-white">
          Step 5/7 - Informasi Pajak
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group my-2">
                <label for="">No NPWP</label>
                <input type="text" class="form-control" placeholder="No NPWP" wire:model='no_npwp' wire:change="formatNpwp"  wire:keyup="formatNpwp">
                <span class="text-danger mb-3">
                  @error('no_npwp')
                  {{ $message }}
                  @enderror
                </span>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group my-2">
                <label for="">Foto NPWP (Maks 8MB)</label>
                <input type="file" accept="image/*" class="form-control" wire:model='foto_npwp'>
                <div wire:loading wire:target="foto_npwp">
                  <div class="my-3 spinner-border text-success" role="status">
                    <span class="visually-hidden">Loading...</span>
                  </div>
                </div>
                <span class="text-danger mb-3">
                  @error('foto_npwp')
                  {{ $message }}
                  @enderror
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endif

    @if ($currentStep == 6)
    <div class="step-six">
      <div class="card">
        <div class="card-header bg-success text-white">
          Step 6/7 - Akun Bank
        </div>
        <div class="card-body">
          <input type="hidden" name="test">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group my-2">
                <label for="">Nama Bank</label>
                <input type="text" class="form-control" placeholder="Nama Bank" wire:model='nama_bank'>
                <span class="text-danger mb-3">
                  @error('nama_bank')
                  {{ $message }}
                  @enderror
                </span>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group my-2">
                <label for="">No Rekening</label>
                <input type="number" class="form-control" placeholder="No Rekening" wire:model='no_rek'>
                <span class="text-danger mb-3">
                  @error('no_rek')
                  {{ $message }}
                  @enderror
                </span>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group my-2">
                <label for="">Nama Pemilik Rekening</label>
                <input type="text" class="form-control" placeholder="Nama Pemilik Rekening" wire:model='nama_pemilik'>
                <span class="text-danger mb-3">
                  @error('nama_pemilik')
                  {{ $message }}
                  @enderror
                </span>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group my-2">
                <label for="">Foto Rekening Koran 3 Bulan Terakhir (Maks 8MB)</label>
                <input type="file" accept="image/*" class="form-control" wire:model='rekening_koran'>
                <div wire:loading wire:target="rekening_koran">
                  <div class="my-3 spinner-border text-success" role="status">
                    <span class="visually-hidden">Loading...</span>
                  </div>
                </div>
                <span class="text-danger mb-3">
                  @error('rekening_koran')
                  {{ $message }}
                  @enderror
                </span>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group my-2">
                <label for="">No Gopay *opsional</label>
                <input type="number" class="form-control" placeholder="No Gopay *opsional" wire:model='no_gopay'>
                <span class="text-danger mb-3">
                  @error('nama_pemilik')
                  {{ $message }}
                  @enderror
                </span>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group my-2">
                <label for="">No Dana *opsional</label>
                <input type="number" class="form-control" placeholder="No Gopay *opsional" wire:model='no_dana'>
                <span class="text-danger mb-3">
                  @error('nama_pemilik')
                  {{ $message }}
                  @enderror
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endif

    @if ($currentStep == 7)
    <div class="step-seven">
      <div class="card">
        <div class="card-header bg-success text-white">
          Step 7/7 - Dokumen Pendukung
        </div>
        <input type="hidden" name="test2">
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group my-2">
                <label for="">Foto SKCK</label>
                <input type="file" accept="image/*" class="form-control" wire:model='skck'>
                <div wire:loading wire:target="skck">
                  <div class="my-3 spinner-border text-success" role="status">
                    <span class="visually-hidden">Loading...</span>
                  </div>
                </div>
                <span class="text-danger mb-3">
                  @error('skck')
                  {{ $message }}
                  @enderror
                </span>
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group my-2">
                <label for="">Foto iDeb Slik OJK</label>
                <input type="file" accept="image/*" class="form-control" wire:model='slik_ojk'>
                <div wire:loading wire:target="slik_ojk">
                  <div class="my-3 spinner-border text-success" role="status">
                    <span class="visually-hidden">Loading...</span>
                  </div>
                </div>
                <span class="text-danger mb-3">
                  @error('slik_ojk')
                  {{ $message }}
                  @enderror
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endif

    <div wire:loading.remove>
      <div class="action-buttons d-flex justify-content-between bg-white pt-3 pb-2">
        @if ($currentStep == 1)
        <div></div>
        <div>
          <button type="button" class="btn btn-md btn-success" wire:click='increaseStep()'>Lanjut ></button>
        </div>
        @endif
        @if ($currentStep != 1 && $currentStep != $totalSteps)
        <button type="button" class="btn btn-md btn-warning" wire:click='decreaseStep()'>
          < Kembali </button>
            <button type="button" class="btn btn-md btn-success" wire:click='increaseStep()'>Lanjut ></button>
            @endif
            @if ($currentStep == $totalSteps)
            <button type="button" class="btn btn-md btn-warning" wire:click='decreaseStep()'>
              < Kembali</button>
                <button type="button" class="btn btn-md btn-primary" wire:click='save()'>Save</button>
                @endif
      </div>

    </div>
    <div wire:loading>
      <button class="btn btn-block btn-light w-100 mt-3" type="button" disabled>
        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
        Loading ...
      </button>
    </div>

  </form>
</div>
