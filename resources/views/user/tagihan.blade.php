<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
  <link rel="stylesheet" href="nav.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

  <title>Tagihan</title>
  <style>
    /* Custom CSS for the table to make it responsive */
    .table-responsive {
      overflow-x: auto;
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
      <a class="navbar-brand font-weight-bold" href="/">Kost Abang Adek</a>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link font-weight-bold" href="/">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link font-weight-bold" href="/pesan">Pemesanan</a>
          </li>
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
        </ul>
      </div>
    </nav>
  <div class="row">
    <div class="col-2" style="background-color: #ffcdba; min-height: 100vh">
      <div class="profil mt-3 d-flex justify-content-center" style="border-radius: 50%">
        <img src="./Assets/profil.png" alt="" />
      </div>
      <p class="text-center">Username</p>
      <div class="container mt-5">
        <div class="d-flex justify-content-center">
          <div class="fitur text-center">
            <div class="d-flex align-items-center">
              <i class="fas fa-user" style="color: #84545a; margin-right: 20px;"></i>
              <a href="/editprofile" class="text-danger">
                <p style="margin-top: 15px;">Edit Profil</p>
              </a>

            </div>
            <div class="d-flex align-items-center">
              <i class="fas fa-history" style="color: #84545a; margin-right: 20px;"></i>
              <a href="/riwayat-pemesanan" class="text-danger">
                <p style="margin-top: 15px;">Riwayat Pemesanan</p>
              </a>

            </div>
            <div class="d-flex align-items-center">
              <i class="fas fa-file-invoice" style="color: #84545a; margin-right: 20px;"></i>
              <a href="/tagihan" class="text-danger">
                <p style="margin-top: 15px;">Tagihan</p>
              </a>

            </div>
            <div class="d-flex align-items-center">
              <i class="fas fa-sync" style="color: #84545a; margin-right: 20px;"></i>
              <a href="/perpanjangan" class="text-danger">
                <p style="margin-top: 15px;">Perpanjangan</p>
              </a>

            </div>
            <div class="d-flex align-items-center">
              <i class="fas fa-sign-out-alt" style="color: #84545a; margin-right: 20px;"></i>
              <p style="margin-top: 15px;">
                <a href="{{ route('logout') }}" class="text-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  Logout
                </a>
              </p>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- tabel -->
    <div class="col-10" style="min-height: 50vh">
      <h2 class="text-block">Tagihan</h2>
      <div class="table-responsive">
        @if (session('already_menunggu_validasi'))
          <div class="alert alert-warning">
            {{ session('already_menunggu_validasi') }}
          </div>
        @endif
        <table class="table table-striped">
          <thead class="thead-light">
            <tr>
              <th scope="col">Nama</th>
              <th scope="col">Tanggal Masuk</th>
              <th scope="col">Total Tagihan</th>
              <th scope="col">Jenis Pembayaran</th>
              <th scope="col">Status</th>
              <th scope="col">Aksi</th>
              <th scope="col">Keterangan</th>
            </tr>
          </thead>
          <tbody>
            {{-- <tr>
              <td>rafi</td>
              <td>2023-09-11</td>
              <td>Penuh</td>
              <td>Belum dibayar</td>
              <td>
                <button type="button" class="btn btn-primary" id="bayarButton">Bayar</button>
              </td>

              <td>7.000.000</td>
            </tr> --}}
            @foreach ($list_tagihan as $tagihan)
              <tr>
                <td>{{ $tagihan->pemesanan->nama }}</td>
                <td>{{ $tagihan->pemesanan->tanggal_masuk }}</td>
                <td>{{ $tagihan->pemesanan->total_tagihan }}</td>
                <td>{{ $tagihan->pemesanan->jenis_pembayaran }}</td>
                <td>{{ $tagihan->getStatusTagihanTextAttribute() }}</td>
                <td>
                  @if ($tagihan->status == 0)
                    <button type="button" class="btn btn-primary" id="bayarButton">Bayar</button>
                  {{-- else link to view bukti pembayaran --}}
                  @else
                    <a href="{{ url('storage/' . $tagihan->bukti_pembayaran) }}" target="_blank" class="btn btn-primary">Lihat Bukti Pembayaran</a>
                  @endif
                  {{-- <button type="button" class="btn btn-primary" id="bayarButton">Bayar</button> --}}
                </td>
                <td>{{ $tagihan->keterangan }}</td>
              </tr>
            @endforeach

            
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <footer class="text-white" style="background-color: #383950">
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
                <!-- SVG Path for icon 1 -->
              </svg>
            </div>
            <div>
              <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" viewBox="0 0 33" fill="none">
                <!-- SVG Path for icon 2 -->
              </svg>
            </div>
          </div>
        </div>
        <div class="col-2"></div>
        <div class="col-md-2 mt-4">
          <h4 class="text-bold">Tautan Cepat</h4>
          <a class="d-block" href="/">Beranda</a>
          <a class="d-block" href="/pesan">Pemesanan</a>
          <!-- <a class="d-block" href="#">Login</a>
          <a class="d-block" href="#">Register</a> -->
        </div>
      </div>
    </div>
    <div class="justify-content-center d-flex" style="background-color: #ffcdba; height: 2rem">
      <p style="color: black">Copyright&copy 2023 Kost Abang Adek</p>
    </div>
  </footer>

  <script>
    // Mengambil tombol "Bayar" dengan ID "bayarButton"
    const bayarButton = document.getElementById("bayarButton");
  
    // Menambahkan event listener untuk mengarahkan pengguna ke halaman beranda saat tombol diklik
    bayarButton.addEventListener("click", function() {
      window.location.href = "/bayar"; // Mengarahkan ke halaman beranda (ganti URL dengan URL yang sesuai)
    });
  </script>
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
