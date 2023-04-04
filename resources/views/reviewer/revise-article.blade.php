@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header gradient text-white ">{{ __('Revisi Artikel') }}</div>

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

                    <form action="{{route('reviewer.revised')}}" method="post" enctype="multipart/form-data">
                        @csrf
                            @include('reviewer.form-revision');
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
