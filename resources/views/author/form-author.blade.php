<div class="mb-3">
    {{ Form::label('firstname', 'Nama Depan') }}
    {{ Form::text('firstname', null, ['class' => 'form-control', 'required' => 'true']) }}
</div>

<div class="mb-3">
    {{ Form::label('lastname', 'Nama Belakang') }}
    {{ Form::text('lastname', null, ['class' => 'form-control', 'required' => 'true']) }}
</div>

<div class="mb-3">
    {{ Form::label('email', 'Email') }}
    {{ Form::email('email', null, ['class' => 'form-control', 'required' => 'true']) }}
</div>

 <div class="mb-3">
    {{ Form::label('affiliation', 'Afiliasi') }}
    {{ Form::text('affiliation', null, ['class' => 'form-control', 'required' => 'true']) }}
 </div>





{{ Form::hidden('article_id', $article->id, null) }}
{{ @Form::hidden('id', $author->id, null) }}

