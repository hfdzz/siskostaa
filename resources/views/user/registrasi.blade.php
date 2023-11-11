<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="nav.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
  <style>
    .Regis {
      width: 440px;
      height: 612px;
      position: relative;
      margin: 0 auto;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
    }

    .Top {
      width: 297px;
      height: 72px;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      margin-bottom: 24px;
    }

    .RegisTitle {
      font-size: 32px;
      font-weight: 500;
      font-family: 'Poppins', sans-serif;
      letter-spacing: 0.64px;
      color: black;
    }

    .textH2 {
      font-size: 16px;
      font-weight: 300;
      font-family: 'Poppins', sans-serif;
      letter-spacing: 0.32px;
      color: #8D8D8D;
    }

    .SignUp {
      font-size: 16px;
      font-weight: 400;
      font-family: 'Poppins', sans-serif;
      letter-spacing: 0.32px;
      color: black;
      display: flex;
      align-items: center;
    }

    .SignUpLink {
      font-size: 20px;
      font-weight: 600;
      font-family: 'Poppins', sans-serif;
      letter-spacing: 0.40px;
      color: #84545A;
      margin-left: 8px;
    }

    .Semua {
      width: 440px;
      height: 416px; 
      position: relative;
    }

    .Form {
      width: 100%;
      height: auto; 
      display: flex;
      flex-direction: column;
      margin-top: 24px;
    }

    .FormField {
      height: 60px;
      display: flex;
      flex-direction: column;
      margin-bottom: 20px;
    }

    .FormFieldLabel {
      font-size: 16px;
      font-weight: 400;
      font-family: 'Poppins', sans-serif;
      letter-spacing: 0.32px;
      color: black;
    }

    .FormFieldInput {
      font-size: 16px;
      font-family: 'Poppins', sans-serif;
      border: none;
      border-bottom: 1px solid black;
      padding: 10px;
    }

    .Button {
      width: 100%;
      height: 65px;
      display: flex;
      align-items: center;
      justify-content: center;
      background: #84545A;
      border-radius: 20px;
      margin-top: 24px;
      cursor: pointer;
    }

    .RegisButton {
      font-size: 20px;
      font-weight: 500;
      font-family: 'Poppins', sans-serif;
      letter-spacing: 0.40px;
      color: white;
      cursor: pointer; 
    }
  </style>
  <title>Registrasi</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <a class="navbar-brand" href="#">Kost Abang Adek</a>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="/">Beranda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/pesan">Pemesanan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="regis">Registrasi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" style="border-radius: 20px; background: #383950; color: white" href="/login">Login</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="Regis">
    <div class="Top">
      <div class="RegisTitle">Registrasi</div>
      <div class="textH2">Daftar untuk Pesan Kost Sekarang!</div>
    </div>
    <div class="Semua">
      <form action={{ route('registrasi') }} method="POST">
        @csrf
        <div class="Form">
          <div class="FormField">
            <div class="FormFieldLabel">Nama</div>
            <input type="text" class="FormFieldInput" name="nama">
          </div>
          <div class="FormField">
            <div class="FormFieldLabel">Email</div>
            <input type="text" class="FormFieldInput" name="email">
          </div>
          <div class="FormField">
            <div class="FormFieldLabel">Password</div>
            <input type="password" class="FormFieldInput" name="password">
          </div>
          <div class="FormField">
            <div class="FormFieldLabel">Retype Password</div>
            <input type="password" class="FormFieldInput" name="password_confirmation">
          </div>
        </div>
        {{-- input error div --}}
        @if ($errors->any())
          <div class="alert alert-danger" style="margin-top: 20px;">
            <ul style="margin-bottom: 0px;">
              @foreach ($errors->all() as $error)
                <li style="list-style-type: none;">{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif
        <button type="submit" class="Button" style="margin-top: 20px;">
          <div class="RegisButton">Registrasi</div>
        </button>
      </form>

    </div>
  </div>

  <footer class="text-white" style="background-color: #383950" >
    <div class="container" style="margin-top: 120px;">
      <div class="row justify-content-center">
        <div class="col-md-3 mt-4">
          <h4>Kost Abang Adek</h4>
          <p class="m-0">Jl. Pangeran Senopati Raya No.18,</p>
          <p class="m-0">Harapan Jaya, Kec. Sukarame, Kota</p>
          <p class="m-0">Bandar Lampung, Lampung 35131</p>
          <div class="row justify-content-between align-item-center px-2">
            <div>
              <svg xmlns="http://www.w3.org/2000/svg" width="41" height="41" viewBox="0 0 41 41" fill="none">
                <!-- Icon 1 SVG Code -->
              </svg>
            </div>
            <div>
              <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" viewBox="0 0 33 33" fill="none">
                <!-- Icon 2 SVG Code -->
              </svg>
            </div>
          </div>
        </div>
        <div class="col-2"></div>
        <div class="col-md-2 mt-4">
          <h4 class="text-bold">Tautan Cepat</h4>
          <a class="d-block" href="/">Beranda</a>
          <a class="d-block" href="/pesan">Pemesanan</a>
          <a class="d-block" href="/login">Registrasi</a>
          <a class="d-block" href="/regis">Login</a>
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
