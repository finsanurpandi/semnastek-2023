@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header gradient text-white ">Artikel #{{ auth()->user()->name }}</div>

                <div class="card-body">
                    <a href="{{ route('author.create') }}" class="btn btn-primary">Tambah Artikel</a>

                    <br/><hr/>
                    <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr class="text-center bg-secondary text-white">
                            <th>NO</th>
                            <th>ID ARTIKEL</th>
                            <th>JUDUL</th>
                            <th>TANGGAL DIBUAT</th>
                            <th>TANGGAL SUBMIT</th>
                            <th>AKSI</th>
                        </tr>
                        @php $no = 1; @endphp
                        @if (count($articles) > 0)
                        @foreach ($articles as $article)
                            <tr class="text-center">
                                <td>{{ $no++ }}</td>
                                <td><a href="{{ route('author.show', $article->id) }}" class="btn btn-link">{{ $article->id }}</a></td>
                                <td>{{ $article->title }}</td>
                                <td>{{ $article->created_at }}</td>
                                <td>{{ $article->submitted_at }}</td>
                                <td>
                                    @if($article->submitted_at == null)
                                        {!! Form::open(['url' => route('author.destroy', $article->id), 'method' => 'DELETE', 'id' => 'form-hapus']) !!}
                                            <button class="btn btn-danger text-white text-small show_confirm" data-name="{{$article->id}}" title="hapus draft">Hapus Draft</button>
                                        {!! Form::close() !!}
                                    @endif

                                    @if($article->submitted_at)
                                        {!! Form::open(['url' => route('author.setdraft', $article->id), 'method' => 'DELETE', 'id' => 'form-hapus']) !!}
                                            <button class="btn btn-link text-danger show_set_draft" data-name="{{$article->id}}" title="set draft">Set Draft</button>
                                        {!! Form::close() !!}
                                    @endif

                                    @if($article->submission_id == 3)
                                        <a href="{{ route('author.revised_result', $article->id) }}" class="btn btn-warning text-white">Lihat Revisi</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        @else
                            <tr class="text-center">
                                <td colspan="6">Data artikel kosong</td>
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
