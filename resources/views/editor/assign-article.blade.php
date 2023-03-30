<form action="{{route('editor.blind_manuscript.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    {{ Form::hidden('article_id', $article->id, null) }}
    <div class="mb-3">
        <label id="file">Pilih Reviewer</label>
        <select name="reviewer_id" class="form-control" id="">
            @if (count($reviewer) > 0)
                <option selected disabled>Pilih Reviewer</option>
            @else
                <option selected disabled>REVIEWER KOSONG</option>
            @endif
            @foreach ($reviewer as $data )
                <option value="{{$data->id}}">{{$data->fullname}}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label id="file">File Blind Manuscript</label>
        <input type="file" id="file" name="file" class="form-control" accept="application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document" max="5120" required/>
    </div>
    <small><em>Format file yang diwajibkan diunggah adalah dalam bentuk *.docx atau *.doc dengan ukuran maksimal 5MB</em></small>
    <hr/>
    <a href="{{ route('editor.article', $article->id) }}" class="btn btn-danger">{{ __('Batal') }}</a>
   {{ Form::submit('Kirim', ['class' => 'btn btn-primary']) }}
</form>
