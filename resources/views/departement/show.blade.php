<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</head>

<body>
    <div class="container col-xl-10 col-xxl-8 px-4 py-5">
        <div class="row">
            <div>
                Test Web Dev
            </div>
        </div>
        <div class="row align-items-center g-lg-5 py-5">
            <div class="col-lg-7 text-center text-lg-start">
                <a href="{{ route('departement.index') }}">Departement</a>
                <a href="#">Project</a>
                <a href="#">Users</a>
            </div>
        </div>
    </div>
    <div style="padding-left: 8cm; padding-right: 6cm">
        <h2>Detail Department</h2>
        <form>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="nama_departement">Nama Departement</label>
                    <input name="nama_departement" id="nama_departement" value="{{ $departement->nama_departement }}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="deskripsi">Deskripsi</label>
                    <input name="deskripsi" id="deskripsi" value="{{ $departement->deskripsi }}">
                </div>
            </div>
        </form>
    </div>
</body>
