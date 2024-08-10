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
            <a class="navbar-brand" href="#"><b>Transaksi Jurnal Umum</b></a>
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
        <form action="create/jurnal" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mt-5">
                <div class="col-md-4 mt-2">
                    <div class="form-group">
                        <label>No Transaksi</label>
                        <input type="text" name="no_transaksi" class="form-control" value="" required>
                    </div>
                </div>
                <div class="col-md-4 mt-2">
                    <div class="form-group">
                        <label>Tgl. Transaksi</label>
                        <input type="text" name="tanggal" class="form-control" value="" required>
                    </div>
                </div>
                <div class="col-md-4 mt-2">
                    <div class="form-group">
                        <label>Tag</label>
                        <input type="text" name="tag" class="form-control" value="" required>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-3 mt-2">
                    <div class="form-group">
                        <label for="akun">Akun</label>
                        <select name="akun" class="form-control" required>
                            <option value="">Pilih Akun</option>
                            @foreach ($akun as $a)
                            <option value="{{ $a->id }}">{{ $a->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-3 mt-2">
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <input type="text" name="deskripsi" class="form-control" value="" required>
                    </div>
                </div>
                <div class="col-md-3 mt-2">
                    <div class="form-group">
                        <label>Debit</label>
                        <input type="text" name="debit" class="form-control" value="" required>
                    </div>
                </div>
                <div class="col-md-3 mt-2">
                    <div class="form-group">
                        <label>Kredit</label>
                        <input type="text" name="kredit" class="form-control" value="" required>
                    </div>
                </div>
            </div>

            <!-- Tombol untuk menampilkan form tambahan -->
            <div class="mt-3">
                <a class="btn btn-primary" data-bs-toggle="collapse" href="#additionalForm" role="button"
                    aria-expanded="false" aria-controls="additionalForm">
                    Tambah Data
                </a>
            </div>

            <!-- Form tambahan yang tersembunyi -->
            <div class="collapse mt-3" id="additionalForm">
                <div class="row">
                    <div class="col-md-3 mt-2">
                        <div class="form-group">
                            <label>Data Lainnya 1</label>
                            <input type="text" name="datalainnya1" class="form-control" value="">
                        </div>
                    </div>
                    <div class="col-md-3 mt-2">
                        <div class="form-group">
                            <label>Data Lainnya 2</label>
                            <input type="text" name="datalainnya2" class="form-control" value="">
                        </div>
                    </div>
                    <div class="col-md-3 mt-2">
                        <div class="form-group">
                            <label>Data Lainnya 3</label>
                            <input type="text" name="datalainnya3" class="form-control" value="">
                        </div>
                    </div>
                    <div class="col-md-3 mt-2">
                        <div class="form-group">
                            <label>Data Lainnya 4</label>
                            <input type="text" name="datalainnya4" class="form-control" value="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-3 mt-2">
                    <div class="form-group">
                        <label>Memo</label>
                        <input type="text" name="memo" class="form-control" value="" required>
                    </div>
                </div>
                <div class="col-md-4 mt-2">
                    <div class="form-group">

                    </div>
                </div>
                <div class="col-md-2 mt-2">
                    <div class="form-group">
                        <label><b>Total Debit</b></label>
                        <p> Rp.{{ number_format($totalDebit, 0, ',', '.') }}</p>
                    </div>
                </div>
                <div class="col-md-3 mt-2">
                    <div class="form-group">
                        <label><b>Total Kredit</b></label>
                        <p> Rp.{{ number_format($totalKredit, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-3 mt-2">
                <label for="lampiran">Lampiran</label>
                        <img src="" class="img-preview img-fluid mb-3 col-sm-5" alt="">
                        <input type="file" accept=".jpg, .jpeg, .png, .svg, .webp" onchange="previewImg()" id="image" name="lampiran" class="form-control">
                        @if($errors->has('lampiran'))
                            <span class="help-block text-danger">{{ $errors->first('lampiran') }}</span>
                        @endif  
                </div>
                <div class="col-md-6 mt-2">

                </div>


                <div class="col-md-3 mt-2">
                    <div class="form-group">
                        <a href="/jurnal" class="btn btn-danger">Batalkan</a>
                        <button type="submit" class="btn btn-primary">Buat Jurnal Umum</button>
                    </div>
                </div>
            </div>


        </form>


    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script>
    function previewImg() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        };
    }
</script>

</html>
