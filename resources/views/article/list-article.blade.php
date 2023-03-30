@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header gradient text-white ">List Artikel</div>

                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr class="text-center bg-secondary text-white">
                            <th>NO</th>
                            <th>ID ARTIKEL</th>
                            <th>JUDUL</th>
                            @cannot('keuangan')
                            <th>TANGGAL DIBUAT</th>
                            <th>TANGGAL SUBMIT</th>
                            <th>ARTIKEL</th>
                            @endcannot
                            @can('keuangan')
                            <th>BUKTI BAYAR</th>
                            @endcan
                            @can('editor')
                            <th>REVIEWER</th>
                            @endcan
                            <th>AKSI</th>
                        </tr>
                        @php $no = 1; @endphp
                        @if (count($articles) > 0)
                            @foreach ($articles as $article)
                                <tr class="text-center">
                                    <td>{{ $no++ }}</td>
                                    @can('editor')
                                    <td><a href="{{ route('editor.show', $article->article_id) }}" class="btn btn-link">{{ $article->article_id }}</a></td>
                                    @endcan
                                    @can('reviewer')
                                    <td><a href="{{ route('reviewer.show', $article->id) }}" class="btn btn-link">{{ $article->id }}</a></td>
                                    @endcan
                                    @can('keuangan')
                                    <td>{{ $article->id }}</td>
                                    @endcan
                                    <td>{{ $article->title }}</td>
                                    @cannot('keuangan')
                                    <td>{{ $article->created_at }}</td>
                                    <td>{{ $article->submitted_at }}</td>
                                    @endcannot
                                    @can('reviewer')
                                    <td><a href="{{ asset('storage/blind_manuscript/'.$article->file) }}" class="btn btn-link">Unduh</a></td>
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
                                    <td><a href="{{ asset('storage/manuscript/'.$article->file) }}" class="btn btn-link">Unduh</a></td>
                                    <td>{{$article->fullname}}</td>
                                    @endcan
                                    <td>
                                        @can('keuangan')
                                        @if($article->review_id == 1 && $article->payment_file !== null && $article->submission_id != 4)
                                        {!! Form::open(['url' => route('keuangan.approved_payment', $article->id), 'method' => 'POST', 'id' => 'form-approve']) !!}
                                            <button class="btn btn-success text-white btn-sm text-small show_confirm_approved" data-name="{{$article->id}}" title="Setujui">Approve</button>
                                        {!! Form::close() !!}
                                        @endif
                                        @if($article->submission_id == 4)
                                            <span class="badge bg-primary">Published</span>
                                        @endif
                                        @endcan
                                        @can('editor')
                                        @if ($article->reviewer_id == null)
                                        <a href="{{ route('editor.article_detail', ['article_id' => $article->article_id , 'action' => 'detail']) }}" class="btn btn-primary">Assign</a>
                                        @else
                                            @if ($article->review_id == 2 || $article->review_id == 3)
                                                <a href="{{ route('editor.article_detail', ['article_id' => $article->article_id , 'action' => 'update']) }}" class="btn btn-warning text-white">Update</a>
                                            @elseif ($article->review_id == 1)
                                            <span class="badge bg-success text-white">Accepted Submission</span>
                                            @elseif ($article->review_id == 4)
                                            <span class="badge bg-danger text-white">Declined Submission</span>
                                            @endif
                                        @endif
                                        @endcan
                                        @can('reviewer')
                                        @if($article->submission_id == 2 && !$article->review_id == 3)
                                        <div class="d-flex">
                                            {!! Form::open(['url' => route('reviewer.approved', $article->id), 'method' => 'POST', 'id' => 'form-approve']) !!}
                                            <button class="btn btn-success text-white btn-sm text-small show_confirm_approved" data-name="{{$article->id}}" title="Setujui">Approve</button>
                                            {!! Form::close() !!}
                                            {!! Form::open(['url' => route('reviewer.rejected', $article->id), 'method' => 'POST', 'id' => 'form-approve']) !!}
                                            <button class="btn btn-danger btn-sm text-small show_confirm_rejected" data-name="{{$article->id}}" title="Setujui">Reject</button>
                                            {!! Form::close() !!}
                                            <a href="{{ route('reviewer.revised_form', $article->id) }}" class="btn btn-warning btn-sm text-white">Revised</a>
                                        </div>
                                        @else

                                            @if($article->review_id == 1)
                                                <span class="btn btn-success btn-sm text-white">ACCEPTED</span>
                                            @elseif($article->review_id == 4)
                                                <span class="btn btn-danger btn-sm text-white">REJECTED</span>
                                            @elseif($article->review_id == 3)
                                                <a href="{{ route('reviewer.revised_result', $article->id) }}" class="btn btn-sm btn-primary">Lihat Hasil Revisi</a>
                                            @elseif($article->review_id == 2)
                                                <a href="{{ route('reviewer.revised_result', $article->id) }}" class="btn btn-sm btn-warning text-white">Lihat Revisi</a>
                                            @endif

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
