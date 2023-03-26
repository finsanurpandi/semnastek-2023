@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Articles</div>

                <div class="card-body">

                    <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr class="text-center table-primary">
                            <th>NO</th>
                            <th>ID ARTIKEL</th>
                            <th>CREATED BY</th>
                            <th>PRODI - SCOPE</th>
                            <th>JUDUL</th>
                            <th>AUTHOR KORESPONDENSI - AFILIASI</th>
                            <th>SUBMISSION STATUS</th>
                            <th>ARTICLE</th>
                            <th>CREATED AT</th>
                        </tr>
                        @php $no = 1; @endphp
                        @foreach ($articles as $article)
                            <tr class="text-center">
                                <td>{{$no++}}</td>
                                <td>{{ $article->id }}</td>
                                <td>{{ $article->user->name }}</td>
                                <td>
                                    @if($article->scope->department_id == 1)
                                        Sipil
                                    @elseif($article->scope->department_id == 2)
                                        Industri
                                    @elseif($article->scope->department_id == 3)
                                        Informatika
                                    @endif
                                    - {{ $article->scope->scope }}
                                </td>
                                <td>{{ $article->title }}</td>
                                <td>{{ $article->authors[0]->firstname.' '.$article->authors[0]->lastname}} ({{ $article->authors[0]->affiliation }})</td>
                                <td>
                                    @if($article->submitted_at == null)
                                        Draft
                                    @else
                                        @foreach($article->submission as $status)
                                            {{$status->name}}
                                        @endforeach
                                    @endif
                                </td>
                                <td><a href="{!! route('admin.download', Crypt::EncryptString($article->manuscript->file)) !!}" class="btn btn-link" parent="_blank">{{ $article->manuscript->file }}</a></td>
                                <td>{{ $article->created_at }}</td>
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
