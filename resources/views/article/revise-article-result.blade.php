@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between gradient text-white ">
                    <span class="align-self-center">Revisi Artikel</span>
                    @can('reviewer')
                    <a href="{{ route('reviewer.index') }}" class="btn btn-link text-white"><i class="fas fa-arrow-left"></i> Kembali</a>
                    @elsecan('editor')
                    <a href="{{ route('editor.article') }}" class="btn btn-link text-white"><i class="fas fa-arrow-left"></i> Kembali</a>
                    @endcan
                </div>
                <div class="card-body">
                    @foreach ($articles as $key => $article)
                    <span class="">Revisi Tanggal - {{$article->created_at}}</span>
                    <table class="table table-bordered">
                        <tr class="bg-secondary text-white">
                            <th>Keterangan</th>
                            <th>Hasil</th>
                        </tr>
                        <tr >
                            @if($key == 0)
                                <th>Komentar Editor</th>
                            @else
                                <th>Komentar Reviewer</th>
                            @endif
                            <td class="text-justify">{{ $article->comment }}</td>
                        </tr>
                        <tr>
                            @can('editor')
                                <th>File Revisi Reviewer</th>
                            @endcan
                            @can('reviewer')
                                <th>File Revisi</th>
                            @endcan
                            @can('author')
                                @if($key == 0)
                                    <th>File Revisi Editor</th>
                                @else
                                    <th>File Revisi Reviewer</th>
                                @endif
                            @endcan
                            <td>
                                @can('editor')
                                    <a href="{{ asset('storage/revise_manuscript/'.$article->revision_file) }}" class="btn btn-link">{{$article->revision_file}}</a>
                                @endcan
                                @cannot('editor')
                                    <a href="{{ asset('storage/revise_manuscript/'.$article->revision_file) }}" class="btn btn-link">{{$article->revision_file}}</a>
                                @endcannot
                            </td>
                        </tr>
                        @can('editor')
                        <tr>
                            <th>File Revisi Editor</th>
                            <td>
                                @if($article->new_file !== null)
                                <a href="{{ asset('storage/revise_manuscript/'.$article->new_file) }}" class="btn btn-link">{{$article->new_file}}</a>
                            @else
                                <a href="{{ route('editor.manuscript.revised', $article->article_id) }}" class="btn btn-link"><i class="fa fa-upload"></i></a>
                             @endif
                            </td>
                        </tr>
                            @endcan
                        @cannot('author')
                            <tr>
                                <th>Final Paper</th>
                                <td>
                                    @if($article->new_file !== null)
                                        <a href="{{ asset('storage/result_revise_manuscript/'.$article->new_file) }}" class="btn btn-link">Unduh File</a>
                                    @else
                                        <span class="text-danger"><em>Author Belum unggah dokumen terbaru</em></span>
                                     @endif
                                </td>
                            </tr>
                        @endcannot
                    </table>
                    @endforeach
                    @can('author')
                        @if($article->new_file !== null)
                            Final Paper <a href="{{ asset('storage/result_revise_manuscript/'.$article->new_file) }}" class="btn btn-link">Unduh File</a>
                        @else
                            <a href="{{ route('author.manuscript.revised', $article->article_id) }}" class="btn btn-link"><i class="fa fa-upload"></i> <span>Unggah Final Paper</span></a>
                        @endif
                    @endcan
                    @can('editor')
                        @if($article->new_file !== null)
                            <div class="d-flex justify-content-end">
                                {!! Form::open(['url' => route('editor.revise_to_approved', $id), 'method' => 'POST', 'id' => 'form-approve']) !!}
                                <button class="btn btn-success text-white text-small me-1 show_confirm_approved" data-name="{{$id}}" title="Setujui">Approve</button>
                                {!! Form::close() !!}
                                {!! Form::open(['url' => route('editor.revise_to_rejected', $id), 'method' => 'POST', 'id' => 'form-approve']) !!}
                                <button class="btn btn-danger text-white text-small me-1 show_confirm_rejected" data-name="{{$id}}" title="Setujui">Reject</button>
                                {!! Form::close() !!}
                            </div>
                        @endif
                    @endcan
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
