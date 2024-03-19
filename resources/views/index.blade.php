<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Larabank</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

@include('navbar')

    <div class="container">
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
        <div class="row">
            <div class="col">
                @if (Auth::user()->role == 'admin')

                <a href="{{ route('nasabah.create') }}" class="btn btn-success my-2">Tambah data</a>

                @endif
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Saldo</th>
                            <th scope="col">Deskripsi</th>
                            @if (Auth::user()->role == 'admin')

                            <th scope="col">Aksi</th>

                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($nasabahs as $nasabah)
                        <tr>
                            <td>{{ $nasabah->id }}</td>
                            <td>{{ $nasabah->nama }}</td>
                            <td>{{ "Rp " . number_format($nasabah->saldo,2,',','.') }}</td>
                            <td>{{ $nasabah->keterangan }}</td>
                            @if (Auth::user()->role == 'admin')

                            <td class="d-flex gap-2">
                                <a href="{{ route('nasabah.edit', $nasabah->id) }}" class="btn btn-warning">Edit</a>
                                <form method="post" action="{{ route('nasabah.hapus', $nasabah->id) }}">
                                    @csrf
                                    <input onclick="return confirm('Apa anda yakin ingin menghapus nasabah {{ $nasabah->nama }} ?')" type="submit" value="Hapus" class="btn btn-danger">
                                </form>
                            </td>

                            @endif
                        </tr>
                        @empty

                        <div class="alert alert-danger">
                            data tidak tersedia !
                          </div>

                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
