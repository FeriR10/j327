<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><b>Buat Akun Baru</b></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

        </div>
    </nav>
    <div class="container">
    @if (Session::has('status'))
                <div class="alert alert-success" role="alert">
                    {{Session::get('message')}}
                </div>
                @endif
        <div class="card-body">
            <form action="create/buatakun" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group mt-2">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" value="">

                </div>
                <div class="form-group mt-2">
                    <label>Nomor</label>
                    <input type="text" name="nomor" class="form-control" value="">

                </div>
                <div class="form-group mt-2">
                    <label>Kategori</label>
                    <input type="text" name="kategori" class="form-control" value="">

                </div>
                <div class="form-group mt-2">
                    <label>Detail</label>
                    <input type="text" name="detail" class="form-control" value="">

                </div>
                <div class="form-group mt-2">
                    <label>Pajak</label>
                    <input type="text" name="pajak" class="form-control" value="">

                </div>
                <div class="form-group mt-2">
                    <label>Saldo Awal</label>
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Rp</span>
                        <input type="text" name="saldo_awal" class="form-control" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-sm">
                    </div>

                </div>
                <div class="form-group mt-2">
                    <label>Deskripsi</label>
                    <input type="text" name="deskripsi" class="form-control" value="">

                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

</html>
