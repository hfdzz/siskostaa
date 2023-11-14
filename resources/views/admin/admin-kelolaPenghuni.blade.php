<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link href="styleAdmin.css" rel="stylesheet">
    <title>Admin Kelola Penghuni</title>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="primary-bg" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">
                Kost Abang Adek</div>
            <div class="list-group list-group-flush my-3">
                <a href="/admin" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-solid fa-house me-2"></i>
                        <span class="ms-2">Dashboard</span>
                </a>
                <a href="/admin-profilKost" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-solid fa-list me-2"></i>
                        <span class="ms-2">Profile Kost</span>
                </a>
                <a href="#pesananMenu" data-bs-toggle = "collapse" class="list-group-item bg-transparent second-text fw-bold" aria-current="page">
                    <i class="fa fa-solid fa-shop me-2"></i>
                    <span class="ms-2">Pesanan</span>
                </a>
                <div class="collapse ms-5" id="pesananMenu">
                    <a class="nav-link second-text fw-bold" href="/admin-pesanan" aria-current="page">Belum Divalidasi</a>
                    <a class="nav-link second-text fw-bold" href="/admin-pesanan-sudah">Sudah Divalidasi</a>
                </div>
                <a href="#pembayaranMenu" data-bs-toggle = "collapse" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-solid fa-money-bills me-2"></i>
                    <span class="ms-2">Pembayaran</span>
                </a>
                <div class="collapse ms-5" id="pembayaranMenu">
                    <a class="nav-link second-text fw-bold" href="/admin-pembayaran" aria-current="page">Belum Divalidasi</a>
                    <a class="nav-link second-text fw-bold" href="/admin-pembayaran-sudah">Sudah Divalidasi</a>
                </div>
                <a href="/admin-kelolaPenghuni" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
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
                    <div class="row my-5">
                    <div class="col-12 mb-3 text-end">
                            <div class="datatable-dropdown d-inline-block me-3">
                                    <label class="m-0">
                                        <select class="datatable-selector">
                                            <option value="5">5</option>
                                            <option value="10" selected="">10</option>
                                            <option value="15">15</option>
                                            <option value="20">20</option>
                                            <option value="25">25</option>
                                        </select> entries per page
                                    </label>
                                </div>
                                <div class="datatable-search d-inline-block">
                                    <input class="datatable-input form-control rounded-pill" placeholder="Search..." type="search" title="Search within table">
                                </div>
                            </div>
                        <div class="col">
                            <table class="table bg-white rounded shadow-sm  table-hover datatable">
                                <thead>
                                    <tr>
                                        <th scope="col" width="50">#</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">No Handphone</th>
                                        <th scope="col">NIK</th>
                                        <th scope="col">Jenis Kelamin</th>
                                        <th scope="col">Tanggal Masuk</th>
                                        <th scope="col">Nomor Kamar</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>rafi</td>
                                        <td>rafi@mail</td>
                                        <td>087812121212</td>
                                        <td>1234123412341234</td>
                                        <td>Pria</td>
                                        <td>2023-11-11</td>
                                        <td>30A</td>
                                        <td>
                                          <button type="button" class="btn btn-success lihatDetailBtn">Lihat Detail</button>
                                          <button type="button" class="btn btn-primary editBtn">Edit</button>
                                          <button type="button" class="btn btn-danger hapusBtn">Hapus</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>rafi</td>
                                        <td>rafi@mail</td>
                                        <td>087812121212</td>
                                        <td>1234123412341234</td>
                                        <td>Pria</td>
                                        <td>2023-11-11</td>
                                        <td>31A</td>
                                        <td>
                                          <button type="button" class="btn btn-success lihatDetailBtn">Lihat Detail</button>
                                          <button type="button" class="btn btn-primary editBtn">Edit</button>
                                          <button type="button" class="btn btn-danger hapusBtn">Hapus</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>rafi</td>
                                        <td>rafi@mail</td>
                                        <td>087812121212</td>
                                        <td>1234123412341234</td>
                                        <td>Pria</td>
                                        <td>2023-11-11</td>
                                        <td>32A</td>
                                        <td>
                                          <button type="button" class="btn btn-success lihatDetailBtn">Lihat Detail</button>
                                          <button type="button" class="btn btn-primary editBtn">Edit</button>
                                          <button type="button" class="btn btn-danger hapusBtn">Hapus</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="d-flex justify-content-between align-items-center mt-2">
                                <!-- Tombol Tambah -->
                                <button type="button" class="btn btn-info gap-5 tambahBtn" onclick="window.location.href='/tambah-penghuni'">
                                    Tambah Data
                                </button>
                                <!-- <div class="datatable-info">Showing 1 to 3 of 3 entries</div> -->
                                    <nav class="datatable-pagination">
                                        <ul class="datatable-pagination-list">
                                            <li class="datatable-pagination-list-item datatable-hidden datatable-disabled">
                                                <button data-page="1" class="datatable-pagination-list-item-link" aria-label="Page 1">‹</button>
                                            </li>
                                            <li class="datatable-pagination-list-item datatable-active">
                                                <button data-page="1" class="datatable-pagination-list-item-link" aria-label="Page 1">1</button>
                                            </li>
                                            <!-- <li class="datatable-pagination-list-item">
                                                <button data-page="2" class="datatable-pagination-list-item-link" aria-label="Page 2">2</button>
                                            </li> -->
                                            <li class="datatable-pagination-list-item">
                                                <button data-page="2" class="datatable-pagination-list-item-link" aria-label="Page 2">›</button>
                                            </li>
                                        </ul>
                                    </nav>
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
    // Fungsi untuk menangani validasi
    function handleLihatDetail() {
        // Lakukan sesuatu di sini sesuai dengan kebutuhan Anda
        window.location.href = "/lihat-detail-kelolaPenghuni";
    }
    function handleEdit() {
        // Lakukan sesuatu di sini sesuai dengan kebutuhan Anda
        window.location.href = "/edit-kelolaPenghuni";
    }
    function handleHapus() {
        // Lakukan sesuatu di sini sesuai dengan kebutuhan Anda
        window.location.href = "/admin-kelolaPenghuni";
    }

    // Menambahkan event listener pada semua elemen dengan class "validasiBtn"
    var buttons = document.querySelectorAll('.lihatDetailBtn');
    buttons.forEach(function(button) {
        button.addEventListener('click', handleLihatDetail);
    });

    var buttons = document.querySelectorAll('.editBtn');
    buttons.forEach(function(button) {
        button.addEventListener('click', handleEdit);
    });

    var buttons = document.querySelectorAll('.hapusBtn');
    buttons.forEach(function(button) {
        button.addEventListener('click', handleHapus);
    });
</script>

</body>

</html>