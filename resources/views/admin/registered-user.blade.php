@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header gradient text-white ">Registered User</div>

                <div class="card-body">

                    <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr class="text-center bg-secondary text-white">
                            <th>NO</th>
                            <th>NAMA</th>
                            <th>EMAIL</th>
                            <th>TANGGAL DIBUAT</th>
                            <th>AKSI</th>
                        </tr>
                        @php $no = 1; @endphp
                        @foreach ($users as $user)
                            <tr class="text-center">
                                <td>{{ $no++ }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td></td>
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
