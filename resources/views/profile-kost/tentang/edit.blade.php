@extends('layouts.admin.app')

@section('title', 'Tidak Validasi')

@section('content')



<form action="{{route('profile-kost-tentang.update', $tentang->id)}}" method="POST" enctype="multipart/form-data">
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
        const foto = document.querySelector('#foto');
        const imgFoto = document.querySelector('#img-foto');

        const fileFoto = new FileReader();
        fileFoto.readAsDataURL(foto.files[0]);

        fileFoto.onload = function(e) {
            imgFoto.src = e.target.result;
        }
    }
</script>

@endsection
