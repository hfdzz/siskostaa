<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link href="/styleAdmin.css" rel="stylesheet">
    <title>Tambah Penghuni Admin</title>
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
                <a href="#" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                        class="fas fa-power-off me-2"></i>
                        <span class="ms-2">Logout</span>
                </a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Kelola Penghuni</h2>
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
                                <i class="fas fa-user me-2"></i>test@mail
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li><a class="dropdown-item" href="#">Logout</a></li>
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
                                <li class="breadcrumb-item"><a href="/admin-kelolaPenghuni">Kelola Penghuni</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Data Penghuni</li>
                            </ol>
                        </nav>

            <!-- Card -->
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Penghuni</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <form action="/tambah-penghuni" method="POST">
                                    @csrf
                                    <div class="col-md-12">
                                        <div class="mb-1">
                                            <label for="nama" class="form-label">Nama</label>
                                            <input type="text" class="form-control" id="nama" value="" name="nama">
                                        </div>
                                        <div class="mb-1">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="email" value="" name="email">
                                        </div>
                                        <div class="mb-1">
                                            <label for="noHp" class="form-label">No Handphone</label>
                                            <input type="tel" class="form-control" id="noHp" value="" name="no_hp">
                                        </div>
                                        <div class="mb-1">
                                            <label for="nik" class="form-label">NIK</label>
                                            <input type="number" class="form-control" id="nik" value="" name="nik">
                                        </div>
                                        <div class="mb-1">
                                            <label for="jenisKelamin" class="form-label">Jenis Kelamin</label>
                                            <select class="form-select" id="jenisKelamin" name="jenis_kelamin">
                                                <option value="L">Laki-laki</option>
                                                <option value="P">Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="mb-1">
                                            <label for="tanggalMasuk" class="form-label">Tanggal Masuk</label>
                                            <input type="date" class="form-control" id="tanggalMasuk" value="" name="tanggal_masuk">
                                        </div>
                                        <div class="mb-4">
                                            <label for="jenisPembayaran" class="form-label">Nomor Kamar</label>
                                            <input type="text" class="form-control" id="nomorKamar" value="" name="nomor_kamar">
                                        </div>
                                        <div class="mb-1 d-flex gap-4">
                                            <button type="submit" class="btn btn-primary" id="tambahBtn">Tambah</button>
                                            <a href="/admin-kelolaPenghuni" class="btn btn-secondary">Batal</a>
                                        </div>
                                    </div>
                                    @if ($errors->any())
                                        <div class="alert alert-danger mt-3">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{$error}}</li>
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

</body>

</html>