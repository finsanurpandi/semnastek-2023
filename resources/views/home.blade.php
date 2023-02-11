@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Home') }}</div>

                <div class="card-body">
                    Selamat datang di SEMNASTEK-UNSUR.
                    <br/>
                    <br/>Untuk mengunggah artikel dapat dilakukan melalui menu Article pade menu kanan atas.
                    <br/>Untuk mengunduh template penulisan, dapat dilakukan melalui <a href="{{ asset('template_semnastek.docx') }}" class="btn btn-link">[link]</a> berikut.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
