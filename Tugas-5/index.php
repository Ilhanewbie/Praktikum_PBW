<?php
//variabel bandara asal
$kedatangan = array(
    // nama bandara asal => pajak
    "Halim Perdanakusuma (HLP)" => 40000,
    // nama bandara asal => pajak
    "Sultan Babullah (TTE)" => 20000,
    // nama bandara asal => pajak
    "Soroako (SQR)" => 30000,
    // nama bandara asal => pajak
    "Sultan Iskandarmuda (BTJ)" => 50000
);
// membuat array asosiatif bandara tujuan
$keberangkatan = array(
    // nama bandara tujuan => pajak
    "Soekarno-Hatta (CGK)" => 90000,
    // nama bandara tujuan => pajak
    "Juamda (SUB)" => 80000,
    // nama bandara tujuan => pajak
    "Cut Nyak Dien (MEQ)" => 85000,
    // nama bandara tujuan => pajak
    "Sultan Syarif Kasim II (PKU)" => 75000
);

//fungsi untuk mengambil value dari key bandara
// atau mengambil pajak sesuai bandara
function getPajakDatang($kedatangan, $tujuan)
{
    $pjk = $kedatangan[$tujuan];
    return $pjk;
}
function getPajakBerangkat($keberangkatan, $tujuan)
{
    $pjk = $keberangkatan[$tujuan];
    return $pjk;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
    <title>Studi Kasus 1</title>
</head>

<body>
    <secttion class="daftar">
    <div class="background">
        <img src="assets/img/background.jpg" alt="">
        </div>
        <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1>PENDAFTARAN RUTE KEBERANGKATAN</h1>
            </div>
            </div>
        </div>
        <div class="container">
        <div class="formpendaftaran">
        <div class="row d-flex justify-content-center box-bg">
            <div class="col-md-6">
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="mkp" class="form-label">Maskapai</label>
                        <input type="text" class="form-control" id="mkp" name="mkp">
                    </div>
                    <label for="berangkat" class="form-label">Keberangkatan</label>
                    <select class="form-select mb-3" name="berangkat" id="berangkat">
                        <option selected>Pilih Bandara</option>
                        <?php foreach ($keberangkatan as $bdr => $pjk) : ?>
                            <option value="<?= $bdr ?>"><?= $bdr; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <label for="datang" class="form-label">Kedatangan</label>
                    <select class="form-select mb-3" name="datang" id="datang">
                        <option selected>Pilih Bandara</option>
                        <?php foreach ($kedatangan as $bdr => $pjk) : ?>
                            <option value="<?= $bdr ?>"><?= $bdr; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga Tiket</label>
                        <input type="text" class="form-control" name="harga" id="harga">
                    </div>
                    <button class="btn btn-warning" name="submit">Simpan Data</button>
                </form>
            </div>
        </div>
        </div>
        </div>
        </section>
        <?php
        $file = 'data/maskapai.json';
        $data_mkp = array();

        $file_json = file_get_contents($file);

        $data_mkp = json_decode($file_json, true);

        if (isset($_POST['submit'])) {
            $pjk = getPajakDatang($kedatangan, $_POST['datang']) + getPajakBerangkat($keberangkatan, $_POST['berangkat']);
            $total = $pjk + $_POST['harga'];

            $inputUser = array(
                "Maskapai" => $_POST['mkp'],
                "Asal_penerbangan" => $_POST['berangkat'],
                "tujuan_penerbangan" => $_POST['datang'],
                "Harga_tiket" => $_POST['harga'],
                "Pajak" => $pjk,
                "Total_harga" => $total
            );

            array_push($data_mkp, $inputUser);

            $data_json = json_encode($data_mkp, JSON_PRETTY_PRINT);
            file_put_contents($file, $data_json);
        }

        ?>
        <div class="container tabel">
        <div class="row">
            <table class="table">
                <thead>
                    <tr> 
                        <th scope="col">Maskapai</th>
                        <th scope="col">Keberangkatan</th>
                        <th scope="col">Kedatangan</th>
                        <th scope="col">Harga Tiket</th>
                        <th scope="col">Pajak</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data_mkp as $data => $value) : ?>
                        <tr>
                            <td><?= $data_mkp[$data]['Maskapai']; ?></td>
                            <td><?= $data_mkp[$data]['Asal_penerbangan']; ?></td>
                            <td><?= $data_mkp[$data]['tujuan_penerbangan']; ?></td>
                            <td><?= $data_mkp[$data]['Harga_tiket']; ?></td>
                            <td><?= $data_mkp[$data]['Pajak']; ?></td>
                            <td><?= $data_mkp[$data]['Total_harga']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>