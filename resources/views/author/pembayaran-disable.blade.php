@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header gradient text-white ">{{ __('Message') }}</div>

                <div class="card-body d-flex flex-column justify-content-center">
                    <div class="mb-2 text-center">
                        <h4>Mohon maaf, menu konfirmasi pembayaran belum aktif</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
