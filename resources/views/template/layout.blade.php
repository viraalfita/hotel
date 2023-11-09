<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hotel Hebat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link rel="stylesheet" href="{{url('css/style.css')}}">
  </head> 
  <nav class="navbar mb-2 fixed-top bg-light">
    <div class="container-fluid">
      <a class="row navbar-brand text-pink" href="#">
        <i class="col ri-hotel-line" style="font-size: 23px"></i>
        <span class="col fw-bold">HOTEL HEBAT</span>
      </a>
      <ul class="nav justify-content-end fw-bolder">
        @if (auth()->user()->level == "admin")
        <li class="nav-item">
          <a class="nav-link text-pink font" href="{{url('/home')}}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-pink font" href="{{url('/register')}}">Akun</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-pink font" href="{{url('/data-kamar')}}">Data Kamar</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-pink font" href="{{url('/fasilitas-kamar')}}">Fasilitas Kamar</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-pink font" href="{{url('/fasilitas-hotel')}}">Fasilitas Hotel</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-pink font" href="{{url('/logout')}}">Logout</a>
        </li>
        @endif

        @if (auth()->user()->level == "resepsionis")
        <li class="nav-item">
          <a class="nav-link text-pink font" href="{{url('/home')}}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-pink font" href="{{url('/data-tamu')}}">Data Tamu</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-pink font" href="{{url('/logout')}}">Logout</a>
        </li>
        @endif
        
        @if (auth()->user()->level == "tamu")
        <li class="nav-item">
          <a class="nav-link text-pink font" href="{{url('/home')}}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-pink font" href="{{url('/kamar')}}">Kamar</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-pink font" href="{{url('/fasilitas')}}">Fasilitas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-pink font" href="{{url('/logout')}}">Logout</a>
        </li>
        @endif
        
        
      </ul>
    </div>
  </nav>
  <body class="bg-light">
    <main class="container">
        @include('component/message')
        @yield('konten')
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
  <div class="d-flex flex-column h-100" style="background-color: #FFBF9B">
    <!-- FOOTER -->
    <footer class="w-100 py-4 flex-shrink-0">
        <div class="container py-4">
            <div class="row gy-4 gx-5">
                <div class="col-lg-5 col-md-6">
                    <h5 class="text-secondary fw-bolder mb-3" style="font-size: 24px">HUBUNGI KAMI</h5>
                    <ul class="list-unstyled text-muted">
                        <li>
                          <a href="https://www.instagram.com/solikain_/" class="d-flex text-decoration-none font text-secondary my-1">
                            <i class="ri-instagram-line" style="font-size: 24px"></i>
                            <span class="my-auto mx-3" style="font-size: 20px">@hotelhebatbdg</span>
                          </a>
                        </li>
                        <li>
                          <a class="d-flex text-decoration-none font text-secondary my-1">
                            <i class="ri-whatsapp-line" style="font-size: 24px"></i>
                            <span class="my-auto mx-3" style="font-size: 20px">(+62) 8762588737</span>
                          </a>
                        </li>
                        <li>
                          <a class="d-flex text-decoration-none font text-secondary my-1">
                            <i class="ri-map-pin-line" style="font-size : 24px"></i>
                            <span class="my-auto mx-3" style="font-size: 20px">Jl. Braga No.22</span>
                          </a>
                        </li>
                        <li>
                          <a class="d-flex text-decoration-none font text-secondary my-1">
                            <i class="ri-mail-open-line" style="font-size : 24px"></i>
                            <span class="my-auto mx-3" style="font-size: 20px">hotelhebat@gmail.com</span>
                          </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</div>
</html>