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
                    <div class="row my-5">
                    <div class="col-12 mb-3 text-end">
                            <div class="datatable-dropdown d-inline-block me-5">
                                    <label class="m-0">
                                        <select class="datatable-selector" onchange="window.location.href='{{route('admin-pesanan')}}?entries=' + this.value;">
                                            {{-- <option value="5">5</option>
                                            <option value="10" selected="">10</option>
                                            <option value="15">15</option>
                                            <option value="20">20</option>
                                            <option value="25">25</option> --}}
                                            {{-- option from 5 t0 25 (step:+5) with loop --}}
                                            @for ($i = 5; $i <= 25; $i+=5)
                                                <option value="{{ $i }}" {{ ($entries == $i) ? 'selected' : '' }}>{{ $i }}</option>
                                            @endfor
                                        </select> entries per page
                                    </label>
                                </div>

                                <form class="datatable-search d-inline-block ms-auto me-2 ">
                                    <div class="datatable-search d-inline-block"> 
                                        <div class="input-group">
                                            <input class="datatable-input form-control rounded-pill" placeholder="Search..." type="search" title="Search within table">
                                            <button class="btn btn-primary rounded-pill" type="button"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>                  
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
                                        <th scope="col">Jenis Pembayaran</th>
                                        <th scope="col">Bukti Pembayaran</th>
                                        {{-- <th scope="col">Aksi</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- <tr>
                                        <th scope="row">3</th>
                                        <td>rafi</td>
                                        <td>rafi@mail</td>
                                        <td>087812121212</td>
                                        <td>1234123412341234</td>
                                        <td>Pria</td>
                                        <td>2023-11-11</td>
                                        <td>Penuh</td>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#gambarModal{{ $item->id }}">
                                                Lihat Gambar
                                            </button>
                                        </td>
                                        <!-- <td><img src="assets/tf1.jpg" alt="" width="100"></td> -->
                                        <td>
                                          <button type="button" class="btn btn-primary validasiBtn">Validasi</button>
                                          <button type="button" class="btn btn-danger tidakvalidasiBtn">Tidak Validasi</button>
                                        </td>
                                    </tr> --}}
                                    @foreach ($tagihan as $item)
                                    <tr>
                                        <td>{{ $loop->iteration + $tagihan->firstItem() - 1 }}</td>
                                        <td>{{ $item->pemesanan->nama }}</td>
                                        <td>{{ $item->pemesanan->email }}</td>
                                        <td>{{ $item->pemesanan->no_hp }}</td>
                                        <td>{{ $item->pemesanan->nik }}</td>
                                        <td>{{ $item->pemesanan->jenis_kelamin }}</td>
                                        <td>{{ $item->pemesanan->tanggal_Masuk }}</td>
                                        <td>{{ $item->pemesanan->jenis_pembayaran }}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#gambarModal{{ $item->id }}">
                                                Lihat Gambar
                                            </button>
                                        </td>
                                        <!-- <td><img src="{{ asset('storage/' . $item->bukti_pembayaran) }}" alt="" width="100"></td> -->
                                        {{-- <td>
                                            <a href="/validasi-pembayaran/{{ $item->id }}" class="btn btn-primary">Validasi</a>
                                            <a href="/tidak-validasi-pembayaran/{{ $item->id }}" class="btn btn-danger">Tidak Validasi</a>
                                        </td> --}}
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <!-- Modal -->
                            @foreach ($tagihan as $item)
                            <div class="modal fade" id="gambarModal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Bukti Pembayaran</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-center">
                                            <img src="{{ asset('storage/' . $item->bukti_pembayaran) }}" alt="Bukti Pembayaran" class="img-fluid">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                            <div class="d-flex justify-content-between align-items-center mt-2">
                                <div class="datatable-info">
                                    Showing {{ $tagihan->firstItem() }} to {{ $tagihan->lastItem() }} of {{ $tagihan->total() }} entries
                                </div>
                                    {{ $tagihan->links() }}
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
    function handleValidasi() {
        // Lakukan sesuatu di sini sesuai dengan kebutuhan Anda
        window.location.href = "/validasi-pembayaran";
    }
    function handleTidakValidasi() {
        // Lakukan sesuatu di sini sesuai dengan kebutuhan Anda
        window.location.href = "/tidak-validasi-pembayaran";
    }


    // Menambahkan event listener pada semua elemen dengan class "validasiBtn"
    var buttons = document.querySelectorAll('.validasiBtn');
    buttons.forEach(function(button) {
        button.addEventListener('click', handleValidasi);
    });

    var buttons = document.querySelectorAll('.tidakvalidasiBtn');
    buttons.forEach(function(button) {
        button.addEventListener('click', handleTidakValidasi);


    });
</script>

</body>

</html>