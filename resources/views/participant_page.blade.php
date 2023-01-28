@extends('layouts.default')

@section('content')

<div class="ease-soft-in-out pt-0 mt-0 mb-24 relative bg-gray-50 transition-all duration-200">
    <div class="w-full px-6 mx-auto">
        <div class="relative flex items-center p-0 mt-6 overflow-hidden bg-center bg-cover min-h-75 rounded-2xl" style="background-image: url('/img/hero-register.png'); background-position-y: 50%">
          <span class="absolute inset-y-0 w-full h-full bg-center bg-contain bg-gradient-to-tl from-purple-700 to-blue-500 opacity-60"></span>
        </div>
        <div class="relative flex flex-col flex-auto min-w-0 p-4 mx-6 -mt-16 overflow-hidden break-words border-0 shadow-blur rounded-2xl bg-white/80 bg-clip-border backdrop-blur-2xl backdrop-saturate-200">
          <div class="flex justify-between -mx-3 w-full">
            <div class="flex">
                <div class="flex-none w-auto max-w-full px-3 my-auto">
                <div class="h-full">
                    <h5 class="mb-1">{{$name}}</h5>
                    <p class="mb-0 font-semibold leading-normal text-sm">{{$email}}</p>
                </div>
                </div>
            </div>
            <div class="w-full text-right max-w-full px-3 mt-4 sm:my-auto right-0 sm:mr-0 md:w-1/2 md:flex-none lg:w-4/12">

            <form action="/logout" class="flex justify-end" method="POST">
                @csrf
                <button type="submit"  class="bg-gradient-to-tl from-red-600 to-orange-500 px-2 text-xs rounded-1.8 py-2 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">
                   Keluar
                </button>
            </form>
            </div>
          </div>
        </div>
    </div>


    {{-- List Artikel per user --}}
    <div class="flex-none w-full max-w-full px-6 mt-6">
        <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
          <div class="p-4 pb-0 mb-0 bg-white rounded-t-2xl">
            <h4 class="mb-1 text-center">ARTIKEL</h4>
            <p class="leading-normal text-center text-sm">Daftar Artikel yang telah anda upload</p>
          </div>
          <div class="flex-auto p-4">
            <div class="flex flex-wrap justify-between">
              <div class="flex overflow-x-auto w-full">
                @if (count($article) == 0)
                <div class="flex flex-col mx-auto justify-center bg-gray-50 p-8 rounded-xl">
                    <h6>Belum ada artikel, Upload Sekarang!</h6>
                    <a href="#upload"  class="add-motion px-6 py-3 mb-0 font-bold text-center text-white uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer shadow-soft-md bg-x-25 bg-150 leading-pro text-xs ease-soft-in tracking-tight-soft bg-gradient-to-tl gradient hover:shadow-soft-xs active:opacity-85">
                        UPLOAD ARTIKEL
                    </a>
                </div>
                @endif
                @foreach ($article as $data)
                <div class="w-full max-w-full px-3 mb-6 md:flex-none xl:mb-0 xl:w-3/12">
                    <div class="relative bg-gray-50 flex flex-col min-w-0 break-words p-4 border-0 shadow-none rounded-2xl bg-clip-border">
                    <div class="flex-auto px-1 pt-6">
                        <a href="javascript:;">
                            <h6>{{$data->title}}</h6>
                        </a>
                        @if ($data->article_status == "approved")
                            <span class="add-motion bg-gradient-to-tl from-green-600 to-lime-400 px-2 text-xs rounded-1.8 py-2 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">DITERIMA</span>
                        @elseif ($data->article_status == "rejected")
                            <span class="add-motion bg-gradient-to-tl from-red-600 to-orange-500 px-2 text-xs rounded-1.8 py-2 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">DITOLAK</span>
                        @elseif ($data->article_status == "revised")
                            <span class="add-motion bg-gradient-to-tl from-slate-600 to-slate-300 px-2 text-xs rounded-1.8 py-2 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">SEDANG DIPERIKSA</span>
                        @elseif ($data->article_status == "inreview")
                            <span class="add-motion bg-gradient-to-tl from-slate-600 to-slate-300 px-2 text-xs rounded-1.8 py-2 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">SEDANG DIPERIKSA</span>
                        @elseif ($data->article_status == "pending")
                            <span class="add-motion bg-gradient-to-tl from-slate-600 to-slate-300 px-2 text-xs rounded-1.8 py-2 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">PENDING</span>
                        @endif
                        <p class="mb-6 leading-normal text-sm">Lingkup : {{$data->article_scope}}</p>
                        <div class="flex items-center justify-between">
                            <button type="button" class="inline-block text-white px-2 md:px-8 lg:px-8 py-2 mb-0 font-bold text-center uppercase align-middle transition-all bg-transparent border border-solid rounded-lg shadow-none cursor-pointer leading-pro ease-soft-in text-xs active:shadow-soft-xs tracking-tight-soft border-blue-500 text-blueborder-blue-500 hover:border-blue-500 gradient hover:text-blueborder-blue-500 hover:opacity-75 hover:shadow-none active:bg-blueborder-blue-500 active:text-white active:gradient active:hover:text-blueborder-blue-500">Lihat Detail</button>
                        </div>
                    </div>
                    </div>
                </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
    </div>

    {{-- form upload artikel --}}
    <section id="upload" class="w-full max-w-full px-6 mt-6">
        <form id="form-upload" class="relative flex flex-col min-w-0 mb-6 break-words p-8 bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border" action="{{route('participant.upload')}}" method="post" enctype="multipart/form-data">
            <h2 class="text-center">Upload Artikel</h2>
            @csrf
            <div class="form-group flex flex-col mb-4">
                <label for="participant_category w-1/2">Kategori Peserta</label>
                <select name="participant_category" id="participant_category" class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" autocomplete="off" required>
                    <option value="" selected disabled>-- Pilih Kategori --</option>
                    <option value="mahasiswa">Mahasiswa</option>
                    <option value="dosen">Dosen</option>
                </select>
            </div>
            <div id="ktm_field" class="form-group hidden flex-col mb-4">
                <label for="ktm_file">Upload KTM</label>
                <input type="file" name="ktm_file" id="ktm_file" class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" autocomplete="off" accept="application/pdf">
            </div>
            <div class="form-group flex flex-col mb-4">
                <label for="title">Judul</label>
                <input type="text" name="title" id="title" placeholder="..." class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" required autocomplete="off">
            </div>
            <div class="form-group flex flex-col mb-4">
                <label for="abstract">Abstrak</label>
                <textarea name="abstract" id="abstract" placeholder="..." rows="10" class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" required autocomplete="off"></textarea>
            </div>
            <div class="form-group flex flex-col mb-4">
                <label for="knowledge_field">Bidang Ilmu</label>
                <select name="knowledge_field" id="knowledge_field" class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" required autocomplete="off">
                    <option value="" selected disabled>-- Pilih Bidang Ilmu --</option>
                    <option value="informatika">Informatika</option>
                    <option value="sipil">Sipil</option>
                    <option value="industri">Industri</option>
                </select>
            </div>
            <div class="form-group flex flex-col mb-4">
                <label for="article_scope">Lingkup Artikel</label>
                <select name="article_scope" id="article_scope" class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" required autocomplete="off">
                    <option value="" selected disabled>-- Pilih Lingkup Artikel --</option>
                    <option value="game">Game</option>
                    <option value="konstruksi">Konstruksi</option>
                </select>
            </div>
            <div class="form-group flex flex-col mb-4">
                <label for="article_file">Upload Artikel</label>
                <input type="file" name="article_file" id="article_file" class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" required accept="application/pdf">
            </div>
            <div class="form-group flex flex-col mb-4">
                <label for="correspondence">Email Correspondence</label>
                <input type="email" name="correspondence" placeholder="..." id="correspondence" class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" required autocomplete="off">
            </div>
            <div class="form-group flex flex-col p-8">
                <div class="flex justify-between mb-4">
                    <h5 class="text-center">Author</h5>
                    <button type="button" class="inline-block text-white px-8 py-2 mb-0 font-bold text-center uppercase align-middle transition-all bg-transparent border border-solid rounded-lg shadow-none cursor-pointer leading-pro ease-soft-in text-xs active:shadow-soft-xs tracking-tight-soft border-blue-500 text-blueborder-blue-500 hover:border-blue-500 gradient hover:text-blueborder-blue-500 hover:opacity-75 hover:shadow-none active:bg-blueborder-blue-500 active:text-white active:gradient active:hover:text-blueborder-blue-500 btn-add-author">Tambah Author</button>
                </div>
                <div id="author-container" class="">
                    <div class="author-row bg-gray-50 w-full md:1/2 relative mx-auto justify-center p-8 rounded-xl mb-4">
                        <div class="flex justify-end">
                            <button type="button" class="bg-gradient-to-tl from-red-600 to-orange-500 px-2 text-xs rounded-1.8 py-2 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white btn-remove-author" disabled>Hapus Author</button>
                        </div>
                        <div class="flex flex-col">
                            <div class="form-group flex flex-col mb-4">
                                <label for="afiliasi">Afiliasi</label>
                                <input type="text" name="affiliate[]" class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" required autocomplete="off">
                            </div>
                            <div class="form-group flex flex-col mb-4">
                                <label for="first_name">First Name</label>
                                <input type="text" name="first_name[]" class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" required autocomplete="off">
                            </div>
                            <div class="form-group flex flex-col mb-4">
                                <label for="last_name">Last Name</label>
                                <input type="text" name="last_name[]" class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" required autocomplete="off">
                            </div>
                            <div class="form-group flex flex-col mb-4">
                                <label for="email">Email</label>
                                <input type="email" name="email[]" class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" required autocomplete="off">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="mx-auto text-white px-8 py-2 mb-0 font-bold text-center uppercase align-middle transition-all bg-transparent border border-solid rounded-lg shadow-none cursor-pointer leading-pro ease-soft-in text-xs active:shadow-soft-xs tracking-tight-soft border-blue-500 text-blueborder-blue-500 hover:border-blue-500 gradient hover:text-blueborder-blue-500 hover:opacity-75 hover:shadow-none active:bg-blueborder-blue-500 active:text-white active:gradient active:hover:text-blueborder-blue-500">Upload</button>
        </form>
    </section>
</div>

@stop
