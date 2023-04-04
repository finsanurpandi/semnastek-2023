@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header gradient text-white ">Semua Author untuk Artikel #{{$article->id}}</div>

                <div class="card-body">
                    <a href="{{ route('author.add', $article->id) }}" class="btn btn-primary">Tambah Author</a>

                    <br/><hr/>
                    <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr class="text-center bg-secondary text-white">
                            <th>NO</th>
                            <th>NAMA</th>
                            <th>EMAIL</th>
                            <th>AFILIASI</th>
                            <th><i class="fas fa-gear"></i></th>
                        </tr>
                        @php $no = 1; @endphp
                        @if (count($authors) > 0)
                            @foreach ($authors as $author)
                                <tr class="text-center">
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $author->firstname.' '.$author->lastname}}</td>
                                    <td>{{ $author->email }}</td>
                                    <td>{{ $author->affiliation }}</td>
                                    <td>
                                        {!! Form::open(['url' => route('author.ubah.delete', $author->id), 'method' => 'DELETE', 'id' => 'form-hapus']) !!}
                                                <a href="{{ route('author.ubah', $author->id) }}" class="btn btn-link" title="Edit Author"><i class="fa fa-edit"></i></a>
                                                <button class="btn btn-link text-danger show_confirm" data-name="{{$author->firstname.' '.$author->lastname}}"><i class="fa fa-trash"></i></button>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr class="text-center">
                                <td colspan="5">Data author kosong</td>
                            </tr>
                        @endif
                    </table>
                    </div>
                    <hr/>
                    <a href="{{ route('author.show', $article->id) }}" class="btn btn-link">[Detail Artikel #{{$article->id}}]</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
