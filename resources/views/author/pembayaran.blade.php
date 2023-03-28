@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header gradient text-white ">Upload Bukti Pembayaran #{{$article->id}}</div>

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
                    <form action="{{route('author.pembayaran.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label id="file">File Bukti Pembayaran</label>
                            <input type="file" id="file" name="file" class="form-control" accept="image/*" required/>

                        </div>
                        {{ Form::hidden('article_id', $article->id, null) }}
                        <small><em>Format file yang diwajibkan diunggah adalah dalam bentuk foto</em></small>
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
