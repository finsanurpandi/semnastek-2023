@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Ubah Password') }}</div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    {!! Form::open(['url' => route('password.change.update') ]) !!}
                    <div class="mb-3">
                        {{ Form::label('currentpassword', 'Password Saat Ini') }}
                        {{ Form::password('currentpassword', ['class' => 'form-control', 'required' => 'true']) }}
                    </div>
                    <div class="mb-3">
                        {{ Form::label('newpassword', 'Password Baru') }}
                        {{ Form::password('newpassword', ['class' => 'form-control', 'required' => 'true']) }}
                    </div>
                    <div class="mb-3">
                        {{ Form::label('confirmpassword', 'Konfirmasi Password') }}
                        {{ Form::password('confirmpassword', ['class' => 'form-control', 'required' => 'true']) }}
                    </div>
                        <a href="{{ route('author.index') }}" class="btn btn-danger">{{ __('Batal') }}</a>
                       {{ Form::submit('Kirim', ['class' => 'btn btn-primary']) }}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
