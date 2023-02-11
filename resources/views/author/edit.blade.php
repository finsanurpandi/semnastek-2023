@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Edit Artikel #{{$article->id}}</div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    {!! Form::model($article, ['url' => route('author.update'), 'method' => 'PATCH']) !!}
                        @include('author.form-edit')
                        <a href="{{ route('author.show', $article->id) }}" class="btn btn-danger">{{ __('Batal') }}</a>
                       {{ Form::submit('Update', ['class' => 'btn btn-success']) }}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')

    <script>
        $(document).ready(function(){
            $('#department option').filter(function(){
                return ($(this).val() == '{{$scope->department_id}}');
            }).prop('selected', true);
            
            $.ajax({
                    type: "get",
                    url: "{{ url('/') }}/author/ajax/getDataScope/"+{{$scope->department_id}},
                    dataType: "json",
                    success: function (data) {
                        $.each(data, function (i) {
                            $('#scope').append($('<option></option>').val(data[i].id).text(data[i].scope));
                        });

                        $('#scope option').filter(function(){
                            return ($(this).val() == '{{$scope->id}}');
                        }).prop('selected', true);
                    }
                })
        });

        function getScope(id) {
            

            $('#scope').empty();

            let prodi = $(id).val();

            if (prodi === '') {
                $('#scope').empty();
            } else {
                $.ajax({
                    type: "get",
                    url: "{{ url('/') }}/author/ajax/getDataScope/"+prodi,
                    dataType: "json",
                    success: function (data) {
                        $.each(data, function (i) {
                            $('#scope').append($('<option></option>').val(data[i].id).text(data[i].scope));
                        });
                    }
                })
            }
        }
    </script>
@endsection