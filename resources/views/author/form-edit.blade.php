@if(request()->tag == 'scope')
<div class="mb-3">
    {{ Form::label('department_id', 'Bidang Keahlian') }}
    {{ Form::select('department_id', $departments, null, ['class' => 'form-control', 'id' => 'department', 'placeholder' => 'Pilih Program Studi ...', 'onchange' => 'getScope(this)', 'required' => 'true']) }}
</div>

<div class="mb-3">
    {{ Form::label('scope_id', 'Scope') }}
    {{ Form::select('scope_id', [], null, ['class' => 'form-control', 'id' => 'scope', 'placeholder' => 'Pilih Scope ...', 'required' => 'true']) }}
</div>
@endif

@if(request()->tag == 'title')
<div class="mb-3">
    {{ Form::label('title', 'Judul') }}
    {{ Form::textarea('title', null, ['class' => 'form-control', 'rows' => 3, 'required' => 'true']) }}
 </div>
@endif

@if(request()->tag == 'abstract')
 <div class="mb-3">
    {{ Form::label('abstract', 'Abstrak') }}
    {{ Form::textarea('abstract', null, ['class' => 'form-control', 'rows' => 7, 'required' => 'true']) }}
 </div>
@endif

@if(request()->tag == 'keywords')
<div class="mb-3">
    {{ Form::label('keywords', 'Kata Kunci') }}
    {{ Form::text('keywords', null, ['class' => 'form-control', 'required' => 'true']) }}
</div>
@endif

@if(request()->tag == 'corresponding_email')
<div class="mb-3">
    {{ Form::label('corresponding_email', 'Email Korenspondensi') }}
    {{ Form::email('corresponding_email', null, ['class' => 'form-control', 'required' => 'true']) }}
</div>
@endif

{{ Form::hidden('id', $article->id, null) }}

{{ Form::hidden('tag', request()->tag, null) }}
