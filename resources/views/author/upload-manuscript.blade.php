@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Upload Manuscript #{{$article->id}}</div>

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
                    <form action="{{route('author.manuscript.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @include('author.form-manuscript')
                        <small><em>Format file yang diwajibkan diunggah adalah dalam bentuk *.docx atau *.doc</em></small>
                        <hr/>
                        <a href="{{ route('author.show', $article->id) }}" class="btn btn-danger">{{ __('Batal') }}</a>
                       {{ Form::submit('Kirim', ['class' => 'btn btn-primary']) }}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection