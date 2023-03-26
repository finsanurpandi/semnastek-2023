<div class="mb-3">
    {{ Form::label('comment', 'Komentar') }}
    {{ Form::textarea('comment', null, ['class' => 'form-control', 'rows' => 7, 'required' => 'true']) }}
</div>
<div class="mb-3">
    <label id="file">File Manuscript Revisi</label>
    <input type="file" id="file" name="file" class="form-control" accept="application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document" max="5120" required/>
</div>

{{ Form::hidden('article_id', $id, null) }}
<small><em>Format file yang diwajibkan diunggah adalah dalam bentuk *.docx atau *.doc dengan ukuran maksimal 5MB</em></small>
<hr/>
<a href="{{ route('reviewer.index') }}" class="btn btn-danger">{{ __('Batal') }}</a>
{{ Form::submit('Kirim', ['class' => 'btn btn-primary']) }}
