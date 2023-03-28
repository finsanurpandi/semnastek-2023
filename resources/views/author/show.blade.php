@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between gradient text-white ">
                    <span class="align-self-center">Detail Artikel #{{$article->id}}</span>
                    <a href="{{ route('author.index') }}" class="btn btn-link text-white"><i class="fas fa-arrow-left"></i> Kembali</a>
                </div>
                <div class="card-body">
                    <div class="flex justify-between">
                        <h3>
                            <span class="badge bg-info"> Status :
                        @if($status)
                            {{-- when a status "submission in editing", author's page will provide a message "revision required", and show a message "accept submission" when reviewer was a proved --}}
                            @if($status->submission_id !== 3)
                                @if($review_status->review_id === 1 && $status->submission_id === 4)
                                    {{$status->name}}
                                @elseif($review_status->review_id === 1)
                                    {{$review_status->name}}
                                @else
                                {{$status->name}}
                                @endif
                            @else
                                {{$review_status->name}}
                            @endif
                        @else
                            Draft
                        @endif
                        </span>
                        </h3>
                    </div>

                    <table class="table table-bordered">
                        <tr class="bg-secondary text-white">
                            <th>Keterangan</th>
                            <th>Tambah/Edit</th>
                            <th>Hasil</th>
                        </tr>
                        @can('author', 'editor')
                        <tr>
                            <th>Authors</th>
                            <td class="text-center">
                                @if(!$status)<a href="{{ route('author.add', $article->id)}}" class="btn btn-link"><i class="fa-sharp fa-regular fa-square-plus"></i></a>@endif
                            </td>
                            <td>
                                @if(!$article->authors->isEmpty())
                                    <ol>
                                    @foreach($article->authors as $author)
                                        <li>{{ $author->firstname.' '.$author->lastname.' ('.$author->affiliation.')' }}</li>
                                    @endforeach
                                    </ol>
                                @else
                                    <span class="text-danger"><em>Author belum ditambahkan</em></span>
                                @endif
                            </td>
                        </tr>
                        @endcan
                        <tr >
                            <th>Judul</th>
                            <td class="text-center">
                                @if(!$status)<a href="{{ route('author.edit', ['id' => $article->id, 'tag' => 'title']) }}" class="btn btn-link"><i class="fa fa-edit"></i></a>@endif
                            </td>
                            <td class="text-justify">{{ $article->title }}</td>
                        </tr>
                        <tr >
                            <th>Abstrak</th>
                            <td class="text-center">
                                @if(!$status)<a href="{{ route('author.edit', ['id' => $article->id, 'tag' => 'abstract']) }}" class="btn btn-link"><i class="fa fa-edit"></i></a>@endif
                            </td>
                            <td class="text-justify">{{ $article->abstract }}</td>
                        </tr>
                        <tr >
                            <th>Kata Kunci</th>
                            <td class="text-center">
                                @if(!$status)<a href="{{ route('author.edit', ['id' => $article->id, 'tag' => 'keywords']) }}" class="btn btn-link"><i class="fa fa-edit"></i></a>@endif
                            </td>
                            <td>{{ $article->keywords }}</td>
                        </tr>
                        <tr >
                            <th>Lingkup</th>
                            <td class="text-center">
                                @if(!$status)<a href="{{ route('author.edit', ['id' => $article->id, 'tag' => 'scope']) }}" class="btn btn-link"><i class="fa fa-edit"></i></a>@endcan
                            </td>
                            <td>{{ $article->scope->scope }}</td>
                        </tr>
                        <tr >
                            <th>Manuscript</th>
                            @if($article->active == 1)<td class="text-center">
                                @if($article->manuscript == null)<a href="{{ route('author.manuscript.create', $article->id) }}" class="btn btn-link"><i class="fa fa-upload"></i></a>@endif
                            </td>@endcan
                            <td>
                                @if($article->manuscript !== null)

                                        {!! Form::open(['url' => route('author.manuscript.delete', $article->manuscript->id), 'method' => 'DELETE', 'id' => 'form-hapus']) !!}
                                        <a href="{{ asset('storage/manuscript/'.$article->manuscript->file) }}" class="btn btn-link">{{$article->manuscript->file}}</a>
                                        @if(!$status)<button class="btn btn-link text-danger show_confirm" data-name="{{$article->manuscript->file}}" title="hapus manuscript"><i class="fa fa-trash"></i></button>@endif
                                        {!! Form::close() !!}

                                @else
                                    <span class="text-danger"><em>Belum unggah dokumen</em></span>
                                @endif
                            </td>
                        </tr>


                    </table>
                    @if(!$article->authors->isEmpty() && $article->manuscript)
                        {!! Form::open(['url' => route('author.submit', $article->id)]) !!}
                        @if(!$status)<button class="btn btn-primary show_submit" data-name="{{$article->manuscript->file}}" title="hapus manuscript">Submit Artikel</button>@endif
                        {!! Form::close() !!}
                    @else
                        <button class="btn btn-primary show_submit" title="hapus manuscript" disabled>Submit Artikel</button>
                        <small class="text-muted"><em>tombol submit akan aktif jika semua input telah diisi</em></small>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
