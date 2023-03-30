<div class="mb-3">
    {{ Form::label('department_id', 'Bidang Keahlian') }}
    {{ Form::select('department_id', $departments, null, ['class' => 'form-control', 'placeholder' => 'Pilih Program Studi ...', 'onchange' => 'getScope(this)', 'required' => 'true']) }}
</div>

<div class="mb-3">
    {{ Form::label('scope_id', 'Scope') }}
    {{ Form::select('scope_id', [], null, ['class' => 'form-control', 'id' => 'scope', 'placeholder' => 'Pilih Scope ...', 'required' => 'true']) }}
</div>

<div class="mb-3">
    {{ Form::label('title', 'Judul') }}
    {{ Form::text('title', null, ['class' => 'form-control', 'required' => 'true']) }}
 </div>

 <div class="mb-3">
    {{ Form::label('abstract', 'Abstrak') }}
    {{ Form::textarea('abstract', null, ['class' => 'form-control', 'rows' => 7, 'required' => 'true']) }}
 </div>

<div class="mb-3">
    {{ Form::label('keywords', 'Kata Kunci') }}
    {{ Form::text('keywords', null, ['class' => 'form-control', 'required' => 'true']) }}
</div>

<div class="mb-3">
    {{ Form::label('corresponding_email', 'Email Korenspondensi') }}
    {{ Form::email('corresponding_email', null, ['class' => 'form-control', 'required' => 'true']) }}
</div>

{{ Form::hidden('user_id', auth()->user()->id, null) }}
