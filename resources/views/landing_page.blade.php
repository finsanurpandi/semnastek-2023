<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SEMNASTEK UNSUR</title>

        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet" />

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- FontAwesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">

        <style>
            html{
                scroll-behavior: smooth;
            }
            .gradient {
                background: linear-gradient(90deg, #36368d 0%, #343563 100%);
            }
            .backToTop{
                display: none;
                position: fixed;
                bottom: 10px;
                right: 10px;
                font-size: 3em;
                z-index: 9999;
                height: 50px;
                width: 50px;
                background-color: gray;
                text-align: center;
                border-top-left-radius: 8px;
                border-top-right-radius: 8px;
            }
            .backToTop:hover{
                background: rgb(83, 81, 81);
                transition: .5s ease-in all;
            }
            .backToTop i{
                position: absolute;
                top: 0px;
                left: 10px;
                color: #fff;
            }
            .backToTop i:hover{
                color: #aaa;
            }
        </style>
    </head>

    <body class="leading-normal tracking-normal text-white gradient" style="font-family: 'Source Sans Pro', sans-serif;">
    <!--Nav-->
    <nav id="header" class="fixed w-full z-30 top-0 text-white gradient">
      <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 py-2">
        <div class="pl-4 flex items-center">
          <a class="text-white no-underline hover:no-underline font-bold text-2xl lg:text-4xl" href="#">
            <svg class="h-8 fill-current inline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512.005 512.005">
              <rect fill="#2a2a31" x="16.539" y="425.626" width="479.767" height="50.502" transform="matrix(1,0,0,1,0,0)" />
              <path
                class="plane-take-off"
                d=" M 510.7 189.151 C 505.271 168.95 484.565 156.956 464.365 162.385 L 330.156 198.367 L 155.924 35.878 L 107.19 49.008 L 211.729 230.183 L 86.232 263.767 L 36.614 224.754 L 0 234.603 L 45.957 314.27 L 65.274 347.727 L 105.802 336.869 L 240.011 300.886 L 349.726 271.469 L 483.935 235.486 C 504.134 230.057 516.129 209.352 510.7 189.151 Z "
              />
            </svg>
            SEMNASTEK
          </a>
        </div>
        <div class="block lg:hidden pr-4">
          <button id="nav-toggle" class="flex items-center p-1 text-white hover:text-gray-900 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
            <svg class="fill-current h-6 w-6" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <title>Menu</title>
              <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
            </svg>
          </button>
        </div>
        <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden mt-2 lg:mt-0 bg-transparent text-black p-4 lg:p-0 z-20" id="nav-content">
          <ul class="list-reset lg:flex justify-end flex-1 items-center">
              <li class="mr-3">
                <a href="#call_for_paper" class="inline-block no-underline text-white hover:text-underline py-2 px-4" href="#">Call For Paper</a>
              </li>
              <li class="mr-3">
                <a href="#narasumber" class="inline-block no-underline text-white hover:text-underline py-2 px-4" href="#">Narasumber</a>
              </li>
              <li class="mr-3">
                <a href="#tanggal_penting" class="inline-block no-underline text-white hover:text-underline py-2 px-4" href="#">Tanggal Penting</a>
              </li>
              <li class="mr-3">
                <a href="#informasi" class="inline-block no-underline text-white hover:text-underline py-2 px-4" href="#">Informasi</a>
              </li>
              <li class="mr-3">
                <a href="#list_makalah" class="inline-block no-underline text-white hover:text-underline py-2 px-4" href="#">List Makalah</a>
              </li>
              <li class="mr-3">
                <a href="#materi_seminar" class="inline-block no-underline text-white hover:text-underline py-2 px-4" href="#">Materi Seminar</a>
              </li>
          </ul>
          @if (Route::has('login'))
            @auth
            <form action="/logout" method="POST">
                @csrf
                <button class="text-sm text-white dark:text-gray-500 underline">Keluar</button>
            </form>
            @else
                <a href="{{ route('login') }}" id="navAction" class="mx-auto lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded-full mt-4 lg:mt-0 py-2 px-4 shadow opacity-75 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                Masuk/Daftar
                </a>
            @endauth
            @endif
        </div>
      </div>
      <hr class="border-b border-gray-100 opacity-25 my-0 py-0" />
    </nav>

    <div class="pt-20">
      <div class="container px-3 mx-auto flex flex-wrap flex-col md:flex-row items-center justify-between">
        <!--Left Col-->
        <div class="w-3/5 pt-12 text-center" data-aos="fade-up" data-aos-duration="500">
            <img class="w-full md:w-4/5 z-50" src="{{ asset('img/hero.png') }}" />
        </div>
        <!--Right Col-->
        <div class="flex flex-col w-full md:w-2/5 justify-center items-center md:items-start text-center md:text-left"  data-aos="fade-bottom" data-aos-duration="1000" data-aos-delay="500">
            <h1 class="my-4 text-5xl font-bold leading-tight">
                SEMINAR NASIONAL SAINS & TEKNOLOGI 2023
            </h1>
            <p class="uppercase tracking-loose w-full">fakultas teknik</p>
            <p class="uppercase tracking-loose w-full">universitas suryakancana</p>
            <p class="leading-normal text-2xl mb-8">
                Penerapan Teknologi Terintegrasi untuk Peningkatan IPM
            </p>
            <div class="flex flex-col-reverse md:flex-row items-center justify-between w-full" data-aos="zoom-in-left" data-aos-duration="1000" data-aos-delay="1000">
                <button class="mx-auto lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                  DAFTAR SEKARANG!
                </button>
            </div>
        </div>
      </div>
    </div>

    <div class="relative -mt-12 lg:-mt-1">
      <svg viewBox="0 0 1428 174" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
          <g transform="translate(-2.000000, 44.000000)" fill="#FFFFFF" fill-rule="nonzero">
            <path d="M0,0 C90.7283404,0.927527913 147.912752,27.187927 291.910178,59.9119003 C387.908462,81.7278826 543.605069,89.334785 759,82.7326078 C469.336065,156.254352 216.336065,153.6679 0,74.9732496" opacity="0.100000001"></path>
            <path
              d="M100,104.708498 C277.413333,72.2345949 426.147877,52.5246657 546.203633,45.5787101 C666.259389,38.6327546 810.524845,41.7979068 979,55.0741668 C931.069965,56.122511 810.303266,74.8455141 616.699903,111.243176 C423.096539,147.640838 250.863238,145.462612 100,104.708498 Z"
              opacity="0.100000001"
            ></path>
            <path d="M1046,51.6521276 C1130.83045,29.328812 1279.08318,17.607883 1439,40.1656806 L1439,120 C1271.17211,77.9435312 1140.17211,55.1609071 1046,51.6521276 Z" id="Path-4" opacity="0.200000003"></path>
          </g>
          <g transform="translate(-4.000000, 76.000000)" fill="#FFFFFF" fill-rule="nonzero">
            <path
              d="M0.457,34.035 C57.086,53.198 98.208,65.809 123.822,71.865 C181.454,85.495 234.295,90.29 272.033,93.459 C311.355,96.759 396.635,95.801 461.025,91.663 C486.76,90.01 518.727,86.372 556.926,80.752 C595.747,74.596 622.372,70.008 636.799,66.991 C663.913,61.324 712.501,49.503 727.605,46.128 C780.47,34.317 818.839,22.532 856.324,15.904 C922.689,4.169 955.676,2.522 1011.185,0.432 C1060.705,1.477 1097.39,3.129 1121.236,5.387 C1161.703,9.219 1208.621,17.821 1235.4,22.304 C1285.855,30.748 1354.351,47.432 1440.886,72.354 L1441.191,104.352 L1.121,104.031 L0.457,34.035 Z"
            ></path>
          </g>
        </g>
      </svg>
    </div>

    <section id="call_for_paper" class="bg-white border-b py-8">
          <div class="container p-10 max-w-5xl mx-auto m-8">
            <h2 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-600">
              Call For Paper
            </h2>
            <div class="w-full mb-4">
                <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
            </div>
            <div class="flex flex-col md:flex-row justify-between">
                <div class="py-8 px-4 gradient border border-gray-200 rounded-lg shadow-xl hover:bg-gray-100" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-white">Teknik Informatika</h5>
                    <span class="bg-indigo-100 text-indigo-800 text-sm font-medium px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">Geography Information System</span> <br />
                    <span class="bg-indigo-100 text-indigo-800 text-sm font-medium px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">Security Network</span> <br />
                    <span class="bg-indigo-100 text-indigo-800 text-sm font-medium px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">Big Data</span> <br />
                    <span class="bg-indigo-100 text-indigo-800 text-sm font-medium px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">Information System</span> <br />
                    <span class="bg-indigo-100 text-indigo-800 text-sm font-medium px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">Enterprise Resource Planning</span> <br />
                    <span class="bg-indigo-100 text-indigo-800 text-sm font-medium px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">Internet of Things, Cloud Computing</span> <br />
                    <span class="bg-indigo-100 text-indigo-800 text-sm font-medium px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">Artificial Intelligent</span> <br />
                    <span class="bg-indigo-100 text-indigo-800 text-sm font-medium px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">Soft Computing</span> <br />
                    <span class="bg-indigo-100 text-indigo-800 text-sm font-medium px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">Multimedia</span> <br />
                    <span class="bg-indigo-100 text-indigo-800 text-sm font-medium px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">Game</span> <br />
                    <span class="bg-indigo-100 text-indigo-800 text-sm font-medium px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">Human Computer Interaction</span>
                </div>
                <div class="py-8 px-4 gradient border border-gray-200 rounded-lg shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700" data-aos="fade-up" data-aos-duration="800" data-aos-delay="300">
                  <h5 class="mb-2 text-2xl font-bold tracking-tight text-white">Teknik Industri</h5>
                  <span class="bg-indigo-100 text-indigo-800 text-sm font-medium px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">Industrial systems</span> <br />
                  <span class="bg-indigo-100 text-indigo-800 text-sm font-medium px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">Manufacturing systems</span> <br />
                  <span class="bg-indigo-100 text-indigo-800 text-sm font-medium px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">Systems Engineering & Ergonomics</span> <br />
                  <span class="bg-indigo-100 text-indigo-800 text-sm font-medium px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">Industrial Management</span> <br />
                  <span class="bg-indigo-100 text-indigo-800 text-sm font-medium px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">Supply Chain and Logistics</span>
              </div>
                <div class="py-8 px-4 gradient border border-gray-200 rounded-lg shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700" data-aos="fade-up" data-aos-duration="800" data-aos-delay="400">
                  <h5 class="mb-2 text-2xl font-bold tracking-tight text-white">Teknik Sipil</h5>
                  <span class="bg-indigo-100 text-indigo-800 text-sm font-medium px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">Structure engineering</span> <br />
                  <span class="bg-indigo-100 text-indigo-800 text-sm font-medium px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">Transportation engineering</span> <br />
                  <span class="bg-indigo-100 text-indigo-800 text-sm font-medium px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">Project management engineering</span> <br />
                  <span class="bg-indigo-100 text-indigo-800 text-sm font-medium px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">Traffic engineering</span>
              </div>
            </div>
        </div>
    </section>

    <section id="narasumber" class="bg-white border-b py-8">
      <div class="container mx-auto flex flex-wrap pt-4 pb-12" data-aos="fade-up" data-aos-duration="1000">
        <h2 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-600">
          Narasumber
        </h2>
        <div class="w-full mb-4">
          <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
        </div>
        <div class="w-full md:w-1/3 p-6 flex flex-col flex-grow flex-shrink">
          <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow">
            <a href="#" class="flex flex-wrap no-underline hover:no-underline">
              <img class="inline object-contain w-24 mx-auto p-1 rounded-full ring-2 ring-gray-900" src="{{ asset('img/avatar.png') }}" alt="Profile image"/>
              <div class="w-full font-bold text-xl text-gray-600 px-6">
                Prof. Marsudi
              </div>
              <p class="text-gray-800 text-base px-6 mb-5">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam at ipsum eu nunc commodo posuere et sit amet ligula.
              </p>
            </a>
          </div>
          <div class="flex-none mt-auto bg-white rounded-b rounded-t-none overflow-hidden shadow p-6">
            <div class="flex items-center justify-center">
                <a href="instagram.com" target="_blank" class="mx-auto lg:mx-0 hover:underline gradient text-white font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                  Lihat
                </a>
              </div>
          </div>
        </div>
        <div class="w-full md:w-1/3 p-6 flex flex-col flex-grow flex-shrink">
          <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow">
            <a href="#" class="flex flex-wrap no-underline hover:no-underline">
                <img class="inline object-contain w-24 mx-auto p-1 rounded-full ring-2 ring-gray-900" src="{{ asset('img/avatar.png') }}" alt="Profile image"/>
                <div class="w-full font-bold text-xl text-gray-600 px-6">
                    Prof. Manlian
                </div>
                <p class="text-gray-800 text-base px-6 mb-5">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam at ipsum eu nunc commodo posuere et sit amet ligula.
                </p>
            </a>
          </div>
          <div class="flex-none mt-auto bg-white rounded-b rounded-t-none overflow-hidden shadow p-6">
            <div class="flex items-center justify-center">
              <a href="instagram.com" target="_blank" class="mx-auto lg:mx-0 hover:underline gradient text-white font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                Lihat
              </a>
            </div>
          </div>
        </div>
        <div class="w-full md:w-1/3 p-6 flex flex-col flex-grow flex-shrink">
          <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow">
            <a href="#" class="flex flex-wrap no-underline hover:no-underline">
                <img class="inline object-contain w-24 mx-auto p-1 rounded-full ring-2 ring-gray-900" src="{{ asset('img/avatar.png') }}" alt="Profile image"/>
                <div class="w-full font-bold text-xl text-gray-600 px-6">
                    Dr. Ali Subhan, S.T., M.T.
                </div>
                <p class="text-gray-800 text-base px-6 mb-5">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam at ipsum eu nunc commodo posuere et sit amet ligula.
                </p>
            </a>
          </div>
          <div class="flex-none mt-auto bg-white rounded-b rounded-t-none overflow-hidden shadow p-6">
            <div class="flex items-center justify-center">
                <a href="instagram.com" target="_blank" class="mx-auto lg:mx-0 hover:underline gradient text-white font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                  Lihat
                </a>
              </div>
          </div>
        </div>
      </div>
    </section>

    <section id="tanggal_penting" class="bg-white py-8">
        <div class="container max-w-5xl mx-auto m-8">
            <h2 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-600">
            Tanggal Penting
            </h2>
            <div class="w-full mb-4">
                <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
            </div>
            <div class="relative wrap overflow-hidden p-10 h-full">
                <div class="border-2-2 absolute border-opacity-20 border-gray-700 h-full border" style="left: 50%"></div>
                <!-- right timeline -->
                <div class="mb-8 flex justify-between items-center w-full right-timeline">
                    <div class="order-1 w-5/12"></div>
                    <div class="z-20 flex items-center order-1 bg-gray-400 shadow-xl w-24 h-24 rounded-full">
                    <h1 class="mx-auto font-semibold text-lg text-white">31 Maret</h1>
                    </div>
                    <div class="order-1 gradient rounded-lg shadow-xl w-5/12 px-6 py-4" data-aos="zoom-in-left" data-aos-duration="1000">
                    <h3 class="mb-3 font-bold text-white text-xl">Deadline Submission</h3>
                    <p class="text-sm leading-snug tracking-wide text-white text-opacity-100">Batas akhir pengiriman artikel.</p>
                    </div>
                </div>

                <!-- left timeline -->
                <div class="mb-8 flex justify-between flex-row-reverse items-center w-full left-timeline">
                    <div class="order-1 w-5/12"></div>
                    <div class="z-20 flex items-center order-1 gradient shadow-xl w-24 h-24 rounded-full">
                        <h1 class="mx-auto font-semibold text-lg text-white">19 April</h1>
                    </div>
                    <div class="order-1 bg-gray-400 rounded-lg shadow-xl w-5/12 px-6 py-4" data-aos="zoom-in-right" data-aos-duration="1000">
                    <h3 class="mb-3 font-bold text-white text-xl">Acceptance Notice</h3>
                    <p class="text-sm font-medium leading-snug tracking-wide text-white text-opacity-100">Tanggal Pengumuman penerimaan artikel seminar nasional.</p>
                    </div>
                </div>

                <!-- right timeline -->
                <div class="mb-8 flex justify-between items-center w-full right-timeline">
                    <div class="order-1 w-5/12"></div>
                    <div class="z-20 flex items-center order-1 bg-gray-400 shadow-xl w-24 h-24 rounded-full">
                    <h1 class="mx-auto font-semibold text-lg text-white">19 Mei</h1>
                    </div>
                    <div class="order-1 gradient rounded-lg shadow-xl w-5/12 px-6 py-4" data-aos="zoom-in-left" data-aos-duration="1000">
                    <h3 class="mb-3 font-bold text-white text-xl">Deadline Registration</h3>
                    <p class="text-sm leading-snug tracking-wide text-white text-opacity-100">Batas akhir pembayaran biaya registrasi seminar nasional.</p>
                    </div>
                </div>

                <!-- left timeline -->
                <div class="mb-8 flex justify-between flex-row-reverse items-center w-full left-timeline">
                    <div class="order-1 w-5/12"></div>
                    <div class="z-20 flex items-center order-1 gradient shadow-xl w-24 h-24 rounded-full">
                        <h1 class="mx-auto font-semibold text-lg text-white">20 Juni</h1>
                    </div>
                    <div class="order-1 bg-gray-400 rounded-lg shadow-xl w-5/12 px-6 py-4" data-aos="zoom-in-right" data-aos-duration="1000">
                    <h3 class="mb-3 font-bold text-white text-xl">The BIG Day</h3>
                    <p class="text-sm font-medium leading-snug tracking-wide text-white text-opacity-100">Hari pelaksanaan SEMNASTEK-UNSUR 2023.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- additional style -->
    <svg class="wave-top" viewBox="0 0 1439 147" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <g stroke="none" stroke-width="0" fill="none" fill-rule="evenodd">
        <g transform="translate(-1.000000, -14.000000)" fill-rule="nonzero">
            <g class="wave" fill="#fff">
            <path
                d="M1440,84 C1383.555,64.3 1342.555,51.3 1317,45 C1259.5,30.824 1206.707,25.526 1169,22 C1129.711,18.326 1044.426,18.475 980,22 C954.25,23.409 922.25,26.742 884,32 C845.122,37.787 818.455,42.121 804,45 C776.833,50.41 728.136,61.77 713,65 C660.023,76.309 621.544,87.729 584,94 C517.525,105.104 484.525,106.438 429,108 C379.49,106.484 342.823,104.484 319,102 C278.571,97.783 231.737,88.736 205,84 C154.629,75.076 86.296,57.743 0,32 L0,0 L1440,0 L1440,84 Z"
            ></path>
            </g>
            <g transform="translate(1.000000, 15.000000)" fill="#FFFFFF">
            <g transform="translate(719.500000, 68.500000) rotate(-180.000000) translate(-719.500000, -68.500000) ">
                <path d="M0,0 C90.7283404,0.927527913 147.912752,27.187927 291.910178,59.9119003 C387.908462,81.7278826 543.605069,89.334785 759,82.7326078 C469.336065,156.254352 216.336065,153.6679 0,74.9732496" opacity="0.100000001"></path>
                <path
                d="M100,104.708498 C277.413333,72.2345949 426.147877,52.5246657 546.203633,45.5787101 C666.259389,38.6327546 810.524845,41.7979068 979,55.0741668 C931.069965,56.122511 810.303266,74.8455141 616.699903,111.243176 C423.096539,147.640838 250.863238,145.462612 100,104.708498 Z"
                opacity="0.100000001"
                ></path>
                <path d="M1046,51.6521276 C1130.83045,29.328812 1279.08318,17.607883 1439,40.1656806 L1439,120 C1271.17211,77.9435312 1140.17211,55.1609071 1046,51.6521276 Z" opacity="0.200000003"></path>
            </g>
            </g>
        </g>
        </g>
    </svg>
    <svg svg viewBox="0 0 1428 174" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <g transform="translate(-2.000000, 44.000000)" fill="#F3F4F6" fill-rule="nonzero">
            <path d="M0,0 C90.7283404,0.927527913 147.912752,27.187927 291.910178,59.9119003 C387.908462,81.7278826 543.605069,89.334785 759,82.7326078 C469.336065,156.254352 216.336065,153.6679 0,74.9732496" opacity="0.100000001"></path>
            <path
                d="M100,104.708498 C277.413333,72.2345949 426.147877,52.5246657 546.203633,45.5787101 C666.259389,38.6327546 810.524845,41.7979068 979,55.0741668 C931.069965,56.122511 810.303266,74.8455141 616.699903,111.243176 C423.096539,147.640838 250.863238,145.462612 100,104.708498 Z"
                opacity="0.100000001"
            ></path>
            <path d="M1046,51.6521276 C1130.83045,29.328812 1279.08318,17.607883 1439,40.1656806 L1439,120 C1271.17211,77.9435312 1140.17211,55.1609071 1046,51.6521276 Z" id="Path-4" opacity="0.200000003"></path>
            </g>
            <g transform="translate(-4.000000, 76.000000)" fill="#F3F4F6" fill-rule="nonzero">
            <path
                d="M0.457,34.035 C57.086,53.198 98.208,65.809 123.822,71.865 C181.454,85.495 234.295,90.29 272.033,93.459 C311.355,96.759 396.635,95.801 461.025,91.663 C486.76,90.01 518.727,86.372 556.926,80.752 C595.747,74.596 622.372,70.008 636.799,66.991 C663.913,61.324 712.501,49.503 727.605,46.128 C780.47,34.317 818.839,22.532 856.324,15.904 C922.689,4.169 955.676,2.522 1011.185,0.432 C1060.705,1.477 1097.39,3.129 1121.236,5.387 C1161.703,9.219 1208.621,17.821 1235.4,22.304 C1285.855,30.748 1354.351,47.432 1440.886,72.354 L1441.191,104.352 L1.121,104.031 L0.457,34.035 Z"
            ></path>
            </g>
        </g>
    </svg>

    <section id="informasi" class="bg-gray-100 border-b py-8">
      <div class="container max-w-5xl mx-auto m-8">
        <h2 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-600">
          Informasi
        </h2>
        <div class="w-full mb-4">
          <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
        </div>
        <div class="flex flex-wrap flex-col-reverse md:flex-row justify-center">
          <div class="w-5/6 sm:w-1/2 p-6 bg-white shadow-xl rounded-xl mx-auto" data-aos="fade-down-right" data-aos-delay="100">
            <h3 class="text-3xl text-gray-800 font-bold leading-none mb-3">
              Kontak
            </h3>
            <p class="text-gray-600 mb-8">
                <b> Anjani, ST.</b> : +62-87847491053 <br />
                <b> Annisa Ayu Utami, ST.</b> : +62-85721818109
            </p>
          </div>
          <div class="w-full sm:w-1/2 p-6">
            <img src="{{ asset('img/contact_icon.svg') }}" alt="" srcset="">
          </div>
        </div>
        <div class="flex flex-wrap flex-col md:flex-row justify-center">
          <div class="w-full sm:w-1/2 p-6 mt-6">
            <img src="{{ asset('img/address_icon.svg') }}" alt="" srcset="">
          </div>
          <div class="w-5/6 sm:w-1/2 p-6 bg-white shadow-xl rounded-xl mx-auto" data-aos="fade-up-right" data-aos-delay="100">
              <h3 class="text-3xl text-gray-800 font-bold leading-none mb-3">
                Tempat dan Waktu Kegiatan Semnas Ristek
              </h3>
              <p class="text-gray-600 mb-8">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam at ipsum eu nunc commodo posuere et sit amet ligula.
            </p>
            <br />
            <br />
            <div class="mapouter"><div class="gmap_canvas"><iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=600&amp;height=240&amp;hl=en&amp;q=Universitas Suryakancana&amp;t=&amp;z=10&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://www.gachacute.com/">www.gachacute.com</a></div><style>.mapouter{position:relative;text-align:right;width:100%;height:240px;}.gmap_canvas {overflow:hidden;background:none!important;width:100%;height:240px;}.gmap_iframe {height:240px!important;}</style></div>
          </div>
        </div>
      </div>
    </section>

    <section class="bg-gray-100 py-8">
      <div class="container mx-auto px-2 pt-4 pb-12 text-gray-800">
        <h2 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-600">
          Biaya Registrasi
        </h2>
        <div class="w-full mb-4">
          <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
        </div>
        <div class="flex flex-col sm:flex-row justify-center pt-12 my-12 sm:my-4">
          <div class="flex flex-col w-5/6 lg:w-1/3 mx-auto lg:mx-0 rounded-lg bg-white mt-4 sm:-mt-6 shadow-lg z-10" data-aos="fade-up" data-aos-delay="600">
            <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow">
              <div class="w-full p-8 text-3xl font-bold text-center">Umum</div>
              <div class="h-1 w-full gradient my-0 py-0 rounded-t"></div>
            </div>
            <div class="flex-none mt-auto bg-white rounded-b rounded-t-none overflow-hidden shadow p-6">
              <div class="w-full pt-6 text-4xl font-bold text-center">
                Rp.250.000
                <span class="text-base">/orang</span>
              </div>
              <div class="flex items-center justify-center">
                <button class="mx-auto lg:mx-0 hover:underline gradient text-white font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                  DAFTAR SEKARANG!
                </button>
              </div>
            </div>
          </div>
          <div class="flex flex-col w-5/6 lg:w-1/4 mx-auto lg:mx-0 rounded-none lg:rounded-l-lg bg-white mt-4" data-aos="fade-up" data-aos-delay="500">
            <div class="flex-1 bg-white text-gray-600 rounded-t rounded-b-none overflow-hidden shadow">
              <div class="p-8 text-3xl font-bold text-center border-b-4">
                Mahasiswa
              </div>
            </div>
            <div class="flex-none mt-auto bg-white rounded-b rounded-t-none overflow-hidden shadow p-6">
              <div class="w-full pt-6 text-3xl text-gray-600 font-bold text-center">
                Rp.150.000
                <span class="text-base">/orang</span>
              </div>
              <div class="flex items-center justify-center">
                <button class="mx-auto lg:mx-0 hover:underline gradient text-white font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                  DAFTAR SEKARANG!
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- additional style -->
    <svg class="wave-top" viewBox="0 0 1439 147" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <g transform="translate(-1.000000, -14.000000)" fill-rule="nonzero">
          <g class="wave" fill="#f8fafc">
            <path
              d="M1440,84 C1383.555,64.3 1342.555,51.3 1317,45 C1259.5,30.824 1206.707,25.526 1169,22 C1129.711,18.326 1044.426,18.475 980,22 C954.25,23.409 922.25,26.742 884,32 C845.122,37.787 818.455,42.121 804,45 C776.833,50.41 728.136,61.77 713,65 C660.023,76.309 621.544,87.729 584,94 C517.525,105.104 484.525,106.438 429,108 C379.49,106.484 342.823,104.484 319,102 C278.571,97.783 231.737,88.736 205,84 C154.629,75.076 86.296,57.743 0,32 L0,0 L1440,0 L1440,84 Z"
            ></path>
          </g>
          <g transform="translate(1.000000, 15.000000)" fill="#FFFFFF">
            <g transform="translate(719.500000, 68.500000) rotate(-180.000000) translate(-719.500000, -68.500000) ">
              <path d="M0,0 C90.7283404,0.927527913 147.912752,27.187927 291.910178,59.9119003 C387.908462,81.7278826 543.605069,89.334785 759,82.7326078 C469.336065,156.254352 216.336065,153.6679 0,74.9732496" opacity="0.100000001"></path>
              <path
                d="M100,104.708498 C277.413333,72.2345949 426.147877,52.5246657 546.203633,45.5787101 C666.259389,38.6327546 810.524845,41.7979068 979,55.0741668 C931.069965,56.122511 810.303266,74.8455141 616.699903,111.243176 C423.096539,147.640838 250.863238,145.462612 100,104.708498 Z"
                opacity="0.100000001"
              ></path>
              <path d="M1046,51.6521276 C1130.83045,29.328812 1279.08318,17.607883 1439,40.1656806 L1439,120 C1271.17211,77.9435312 1140.17211,55.1609071 1046,51.6521276 Z" opacity="0.200000003"></path>
            </g>
          </g>
        </g>
      </g>
    </svg>

    <section id="materi_seminar" class="container mx-auto text-center py-6 mb-12">
      <h2 class="w-full my-2 text-5xl font-bold leading-tight text-center text-white">
        Materi Seminar
      </h2>
      <div class="w-full mb-4">
        <div class="h-1 mx-auto bg-white w-1/6 opacity-25 my-0 py-0 rounded-t"></div>
      </div>
      <h3 class="my-12 text-3xl leading-tight">
        Materi seminar dapat diunduh pada tombol dibawah ini!
      </h3>
      <a href="#" class="mx-auto lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
        Unduh Materi!
      </a>
    </section>

    <div id="backToTop"></div>

    <!--Footer-->
    <footer class="text-center bg-gray-900 text-white">
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2023 Copyright <a class="text-white" href="https://ft.unsur.ac.id/">Fakultas Teknik Universitas Suryakancana</a>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>

    {{-- script menu responsive --}}
    <script>
        var navMenuDiv = document.getElementById("nav-content");
        var navMenu = document.getElementById("nav-toggle");

        document.onclick = check;
        function check(e) {
          var target = (e && e.target) || (event && event.srcElement);

          //Nav Menu
          if (!checkParent(target, navMenuDiv)) {
            if (checkParent(target, navMenu)) {
              if (navMenuDiv.classList.contains("hidden")) {
                navMenuDiv.classList.remove("hidden");
              } else {
                navMenuDiv.classList.add("hidden");
              }
            } else {
              navMenuDiv.classList.add("hidden");
            }
          }
        }
        function checkParent(t, elm) {
          while (t.parentNode) {
            if (t == elm) {
              return true;
            }
            t = t.parentNode;
          }
          return false;
        }
      </script>

    {{-- js back to top button --}}
    <script>
        jQuery(document).ready(function(){
            $( "#backToTop" ).append('<a class="backToTop" href="javascript:void(null);" style="display: none;"><i class="fa fa-angle-up"></i><iframe id="tmp_downloadhelper_iframe" style="display: none;"></iframe></a>');
            var $window = $(window);
            var distance = 80;
                // scroll
            $window.scroll(function() {
                // header
                if($window.scrollTop() >= distance) {
                $(".backToTop").fadeIn();
                }else{
                $(".backToTop").fadeOut();
                }
            });

            $('.backToTop').click(function() {
                $('html, body').animate({
                        scrollTop: 0
                    }, 800);
            });
        })
    </script>
  </body>
</html>
