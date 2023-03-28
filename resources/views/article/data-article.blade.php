<table class="table table-bordered">
    <tr class="table-primary">
        <th>Keterangan</th>
        <th>Hasil</th>
    </tr>
    @cannot('reviewer')
    <tr>
        <th>Authors</th>
        <td class="text-left">
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
    @endcannot
    <tr >
        <th>Judul</th>
        <td class="text-justify">{{ $article->title }}</td>
    </tr>
    <tr >
        <th>Abstrak</th>
        <td class="text-justify">{{ $article->abstract }}</td>
    </tr>
    <tr >
        <th>Kata Kunci</th>
        <td>{{ $article->keywords }}</td>
    </tr>
    <tr >
        <th>Lingkup</th>
        <td>{{ $article->scope->scope }}</td>
    </tr>
    <tr >
        <th>Status</th>
        <td colspan="2">

            @if($status)
                @can('reviewer')
                    {{-- when a review_id "resubmit for review", reiviewer's page will provide this message --}}
                    @if($review_status->review_id === 3)
                        {{$review_status->name}}
                    @elseif($review_status->review_id === 1 && $status->submission_id === 4)
                        {{$status->name}}
                    @elseif($review_status->review_id === 1)
                        {{$review_status->name}}
                    @else
                        {{$status->name}}
                    @endif
                @endcan
                @cannot('reviewer')
                @if($review_status->review_id === 1 && $status->submission_id === 4)
                    {{$status->name}}
                @elseif($review_status->review_id === 1)
                    {{$review_status->name}}
                @else
                    {{$status->name}}
                @endif
                @endcannot
            @else
                draft
            @endif
        </td>
    </tr>
    <tr >
        <th>Manuscript</th>
        <td>
            @if($article->manuscript !== null)

                {{-- {!! Form::open(['url' => route('author.manuscript.delete', $article->manuscript->id), 'method' => 'DELETE', 'id' => 'form-hapus']) !!} --}}
                {{-- <a href="{{ asset('storage/'.$article->manuscript->file) }}" class="btn btn-link">{{$article->manuscript->file}}</a> --}}
                {{-- {!! Form::close() !!} --}}
                @can('reviewer')
                <a href="{{ asset('storage/blind_manuscript/'.$article->blindManuscripts[0]->file) }}" class="btn btn-link">{{$article->blindManuscripts[0]->file}}</a>
                @endcan

                @can('editor')
                <a href="{{ asset('storage/manuscript/'.$article->manuscript->file) }}" class="btn btn-link">{{$article->manuscript->file}}</a>
                @endcan

            @else
                <span class="text-danger"><em>Belum unggah dokumen</em></span>
            @endif
        </td>
    </tr>


</table>
