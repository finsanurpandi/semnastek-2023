@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header gradient text-white ">{{ __('Message') }}</div>

                <div class="card-body d-flex flex-column justify-content-center">
                    <div class="mb-2 text-center">
                        <h4>Mohon maaf, batas waktu untuk submit artikel sudah habis.</h4>
                        <a href="{{ route('author.index') }}" class="btn btn-link">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
