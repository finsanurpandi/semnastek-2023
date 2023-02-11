<div class="mb-3">
    <label id="file">File Manuscript</label>
    <input type="file" id="file" name="file" class="form-control" accept="application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document" required/>
</div>

{{ Form::hidden('article_id', $article->id, null) }}


