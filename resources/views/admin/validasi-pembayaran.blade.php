<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link href="/styleAdmin.css" rel="stylesheet">
    <title>Pembayaran Admin</title>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="primary-bg" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">
                Kost Abang Adek</div>
            <div class="list-group list-group-flush my-3">
                <a href="/admin" class="list-group-item list-group-item-action bg-transparent second-text text-dark fw-bold"><i
                        class="fas fa-solid fa-house me-2"></i>
                        <span class="ms-2">Dashboard</span>
                </a>
                <a href="/profile-kost" class="list-group-item list-group-item-action bg-transparent second-text text-dark fw-bold"><i
                        class="fas fa-solid fa-list me-2"></i>
                        <span class="ms-2">Profile Kost</span>
                </a>
                <a href="#pesananMenu" data-bs-toggle = "collapse" class="list-group-item bg-transparent second-text text-dark fw-bold" aria-current="page">
                    <i class="fas fa-solid fa-shop me-2"></i>
                    <span class="ms-2">Pesanan</span>
                </a>
                <div class="collapse ms-5" id="pesananMenu">
                    <a class="nav-link second-text fw-bold" href="/admin-pesanan" aria-current="page">Belum Divalidasi</a>
                    <a class="nav-link second-text fw-bold" href="/admin-pesanan-sudah">Sudah Divalidasi</a>
                </div>
                <a href="#pembayaranMenu" data-bs-toggle = "collapse" class="list-group-item list-group-item-action bg-transparent second-text text-dark fw-bold"><i
                        class="fas fa-solid fa-money-bills me-2"></i>
                    <span class="ms-2">Pembayaran</span>
                </a>
                <div class="collapse ms-5" id="pembayaranMenu">
                    <a class="nav-link second-text fw-bold" href="/admin-pembayaran" aria-current="page">Belum Divalidasi</a>
                    <a class="nav-link second-text fw-bold" href="/admin-pembayaran-sudah">Sudah Divalidasi</a>
                </div>
                <a href="/admin-kelolaPenghuni" class="list-group-item list-group-item-action bg-transparent second-text text-dark fw-bold"><i
                        class="fas fa-solid fa-building-user me-2"></i>
                        <span class="ms-2">Kelola Penghuni</span>
                </a>
                <a href="{{ route('logout') }}" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                        class="fas fa-power-off me-2"></i>
                        <span class="ms-2">Logout</span>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                        </form>
                </a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Pembayaran</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2"></i>Admin
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                
<li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>        
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Content -->
            <div class="container-fluid px-4">
    <div class="row g-3 my-2">
        <div class="col-md-12">

            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin-pembayaran">Pembayaran</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data Pembayar</li>
                </ol>
            </nav>

            <!-- Card -->
            <div class="card">
                <div class="card-header">
                    <h4>Data Pembayaran</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <form class="row" action={{ route('validasi-pembayaran', $tagihan->id) }} method="POST">
                            @csrf
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="nama" value="{{ $tagihan->pemesanan->nama }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" value="{{ $tagihan->pemesanan->email }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="noHp" class="form-label">No Handphone</label>
                                    <input type="tel" class="form-control" id="noHp" value="{{ $tagihan->pemesanan->no_hp }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="nik" class="form-label">NIK</label>
                                    <input type="text" class="form-control" id="nik" value="{{ $tagihan->pemesanan->nik }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="jenisKelamin" class="form-label">Jenis Kelamin</label>
                                    <input type="text" class="form-control" id="jenisKelamin" value="{{ $tagihan->pemesanan->getJenisKelaminText() }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="tanggalMasuk" class="form-label">Tanggal Masuk</label>
                                    <input type="text" class="form-control" id="tanggalMasuk" value="{{ $tagihan->pemesanan->tanggal_masuk }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="jenisPembayaran" class="form-label">Jenis Pembayaran</label>
                                    <input type="text" class="form-control" id="jenisPembayaran" value="{{ $tagihan->pemesanan->getJenisPembayaranText() }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="jenis_kamar" class="form-label">Jenis Kamar</label>
                                    <input type="text" class="form-control" id="jenis_kamar" value="{{ $tagihan->pemesanan->jenis_kamar }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="buktiPembayaran" class="form-label">Bukti Pembayaran</label>
                                    <div class="mb-3">
                                        <img src="{{ asset('storage/' . $tagihan->bukti_pembayaran) }}" alt="" width="100" class="img-thumbnail">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#gambarModal">
                                            Lihat Gambar
                                        </button>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="keterangan" class="form-label">Keterangan</label>
                                    <textarea class="form-control" id="keterangan"  placeholder="Masukkan keterangan" name="keterangan" ></textarea>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary" id="submitBtn">Submit</button>
                                </div>
                            </div>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                             @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="gambarModal" tabindex="-1" aria-labelledby="gambarModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="gambarModalLabel">Bukti Pembayaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Isi modal dengan gambar -->
                <img src="{{ asset('storage/' . $tagihan->bukti_pembayaran) }}" alt="" class="img-fluid">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
    <!-- /#page-content-wrapper -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
    <script>
        // document.getElementById("submitBtn").addEventListener("click", function () {
        //     var keteranganValue = document.getElementById("keterangan").value;

        //     // Lakukan sesuatu dengan data yang diambil, seperti mengirimkan ke server atau menyimpan ke database
        //     console.log("Keterangan: ", keteranganValue);

        //     // Arahkan ke halaman /admin-pembayaran
        //     window.location.href = "/admin-pembayaran";
        // });
    </script>
</body>

</html>