@extends('layouts.admin.app')

@section('title', 'Edit Fasilitas Kost')

@section('content')

<div class="container-fluid px-4">
    <div class="row g-3 my-2">
        <div class="col-md-12">
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/profile-kost">Profile Kost</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Fasilitas</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Form Edit Fasilitas Kost</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('profile-kost-fasilitas.update', $fasilitas->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="mb-3">
                            <label for="deskripsi_fasilitas" class="form-label">Deskripsi Fasilitas</label>
                            {{-- Disable suggestion --}}
                            <input type="text" name="deskripsi_fasilitas" id="deskripsi_fasilitas" class="form-control" autocomplete="off" value="{{ $fasilitas->deskripsi_fasilitas }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="foto_fasilitas" class="form-label">Foto Fasilitas</label>
                            <input type="file" name="foto_fasilitas" id="foto_fasilitas" class="form-control" accept="image/*" onchange="previewImage()">
                            <img src="{{ asset('storage/'.$fasilitas->foto_fasilitas) }}" alt="" id="img-foto" class="mt-3 img-fluid" style="max-height: 200px;">
                        </div>
                        <!-- Add this button where you want to trigger the modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#fotoModal">
                            Preview Foto Fasilitas
                        </button>

                        <br><br><br>

                        <div >
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{route('admin-profile-kost')}}" class="btn btn-secondary">Cancel</a>
                        </div>

                        @if ($errors->any())
                            <div class="mt-3">
                                <ul class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if(session('success'))
                            <div class="mt-3 alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




<!-- Add this modal code at the end of your HTML, just before the closing </body> tag -->
<div class="modal fade" id="fotoModal" tabindex="-1" aria-labelledby="fotoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="fotoModalLabel">Foto Fasilitas Preview</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center"> 
                <img src="{{ asset('storage/'.$fasilitas->foto_fasilitas) }}" alt="" class="img-fluid mx-auto d-block" style="max-height: 400px;"> <!-- Center the image -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
    // preview image untuk foto yang akan diupload
    function previewImage() {
        const foto = document.querySelector('#foto_fasilitas');
        const imgFoto = document.querySelector('#img-foto');

        const fileFoto = new FileReader();
        fileFoto.readAsDataURL(foto.files[0]);

        fileFoto.onload = function(e) {
            imgFoto.src = e.target.result;
        }
    }
</script>

<script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>

@endsection
