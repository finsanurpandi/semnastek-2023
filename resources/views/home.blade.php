@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header gradient text-white ">{{ __('Home') }}</div>

                <div class="card-body d-flex flex-column justify-content-center">
                    <div class="mb-2 text-center">
                        <h4>Selamat datang di SEMNASTEK-UNSUR.</h4>
                        @if($role == 4)
                        <span class="badge bg-info"><i class="fas fa-info-circle"></i> Untuk mengunduh template penulisan, dapat dilakukan melalui <a href="{{ asset('template_semnastek.docx') }}" class="btn btn-link p-0">[link]</a> berikut.</span>
                        @elseif ($role == 5)
                            <span class="badge bg-info"><i class="fas fa-info-circle"></i> Untuk menambahkan reviewer dapat dilakukan melalui menu Reviewer pade menu kanan atas.</span>
                        @elseif ($role == 3)
                            <span class="badge bg-info"><i class="fas fa-info-circle"></i> Untuk melihat list artikel dapat dilakukan melalui menu List Article pade menu kanan atas.</span>
                        @elseif ($role == 2)
                            <span class="badge bg-info"><i class="fas fa-info-circle"></i> Untuk melakukan konfirmasi pembayaran dapat dilakukan melalui menu Pembayaran pade menu kanan atas.</span>
                        @endif
                    </div>
                    <div>
                        <img src="{{asset('img/callforpaper.png')}}" alt="" width="100%">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
