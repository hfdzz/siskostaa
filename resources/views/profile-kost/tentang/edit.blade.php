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

</form>