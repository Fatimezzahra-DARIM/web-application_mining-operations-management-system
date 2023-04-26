<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- CDN flowbite -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css" rel="stylesheet" />
    <!-- icon CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
      integrity="sha512-2E3W8nX4fz4g4vjvCVe58Gn8B/dl5m5NNlou2x5c5q5P4XJ0+4O4zvR1W0ROpGtN1gNohpZvGLdW30fI2tOYkg=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- ////////////////// -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
<!-- Style card -->
  <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">

</head>
<body class=" bg-orange-200"  >
  <!-- Navbar  -->
    <nav class="bg-white border-gray-200 dark:bg-zinc-700 ">
        <div class="max-w-screen-xl flex  items-center justify-between p-4">
          <!-- logo image -->
            <a href="#" class="flex justify-start items-center">
                <img src="{{asset('images/new/MMLogo.png')}}" class="h-14 mr-3 rounded-lg" alt="Flowbite Logo" />
                <h4 class="text-center whitespace-nowrap mb-4 text-1xl font-extrabold text-gray-900 dark:text-white md:text-2xl lg:text-2xl"><span
                       class="text-transparent bg-clip-text bg-gradient-to-r to-amber-500 from-amber-50">Mining In Morocco</span></h4>
            </a>
          <!-- button of navbar resp -->
            <div class="flex md:order-2">
                <button data-collapse-toggle="navbar-cta" type="button"
                    class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="navbar-cta" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
          <!-- Sign in & sign up -->
            <div class=" hidden w-full md:flex md:order-1 justify-end items-center" id="navbar-cta">
              @if (Route::has('login'))
                <div class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-zinc-700 md:dark:bg-zinc-700 dark:border-zinc-700">
                    @auth
                    {{-- @php
   dd(auth()->user()->roles)
                    @endphp --}}

                    @role('geologist|field-geologist|laboratory-geologist|office-geologist')
                        <a href="{{ url('/geologist/dashboard') }}" class="text-sm text-white underline">Geologist dashboard</a>

                    @endrole
                    @hasrole('admin')
                    <a href="{{ url('/admin/dashboard') }}" class="text-sm text-white underline">Admin dashboard</a>
                @endhasrole
                    @else
                        <a href="{{ route('login') }}"
                            class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-orange-100 md:p-0 md:dark:hover:text-orange-100 dark:text-orange-200 dark:hover:bg-gray-700 dark:hover:text-orange-200 md:dark:hover:bg-transparent dark:border-gray-700">Sign In</a>
                    @if (Route::has('register'))

                        <a href="{{ route('register') }}"
                            class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-orange-100 md:p-0 md:dark:hover:text-orange-100 dark:text-orange-200 dark:hover:bg-gray-700 dark:hover:text-orange-200 md:dark:hover:bg-transparent dark:border-gray-700">Sign Up</a>
                    @endif
                    @endauth

                </div>
                @endif
            </div>
        </div>
    </nav>


    <!-- ///////////////////////////// -->
    <div id="default-carousel" class="relative w-full" data-carousel="slide">
        <!-- Carousel wrapper -->
        <div class="relative h-56 overflow-hidden  md:h-80">
            <!-- Item 1 -->
            <div class="hidden duration-700 h-56  ease-in-out" data-carousel-item>
                <img src="{{asset('images/7.jpg')}}"
                    class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
            <!-- Item 2 -->
            <div class="hidden duration-700 h-56  ease-in-out" data-carousel-item>
                <img src="{{asset('images/2.jpg')}}"
                    class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
            <!-- Item 3 -->
            <div class="hidden duration-700 h-56  ease-in-out" data-carousel-item>
                <img src="{{asset('images/6.jpg')}}"
                    class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
            <!-- Item 4 -->
            <div class="hidden duration-700 h-56  ease-in-out" data-carousel-item>
                <img src="{{asset('images/4.jpg')}}"
                    class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
            <!-- Item 5 -->
            <div class="hidden duration-700 h-56  ease-in-out" data-carousel-item>
                <img src="{{asset('/images/5.jpg')}}"
                    class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
        </div>
        <!-- Slider indicators -->
        <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
            <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1"
                data-carousel-slide-to="0"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
                data-carousel-slide-to="1"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3"
                data-carousel-slide-to="2"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4"
                data-carousel-slide-to="3"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5"
                data-carousel-slide-to="4"></button>
        </div>
        <!-- Slider controls -->
        <button type="button"
            class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
            data-carousel-prev>
            <span
                class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-[#3f3f46]/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>
        <button type="button"
            class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
            data-carousel-next>
            <span
                class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-[#3f3f46]/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
    </div>
    <!-- /////////////////////////////////// -->
    <div style="background-color: #3f3f46;">
        <main class="page-content">
            <div class="card">
                <div class="content">
                    <h2 class="title">Safety</h2>
                    <p class="copy">Prioritize safe working conditions</p>
                </div>
            </div>
            <div class="card">
                <div class="content">
                    <h2 class="title">Sustainability</h2>
                    <p class="copy">Minimize environmental impact, support communities</p>
                </div>
            </div>
            <div class="card">
                <div class="content">
                    <h2 class="title">Efficiency</h2>
                    <p class="copy">Optimize production, reduce costs</p>
                </div>
            </div>
            <div class="card">
                <div class="content">
                    <h2 class="title">Innovation</h2>
                    <p class="copy">Use new technologies, explore methods</p>
                </div>
            </div>
        </main>
        <figure class=" transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0">

            <div class="flex justify-around justify-items-center" >
                <!-- <a href="#"> -->
                    <img class="rounded-lg" src="{{asset('images/values.png')}}" alt="image description" style="width: 30%;">
                <!-- </a> -->
                <p class="text-orange-200 dark:text-orange-300 flex justify-center items-center text-2xl italic ">Unearthing the wealth of Morocco's earth, with integrity and expertise.</p>
            </div>
        </figure>

        </div>

<h1 class="text-4xl font-bold tracking-tight text-center text-gray-900 dark:text-zinc-700">Our Products</h1>


<div class="flex flex-wrap justify-center">
<div class="max-w-sm w-80 mt-6  mx-3  shadow dark:bg-zinc-700 dark:border-zinc-700">
<div id="controls-carousel" class="relative w-full" data-carousel="static">
    <!-- Carousel wrapper -->
    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
        <!-- Item 1 -->
        <div class="hidden duration-700 h-56 overflow-hidden justify-center items-center my-auto ease-in-out" data-carousel-item>
            <img src="{{asset('images/new/fluorite1.jpg')}}"
                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <!-- Item 2 -->
        <div class="hidden duration-700 h-56 overflow-hidden justify-center items-center my-auto ease-in-out" data-carousel-item="active">
            <img src="{{asset('images/new/fluorite2.jpg')}}"
                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <!-- Item 3 -->
        <div class="hidden duration-700 h-56 overflow-hidden justify-center items-center my-auto ease-in-out" data-carousel-item>
            <img src="{{asset('images/new/fluorite3.jpg')}}"
                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
    </div>
    <!-- Slider controls -->
    <button type="button"
        class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
        data-carousel-prev>
        <span
            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-[#3f3f46]/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg aria-hidden="true" class="w-6 h-6 text-white dark:text-gray-800" fill="none" stroke="currentColor"
                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button type="button"
        class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
        data-carousel-next>
        <span
            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-[#3f3f46]/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg aria-hidden="true" class="w-6 h-6 text-white dark:text-gray-800" fill="none" stroke="currentColor"
                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
</div>
    <div class="p-5">
        <a href="#">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white text-center">Fluorite</h5>
        </a>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Fluorite is used to make glass, glass fibres and ceramic enamel.
        Fluorite is present in microscopes,telescopes and spectrographs.
        Metallurgical Fluorite increases the strength of cement and stops it from cracking.</p>

    </div>
</div>
<!-- ///////////////////////////////////////////// -->
<div class="max-w-sm mt-6 w-80 mx-3  shadow dark:bg-zinc-700 dark:border-zinc-700">
  <div id="controls-carousel" class="relative w-full" data-carousel="static">
    <!-- Carousel wrapper -->
    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
      <!-- Item 1 -->
      <div class="hidden duration-700 h-56 overflow-hidden justify-center items-center my-auto  ease-in-out" data-carousel-item>
        <img src="{{asset('images/new/cobalt1.jpg')}}"
          class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
      </div>
      <!-- Item 2 -->
      <div class="hidden duration-700 h-56 overflow-hidden justify-center items-center my-auto  ease-in-out" data-carousel-item="active">
        <img src="{{asset('images/new/cobalt2.jpg')}}"
          class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
      </div>

    </div>
    <!-- Slider controls -->
    <button type="button"
      class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
      data-carousel-prev>
      <span
        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-[#3f3f46]/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
        <svg aria-hidden="true" class="w-6 h-6 text-white dark:text-gray-800" fill="none" stroke="currentColor"
          viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
        </svg>
        <span class="sr-only">Previous</span>
      </span>
    </button>
    <button type="button"
      class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
      data-carousel-next>
      <span
        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-[#3f3f46]/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
        <svg aria-hidden="true" class="w-6 h-6 text-white dark:text-gray-800" fill="none" stroke="currentColor"
          viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
        </svg>
        <span class="sr-only">Next</span>
      </span>
    </button>
  </div>


  <div class="p-5">
    <a href="#">
      <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white text-center">Cobalt</h5>
    </a>
    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Electrical batteries and super-alloys. Cobalt is malleable, ductile and ferromagnetic at high temperatures, making it a key element in the production of
    electrical batteries, notably for the new technologies and electric vehicles market, which is enjoying significant
    growth.</p>

  </div>
</div>
<!-- ////////////////////////////// -->
<div class="max-w-sm mt-6 w-80 mx-3  shadow dark:bg-zinc-700 dark:border-zinc-700">
  <div id="controls-carousel" class="relative w-full" data-carousel="static">
    <!-- Carousel wrapper -->
    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
      <!-- Item 1 -->
      <div class="hidden duration-700 h-56 overflow-hidden justify-center items-center my-auto ease-in-out" data-carousel-item>
        <img src="{{asset('images/new/phosphate1.jpg')}}"
          class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
      </div>
      <!-- Item 2 -->
      <div class="hidden duration-700 h-56 overflow-hidden justify-center items-center my-auto ease-in-out" data-carousel-item="active">
        <img src="{{asset('images/new/phosphate2.jpg')}}"
          class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
      </div>
      <!-- Item 3 -->
      <div class="hidden duration-700 h-56 overflow-hidden justify-center items-center my-auto ease-in-out" data-carousel-item="active">
        <img src="{{asset('images/new/phosphate3.webp')}}"
          class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
      </div>
    </div>
    <!-- Slider controls -->
    <button type="button"
      class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
      data-carousel-prev>
      <span
        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-[#3f3f46]/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
        <svg aria-hidden="true" class="w-6 h-6 text-white dark:text-gray-800" fill="none" stroke="currentColor"
          viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
        </svg>
        <span class="sr-only">Previous</span>
      </span>
    </button>
    <button type="button"
      class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
      data-carousel-next>
      <span
        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-[#3f3f46]/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
        <svg aria-hidden="true" class="w-6 h-6 text-white dark:text-gray-800" fill="none" stroke="currentColor"
          viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
        </svg>
        <span class="sr-only">Next</span>
      </span>
    </button>
  </div>


  <div class="p-5">
    <a href="#">
      <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white text-center">Phosphate</h5>
    </a>
    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Phosphate rock is processed to produce phosphorous, which is one of the three main nutrients most commonly used in
    fertilizers (the other two are nitrogen and potassium). Phosphate can also be turned into phosphoric acid, which is used
    in everything from food and cosmetics to animal feed and electronics.</p>

  </div>
</div>
<!-- /////////////////// -->
<div class="max-w-sm mt-6 w-80 mx-3  shadow dark:bg-zinc-700 dark:border-zinc-700">
  <div id="controls-carousel" class="relative w-full" data-carousel="static">
    <!-- Carousel wrapper -->
    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
      <!-- Item 1 -->
      <div class="hidden duration-700 h-56 overflow-hidden justify-center items-center my-auto ease-in-out" data-carousel-item>
        <img src="{{asset('images/new/Silver.png')}}"
          class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
      </div>
      <!-- Item 2 -->
      <div class="hidden duration-700 h-56 overflow-hidden justify-center items-center my-auto ease-in-out" data-carousel-item="active">
        <img src="{{asset('images/new/silver2.jpg')}}"
          class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
      </div>

    </div>
    <!-- Slider controls -->
    <button type="button"
      class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
      data-carousel-prev>
      <span
        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-[#3f3f46]/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
        <svg aria-hidden="true" class="w-6 h-6 text-white dark:text-gray-800" fill="none" stroke="currentColor"
          viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
        </svg>
        <span class="sr-only">Previous</span>
      </span>
    </button>
    <button type="button"
      class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
      data-carousel-next>
      <span
        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-[#3f3f46]/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
        <svg aria-hidden="true" class="w-6 h-6 text-white dark:text-gray-800" fill="none" stroke="currentColor"
          viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
        </svg>
        <span class="sr-only">Next</span>
      </span>
    </button>
  </div>


  <div class="p-5">
    <a href="#">
      <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white text-center">Silver</h5>
    </a>
    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Silver is an important component in the manufacture of photovoltaic panels.Light sensitivity makes Silver a necessary element in the production of solar energy. Silver is used in ornamentation and jewellery, where it is used as a plating metal Silver is used in the manufacture of
    musical instruments Silver can be found in our daily lives: domestic appliances, food packaging, water purifiers, etc.</p>

  </div>
</div>
<!-- :::::::::::::: -->
<div class="max-w-sm mt-6 w-80 mx-3  shadow dark:bg-zinc-700 dark:border-zinc-700">
  <div id="controls-carousel" class="relative w-full" data-carousel="static">
    <!-- Carousel wrapper -->
    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
      <!-- Item 1 -->
      <div class="hidden duration-700 h-56 overflow-hidden justify-center items-center my-auto ease-in-out" data-carousel-item>
        <img src="{{asset('images/new/coper1.jpg')}}"
          class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
      </div>
      <!-- Item 2 -->
      <div class="hidden duration-700 h-56 overflow-hidden justify-center items-center my-auto ease-in-out" data-carousel-item="active">
        <img src="{{asset('images/new/coper2.jpg')}}"
          class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
      </div>
      <!-- Item 3 -->
      <div class="hidden duration-700 h-56 overflow-hidden justify-center items-center my-auto ease-in-out" data-carousel-item>
        <img src="{{asset('images/new/Coper3.PNG')}}"
          class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
      </div>
    </div>
    <!-- Slider controls -->
    <button type="button"
      class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
      data-carousel-prev>
      <span
        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-[#3f3f46]/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
        <svg aria-hidden="true" class="w-6 h-6 text-white dark:text-gray-800" fill="none" stroke="currentColor"
          viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
        </svg>
        <span class="sr-only">Previous</span>
      </span>
    </button>
    <button type="button"
      class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
      data-carousel-next>
      <span
        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-[#3f3f46]/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
        <svg aria-hidden="true" class="w-6 h-6 text-white dark:text-gray-800" fill="none" stroke="currentColor"
          viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
        </svg>
        <span class="sr-only">Next</span>
      </span>
    </button>
  </div>


  <div class="p-5">
    <a href="#">
      <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white text-center">Coper</h5>
    </a>
    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Copper is an excellent conductor of electricity and heat. A mid-size car contains up to 22.5kg of Copper.It is used in the cars electrical and electronic systems: engine, gearbox, braking circuit, sensors, batteries and so
    on.In the Building sector, copper is used as a watertight and corrosion-resistant roofing material.</p>

  </div>
</div>
<!-- /////////////////// -->
<div class="max-w-sm mt-6 w-80 mx-3  shadow dark:bg-zinc-700 dark:border-zinc-700">
  <div id="controls-carousel" class="relative w-full" data-carousel="static">
    <!-- Carousel wrapper -->
    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
      <!-- Item 1 -->
      <div class="hidden duration-700 h-56 overflow-hidden justify-center items-center my-auto ease-in-out" data-carousel-item>
        <img src="{{asset('images/new/gold1.jpg')}}"
          class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
      </div>
      <!-- Item 2 -->
      <div class="hidden duration-700 h-56 overflow-hidden justify-center items-center my-auto ease-in-out" data-carousel-item="active">
        <img src="{{asset('images/new/gold2.jpg')}}"
          class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
      </div>
    </div>
    <!-- Slider controls -->
    <button type="button"
      class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
      data-carousel-prev>
      <span
        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-[#3f3f46]/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
        <svg aria-hidden="true" class="w-6 h-6 text-white dark:text-gray-800" fill="none" stroke="currentColor"
          viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
        </svg>
        <span class="sr-only">Previous</span>
      </span>
    </button>
    <button type="button"
      class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
      data-carousel-next>
      <span
        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-[#3f3f46]/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
        <svg aria-hidden="true" class="w-6 h-6 text-white dark:text-gray-800" fill="none" stroke="currentColor"
          viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
        </svg>
        <span class="sr-only">Next</span>
      </span>
    </button>
  </div>


  <div class="p-5">
    <a href="#">
      <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white text-center">Gold</h5>
    </a>
    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Gold is a chemically inert metal. It is used in the composition of numerous medical devices. Gold is a hypo-allergenic material that is easy to work. It is frequently used for dental care, for example for crowns or fillings Infinitely small quantities of Gold can be found in nearly all electronic components: mobile phone, computer, tablet,navigation system,television, etc..</p>

  </div>
</div>

</div>
<!-- ////////Footer////////// -->
<footer class="bg-zinc-700 text-gray-300  mt-6">
  <div class="container px-6 py-12 mx-auto">
    <div class="flex flex-wrap justify-between">
      <div class="w-full md:w-1/3 mb-6 md:mb-0">
        <h3 class="text-lg font-bold mb-4 dark:text-orange-200 dark:hover:text-orange-200">About Us</h3>
        <p class="text-sm">Mining company providing essential minerals for global industries.
        "We specialize in responsible mining practices for a sustainable future"
        Our mission is to extract valuable resources while prioritizing safety and environmental responsibility. </p>
      </div>
      <div class="w-full md:w-1/3 mb-6 md:mb-0">
        <h3 class="text-lg font-bold mb-4  dark:text-orange-200 dark:hover:text-orange-200">Contact Us</h3>
        <ul class="list-unstyled text-sm">
          <li>42312, Tameslouht</li>
          <li>Marrakech,Morocco</li>
          <li>Phone: (212) 694-022752</li>
          <li>Email: fatimezzahradarim@gmail.com</li>
        </ul>
      </div>
      <div class="w-full md:w-1/3 mb-6 md:mb-0">
        <h3 class="text-lg font-bold mb-4  dark:text-orange-200 dark:hover:text-orange-200">Connect with Us</h3>
        <div class="flex">
          <a href="https://twitter.com/FatimezzahraDA" class="mr-4"><i class="fab fa-twitter fa-lg"></i></a>
          <a href="https://www.instagram.com/fatimazdarim/" class="mr-4"><i class="fab fa-instagram fa-lg"></i></a>
          <a href="https://www.linkedin.com/in/fatimezzahra-darim/" class="mr-4"><i class="fab fa-linkedin fa-lg"></i></a>
          <a href="https://github.com/Fatimezzahra-DARIM" class="mr-4"><i class="fab fa-github fa-lg"></i></a>
        </div>
      </div>
    </div>
    <hr class="my-6 border-gray-700">
    <div class="flex flex-wrap items-center">
      <div class="w-full md:w-1/3 text-sm">
        <span>&copy; 2023 Mining In Morocco. All rights reserved.</span>
      </div>
      <div class="w-full md:w-1/3 text-sm text-center">
        <a href="#" class="mr-2">Terms</a>
        <span class="mx-2">•</span>
        <a href="#" class="ml-2 mr-2">Privacy</a>
      </div>
      <div class="w-full md:w-1/3 text-sm text-right">
        <span>Designed by Fatimezzahra DARIM</span>
      </div>
    </div>
  </div>
</footer>


<!-- ::::::::::::::::::::::::::::: -->
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>

</html>
