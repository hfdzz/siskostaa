@extends('layouts.admin.app')

@section('title', 'Kelola Penghuni')

@section('content')
            <!-- Content -->
            <div class="container-fluid px-4">
                <div class="row g-3 my-2">
                    <div class="row my-5">
                    <div class="col-12 mb-3 text-end">
                            <div class="datatable-dropdown d-inline-block me-3">
                                <label class="m-0">
                                    <select class="datatable-selector" onchange="window.location.href='{{route('admin-kelolaPenghuni')}}?entries=' + this.value;">
                                        @for ($i = 5; $i <= 25; $i+=5)
                                            <option value="{{ $i }}" {{ ($entries == $i) ? 'selected' : '' }}>{{ $i }}</option>
                                        @endfor
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
                                    {{-- <tr>
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
                                    </tr> --}}
                                    @foreach ($kamar as $item)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration + $kamar->firstItem() - 1 }}</th>
                                        <td>{{ $item->pemesanan->nama }}</td>
                                        <td>{{ $item->pemesanan->email }}</td>
                                        <td>{{ $item->pemesanan->no_hp }}</td>
                                        <td>{{ $item->pemesanan->nik }}</td>
                                        <td>{{ $item->pemesanan->jenis_kelamin }}</td>
                                        <td>{{ $item->pemesanan->tanggal_masuk }}</td>
                                        <td>{{ $item->getKodeKamar() }}</td>
                                        <td>
                                          {{-- <button type="button" class="btn btn-success lihatDetailBtn">Lihat Detail</button>
                                          <button type="button" class="btn btn-primary editBtn">Edit</button>
                                          <button type="button" class="btn btn-danger hapusBtn">Hapus</button> --}}
                                            <a href="/lihat-detail-kelolaPenghuni/{{ $item->id }}" class="btn btn-success lihatDetailBtn">Lihat Detail</a>
                                            <a href="/edit-kelolaPenghuni/{{ $item->id }}" class="btn btn-primary editBtn">Edit</a>
                                            <form action="/delete-kelolaPenghuni/{{ $item->id }}" method="POST" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger hapusBtn">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="d-flex justify-content-between align-items-center mt-2">
                                <!-- Tombol Tambah -->
                                <button type="button" class="btn btn-info tambahBtn" onclick="window.location.href='/tambah-penghuni'">
                                    Tambah Data
                                </button>
                                <!-- <div class="datatable-info">Showing 1 to 3 of 3 entries</div> -->
                                    {{ $kamar->links() }}
                                </div>
                            </div>                            
                        </div>
                        
                    </div>
                </div>
            </div>



@endsection

@section('script')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>

@endsection