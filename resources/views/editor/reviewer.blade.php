@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header gradient text-white ">Daftar Reviewer</div>

                <div class="card-body">
                    <a href="{{ route('editor.create') }}" class="btn btn-primary">Tambah Reviewer</a>

                    <br/><hr/>
                    <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr class="text-center bg-secondary text-white">
                            <th>NO</th>
                            <th>EMAIL</th>
                            <th>NAMA LENGKAP</th>
                            <th>AKSI</th>
                        </tr>
                        @php $no = 1; @endphp
                        @foreach ($reviewers as $reviewer)
                        <tr class="text-center">
                            <td>{{ $no++ }}</td>
                            <td>{{ $reviewer->email }}</td>
                            <td>{{ $reviewer->fullname }}</td>
                            <td>
                                    {!! Form::open(['url' => route('editor.destroy', $reviewer->id), 'method' => 'DELETE', 'id' => 'form-hapus']) !!}
                                        <a href="{{ route('editor.edit', ['id' => $reviewer->id]) }}" class="btn btn-link"><i class="fa fa-edit"></i></a>
                                        <button class="btn btn-link text-danger text-small show_confirm" data-name="{{$reviewer->fullname}}" title="hapus reviewer"><i class="fa fa-trash"></i></button>
                                    {!! Form::close() !!}
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
