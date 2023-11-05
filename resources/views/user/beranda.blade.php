<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <link rel="stylesheet" href="nav.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/iconoir-icons/iconoir@main/css/iconoir.css" />
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->

    <title>Beranda Kost Abang Adek</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-xl navbar-light bg-light fixed-top">
        <a class="navbar-brand" href="#" style="margin-right: 100px;">Kost Abang Adek</a>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="/">Beranda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href='/pesan'>Pemesanan</a>
            </li>
            @auth        
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="./Assets/profil.png" width="30" height="30" class="d-inline-block align-top" alt="">
                {{ Auth::user()->nama }}
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="/editprofile">Edit Profil</a>
                <a class="dropdown-item" href="/riwayat-pemesanan">Riwayat Pemesanan</a>
                <a class="dropdown-item" href="/tagihan">Tagihan</a>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
              </div>
            </li>

            @else
            <li class="nav-item">
              <a class="nav-link" href="/registrasi">Registrasi</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" style="border-radius: 20px; background: #383950; color: white" href="/login">Login</a>
            </li>
            @endauth
          </ul>
        </div>
      </nav>

    <div style="display: flex; justify-content: center">
      <div class="card custom-bg rounded" style="width: 70rem; height: 30rem">
        <div class="card-body">
          <h1 class="title">
            <strong>Kost Nyaman,</strong><br />
            <strong>Aman, Tentram,</strong><br />
            <strong>Asri</strong>
          </h1>
          <p>Kost Abang Adek Jawabanya</p>
        </div>
      </div>
    </div>

    <div style="display: flex; justify-content: center">
      <div class="card mt-4" style="width: 70rem">
        <div class="row no-gutters">
          <div class="col-md-4">
            
            <img src="{{asset('/Assets/tampilan.png')}}" class="card-img-top" alt="Gambar" />
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">Tentang Kami</h5>
              <p class="card-text">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat.
              </p>
              <br /><br /><br />
              <a href="#" class="btn btn-primary" style="background-color: #84545a">Selengkapnya</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="row m-5 d-flex justify-content-center border rounded" style="background-color: #ffcdba">
        <div class="col-md-4" style="width: 70rem">
          <div class="card-body">
            <h5 class="card-title">Fasilitas Kami</h5>
            <p class="card-text">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
              consequat.
            </p>
            <a href="#" class="btn btn-primary" style="background-color: #84545a">Selengkapnya</a>
          </div>
        </div>

        <div class="col-8">
          <div class="mt-3 d-flex justify-content-end">
            <div class="card mr-5" style="width: 7rem; height: 7rem">
              <img src="./Assets/shower.svg" class="card-img-top m-auto" style="width: 2rem" alt="..." />
              <div class="card-body m-auto text-center">
                <p class="card-text" style="font-size: 10px">Kamar Mandi Dalam</p>
              </div>
            </div>
            <div class="card mr-5" style="width: 7rem; height: 7rem">
              <img src="./Assets/parkir.svg" class="card-img-top m-auto" style="width: 2rem" alt="..." />
              <div class="card-body m-auto text-center">
                <p class="card-text" style="font-size: 10px">Parkir Luas</p>
              </div>
            </div>
            <div class="card mr-5" style="width: 7rem; height: 7rem">
              <img src="./Assets/lemari.svg" class="card-img-top m-auto" style="width: 2rem" alt="..." />
              <div class="card-body m-auto text-center">
                <p class="card-text" style="font-size: 10px">Lemari</p>
              </div>
            </div>
            <div class="card mr-5" style="width: 7rem; height: 7rem">
              <img src="./Assets/wifi.svg" class="card-img-top m-auto" style="width: 2rem" alt="..." />
              <div class="card-body m-auto text-center">
                <p class="card-text" style="font-size: 10px">Free Wifi</p>
              </div>
            </div>
          </div>
          <div class="mt-2 d-flex justify-content-end">
            <div class="card mr-5" style="width: 7rem; height: 7rem">
              <img src="./Assets/pondok.svg" class="card-img-top m-auto" style="width: 2rem" alt="..." />
              <div class="card-body m-auto text-center">
                <p class="card-text" style="font-size: 10px">Pondok Belajar</p>
              </div>
            </div>
            <div class="card mr-5" style="width: 7rem; height: 7rem">
              <img src="./Assets/kantin.svg" class="card-img-top m-auto" style="width: 2rem" alt="..." />
              <div class="card-body m-auto text-center">
                <p class="card-text" style="font-size: 10px">Kantin</p>
              </div>
            </div>
            <div class="card mr-5" style="width: 7rem; height: 7rem">
              <img src="./Assets/kasur.svg" class="card-img-top m-auto" style="width: 2rem" alt="..." />
              <div class="card-body m-auto text-center">
                <p class="card-text" style="font-size: 10px">Kasur</p>
              </div>
            </div>
            <div class="card mr-5" style="width: 7rem; height: 7rem">
              <img src="./Assets/danlainya.svg" class="card-img-top m-auto" style="width: 2rem" alt="..." />
              <div class="card-body m-auto text-center">
                <p class="card-text" style="font-size: 10px">Dan Lainya</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="mt-3 d-flex justify-content-center">
      <div class="card mt-4" style="width: 60rem">
        <div class="card-body text-center">
          <h3 class="title">Frequently Asked <span style="color: #84545a">Question</span></h3>
        </div>
        <div class="row">
          <div class="col-6">
            <div class="card mb-3 mx-auto" style="width: 15rem; height: 8rem">
              <div class="card-body border m-auto text-center">
                <h2 class="card-text small">lorem ipsum dolor sit amet?</h2>
                <p style="font-size: 10px">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                <p></p>
              </div>
            </div>
          </div>
          <div class="col-6">
            <div class="card mb-3 mx-auto" style="width: 15rem; height: 8rem">
              <div class="card-body border m-auto text-center">
                <h2 class="card-text small">lorem ipsum dolor sit amet?</h2>
                <p style="font-size: 10px">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
              </div>
            </div>
          </div>
          <div class="col-6">
            <div class="card mb-3 mx-auto" style="width: 15rem; height: 8rem">
              <div class="card-body border m-auto text-center">
                <h2 class="card-text small">lorem ipsum dolor sit amet?</h2>
                <p style="font-size: 10px">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
              </div>
            </div>
          </div>
          <div class="col-6">
            <div class="card mb-3 mx-auto" style="width: 15rem; height: 8rem">
              <div class="card-body border m-auto text-center">
                <h2 class="card-text small">lorem ipsum dolor sit amet?</h2>
                <p style="font-size: 10px">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="mt-3 d-flex justify-content-center">
      <div class="card mt-4" style="width: 60rem; background-color: #ffcdba; border-radius: 40px">
        <h3 class="title text-center"><span style="color: #84545a">Lokasi</span>Kami</h3>
        <div class="card-body d-flex justify-content-center">
          <img src="./Assets/Lokasi.png" class="card-img-top" style="width: 50rem; height: 25rem" alt="..." />
        </div>
      </div>
    </div>
    <footer class="text-white" style="background-color: #383950; margin-top: 50px;">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-3 mt-4">
            <h4>Kost Abang Adek</h4>
            <p class="m-0">Jl. Pangeran Senopati Raya No.18,</p>
            <p class="m-0">Harapan Jaya, Kec. Sukarame, Kota</p>
            <p class="m-0">Bandar Lampung, Lampung 35131</p>
            <div class="row justify-content-between align-item-center px-2">
              <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="41" height="41" viewBox="0 0 41 41" fill="none">
                  <path
                    d="M20.5683 3.41675C11.2408 3.41675 3.63874 11.0188 3.63874 20.3463C3.63874 23.3359 4.42458 26.2401 5.89374 28.8026L3.50208 37.5834L12.4708 35.2259C14.9479 36.5755 17.7325 37.293 20.5683 37.293C29.8958 37.293 37.4979 29.6909 37.4979 20.3634C37.4979 15.8363 35.7383 11.5826 32.5437 8.388C29.3492 5.17633 25.0954 3.41675 20.5683 3.41675ZM20.5854 6.26967C24.3437 6.26967 27.8629 7.73883 30.5279 10.4038C33.1758 13.0688 34.645 16.6051 34.645 20.3634C34.645 28.1192 28.3242 34.423 20.5683 34.423C18.04 34.423 15.5629 33.7567 13.4104 32.4584L12.8979 32.168L7.56791 33.5688L8.98583 28.3755L8.64416 27.8288C7.24332 25.6251 6.49166 23.0113 6.49166 20.3463C6.50874 12.5905 12.8125 6.26967 20.5854 6.26967ZM14.5721 12.5222C14.2987 12.5222 13.8375 12.6247 13.4446 13.0517C13.0687 13.4788 11.9583 14.5209 11.9583 16.588C11.9583 18.6722 13.4787 20.6709 13.6667 20.9613C13.9058 21.2517 16.6733 25.5226 20.9271 27.3334C21.935 27.7947 22.7208 28.0509 23.3358 28.2388C24.3437 28.5634 25.2662 28.5122 26.0008 28.4097C26.8208 28.2901 28.495 27.3847 28.8537 26.3938C29.2125 25.403 29.2125 24.5659 29.11 24.378C28.9904 24.2072 28.7171 24.1047 28.29 23.9167C27.8629 23.6776 25.7787 22.6526 25.4029 22.5159C25.01 22.3792 24.7708 22.3109 24.4462 22.7209C24.1729 23.148 23.3529 24.1047 23.1137 24.378C22.8575 24.6684 22.6183 24.7026 22.2083 24.4976C21.7642 24.2755 20.3975 23.8313 18.7917 22.3963C17.5275 21.2688 16.6904 19.8851 16.4342 19.458C16.2292 19.048 16.4171 18.7917 16.6221 18.6038C16.81 18.4159 17.0833 18.1084 17.2542 17.8522C17.4762 17.613 17.5446 17.4251 17.6812 17.1517C17.8179 16.8613 17.7496 16.6222 17.6471 16.4172C17.5446 16.2292 16.6904 14.1109 16.3317 13.2738C15.99 12.4538 15.6483 12.5563 15.375 12.5392C15.1358 12.5392 14.8625 12.5222 14.5721 12.5222Z"
                    fill="#FFFEFE"
                  />
                </svg>
              </div>
              <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" viewBox="0 0 33 33" fill="none">
                  <path
                    d="M9.1025 14.8363C11.0825 18.7275 14.2725 21.9175 18.1637 23.8975L21.1887 20.8725C21.5737 20.4875 22.11 20.3775 22.5913 20.5288C24.1313 21.0375 25.7812 21.3125 27.5 21.3125C27.8647 21.3125 28.2144 21.4574 28.4723 21.7152C28.7301 21.9731 28.875 22.3228 28.875 22.6875V27.5C28.875 27.8647 28.7301 28.2144 28.4723 28.4723C28.2144 28.7301 27.8647 28.875 27.5 28.875C21.3006 28.875 15.355 26.4123 10.9714 22.0286C6.58772 17.645 4.125 11.6994 4.125 5.5C4.125 5.13533 4.26987 4.78559 4.52773 4.52773C4.78559 4.26987 5.13533 4.125 5.5 4.125H10.3125C10.6772 4.125 11.0269 4.26987 11.2848 4.52773C11.5426 4.78559 11.6875 5.13533 11.6875 5.5C11.6875 7.21875 11.9625 8.86875 12.4712 10.4088C12.6225 10.89 12.5125 11.4262 12.1275 11.8113L9.1025 14.8363Z"
                    fill="#FFFEFE"
                  />
                </svg>
              </div>
            </div>
          </div>
          <div class="col-2"></div>
          <div class="col-md-2 mt-4">
            <h4 class="text-bold">Tautan Cepat</h4>
            <a class="d-block" href="/">Beranda</a>
            <a class="d-block" href="/pesan">Pemesanan</a>
            @auth
            @else
            <a class="d-block" href="/login">Login</a>
            <a class="d-block" href="/regis">Register</a>
            @endauth
          </div>
        </div>
      </div>
      <div class="justify-content-center d-flex" style="background-color: #ffcdba; height: 2rem">
        <p style="color: black">Copyright&copy 2023 Kost Abang Adek</p>
      </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
      // Menggunakan jQuery
      $(window).on('scroll', function () {
        if ($(this).scrollTop() > 50) {
          $('.navbar').addClass('fixed-top');
        } else {
          $('.navbar').removeClass('fixed-top');
        }
      });
    </script>

  </body>
</html>
