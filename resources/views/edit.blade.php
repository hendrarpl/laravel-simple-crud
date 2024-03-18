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
    <div class="row">
        <div class="col-6 offset-3">
            <h1 class="fw-light fs-3 my-4">Edit data nasabah</h1>
            <form action="{{ route('nasabah.update', $nasabah->id) }}" method="POST">
                @csrf
                @method('put')
                <div class="mb-3">
                  <label for="nama" class="form-label">Nama</label>
                  <input type="text" minlength="0" class="form-control" id="nama" name="nama" required value="{{ $nasabah->nama }}">
                </div>
                <div class="mb-3">
                  <label for="saldo" class="form-label">Saldo</label>
                  <input type="number" class="form-control" id="saldo" name="saldo" required value="{{ $nasabah->saldo }}">
                </div>
                <div class="mb-3">
                  <label for="keterangan" class="form-label">Keterangan</label>
                  <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ $nasabah->keterangan }}">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-success" href="{{ route('nasabah.index') }}">Kembali</a>
            </form>
            </div>
        </div>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
