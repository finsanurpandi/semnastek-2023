
<div class="mb-3">
    {{ Form::label('email', 'Email') }}
    {{ Form::email('email', null, ['class' => 'form-control', 'required' => 'true', 'readonly']) }}
</div>
<div class="mb-3">
    {{ Form::label('fullname', 'Nama Lengkap') }}
    {{ Form::text('fullname', null, ['class' => 'form-control', 'required' => 'true']) }}
</div>


{{ Form::hidden('id', $reviewer->id, null) }}
