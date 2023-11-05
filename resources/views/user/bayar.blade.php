<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
  <link rel="stylesheet" href="nav.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

  <title>Bayar</title>
  <style>
    /* Custom CSS for the table to make it responsive */
    .table-responsive {
      overflow-x: auto;
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">Kost Abang Adek</a>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="/">Beranda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/pesan">Pemesanan</a>
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
              <a href="#" class="text-danger">
                <p style="margin-top: 15px;">Logout</p>
              </a>            
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-10">
        <h3 class="modal-title ml-3" id="modalPembayaranLabel">Pembayaran</h3>
        <div class="modal-body text-center" style="margin-top: 70px">
          <p class="font-weight-bold">Silahkan Lakukan Pembayaran</p>
          <p class="font-weight-bold">Ke Nomor Rekening Ini:</p>
          <p class="font-weight-bold" style="margin-top: 70px">BNI xxxxxxxxxxxxxx</p>
          <p class="font-weight-bold">Atas Nama:</p>
          <p class="font-weight-bold">Syafrial</p>
        </div>
        <div class="modal-body text-center">
          <p class="font-weight-bold">Masukkan Bukti Pembayaran:</p>
          <div class="modal-body">
            <div class="custom-file">
              <input type="file" class="custom-file-input" name="bukti_pembayaran" id="bukti_pembayaran" accept="image/*">
              <label class="custom-file-label" for="bukti_pembayaran">Browse Image</label>
            </div>
          </div>
          
        </div>
        <div class="text-center mt-5">
          <button class="btn btn-primary">Submit Bukti Pembayaran</button>
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
          <a class="d-block" href="#">Beranda</a>
          <a class="d-block" href="#">Pemesanan</a>
          <!-- <a class="d-block" href="#">Login</a>
          <a class="d-block" href="#">Register</a> -->
        </div>
      </div>
    </div>
    <div class="justify-content-center d-flex" style="background-color: #ffcdba; height: 2rem">
      <p style="color: black">Copyright&copy 2023 Kost Abang Adek</p>
    </div>
  </footer>


<!-- <script>
  const perpanjanganBtn = document.getElementById("perpanjanganBtn");
  perpanjanganBtn.addEventListener("click", function() {
    if (confirm("Apakah Anda yakin untuk melanjutkan perpanjangan kos?")) {
      alert("Anda memilih YA. Silahkan Melanjutkan Pembayaran");
    } 
  });

  const tidakPerpanjanganBtn = document.getElementById("tidakPerpanjanganBtn");
  tidakPerpanjanganBtn.addEventListener("click", function() {
    if (confirm("Apakah Anda yakin untuk tidak melanjutkan perpanjangan kos?")) {
      alert("Anda memilih YA.");
    } 
  });
</script> -->


</body>
</html>