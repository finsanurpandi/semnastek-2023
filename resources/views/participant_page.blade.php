@extends('layouts.default')

@section('content')

<div class="ease-soft-in-out pt-0 mt-0 mb-24 relative bg-gray-50 transition-all duration-200">
    <div class="w-full px-6 mx-auto">
        <div class="relative flex items-center p-0 mt-6 overflow-hidden bg-center bg-cover min-h-75 rounded-2xl" style="background-image: url('../assets/img/curved-images/curved0.jpg'); background-position-y: 50%">
          <span class="absolute inset-y-0 w-full h-full bg-center bg-cover bg-gradient-to-tl from-purple-700 to-pink-500 opacity-60"></span>
        </div>
        <div class="relative flex flex-col flex-auto min-w-0 p-4 mx-6 -mt-16 overflow-hidden break-words border-0 shadow-blur rounded-2xl bg-white/80 bg-clip-border backdrop-blur-2xl backdrop-saturate-200">
          <div class="flex flex-wrap justify-between -mx-3 w-full">
            <div class="flex">
                <div class="flex-none w-auto max-w-full px-3">
                <div class="text-base ease-soft-in-out h-18.5 w-18.5 relative inline-flex items-center justify-center rounded-xl text-white transition-all duration-200">
                    <img src="{{ asset('img/avatar.png') }}" alt="profile_image" class="w-full shadow-soft-sm rounded-xl" />
                </div>
                </div>
                <div class="flex-none w-auto max-w-full px-3 my-auto">
                <div class="h-full">
                    <h5 class="mb-1">{{$name}}</h5>
                    <p class="mb-0 font-semibold leading-normal text-sm">{{$email}}</p>
                </div>
                </div>
            </div>
            <div class="w-full text-right max-w-full px-3 mt-4 sm:my-auto right-0 sm:mr-0 md:w-1/2 md:flex-none lg:w-4/12">
                <a href="#upload"  class="w-1/2 px-6 py-3 mb-0 font-bold text-center text-white uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer shadow-soft-md bg-x-25 bg-150 leading-pro text-xs ease-soft-in tracking-tight-soft bg-gradient-to-tl gradient hover:shadow-soft-xs active:opacity-85">
                   UPLOAD ARTIKEL
                </a>
            </div>
          </div>
        </div>
    </div>


    {{-- List Artikel per user --}}
    <div class="flex-none w-full max-w-full px-6 mt-6">
        <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
          <div class="p-4 pb-0 mb-0 bg-white rounded-t-2xl">
            <h5 class="mb-1">ARTIKEL</h5>
            <p class="leading-normal text-sm">Daftar Artikel yang telah anda submit</p>
          </div>
          <div class="flex-auto p-4">
            <div class="flex flex-wrap justify-between">
              <div class="flex overflow-x-auto w-full md:w-2/3 lg:w-2/3">
                <div class="w-full max-w-full px-3 mb-6 md:w-6/12 md:flex-none xl:mb-0 xl:w-3/12">
                    <div class="relative flex flex-col min-w-0 break-words bg-transparent border-0 shadow-none rounded-2xl bg-clip-border">
                    <div class="flex-auto px-1 pt-6">
                        <a href="javascript:;">
                            <h5>Artikel satu</h5>
                        </a>
                        <span class="bg-gradient-to-tl from-red-600 to-orange-500 px-2 text-xs rounded-1.8 py-2 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">DITOLAK</span>
                        <p class="mb-6 leading-normal text-sm">Nama Penulis</p>
                        <div class="flex items-center justify-between">
                        <button type="button" class="inline-block px-8 py-2 mb-0 font-bold text-center uppercase align-middle transition-all bg-transparent border border-solid rounded-lg shadow-none cursor-pointer leading-pro ease-soft-in text-xs active:shadow-soft-xs tracking-tight-soft border-blue-500 text-blueborder-blue-500 hover:border-blue-500 gradient hover:text-blueborder-blue-500 hover:opacity-75 hover:shadow-none active:bg-blueborder-blue-500 active:text-white active:gradient active:hover:text-blueborder-blue-500">Lihat Detail</button>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="w-full max-w-full px-3 mb-6 md:w-6/12 md:flex-none xl:mb-0 xl:w-3/12">
                    <div class="relative flex flex-col min-w-0 break-words bg-transparent border-0 shadow-none rounded-2xl bg-clip-border">
                    <div class="flex-auto px-1 pt-6">
                        <a href="javascript:;">
                            <h5>Artikel satu</h5>
                        </a>
                        <span class="bg-gradient-to-tl from-green-600 to-lime-400 px-2 text-xs rounded-1.8 py-2 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">DITERIMA</span>
                        <p class="mb-6 leading-normal text-sm">Nama Penulis</p>
                        <div class="flex items-center justify-between">
                        <button type="button" class="inline-block px-8 py-2 mb-0 font-bold text-center uppercase align-middle transition-all bg-transparent border border-solid rounded-lg shadow-none cursor-pointer leading-pro ease-soft-in text-xs active:shadow-soft-xs tracking-tight-soft border-blue-500 text-blueborder-blue-500 hover:border-blue-500 gradient hover:text-blueborder-blue-500 hover:opacity-75 hover:shadow-none active:bg-blueborder-blue-500 active:text-white active:gradient active:hover:text-blueborder-blue-500">Lihat Detail</button>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="w-full max-w-full px-3 mb-6 md:w-6/12 md:flex-none xl:mb-0 xl:w-3/12">
                    <div class="relative flex flex-col min-w-0 break-words bg-transparent border-0 shadow-none rounded-2xl bg-clip-border">
                    <div class="flex-auto px-1 pt-6">
                        <a href="javascript:;">
                            <h5>Artikel satu</h5>
                        </a>
                        <span class="bg-gradient-to-tl from-slate-600 to-slate-300 px-2 text-xs rounded-1.8 py-2 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">SEDANG DIPERIKSA</span>
                        <p class="mb-6 leading-normal text-sm">Nama Penulis</p>
                        <div class="flex items-center justify-between">
                        <button type="button" class="inline-block px-8 py-2 mb-0 font-bold text-center uppercase align-middle transition-all bg-transparent border border-solid rounded-lg shadow-none cursor-pointer leading-pro ease-soft-in text-xs active:shadow-soft-xs tracking-tight-soft border-blue-500 text-blueborder-blue-500 hover:border-blue-500 gradient hover:text-blueborder-blue-500 hover:opacity-75 hover:shadow-none active:bg-blueborder-blue-500 active:text-white active:gradient active:hover:text-blueborder-blue-500">Lihat Detail</button>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="w-full max-w-full px-3 mb-6 md:w-6/12 md:flex-none xl:mb-0 xl:w-3/12">
                    <div class="relative flex flex-col min-w-0 break-words bg-transparent border-0 shadow-none rounded-2xl bg-clip-border">
                    <div class="flex-auto px-1 pt-6">
                        <a href="javascript:;">
                            <h5>Artikel satu</h5>
                        </a>
                        <span class="bg-gradient-to-tl from-slate-600 to-slate-300 px-2 text-xs rounded-1.8 py-2 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">SEDANG DIPERIKSA</span>
                        <p class="mb-6 leading-normal text-sm">Nama Penulis</p>
                        <div class="flex items-center justify-between">
                        <button type="button" class="inline-block px-8 py-2 mb-0 font-bold text-center uppercase align-middle transition-all bg-transparent border border-solid rounded-lg shadow-none cursor-pointer leading-pro ease-soft-in text-xs active:shadow-soft-xs tracking-tight-soft border-blue-500 text-blueborder-blue-500 hover:border-blue-500 gradient hover:text-blueborder-blue-500 hover:opacity-75 hover:shadow-none active:bg-blueborder-blue-500 active:text-white active:gradient active:hover:text-blueborder-blue-500">Lihat Detail</button>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="w-full max-w-full px-3 mb-6 md:w-6/12 md:flex-none xl:mb-0 xl:w-3/12">
                    <div class="relative flex flex-col min-w-0 break-words bg-transparent border-0 shadow-none rounded-2xl bg-clip-border">
                    <div class="flex-auto px-1 pt-6">
                        <a href="javascript:;">
                            <h5>Artikel satu</h5>
                        </a>
                        <span class="bg-gradient-to-tl from-slate-600 to-slate-300 px-2 text-xs rounded-1.8 py-2 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">SEDANG DIPERIKSA</span>
                        <p class="mb-6 leading-normal text-sm">Nama Penulis</p>
                        <div class="flex items-center justify-between">
                        <button type="button" class="inline-block px-8 py-2 mb-0 font-bold text-center uppercase align-middle transition-all bg-transparent border border-solid rounded-lg shadow-none cursor-pointer leading-pro ease-soft-in text-xs active:shadow-soft-xs tracking-tight-soft border-blue-500 text-blueborder-blue-500 hover:border-blue-500 gradient hover:text-blueborder-blue-500 hover:opacity-75 hover:shadow-none active:bg-blueborder-blue-500 active:text-white active:gradient active:hover:text-blueborder-blue-500">Lihat Detail</button>
                        </div>
                    </div>
                    </div>
                </div>
              </div>
              <div class="w-full max-w-full px-3 mb-6 md:w-6/12 md:flex-none xl:mb-0 xl:w-3/12">
                <div class="relative flex flex-col h-full min-w-0 break-words bg-transparent border border-solid shadow-none rounded-2xl border-slate-100 bg-clip-border">
                  <div class="flex flex-col justify-center flex-auto p-6 text-center">
                    <a href="javascript:;">
                      <i class="mb-4 fa fa-plus text-slate-400"></i>
                      <h5 class="text-slate-400">New project</h5>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>

    {{-- form upload artikel --}}
    <section id="upload" class="w-full max-w-full px-6 mt-6">
        <form id="form-upload" class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border" action="{{route('participant.upload')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="participant_category">Kategori Peserta</label>
                <select name="participant_category" id="participant_category" required autocomplete="off">
                    <option value="" selected disabled>-- Pilih Kategori --</option>
                    <option value="mahasiswa">Mahasiswa</option>
                    <option value="dosen">Dosen</option>
                </select>
            </div>
            <div class="form-group">
                <label for="ktm_file">Upload KTM</label>
                <input type="file" name="ktm_file" id="ktm_file" class="form-control" required accept="application/pdf">
            </div>
            <div class="form-group">
                <label for="title">Judul</label>
                <input type="text" name="title" id="title" class="form-control" required autocomplete="off">
            </div>
            <div class="form-group">
                <label for="abstract">Abstrak</label>
                <textarea name="abstract" id="abstract" class="form-control" required autocomplete="off"></textarea>
            </div>
            <div class="form-group">
                <label for="knowledge_field">Bidang Ilmu</label>
                <select name="knowledge_field" id="knowledge_field" required autocomplete="off">
                    <option value="" selected disabled>-- Pilih Bidang Ilmu --</option>
                    <option value="informatika">Informatika</option>
                    <option value="sipil">Sipil</option>
                    <option value="industri">Industri</option>
                </select>
            </div>
            <div class="form-group">
                <label for="article_scope">Lingkup Artikel</label>
                <select name="article_scope" id="article_scope" required autocomplete="off">
                    <option value="" selected disabled>-- Pilih Lingkup Artikel --</option>
                    <option value="game">Game</option>
                    <option value="konstruksi">Konstruksi</option>
                </select>
            </div>
            <div class="form-group">
                <label for="article_file">Upload Artikel</label>
                <input type="file" name="article_file" id="article_file" class="form-control" required accept="application/pdf">
            </div>
            <div class="form-group">
                <label for="correspondence">Email Correspondence</label>
                <input type="email" name="correspondence" id="correspondence" class="form-control" required autocomplete="off">
            </div>
            <div class="form-group">
                <label for="author">Author</label>
                <div id="author-container">
                    <div class="author-row flex">
                        <div class="flex flex-col">
                            <div class="form-group">
                                <label for="afiliasi">Afiliasi</label>
                                <input type="text" name="affiliate[]" class="form-control" required autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input type="text" name="first_name[]" class="form-control" required autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input type="text" name="last_name[]" class="form-control" required autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email[]" class="form-control" required autocomplete="off">
                            </div>
                        </div>
                        <button type="button" class="btn btn-danger btn-remove-author">Hapus</button>
                    </div>
                </div>
                <button type="button" class="btn btn-primary btn-add-author">Tambah Author</button>
            </div>
            <button type="submit" class="btn btn-success">Upload</button>
        </form>
    </section>
</div>

@stop
