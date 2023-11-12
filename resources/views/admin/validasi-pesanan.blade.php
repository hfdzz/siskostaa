<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link href="styleAdmin.css" rel="stylesheet">
    <title>Pesanan Admin</title>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="primary-bg" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">
                Kost Abang Adek</div>
            <div class="list-group list-group-flush my-3">
                <a href="/admin" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-solid fa-house me-2"></i>Dashboard</a>
                <a href="/admin-profilKost" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-solid fa-list me-2"></i>Profile Kost</a>
                <a href="/admin-pesanan" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-solid fa-shop me-2"></i>Pesanan</a>
                <a href="/admin-pembayaran" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-solid fa-money-bills me-2"></i>Pembayaran</a>
                <a href="/admin-kelolaPenghuni" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-solid fa-building-user me-2"></i>Kelola Penghuni</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                        class="fas fa-power-off me-2"></i>Logout</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Pesanan</h2>
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
                                <i class="fas fa-user me-2"></i>John Doe
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
                    <li class="breadcrumb-item"><a href="/admin-pesanan">Pesanan</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data Pemesan</li>
                </ol>
            </nav>

            <!-- Card -->
            <div class="card">
                <div class="card-header">
                    <h4>Data Pemesan</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama" value="Rafi" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" value="rafi@mail" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="noHp" class="form-label">No Handphone</label>
                                <input type="tel" class="form-control" id="noHp" value="087812121212" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="nik" class="form-label">NIK</label>
                                <input type="text" class="form-control" id="nik" value="1234123412341234" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="jenisKelamin" class="form-label">Jenis Kelamin</label>
                                <input type="text" class="form-control" id="jenisKelamin" value="Pria" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="tanggalMasuk" class="form-label">Tanggal Masuk</label>
                                <input type="text" class="form-control" id="tanggalMasuk" value="2023-11-11" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="jenisPembayaran" class="form-label">Jenis Pembayaran</label>
                                <input type="text" class="form-control" id="jenisPembayaran" value="Penuh" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <textarea class="form-control" id="keterangan"  placeholder="Masukkan keterangan"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="tagihan" class="form-label">Tagihan</label>
                                <input type="text" class="form-control" id="tagihan" placeholder="Masukkan tagihan">
                            </div>
                            <div class="mb-3">
                                <button type="button" class="btn btn-primary" id="submitBtn">Submit</button>
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
    <script>
        document.getElementById("submitBtn").addEventListener("click", function () {
            var keteranganValue = document.getElementById("keterangan").value;
            var tagihanValue = document.getElementById("tagihan").value;

            // Lakukan sesuatu dengan data yang diambil, seperti mengirimkan ke server atau menyimpan ke database
            console.log("Keterangan: ", keteranganValue);
            console.log("Tagihan: ", tagihanValue);

            // Arahkan ke halaman /admin-pesanan
            window.location.href = "/admin-pesanan";
        });
    </script>
</body>

</html>