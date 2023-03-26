<form action="{{route('editor.blind_manuscript.edit')}}" method="post" enctype="multipart/form-data">
    @csrf
    {{ Form::hidden('article_id', $article->id, null) }}
    <div class="mb-3">
        <label id="file">Pilih Reviewer</label>
        <select name="reviewer_id" class="form-control" id="">
            <option selected disabled>Pilih Reviewer</option>
            @foreach ($reviewer as $data )
                <option value="{{$data->id}}" @if ($data->id === $blind_manuscripts->reviewer_id) selected @endif>{{$data->fullname}}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label id="file">File Blind Manuscript</label>
        <input type="file" id="file" name="file" class="form-control" accept="application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document" max="5120"/>
        @if ($blind_manuscripts->file)
            <br>
            <small>File saat ini: <a href="{{ Storage::url('public/blind_manuscript/' . $blind_manuscripts->file) }}" target="_blank">{{ $blind_manuscripts->file }}</a></small>
        @endif
    </div>
    <small><em>Format file yang diwajibkan diunggah adalah dalam bentuk *.docx atau *.doc dengan ukuran maksimal 5MB</em></small>
    <hr/>
    <a href="{{ route('editor.article', $article->id) }}" class="btn btn-danger">{{ __('Batal') }}</a>
   {{ Form::submit('Update', ['class' => 'btn btn-primary']) }}
</form>
