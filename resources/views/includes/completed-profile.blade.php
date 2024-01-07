@extends('layout.index')
@section('content')
<div class="position-absolute top-50 start-50 translate-middle text-center p-3">
  <img src="{{asset('/img/ilustration.png')}}" alt="" height="400" width="400">
  <div class="my-2">
    <h3 class="text-success">Selamat, Pendaftaran Berhasil!</h3>
    <h6>Terima Kasih telah melengkapi data anda.</h6>
  </div>
</div>
@endsection