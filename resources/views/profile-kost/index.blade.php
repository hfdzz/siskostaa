<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    {{-- tentang --}}
    <div>
        <table border="1px">
            <thead>
                <tr>
                    <th>Tentang Kost</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$tentang->deskripsi_tentang}}</td>
                    <td><img src="{{asset($tentang->getFotoTentangAttribute())}}" alt="" width="100px" height="100px"></td>
                    <td>
                        <a href="{{route('profile-kost-tentang.edit')}}">Edit</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <br/>
    {{-- fasilitas --}}
    <div>
        <table border="1px">
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
                        <td><img src="{{asset('storage/'.$item->foto_fasilitas)}}" alt="" width="100px" height="100px"></td>
                        <td>
                            <a href="{{route('profile-kost-fasilitas.edit', $item->id)}}">Edit</a>
                            <form action="{{route('profile-kost-fasilitas.destroy', $item->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3">
                        <a href="{{route('profile-kost-fasilitas.create')}}">add</a>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>

    <br/>
    {{-- faq --}}
    <div>
        <table border="1px">
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
                            <a href="{{route('profile-kost-faq.edit', $item->id)}}">Edit</a>
                            <form action="{{route('profile-kost-faq.destroy', $item->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3">
                        <a href="{{route('profile-kost-faq.create')}}">add</a>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</body>
</html>