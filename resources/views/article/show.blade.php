@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Detail Artikel #{{$article->id}}</div>

                <div class="card-body">
                    @can('reviewer')
                    <a href="{{ route('reviewer.index') }}" class="btn btn-link">[Halaman Utama]</a>
                    @endcan
                    @can('editor')
                    <a href="{{ route('editor.article') }}" class="btn btn-link">[Halaman Utama]</a>
                    @endcan

                    @include("article.data-article")

                    @if (@isset($action))
                        @can('editor')
                            @if($action == 'detail')
                                @include('editor.assign-article')
                            @elseif($action == 'update')
                                @include('editor.edit-article')
                            @endif
                        @endcan
                    @endif
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
