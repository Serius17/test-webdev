<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Sederhana</title>
    <script>
        function hitung(operator) {
            var angka1 = parseFloat(document.getElementById('angka1').value);
            var angka2 = parseFloat(document.getElementById('angka2').value);
            var hasil;

            switch (operator) {
                case 'tambah':
                    hasil = angka1 + angka2;
                    break;
                case 'kurang':
                    hasil = angka1 - angka2;
                    break;
                case 'kali':
                    hasil = angka1 * angka2;
                    break;
                case 'bagi':
                    if (angka2 === 0) {
                        alert("Tidak dapat membagi dengan nol!");
                        return;
                    }
                    hasil = angka1 / angka2;
                    break;
                default:
                    alert("Operator tidak valid.");
                    return;
            }

            document.getElementById('hasil').innerHTML = 'Hasil: ' + hasil;
        }
    </script>
</head>

<body>
    <h1>Kalkulator Sederhana</h1>
    <input type="number" id="angka1" placeholder="Angka 1">
    <input type="number" id="angka2" placeholder="Angka 2">
    <br>
    <button onclick="hitung('tambah')">Tambah</button>
    <button onclick="hitung('kurang')">Kurang</button>
    <button onclick="hitung('kali')">Kali</button>
    <button onclick="hitung('bagi')">Bagi</button>
    <br>
    <p id="hasil">Hasil: </p>
</body>

</html>
