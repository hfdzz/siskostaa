@extends('layouts.admin.app')

@section('title', 'Profile Kost')

@section('content')


{{-- tentang --}}
<div class="container-fluid px-4">
    <div class="row g-3 my-2">
<!-- Tentang Kost Card -->
        <div class="card mr-5 ml-5">
            <div class="card-header">
                <h4>Tentang Kost</h4>
            </div>
            <div class="card-body">
                <p class="card-text">{{$tentang->deskripsi_tentang}}</p>
                <img src="{{$tentang->foto_tentang}}" alt="" class="img-fluid" width="100px" height="100px">
                <a href="{{route('profile-kost-tentang.edit')}}" class="btn btn-primary">Edit</a>
            </div>
        </div>

        <!-- Fasilitas Table -->
        <div class="card mt-4 mb-4">
            <div class="card-header">
                <h4>Fasilitas</h4>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Deskripsi Fasilitas</th>
                            <th>Foto Fasilitas</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fasilitas as $item)
                            <tr>
                                <td>{{$item->deskripsi_fasilitas}}</td>
                                <td><img src="{{$item->foto_fasilitas}}" alt="" class="img-fluid" width="100px" height="100px"></td>
                                <td>
                                    <!-- <div class="d-grid gap-2 d-md-flex justify-content-md-end"> -->
                                        <a href="{{route('profile-kost-fasilitas.edit', $item->id)}}" class="btn btn-primary">Edit</a>
                                        <form action="{{route('profile-kost-fasilitas.destroy', $item->id)}}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="{{route('profile-kost-fasilitas.create')}}" class="btn btn-success">Add</a>
            </div>
        </div>

        <!-- FAQ Table -->
        <div class="card mt-4 mb-4">
            <div class="card-header">
                <h4>FAQ</h4>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Pertanyaan</th>
                            <th>Jawaban</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($faq as $item)
                            <tr>
                                <td>{{$item->pertanyaan}}</td>
                                <td>{{$item->jawaban}}</td>
                                <td>
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                        <a href="{{route('profile-kost-faq.edit', $item->id)}}" class="btn btn-primary">Edit</a>
                                        <form action="{{route('profile-kost-faq.destroy', $item->id)}}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="{{route('profile-kost-faq.create')}}" class="btn btn-success">Add</a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<script>
    // Show the modal when the "Lihat" button is clicked
    $("#btnLihat").click(function(){
        $("#myModal").modal();
    });
</script>

<script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>

@endsection