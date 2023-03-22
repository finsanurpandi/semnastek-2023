@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">List Artikel</div>

                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr class="text-center table-primary">
                            <th>NO</th>
                            <th>ID ARTIKEL</th>
                            <th>JUDUL</th>
                            <th>TANGGAL DIBUAT</th>
                            <th>TANGGAL SUBMIT</th>
                            <th>ARTIKEL</th>
                            @can('editor')
                            <th>REVIEWER</th>
                            @endcan
                            <th>AKSI</th>
                        </tr>
                        @php $no = 1; @endphp
                        @foreach ($articles as $article)
                        <tr class="text-center">
                            <td>{{ $no++ }}</td>
                            @can('editor')
                            <td><a href="{{ route('editor.show', $article->article_id) }}" class="btn btn-link">{{ $article->article_id }}</a></td>
                            @endcan
                            @can('reviewer')
                            <td><a href="{{ route('reviewer.show', $article->id) }}" class="btn btn-link">{{ $article->id }}</a></td>
                            @endcan
                            <td>{{ $article->title }}</td>
                            <td>{{ $article->created_at }}</td>
                            <td>{{ $article->submitted_at }}</td>
                            @can('reviewer')
                            <td><a href="{{ asset('storage/blind_manuscript/'.$article->file) }}" class="btn btn-link">Unduh</a></td>
                            @endcan
                            @can('editor')
                            <td><a href="{{ asset('storage/manuscript/'.$article->file) }}" class="btn btn-link">Unduh</a></td>
                            <td>{{$article->fullname}}</td>
                            @endcan
                            <td>

                        @can('editor')
                        @if ($article->reviewer_id == null)
                        <a href="{{ route('editor.article_detail', ['article_id' => $article->article_id , 'action' => 'detail']) }}" class="btn btn-primary">Assign</a>
                        @else
                        <a href="{{ route('editor.article_detail', ['article_id' => $article->article_id , 'action' => 'update']) }}" class="btn btn-warning">Update</a>
                        @endif
                        @endcan
                        @can('reviewer')
                        @if($article->submission_status_id == 2 && !$article->review_status_id == 3)
                                {!! Form::open(['url' => route('reviewer.approved', $article->id), 'method' => 'POST', 'id' => 'form-approve']) !!}
                                    <button class="btn btn-success btn-sm text-small show_confirm_approved" data-name="{{$article->id}}" title="Setujui">Approve</button>
                                {!! Form::close() !!}
                                {!! Form::open(['url' => route('reviewer.rejected', $article->id), 'method' => 'POST', 'id' => 'form-approve']) !!}
                                    <button class="btn btn-danger btn-sm text-small show_confirm_rejected" data-name="{{$article->id}}" title="Setujui">Reject</button>
                                {!! Form::close() !!}
                                <a href="{{ route('reviewer.revised_form', $article->id) }}" class="btn btn-warning">Revised</a>
                        @else

                            @if($article->review_status_id == 1)
                                <span class="btn btn-success">ACCEPTED</span>
                            @elseif($article->review_status_id == 4)
                                <span class="btn btn-danger">REJECTED</span>
                            @elseif($article->review_status_id == 3)
                                <a href="{{ route('reviewer.revised_result', $article->id) }}" class="btn btn-primary">Lihat Hasil Revisi</a>
                            @elseif($article->review_status_id == 2)
                                <a href="{{ route('reviewer.revised_result', $article->id) }}" class="btn btn-warning">Lihat Revisi</a>
                            @endif

                        @endif
                        @endcan
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
