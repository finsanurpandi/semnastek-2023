@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Revisi Artikel') }}</div>

                <div class="card-body">
                    @foreach ($articles as $article)
                    <span class="">Revisi Tanggal - {{$article->created_at}}</span>
                    <table class="table table-bordered">
                        <tr class="table-primary">
                            <th>Keterangan</th>
                            <th>Hasil</th>
                        </tr>
                        <tr >
                            <th>Komentar</th>
                            <td class="text-justify">{{ $article->comment }}</td>
                        </tr>
                        <tr>
                            <th>File Revisi</th>
                            <td>
                                <a href="{{ asset('storage/revise_manuscript/'.$article->revision_file) }}" class="btn btn-link">{{$article->revision_file}}</a>
                            </td>
                        </tr>
                        <tr>
                            <th>Unggah File Hasil Revisi</th>
                            <td>
                                @if($article->new_file !== null)
                                    <a href="{{ asset('storage/result_revise_manuscript/'.$article->new_file) }}" class="btn btn-link">Unduh File</a>
                                @else
                                    @cannot('author')
                                            <span class="text-danger"><em>Author Belum unggah dokumen terbaru</em></span>
                                    @endcannot
                                    @can('author')
                                    <a href="{{ route('author.manuscript.revised', $article->article_id) }}" class="btn btn-link"><i class="fa fa-upload"></i></a>
                                    @endcan
                                @endif
                            </td>
                        </tr>
                    </table>


                    @endforeach
                    @if($article->new_file !== null)
                        {!! Form::open(['url' => route('reviewer.revise_to_approved', $id), 'method' => 'POST', 'id' => 'form-approve']) !!}
                        <button class="btn btn-success btn-sm text-small show_confirm_approved" data-name="{{$id}}" title="Setujui">Approve</button>
                        {!! Form::close() !!}
                        {!! Form::open(['url' => route('reviewer.revise_to_rejected', $id), 'method' => 'POST', 'id' => 'form-approve']) !!}
                        <button class="btn btn-danger btn-sm text-small show_confirm_rejected" data-name="{{$id}}" title="Setujui">Reject</button>
                        {!! Form::close() !!}
                        <a href="{{ route('reviewer.next_revised_form', $id) }}" class="btn btn-warning">Revised</a>
                    @endif
                    <a href="{{ route('reviewer.index') }}" class="btn btn-link">{{ __('Kembali') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
