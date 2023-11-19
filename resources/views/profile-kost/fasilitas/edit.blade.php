<form action="{{route('profile-kost-fasilitas.update', $fasilitas->id)}}" method="POST" enctype="multipart/form-data">
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
</form>
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