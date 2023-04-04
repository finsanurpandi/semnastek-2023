<table class="table table-bordered">
    <tr class="bg-secondary text-white">
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
    <tr>
        <th>Judul</th>
        <td class="text-justify">{{ $article->title }}</td>
    </tr>
    <tr>
        <th>Abstrak</th>
        <td class="text-justify">{{ $article->abstract }}</td>
    </tr>
    <tr>
        <th>Kata Kunci</th>
        <td>{{ $article->keywords }}</td>
    </tr>
    <tr>
        <th>Lingkup</th>
        <td>{{ $article->scope->scope }}</td>
    </tr>
    <tr>
        <th>Status</th>
        <td colspan="2">
            @if($status)
                @can('reviewer')
                    {{-- when a review_id "resubmit for review", reiviewer's page will provide this message --}}
                    @if($review_status->review_id === 3)
                        <span class="badge bg-primary">{{$review_status->name}}</span>
                    @elseif($review_status->review_id === 1 && $status->submission_id === 4)
                        <span class="badge bg-primary">{{$status->name}}</span>
                    @elseif($review_status->review_id === 1)
                        <span class="badge bg-primary">{{$review_status->name}}</span>
                    @else
                        <span class="badge bg-primary">{{$status->name}}</span>
                    @endif
                @endcan

                @cannot('reviewer')
                    @if($review_status->review_id === 1 && $status->submission_id === 4)
                        <span class="badge bg-primary">{{$status->name}}</span>
                    @elseif($review_status->review_id === 1)
                        <span class="badge bg-primary">{{$review_status->name}}</span>
                    @else
                        <span class="badge bg-primary">{{$status->name}}</span>
                    @endif
                @endcannot
            @else
                <span class="badge bg-primary">Draft</span>
            @endif
        </td>
    </tr>
    <tr>
        <th>Manuscript</th>
        <td>
            @if($article->manuscript !== null)
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
