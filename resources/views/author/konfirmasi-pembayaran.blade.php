@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header gradient text-white ">Artikel #{{ auth()->user()->name }}</div>

                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr class="text-center bg-secondary text-white">
                            <th>NO</th>
                            <th>ID ARTIKEL</th>
                            <th>JUDUL</th>
                            <th>UPLOAD BUKTI PEMBAYARAN</th>
                        </tr>
                        @php $no = 1; @endphp
                        @if (count($articles) > 0)
                            @foreach ($articles as $article)
                            <tr class="text-center">
                                <td>{{ $no++ }}</td>
                                <td><a href="{{ route('author.show', $article->id) }}" class="btn btn-link">{{ $article->id }}</a></td>
                                <td>{{ $article->title }}</td>
                                <td>
                                    @if ($article->payment_file === null )
                                        <a href="{{ route('author.pembayaran.create', $article->id) }}" class="btn btn-link"><i class="fa fa-upload"></i></a>
                                    @elseif($article->payment_status == 0)
                                        <div class="d-flex flex-column">
                                            <a href="{{ route('author.pembayaran.reupload_form', $article->id) }}" class="btn btn-link"><i class="fa fa-upload"></i></a>
                                            <span class="text-danger"><em>Bukti Pembayaran tidak valid, lakukan upload kembali!</em></span>
                                        </div>
                                    @else
                                        <p>Sudah dibayar</p>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        @else
                            <tr class="text-center">
                                <td colspan="4">Data artikel kosong</td>
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
