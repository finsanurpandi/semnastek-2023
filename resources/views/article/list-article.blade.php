@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header gradient text-white ">List Artikel</div>

                <div class="card-body">
                    @can('editor')
                        <a href="{{ route('editor.export') }}" class="btn btn-primary mb-1"><i class="fas fa-file-export"></i> Export Data Article</a>
                    @endcan
                    <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr class="text-center bg-secondary text-white">
                            <th>NO</th>
                            <th>ID ARTIKEL</th>
                            <th>JUDUL</th>

                            @cannot('keuangan')
                                <th>DEPARTMENT</th>
                                <th>SCOPE</th>
                                <th>ARTIKEL</th>
                            @endcannot

                            @can('keuangan')
                                <th>BUKTI BAYAR</th>
                            @endcan

                            @can('editor')
                                <th>REVIEWER</th>
                            @endcan

                            <th><i class="fas fa-gear"></i></th>
                        </tr>
                        @php $no = 1; @endphp
                        @if (count($articles) > 0)
                            @foreach ($articles as $article)
                                <tr class="text-center">
                                    <td>{{ $no++ }}</td>

                                    @can('editor')
                                        <td><a href="{{ route('editor.show', $article->id) }}" class="btn btn-link">{{ $article->id }}</a></td>

                                    @endcan

                                    @can('reviewer')
                                        <td><a href="{{ route('reviewer.show', $article->id) }}" class="btn btn-link">{{ $article->id }}</a></td>
                                    @endcan

                                    @can('keuangan')
                                        <td>{{ $article->id }}</td>
                                    @endcan

                                    <td>{{ $article->title }}</td>

                                    @cannot('keuangan')
                                        <td>
                                            @foreach($scopes as $scope)
                                                @if($scope->id == $article->scope_id)
                                                    @foreach($departments as $department)
                                                        @if($department->id == $scope->department_id)
                                                            {{ $department->name }}
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($scopes as $scope)
                                                @if($scope->id == $article->scope_id)
                                                    {{ $scope->scope}}
                                                @endif
                                            @endforeach
                                        </td>
                                    @endcannot

                                    @can('reviewer')
                                        <td><a href="{{ asset('storage/blind_manuscript/'.$article->file) }}" class="btn btn-link">Unduh Blind Manuscript</a></td>
                                    @endcan
                                    @can('keuangan')
                                        <td>
                                            @if($article->payment_file !== null)
                                                <a href="{{ asset('storage/payments/'.$article->payment_file) }}" class="btn btn-link">Lihat Bukti Bayar</a>
                                            @else
                                                <p>Belum Melakukan Pembayaran</p>
                                            @endif
                                        </td>
                                    @endcan

                                    @can('editor')
                                        <td><a href="{{ asset('storage/'.$article->file) }}" class="btn btn-link">Unduh Manuscript</a></td>
                                        <td>
                                            <span>{{$article->fullname}}</span> <br />
                                            @if($article->review_id == 5)
                                                <span class="badge bg-success">Accepted By Review</span>
                                            @elseif($article->review_id == 6)
                                                <span class="badge bg-danger">Declined By Review</span>
                                            @elseif($article->review_id == 7)
                                                <span class="badge bg-warning">Revised By Review</span>
                                            @endif
                                        </td>
                                    @endcan

                                    <td>
                                        @can('keuangan')
                                            @if($article->review_id == 1 && $article->payment_file !== null && $article->submission_id != 4)
                                                @if($article->payment_status == 0)
                                                    <span class="badge bg-warning">Sedang diupload ulang</span>
                                                @else
                                                    <div class="d-flex justify-content-center">
                                                        {!! Form::open(['url' => route('keuangan.approved_payment', $article->id), 'method' => 'POST', 'id' => 'form-approve']) !!}
                                                            <button class="btn btn-success text-white btn-sm text-small show_confirm_approved" data-name="{{$article->id}}" title="Setujui">Approve</button>
                                                        {!! Form::close() !!}
                                                        {!! Form::open(['url' => route('keuangan.reupload_payment', $article->id), 'method' => 'POST', 'id' => 'form-approve']) !!}
                                                            <button class="btn btn-warning ms-2 text-white btn-sm text-small show_confirm_reupload" data-name="{{$article->id}}" title="Upload Ulang">Re-Upload</button>
                                                        {!! Form::close() !!}
                                                    </div>
                                                @endif
                                            @endif
                                            @if($article->submission_id == 4)
                                                <span class="badge bg-primary">Published</span>
                                            @endif
                                        @endcan

                                        @can('editor')
                                            @if ($article->reviewer_id == null)
                                                <a href="{{ route('editor.article_detail', ['article_id' => $article->id , 'action' => 'detail']) }}" class="btn btn-primary">Assign</a>
                                            @else
                                                @if ($article->review_id == 1 && $article->submission_id != 4)
                                                    <span class="badge bg-success text-white">Accepted Submission</span>
                                                @elseif ($article->review_id == 4)
                                                    <span class="badge bg-danger text-white">Declined Submission</span>
                                                @elseif($article->submission_id == 3)
                                                    <span class="badge bg-primary">Submission In Editing</span>
                                                @elseif($article->review_id == 3)
                                                    <a href="{{ asset('storage/result_revise_manuscript/'.$article->final_paper) }}" class="btn btn-link">Lihat Final Paper</a>
                                                    <div class="d-flex">
                                                    {!! Form::open(['url' => route('editor.approved', $article->id), 'method' => 'POST', 'id' => 'form-approve']) !!}
                                                        <button class="btn btn-success me-1 text-white btn-sm text-small show_confirm_approved" data-name="{{$article->id}}" title="Setujui">Approve</button>
                                                    {!! Form::close() !!}
                                                    {!! Form::open(['url' => route('editor.rejected', $article->id), 'method' => 'POST', 'id' => 'form-approve']) !!}
                                                        <button class="btn btn-danger me-1 btn-sm text-small show_confirm_rejected" data-name="{{$article->id}}" title="Setujui">Reject</button>
                                                    {!! Form::close() !!}
                                                </div>
                                                @elseif($article->submission_id == 4)
                                                    <span class="badge bg-primary">Published</span>
                                                    <a href="{{ asset('storage/result_revise_manuscript/'.$article->final_paper) }}" class="btn btn-link">Unduh Final Paper</a>
                                                @elseif($article->review_id == 5 || $article->review_id == 6 || $article->revision_file !== null)
                                                    @if($article->submission_id == 2)
                                                        <div class="d-flex">
                                                            {!! Form::open(['url' => route('editor.approved', $article->id), 'method' => 'POST', 'id' => 'form-approve']) !!}
                                                                <button class="btn btn-success me-1 text-white btn-sm text-small show_confirm_approved" data-name="{{$article->id}}" title="Setujui">Approve</button>
                                                            {!! Form::close() !!}
                                                            {!! Form::open(['url' => route('editor.rejected', $article->id), 'method' => 'POST', 'id' => 'form-approve']) !!}
                                                                <button class="btn btn-danger me-1 btn-sm text-small show_confirm_rejected" data-name="{{$article->id}}" title="Setujui">Reject</button>
                                                            {!! Form::close() !!}
                                                            @if($article->review_id == 7)
                                                                <a href="{{ route('editor.revised_result', $article->id) }}" class="btn btn-sm btn-warning text-white">Lihat Revisi</a>
                                                            @else
                                                                <a href="{{ route('editor.revised_result', $article->id) }}" class="btn btn-sm btn-warning text-white">Revisi</a>
                                                            @endif
                                                        </div>
                                                    @else
                                                        <span class="badge bg-warning">In Review by Reviewer</span>
                                                    @endif
                                                @else
                                                    <span class="badge bg-warning">In Review by Reviewer</span>
                                                @endif
                                            @endif
                                        @endcan

                                        @can('reviewer')
                                            @if ($article->review_id == 1 && $article->submission_id != 4)
                                                <span class="badge bg-success text-white">Accepted Submission</span>
                                            @elseif ($article->review_id == 4)
                                                <span class="badge bg-danger text-white">Declined Submission</span>
                                            @elseif($article->submission_id == 3)
                                                <span class="badge bg-primary">In Review - Submission In Editing</span>
                                            @elseif($article->review_id == 3)
                                                <span class="badge bg-primary">In Review - Resubmit For Review to Editor</span>
                                            @elseif($article->submission_id == 4)
                                                <span class="badge bg-primary">Published</span>
                                            @elseif($article->review_id != 5 && $article->review_id != 6 && $article->review_id != 7 )
                                            <div class="d-flex">
                                                {!! Form::open(['url' => route('reviewer.approved', $article->id), 'method' => 'POST', 'id' => 'form-approve']) !!}
                                                    <button class="btn btn-success me-1 text-white btn-sm text-small show_confirm_approved" data-name="{{$article->id}}" title="Setujui">Approve</button>
                                                {!! Form::close() !!}
                                                {!! Form::open(['url' => route('reviewer.rejected', $article->id), 'method' => 'POST', 'id' => 'form-approve']) !!}
                                                    <button class="btn btn-danger me-1 btn-sm text-small show_confirm_rejected" data-name="{{$article->id}}" title="Setujui">Reject</button>
                                                {!! Form::close() !!}
                                                @if($article->revision_file !== null)
                                                    <a href="{{ route('reviewer.revised_result', $article->id) }}" class="btn btn-sm btn-primary">Lihat Revisi</a>
                                                @else
                                                    <a href="{{ route('reviewer.revised_form', $article->id) }}" class="btn btn-warning btn-sm text-white">Revise</a>
                                                @endif
                                            </div>
                                            @else
                                                <span class="badge bg-warning">In Review by Editor</span>
                                            @endif
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr class="text-center">
                                @cannot('keuangan')
                                    <td colspan="7">Data artikel kosong</td>
                                @endcannot
                                @can('keuangan')
                                    <td colspan="5">Data artikel kosong</td>
                                @endcan
                            </tr>
                        @endif
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
