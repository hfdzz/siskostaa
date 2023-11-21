@extends('layouts.admin.app')

@section('title', 'Edit FAQ')

@section('content')

<!-- content -->
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Form Edit Fasilitas Kost</h4>
                </div>

                <!-- ... -->
                <div class="card-body">
                    <h4>Edit FAQ</h4>
                    <form action="{{route('profile-kost-faq.update', $faqItem->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                
                        <div class="mb-3">
                            <label for="pertanyaan" class="form-label">Pertanyaan:</label>
                            <input type="text" class="form-control" id="pertanyaan" name="pertanyaan" value="{{$faqItem->pertanyaan}}">
                        </div>
                
                        <div class="mb-3">
                            <label for="jawaban" class="form-label">Jawaban:</label>
                            <textarea class="form-control" id="jawaban" name="jawaban" rows="3">{{$faqItem->jawaban}}</textarea>
                        </div>
                
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </form>
                </div>
                <!-- ... -->

                <!-- <div class="card-body">
                    <h4>Edit FAQ</h4>
                    <form action="" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="pertanyaan" class="form-label">Pertanyaan:</label>
                            <input type="text" class="form-control" id="pertanyaan" name="pertanyaan" value="">
                        </div>

                        <div class="mb-3">
                            <label for="jawaban" class="form-label">Jawaban:</label>
                            <textarea class="form-control" id="jawaban" name="jawaban" rows="3"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </form>
                </div> -->
            </div>
        </div>
    </div>
</div>



<!-- End-Content -->
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

@endsection