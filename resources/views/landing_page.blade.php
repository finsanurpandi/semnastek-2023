<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Seminar Nasional Sains Teknologi 2023, yang diselenggarakan oleh Fakulas Teknik Universitas Suryakancana dengan tema Penerapan Teknologi Terintegrasi untuk Peningkatan IPM">
        <meta name="keywords" content="semnastek, unsur, semnastekunsur, ftunsur, teknik">
        <meta name="author" content="ftunsur">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SEMNASTEK UNSUR</title>

        <link rel="shortcut icon" href="{{ asset('img/logo.png') }}">

        <!-- Styles -->
        <link href="{{ asset('css/app-custom.css') }}" rel="stylesheet">
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet">


        {{-- sweetalert --}}
        <link href="{{ asset('css/sweetalert2.min.css') }}" rel="stylesheet">

        <!-- FontAwesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
        {{-- Font Style --}}
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet" />
    </head>

    <body class="leading-normal tracking-normal text-white gradient" style="font-family: 'Source Sans Pro', sans-serif;">

      <div class="Loader" id="Loader">
        <div class="LoaderWrapper">
           <div class="circleBall"></div>
           <div class="circleBall"></div>
           <div class="circleBall"></div>
        </div>
     </div>

    <!--Nav-->
    <nav id="header" class="fixed w-full z-30 top-0 text-white gradient">
      <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 py-2">
        <div class="pl-4 flex items-center">
          <a class="text-white no-underline hover:no-underline font-bold text-2xl lg:text-4xl" href="#">
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
                <a href="#tentang" class="inline-block no-underline text-white hover:text-underline py-2 px-4" href="#">Tentang</a>
              </li>
              <li class="mr-3">
                <a href="#call_for_paper" class="inline-block no-underline text-white hover:text-underline py-2 px-4" href="#">Lingkup</a>
              </li>
              <li class="mr-3">
                <a href="#narasumber" class="inline-block no-underline text-white hover:text-underline py-2 px-4" href="#">Narasumber</a>
              </li>
              <li class="mr-3">
                <a href="#tanggal_penting" class="inline-block no-underline text-white hover:text-underline py-2 px-4" href="#">Tanggal Penting</a>
              </li>
              <li class="mr-3">
                <a href="#co-host" class="inline-block no-underline text-white hover:text-underline py-2 px-4" href="#">Co-Host</a>
              </li>
              <li class="mr-3">
                <a href="#registrasi" class="inline-block no-underline text-white hover:text-underline py-2 px-4" href="#">Registrasi</a>
              </li>
              <li class="mr-3">
                <a href="#narahubung" class="inline-block no-underline text-white hover:text-underline py-2 px-4" href="#">Narahubung</a>
              </li>
          </ul>
          @if (Route::has('login'))
            @auth
                <button onclick="logout()" class="text-sm text-white underline">Keluar</button>
            @else
            <div class="flex justify-end">
                <a href="{{ route('login') }}" id="navAction" class="lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded-full py-2 px-4 shadow opacity-75 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                    Masuk/Daftar
                </a>
            </div>
            @endauth
            @endif
        </div>
      </div>
      <hr class="border-b border-gray-100 opacity-25 my-0 py-0" />
    </nav>

    <div class="container pt-8 px-3 mx-auto flex flex-wrap flex-col md:flex-row items-center justify-center">
        <!--Left Col-->
    <div class="w-1/2 flex justify-center py-8 pb-0 md:pb-8 lg:pb-8" data-aos="fade-up" data-aos-duration="500">
        <img class="w-4/5 md:w-4/5 lg:w-4/5 z-50 py-8 pb-0" src="{{ asset('img/logo.png') }}"/>
    </div>
    <!--Right Col-->
    <div class="flex flex-col w-full md:w-2/5 justify-center items-center md:items-start text-center md:text-left"  data-aos="fade-bottom" data-aos-duration="1000" data-aos-delay="500">
        <h1 class="my-4 text-2xl md:text-4xl lg:text-4xl font-bold leading-tight">
        SEMINAR NASIONAL TEKNIK UNIVERSITAS SURYAKANCANA (SEMNASTEK-UNSUR)
        </h1>
        <p class="tracking-loose w-full">20 Juni 2023</p>
        <p class="tracking-loose w-full">09.00 - Selesai.</p>
        <p class="leading-normal text-2xl">
            Hotel Palace, Cipanas-Cianjur.
        </p>
        <div class="flex flex-col-reverse md:flex-row items-center justify-between w-full" data-aos="zoom-in-left" data-aos-delay="500">
            <a href="{{ route('register')}}" class="add-motion mx-auto lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded-full my-2 md:my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                DAFTAR SEKARANG!
            </a>
        </div>
    </div>
    </div>

    <div class="relative -mt-2 lg:-mt-24">
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

    <section id="tentang" class="bg-white py-8">
        <div class="container p-10 max-w-5xl mx-auto m-8" data-aos="fade-up" data-aos-duration="1000">
          <h2 class="w-full my-2 text-3xl font-bold leading-tight text-center text-gray-600">
            SEMNASTEK-UNSUR
          </h2>
          <div class="w-full mb-4">
              <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
          </div>
          <div class="my-12 text-gray-800 text-base" style="text-align: justify;">
            Seminar Nasional Teknik merupakan program tahunan dari Fakultas Teknik, Universitas Suryakancana yang ditujukan untuk mengumpulkan para akademisi, peneliti, maupun praktisi dalam forum ilmiah yang akan mempresentasikan hasil penelitian dalam bentuk seminar. Acara ini menggabungkan tiga bidang berbeda yaitu Industri, Sipil, dan Informatika yang menghasilkan lingkup yang semakin luas dan akan menghasilkan banyak manfaat bagi mahasiswa, akademisi, peneliti dan masyarakat luas. Seminar Nasional Teknik, Universitas Suryakancana (SEMNASTEK-UNSUR) kali ini mengangkat tema tentang <strong>"Penerapan Teknologi Terintegrasi untuk Peningkatan IPM"</strong> bertujuan untuk mempertemukan para ilmuan akademik, dan peneliti dalam berbagi hasil penelitian dan pengalaman terkait bagaimana menerapkan dan mengintegrasikan berbagai teknologi untuk kebutuhan masyarakat yang nantinya secara tidak langsung akan meningkatkan IPM di suatu wilayah. SEMNASTEK-UNSUR juga dapat berperan sebagai tempat para akademisi, peneliti, dan praktisi dalam mempresentasikan dan mendiskusikan topik tentang tren, inovasi, kemungkinan perkembangan teknologi di masa depan, serta tantangan yang dihadapi dan solusi yang solutif yang dapat berperan untuk peningkatan IPM.
          </div>
      </div>
    </section>

    <section id="call_for_paper" class="bg-white py-8">
        <div class="container p-10 max-w-5xl mx-auto m-8">
          <h2 class="w-full my-2 text-3xl font-bold leading-tight text-center text-gray-600">
            Lingkup
          </h2>
          <div class="w-full mb-4">
              <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
          </div>
          <div class="flex flex-col md:flex-row justify-between">
              <div class="py-8 px-4 gradient border border-gray-200 rounded-lg shadow-xl hover:bg-gray-100" data-aos="fade-up" data-aos-duration="800">
                  <h5 class="mb-2 text-2xl font-bold tracking-tight text-white">Teknik Informatika</h5>
                  <span class="bg-indigo-100 text-indigo-800 text-sm font-medium px-2.5 py-0.5 rounded">Geography Information System</span> <br />
                  <span class="bg-indigo-100 text-indigo-800 text-sm font-medium px-2.5 py-0.5 rounded">Security Network</span> <br />
                  <span class="bg-indigo-100 text-indigo-800 text-sm font-medium px-2.5 py-0.5 rounded">Big Data</span> <br />
                  <span class="bg-indigo-100 text-indigo-800 text-sm font-medium px-2.5 py-0.5 rounded">Information System</span> <br />
                  <span class="bg-indigo-100 text-indigo-800 text-sm font-medium px-2.5 py-0.5 rounded">Enterprise Resource Planning</span> <br />
                  <span class="bg-indigo-100 text-indigo-800 text-sm font-medium px-2.5 py-0.5 rounded">Internet of Things, Cloud Computing</span> <br />
                  <span class="bg-indigo-100 text-indigo-800 text-sm font-medium px-2.5 py-0.5 rounded">Artificial Intelligent</span> <br />
                  <span class="bg-indigo-100 text-indigo-800 text-sm font-medium px-2.5 py-0.5 rounded">Soft Computing</span> <br />
                  <span class="bg-indigo-100 text-indigo-800 text-sm font-medium px-2.5 py-0.5 rounded">Multimedia</span> <br />
                  <span class="bg-indigo-100 text-indigo-800 text-sm font-medium px-2.5 py-0.5 rounded">Game</span> <br />
                  <span class="bg-indigo-100 text-indigo-800 text-sm font-medium px-2.5 py-0.5 rounded">Human Computer Interaction</span>
              </div>
              <div class="py-8 px-4 gradient border border-gray-200 rounded-lg shadow-md hover:bg-gray-100" data-aos="fade-up" data-aos-duration="800">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-white">Teknik Industri</h5>
                <span class="bg-indigo-100 text-indigo-800 text-sm font-medium px-2.5 py-0.5 rounded">Industrial systems</span> <br />
                <span class="bg-indigo-100 text-indigo-800 text-sm font-medium px-2.5 py-0.5 rounded">Manufacturing systems</span> <br />
                <span class="bg-indigo-100 text-indigo-800 text-sm font-medium px-2.5 py-0.5 rounded">Systems Engineering & Ergonomics</span> <br />
                <span class="bg-indigo-100 text-indigo-800 text-sm font-medium px-2.5 py-0.5 rounded">Industrial Management</span> <br />
                <span class="bg-indigo-100 text-indigo-800 text-sm font-medium px-2.5 py-0.5 rounded">Supply Chain and Logistics</span>
            </div>
              <div class="py-8 px-4 gradient border border-gray-200 rounded-lg shadow-md hover:bg-gray-100" data-aos="fade-up" data-aos-duration="800">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-white">Teknik Sipil</h5>
                <span class="bg-indigo-100 text-indigo-800 text-sm font-medium px-2.5 py-0.5 rounded">Structure engineering</span> <br />
                <span class="bg-indigo-100 text-indigo-800 text-sm font-medium px-2.5 py-0.5 rounded">Transportation engineering</span> <br />
                <span class="bg-indigo-100 text-indigo-800 text-sm font-medium px-2.5 py-0.5 rounded">Project management engineering</span> <br />
                <span class="bg-indigo-100 text-indigo-800 text-sm font-medium px-2.5 py-0.5 rounded">Traffic engineering</span>
            </div>
          </div>
      </div>
  </section>

    <section id="narasumber" class="bg-gray-100 py-8">
      <div class="container mx-auto flex flex-wrap pt-4 pb-12" data-aos="fade-up" data-aos-duration="1000">
        <h2 class="w-full my-2 text-3xl font-bold leading-tight text-center text-gray-600">
          Narasumber
        </h2>
        <div class="w-full mb-4">
          <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
        </div>
        
        <div class="flex flex-col md:flex-row">
          <div class="w-full md:w-1/3 p-6 flex flex-col flex-grow flex-shrink">
            <div class="flex-1 bg-white py-8 rounded-t rounded-b-none overflow-hidden shadow">
              <a href="#" class="flex flex-wrap no-underline hover:no-underline">
                  <img class="inline object-contain w-24 mx-auto p-1 rounded-full ring-2 ring-gray-900" src="{{ asset('img/manlian.jpg') }}" style="width: 200px;" alt="Profile image"/>
                  <div class="w-full font-bold text-xl text-center py-4 text-gray-600 px-6">
                      Prof. Dr. Manlian Ronald A. Simanjuntak, S.T., M.T.
                  </div>
              </a>
            </div>
          </div>
          <div class="w-full md:w-1/3 p-6 flex flex-col flex-grow flex-shrink">
            <div class="flex-1 bg-white py-8 rounded-t rounded-b-none overflow-hidden shadow">
              <a href="#" class="flex flex-wrap no-underline hover:no-underline">
                <img class="inline object-contain mx-auto p-1 rounded-full ring-2 ring-gray-900" src="{{ asset('img/60111.jpg') }}" style="width: 200px;" alt="Profile image"/>
                <div class="w-full font-bold text-xl text-center py-4 text-gray-600 px-6">
                  Dr. Ing. Mokhamad Hendayun, Ir
                </div>
              </a>
            </div>
          </div>
          
          <div class="w-full md:w-1/3 p-6 flex flex-col flex-grow flex-shrink">
            <div class="flex-1 bg-white py-8 rounded-t rounded-b-none overflow-hidden shadow">
              <a href="#" class="flex flex-wrap no-underline hover:no-underline">
                  <img class="inline object-contain w-24 mx-auto p-1 rounded-full ring-2 ring-gray-900" src="{{ asset('img/alisubhan.jpg') }}" style="width: 200px;" alt="Profile image"/>
                  <div class="w-full font-bold text-xl text-center py-4 text-gray-600 px-6">
                      Dr. Ali Subhan, S.T., M.T.
                  </div>
              </a>
            </div>
          </div>
          <div class="w-full md:w-1/3 p-6 flex flex-col flex-grow flex-shrink">
            <div class="flex-1 bg-white py-8 rounded-t rounded-b-none overflow-hidden shadow">
              <a href="#" class="flex flex-wrap no-underline hover:no-underline">
                  <img class="inline object-contain w-24 mx-auto p-1 rounded-full ring-2 ring-gray-900" src="{{ asset('img/60111.jpg') }}" style="width: 200px;" alt="Profile image"/>
                  <div class="w-full font-bold text-xl text-center py-4 text-gray-600 px-6">
                      #
                  </div>
              </a>
            </div>
          </div>
      </div>
        
      </div>
    </section>

    <section id="tanggal_penting" class="bg-white py-8">
        <div class="hidden md:block container max-w-5xl mx-auto m-8">
            <h2 class="w-full my-2 text-3xl font-bold leading-tight text-center text-gray-600">
            Tanggal Penting
            </h2>
            <div class="w-full mb-4">
                <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
            </div>
            <div class="relative wrap overflow-hidden p-10 h-full">
                <div class="border-2-2 absolute border-opacity-20 border-gray-700 h-full border" style="left: 50%"></div>
                
                <!-- left timeline -->
                <div class="mb-8 flex justify-between flex-row-reverse items-center w-full left-timeline">
                  <div class="order-1 w-5/12"></div>
                  <div class="z-20 flex items-center order-1 gradient shadow-xl w-24 h-24 rounded-full">
                      <h1 class="mx-auto font-semibold text-sm text-white" style="text-decoration-line: line-through; text-decoration-color: red;">31 Maret</h1>
                  </div>
                  <div class="order-1 bg-gray-400 rounded-lg shadow-xl w-5/12 px-6 py-4" data-aos="zoom-in-right" data-aos-duration="1000">
                  <h3 class="mb-3 font-bold text-white text-lg" style="text-decoration-line: line-through; text-decoration-color: red;">Deadline Submission</h3>
                  <p class="text-sm font-medium leading-snug tracking-wide text-white text-opacity-100" style="text-decoration-line: line-through; text-decoration-color: red;">Batas akhir pengiriman artikel..</p>
                  </div>
              </div>


                <!-- right timeline -->
                <div class="mb-8 flex justify-between items-center w-full right-timeline">
                    <div class="order-first md:order-1 w-5/12"></div>
                    <div class="z-20 flex items-center order-first md:order-1 bg-gray-400 shadow-xl w-24 h-24 rounded-full">
                        <h1 class="mx-auto font-semibold text-sm text-white">30 April</h1>
                    </div>
                    <div class="order-last md:order-1 gradient rounded-lg shadow-xl px-6 py-4 w-5/12" data-aos="zoom-in-left" data-aos-duration="1000">
                        <h3 class="mb-3 font-bold text-white text-lg">Extended Deadline Submission</h3>
                        <p class="text-sm leading-snug tracking-wide text-white text-opacity-100">Penambahan batas akhir pengiriman artikel.</p>
                    </div>
                </div>

                <!-- left timeline -->
                <div class="mb-8 flex justify-between flex-row-reverse items-center w-full left-timeline">
                    <div class="order-1 w-5/12"></div>
                    <div class="z-20 flex items-center order-1 gradient shadow-xl w-24 h-24 rounded-full">
                        <h1 class="mx-auto font-semibold text-sm text-white">15 Mei</h1>
                    </div>
                    <div class="order-1 bg-gray-400 rounded-lg shadow-xl w-5/12 px-6 py-4" data-aos="zoom-in-right" data-aos-duration="1000">
                    <h3 class="mb-3 font-bold text-white text-lg">Acceptance Notice</h3>
                    <p class="text-sm font-medium leading-snug tracking-wide text-white text-opacity-100">Tanggal Pengumuman penerimaan artikel seminar nasional.</p>
                    </div>
                </div>

                <!-- right timeline -->
                <div class="mb-8 flex justify-between items-center w-full right-timeline">
                    <div class="order-1 w-5/12"></div>
                    <div class="z-20 flex items-center order-1 bg-gray-400 shadow-xl w-24 h-24 rounded-full">
                    <h1 class="mx-auto font-semibold text-sm text-white">10 Juni</h1>
                    </div>
                    <div class="order-1 gradient rounded-lg shadow-xl w-5/12 px-6 py-4" data-aos="zoom-in-left" data-aos-duration="1000">
                    <h3 class="mb-3 font-bold text-white text-lg">Deadline Registration</h3>
                    <p class="text-sm leading-snug tracking-wide text-white text-opacity-100">Batas akhir pembayaran biaya registrasi seminar nasional.</p>
                    </div>
                </div>

                <!-- left timeline -->
                <div class="mb-8 flex justify-between flex-row-reverse items-center w-full left-timeline">
                    <div class="order-1 w-5/12"></div>
                    <div class="z-20 flex items-center order-1 gradient shadow-xl w-24 h-24 rounded-full">
                        <h1 class="mx-auto font-semibold text-sm text-white">20 Juni</h1>
                    </div>
                    <div class="order-1 bg-gray-400 rounded-lg shadow-xl w-5/12 px-6 py-4" data-aos="zoom-in-right" data-aos-duration="1000">
                    <h3 class="mb-3 font-bold text-white text-lg">Pelaksanaan SEMNASTEK-UNSUR 2023</h3>
                    
                    </div>
                </div>
            </div>
        </div>

        {{-- date line for mobile --}}
        <div class="container block md:hidden lg:hidden max-w-5xl mx-auto m-8">
            <h2 class="w-full my-2 text-3xl font-bold leading-tight text-center text-gray-600">
                Tanggal Penting
            </h2>
            <div class="w-full mb-4">
                    <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
            </div>
            <div class="relative wrap overflow-hidden p-10 h-full">
              <ol class="relative border-l border-blue-800">
                  <li class="mb-10 ml-4 p-4">
                      <div class="flex">
                        <div class="w-3 h-3 gradient rounded-full mt-0 mr-3 -left-1.5 border border-blue-800"></div>
                        <time class="mb-1 text-sm font-normal leading-none text-gray-400">31 Maret 2023</time>
                      </div>
                      <h3 class="text-lg font-semibold text-gray-900">Deadline Submission</h3>
                      <p class="text-base font-normal text-gray-500">Batas akhir pengiriman artikel.</p>
                  </li>
                  <li class="mb-10 ml-4 p-4">
                    <div class="flex">
                      <div class="w-3 h-3 gradient rounded-full mt-0 mr-3 -left-1.5 border border-blue-800"></div>
                      <time class="mb-1 text-sm font-normal leading-none text-gray-400">19 April 2023</time>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900">Acceptance Notice</h3>
                    <p class="text-base font-normal text-gray-500">Tanggal Pengumuman penerimaan artikel seminar nasional.</p>
                  </li>
                  <li class="mb-10 ml-4 p-4">
                    <div class="flex">
                      <div class="w-3 h-3 gradient rounded-full mt-0 mr-3 -left-1.5 border border-blue-800"></div>
                      <time class="mb-1 text-sm font-normal leading-none text-gray-400">19 Mei 2023</time>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900">Deadline Registration</h3>
                    <p class="text-base font-normal text-gray-500">Batas akhir pembayaran biaya registrasi seminar nasional.</p>
                  </li>
                  <li class="mb-10 ml-4 p-4">
                    <div class="flex">
                      <div class="w-3 h-3 gradient rounded-full mt-0 mr-3 -left-1.5 border border-blue-800"></div>
                      <time class="mb-1 text-sm font-normal leading-none text-gray-400">20 Juni 2023</time>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900">The Big Day</h3>
                    <p class="text-base font-normal text-gray-500">Hari pelaksanaan SEMNASTEK-UNSUR 2023.</p>
                  </li>
              </ol>
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

    <section id="co-host" class="bg-gray-100 py-8">
      <div class="container mx-auto px-2 pt-4 pb-12 text-gray-800">
        <h2 class="w-full my-2 text-3xl font-bold leading-tight text-center text-gray-600">
          Co-Host/Sponsorship
        </h2>
        <div class="w-full mb-4">
          <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
        </div>
        <div class="flex flex-col sm:flex-row justify-center pt-12 my-12 sm:my-4">
          <div class="flex flex-col w-5/6 lg:w-1/3 mx-auto lg:mx-0 rounded-lg bg-white mt-4 sm:-mt-6 shadow-lg z-10" data-aos="fade-up" data-aos-delay="200">
            <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow">
              <div class="w-full p-8 text-3xl font-bold text-center">Umum</div>
              <div class="h-1 w-full gradient my-0 py-0 rounded-t"></div>
            </div>
            <div class="flex-none mt-auto bg-white rounded-b rounded-t-none overflow-hidden shadow p-6">
              <div class="w-full pt-6 text-4xl font-bold text-center">
                Rp.5.000.000,-
              </div>
              <div class="flex items-center justify-center">
                <ul>
                  <li>Free biaya registrasi untuk 10 artikel</li>
                  <li>Logo dari institusi akan dipasang di media promosi dan pelaksanaan seminar</li>
                  <li>Nama dari institusi akan disebutkan oleh MC selama seminar</li>
                  <li>Sertifikat Co-Host</li>
                </ul>
              </div>
              <div class="flex items-center justify-center">
                <a href="{{ asset('berkas_kerjasama_co_host.zip') }}" class="mx-auto lg:mx-0 hover:underline gradient text-white font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                  GABUNG SEKARANG!
                </a>
              </div>
            </div>
          </div>
          <div class="flex flex-col w-5/6 lg:w-1/3 mx-auto lg:mx-0 rounded-lg bg-white mt-4 sm:-mt-6 shadow-lg z-10" data-aos="fade-up" data-aos-delay="200">
            <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow">
              <div class="w-full p-8 text-3xl font-bold text-center">Sponsorship</div>
              <div class="h-1 w-full gradient my-0 py-0 rounded-t"></div>
            </div>
            <div class="flex-none mt-auto bg-white rounded-b rounded-t-none overflow-hidden shadow p-6">
              <div class="w-full pt-6 text-4xl font-bold text-center">
                Rp.1.000.000,-
              </div>
              <div class="flex items-center justify-center">
                <ul>
                  <li>Logo dari institusi akan dipasang di media promosi dan pelaksanaan seminar</li>
                  <li>Nama dari institusi akan disebutkan oleh MC selama seminar</li>
                </ul>
              </div>
              <div class="flex items-center justify-center">
                <a href="{{ asset('SuratKesediaanSponsorshipSEMNASTEK2023.docx') }}" class="mx-auto lg:mx-0 hover:underline gradient text-white font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                  GABUNG SEKARANG!
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="registrasi" class="bg-gray-100 py-8">
      <div class="container mx-auto px-2 pt-4 pb-12 text-gray-800">
        <h2 class="w-full my-2 text-3xl font-bold leading-tight text-center text-gray-600">
          Biaya Registrasi
        </h2>
        <div class="w-full mb-4">
          <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
        </div>
        <div class="flex flex-col sm:flex-row justify-center pt-12 my-12 sm:my-4">
          <div class="flex flex-col w-5/6 lg:w-1/3 mx-auto lg:mx-0 rounded-lg bg-white mt-4 sm:-mt-6 shadow-lg z-10" data-aos="fade-up" data-aos-delay="200">
            <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow">
              <div class="w-full p-8 text-3xl font-bold text-center">Registrasi Pemakalah Artikel</div>
              <div class="h-1 w-full gradient my-0 py-0 rounded-t"></div>
            </div>
            <div class="flex-none mt-auto bg-white rounded-b rounded-t-none overflow-hidden shadow p-6">
              <div class="w-full pt-6 text-4xl font-bold text-center">
                Rp.350.000
                <span class="text-base">/orang</span>
              </div>
              <div class="flex items-center justify-center">
                Sertifikat Digital<br/>
                Materi Presentasi<br/>
                Presentasi Artikel<br/>
                Coffee Break dan Makan Siang
              </div>
              <div class="flex items-center justify-center">
                <a href="{{ route('register')}}" class="mx-auto lg:mx-0 hover:underline gradient text-white font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                  DAFTAR SEKARANG!
                </a>
              </div>
            </div>
          </div>
          <div class="flex flex-col w-5/6 lg:w-1/3 mx-auto lg:mx-0 rounded-lg bg-white mt-4 sm:-mt-6 shadow-lg z-10" data-aos="fade-up" data-aos-delay="200">
            <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow">
              <div class="w-full p-8 text-3xl font-bold text-center">Registrasi Seminar Tanpa Artikel</div>
              <div class="h-1 w-full gradient my-0 py-0 rounded-t"></div>
            </div>
            <div class="flex-none mt-auto bg-white rounded-b rounded-t-none overflow-hidden shadow p-6">
              <div class="w-full pt-6 text-4xl font-bold text-center">
                Rp.280.000
                <span class="text-base">/orang</span>
              </div>
              <div class="flex items-center justify-center">
                Sertifikat Digital<br/>
                Materi Presentasi</br>
                Coffee Break dan Makan Siang
              </div>
              <div class="flex items-center justify-center">
                <a href="{{ route('register')}}" class="mx-auto lg:mx-0 hover:underline gradient text-white font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                  DAFTAR SEKARANG!
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="narahubung" class="bg-gray-100 py-8">
      <div class="container max-w-5xl mx-auto m-8">
        <h2 class="w-full my-2 text-3xl font-bold leading-tight text-center text-gray-600">
          Narahubung
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
            <h3 class="text-3xl text-gray-800 font-bold leading-none mb-3">
                Sekretariat
              </h3>
              <p class="text-gray-600 mb-8">
                Gedung Fakultas Teknik Universitas Suryakancana - Jl. Pasirgede Raya, Bojongherang, Kec. Cianjur, Kabupaten Cianjur, Jawa Barat 43216
                <br />
                Instagram : <a href="https://www.instagram.com/ft.unsur" target="_blank">ftunsur</a><br />
                Email : <a href="https://mail.google.com/mail/?view=cm&fs=1&to=semantek@unsur.ac.id" target="_blank">fteknik@unsur.ac.id</a><br />
                Situs Website : <a href="https://ft.unsur.ac.id" target="_blank">ft.unsur.ac.id</a>
              </p>
          </div>
          <div class="w-1/2 p-6 mt-6 mx-auto">
            <img src="{{ asset('img/contact_icon.svg') }}" alt="" srcset="">
          </div>
        </div>
        <div class="flex flex-wrap flex-col md:flex-row justify-center">
          <div class="w-1/2 p-6 mt-6 mx-auto">
            <img src="{{ asset('img/address_icon.svg') }}" alt="" srcset="">
          </div>
          <div class="w-5/6 sm:w-1/2 p-6 bg-white shadow-xl rounded-xl mx-auto" data-aos="fade-up-right" data-aos-delay="100">
              <h3 class="text-3xl text-gray-800 font-bold leading-none mb-3">
                Tempat dan Waktu Kegiatan SEMNASTEK-UNSUR
              </h3>
              <p class="text-gray-600 mb-8">
                Kegiatan ini dilaksanakan pada <b> 20 Juni 2023 </b> bertempat di Hotel Palace, Cipanas-Cianjur.
            </p>
            <div style="overflow:hidden;max-width:100%;width:600px;height:240px;"><div id="google-maps-canvas" style="height:100%; width:100%;max-width:100%;"><iframe style="height:100%;width:100%;border:0;" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q=Palace+Hotel+Cipanas,+Jalan+Raya+Cipanas,+Cipanas,+Kabupaten+Cianjur,+Jawa+Barat,+Indonesia&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8"></iframe></div><a class="googlecoder" rel="nofollow" href="https://www.bootstrapskins.com/themes" id="auth-map-data">premium bootstrap themes</a><style>#google-maps-canvas img{max-width:none!important;background:none!important;font-size: inherit;font-weight:inherit;}</style></div>
          </div>
        </div>
      </div>
    </section>



    <!-- additional style -->
    <svg class="wave-top" viewBox="0 0 1439 147" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
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

    <section id="materi_seminar" class="container mx-auto text-center py-6 mb-12">
      <h2 class="w-full my-2 text-3xl font-bold leading-tight text-center text-white">
        Template Artikel
      </h2>
      <div class="w-full mb-4">
        <div class="h-1 mx-auto bg-white w-1/6 opacity-25 my-0 py-0 rounded-t"></div>
      </div>
      <h3 class="my-12 text-xl leading-tight">
        Template penulisan artikel dapat diunduh pada tombol dibawah ini!
      </h3>
      <a href="{{ asset('template_semnastek.docx') }}" class="mx-auto lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out" target="_blank">
        Unduh Template!
      </a>
      <h4 class="my-12 text-xl leading-tight">
        Keseluruhan artikel akan diterbitkan di prosiding Online yang terindeks Google Scholar. <br/>Artikel terpilih akan memiliki kesempatan untuk diterbitkan di Jurnal yang terindeks SINTA <br/>(Prodi Industri SINTA 3, Prodi Informatika SINTA 5, Prodi Sipil SINTA 6)
      </h4>
    </section>

    <!-- Go to top Button -->
    <a href="#">
        <div class="Gototop">
              <i class="fa fa-angle-double-up text-white" aria-hidden="true"></i>
        </div>
     </a>

    <!--Footer-->
    <footer class="text-center bg-gray-900 text-white">
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.2);">
            <div class="w-full mb-4">
              <div class="flex flex-row mx-auto justify-center opacity-90">
                <img src="{{ asset('img/unsur_logo.png') }}" width="80px" alt="" srcset="">
                <img src="{{ asset('img/ft_logo.png') }}" width="80px" class="ml-5" alt="" srcset="">
                <img src="{{ asset('img/stmik_im.png') }}" width="80px" class="ml-5" title="STMIK IM Bandung" srcset="">
                <img src="{{ asset('img/km_logo.png') }}" width="80px" class="ml-5" alt="" srcset="">
              </div>
          </div>
            © 2023 Copyright <a class="text-white" href="https://ft.unsur.ac.id/">Fakultas Teknik Universitas Suryakancana</a>
        </div>
    </footer>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/app-custom.js') }}"></script>
    <script>
        // script menu responsive
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
        $(window).on("load", function () {
            function HideLoader() {
                setTimeout(() => {
                    $("#Loader").fadeOut(100);
                }, 500);
            }
            HideLoader();
        });
        // js back to top button
        $(window).on("scroll load", function () {
            if ($("#header").offset().top > 40) {
                $("#header").addClass("shrink");
                $(".Gototop").css("visibility", "visible");
            } else {
                $("#header").removeClass("shrink");
                $(".Gototop").css("visibility", "hidden");
            }
        });
    </script>

    <script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
    <script>
        function logout(){
            Swal.fire({
            title: 'Anda yakin ingin keluar?',
            showDenyButton: true,
            confirmButtonText: 'Keluar',
            confirmButtonColor: '#36368d',
            denyButtonText: 'Tidak',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '/logout';
                }
                // else if (result.isDenied) {
                //     Swal.fire('Terima kasih!', '', 'success');
                // }
            })
        }
     </script>
  </body>
</html>
