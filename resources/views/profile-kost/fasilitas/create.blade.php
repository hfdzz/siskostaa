@extends('layouts.admin.app')

@section('title', 'Tidak Validasi')

@section('content')

<form action="{{route('profile-kost-fasilitas.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
        <label for="deskripsi_fasilitas">Deskripsi Fasilitas</label>
        {{-- disable suggestion --}}
        <input type="text" name="deskripsi_fasilitas" id="deskripsi_fasilitas" autocomplete="off" value="{{old('deskripsi_fasilitas')}}" required>
    </div>
    <div>
        <img src="" alt="" id="img-foto">
        <label for="foto_fasilitas">Foto Fasilitas</label>
        <input type="file" name="foto_fasilitas" id="foto_fasilitas" accept="image/*" onchange="previewImage()" required>
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
</form>

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

@endsection
