@extends('layouts.admin.app')

@section('title', 'Edit Fasilitas Kost')

@section('content')


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

                        <div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
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
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- <form action="{{route('profile-kost-fasilitas.update', $fasilitas->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div>
        <label for="deskripsi_fasilitas">Deskripsi Fasilitas</label>
        {{-- disable suggestion --}}
        <input type="text" name="deskripsi_fasilitas" id="deskripsi_fasilitas" autocomplete="off" value="{{$fasilitas->deskripsi_fasilitas}}" required>
    </div>
    <div>
        <img src="{{asset('storage/'.$fasilitas->foto_fasilitas)}}" alt="" id="img-foto">
        <label for="foto_fasilitas">Foto Fasilitas</label>
        <input type="file" name="foto_fasilitas" id="foto_fasilitas" accept="image/*" onchange="previewImage()">
    </div>
    <div>
        <button type="submit">Simpan</button>
    </div>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>    
                @endforeach
            </ul>
        </div>
    @endif
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
