@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header gradient text-white ">Articles</div>

                <div class="card-body">

                    <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr class="text-center bg-secondary text-white">
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
                        @if (count($articles) > 0)
                        @foreach ($articles as $article)
                            <tr class="text-center">
                                <td>{{$no++}}</td>
                                <td>{{ $article->id }}</td>
                                <td>{{ $article->user->name }} <hr/> {{ $article->user->email }}</td>
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
                                <td>
                                    @if(!$article->authors->isEmpty())
                                        {{ $article->authors[0]->firstname.' '.$article->authors[0]->lastname}} ({{ $article->authors[0]->affiliation }}) <hr/> {{ $article->corresponding_email}}
                                    @endif
                                </td>
                                <td>
                                    @if($article->submitted_at == null)
                                        <span class="text-danger text-bold"><strong>Draft</strong></span>
                                        @if($article->manuscript)
                                            <form method="post" action="{{ route('admin.force.submit')}}" id="force-submit">
                                                @csrf
                                                <input type="hidden" value="{{ $article->id }}" name="id"/>
                                                <button class="btn btn-link show_force_submit" data-name="{{ $article->user->name }}">Force Submit</button>
                                            </form>
                                        @endif
                                    @else
                                       Submitted
                                    @endif
                                </td>
                                <td>
                                    @if($article->manuscript)
                                        <a href="{!! route('admin.download', Crypt::EncryptString($article->manuscript->file)) !!}" class="btn btn-link" parent="_blank">[FILE]</a>
                                    @endif
                                </td>
                                <td>{{ $article->created_at }}</td>
                            </tr>
                        @endforeach
                        @else
                            <tr class="text-center">
                                <td colspan="9">Data artikel kosong</td>
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
