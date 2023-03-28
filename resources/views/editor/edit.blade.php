@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header gradient text-white ">Edit Reviewer - {{$reviewer->fullname}}</div>

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
                    {!! Form::model($reviewer, ['url' => route('editor.update'), 'method' => 'PATCH']) !!}
                        @include('editor.form-edit')
                        <a href="{{ route('editor.index', $reviewer->id) }}" class="btn btn-danger">{{ __('Batal') }}</a>
                       {{ Form::submit('Update', ['class' => 'btn btn-success']) }}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

