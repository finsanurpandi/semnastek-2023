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
                            <th><i class="fas fa-gear"></i></th>
                        </tr>
                        @php $no = 1; @endphp
                        @if (count($users) > 0)
                        @foreach ($users as $user)
                            <tr class="text-center">
                                <td>{{ $no++ }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>
                                    <form method="post" action="{{ route('admin.reset.pass')}}" id="reset-password">
                                        @csrf
                                        <input type="hidden" value="{{ $user->id }}" name="id"/>
                                        <button class="btn btn-link show_reset_password" data-name="{{ $user->name }}">Reset Password</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        @else
                            <tr class="text-center">
                                <td colspan="5">Data kosong</td>
                            </tr>
                        @endif
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
