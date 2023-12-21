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
                <table id="faqTable" class="table">
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
        
                <button class="btn btn-success" data-toggle="modal" data-target="#modalAddFAQ">
                    Add
                </button>
            </div>
        </div>


        <!-- Modal for adding FAQ -->
        <div class="modal fade" id="modalAddFAQ" tabindex="-1" role="dialog" aria-labelledby="modalAddFAQLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalAddFAQLabel">Add FAQ</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Form for adding FAQ -->
                        <form id="faqForm">
                            <div class="form-group">
                                <label for="pertanyaan">Pertanyaan:</label>
                                <input type="text" class="form-control" id="pertanyaan" name="pertanyaan" required>
                            </div>
                            <div class="form-group">
                                <label for="jawaban">Jawaban:</label>
                                <textarea class="form-control" id="jawaban" name="jawaban" rows="3" required></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" onclick="submitFAQ()">Submit</button>
                    </div>
                </div>
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
    // Show the modal when the "Tambah FAQ Kos" button is clicked
    $("#tambahFAQModal").on("show.bs.modal", function (e) {
        // Reset form if needed
        // $("#formFAQ")[0].reset();
        // Clear preview image if needed
        // $("#img-foto-modal").attr("src", "");
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