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


    <div class="table-title" style="padding-left: 8cm; padding-right: 6cm">
        <div class="row">
            <div class="col-sm-10">
                <h2>Data Departement</h2>
            </div>
            <div class="col-sm-12">
                <a href="{{ route('departement.create') }}" class="btn btn-success">
                    <i class="fa fa-plus fa-fw" aria-hidden="true"></i>
                    <span>Tambah Departement</span>
                </a>
            </div>
        </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Departement</th>
                    <th>Deskripsi</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($departement as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama_departement }}</td>
                        <td>{{ $item->deskripsi }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
