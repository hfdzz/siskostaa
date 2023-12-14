@extends('layouts.admin.app')

@section('title', 'Edit Tentang Kost')

@section('content')

<div class="container-fluid px-4">
    <div class="row g-3 my-2">
        <div class="col-md-12">
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/profile-kost">Profile Kost</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> Edit Tentang Kost</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Form Update Tentang Kost</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('profile-kost-tentang.update', $tentang->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" id="deskripsi" rows="5">{{ $tentang->deskripsi_tentang }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="foto" class="form-label">Foto</label>
                            <input class="form-control" type="file" name="foto" id="foto" onchange="previewImage()" accept="image/*">
                            <img src="{{ asset($tentang->foto_tentang) }}" alt="" id="img-foto" class="mt-3 img-fluid" style="max-height: 200px;">
                        </div>

                        <div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <form action="{{route('profile-kost-tentang.update', $tentang->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div>
        <label for="deskripsi">Deskripsi</label>
        <textarea name="deskripsi" id="deskripsi" rows="10">{{$tentang->deskripsi_tentang}}</textarea>
    </div>
    <div>
        <img src="{{asset($tentang->foto_tentang)}}" alt="" id="img-foto">
        <label for="foto">Foto</label>
        <input type="file" name="foto" id="foto" onchange="previewImage()" accept="image/*">
    </div>
    <div>
        <button type="submit">Simpan</button>
    </div>


</form> -->

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
        const foto = document.querySelector('#foto');
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
