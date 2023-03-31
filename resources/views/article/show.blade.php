@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between gradient text-white ">
                    <span class="align-self-center">Detail Artikel #{{$article->id}}</span>
                    @can('reviewer')
                    <a href="{{ route('reviewer.index') }}" class="btn btn-link text-white"><i class="fas fa-arrow-left"></i> Kembali</a>
                    @endcan
                    @can('editor')
                    <a href="{{ route('editor.article') }}" class="btn btn-link text-white"><i class="fas fa-arrow-left"></i> Kembali</a>
                    @endcan
                </div>
                <div class="card-body">

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
