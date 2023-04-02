@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header gradient text-white ">Upload Manuscript Terbaru #{{$article->id}}</div>

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
                    <form action="{{route($action.'.manuscript.store.revised')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @can('editor')
                        <div class="mb-3">
                            {{ Form::label('comment', 'Komentar') }}
                            {{ Form::textarea('comment', null, ['class' => 'form-control', 'rows' => 7, 'required' => 'true']) }}
                        </div>
                        @endcan
                        <div class="mb-3">
                            <label id="file">File Revisi Manuscript</label>
                            <input type="file" id="file" name="file" class="form-control" accept="application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document" max="5120" required/>
                        </div>

                        {{ Form::hidden('article_id', $article->id, null) }}
                        <small><em>Format file yang diwajibkan diunggah adalah dalam bentuk *.docx atau *.doc dengan ukuran maksimal 5MB</em></small>
                        <hr/>
                        <a href="{{ route($action.'.show', $article->id) }}" class="btn btn-danger">{{ __('Batal') }}</a>
                       {{ Form::submit('Kirim', ['class' => 'btn btn-primary']) }}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
