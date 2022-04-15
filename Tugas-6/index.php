<?php include('domain/get_data.php'); ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Form KRS</title>
  </head>
  <body>
    <h1 class="text-center">FORM PENGISIAN KRS</h1>
    <br>
    <!-- Awal Card Form -->
    <div class="card">
    <div class="card-header bg-primary text-white">
           Form pengisian KRS
        </div>
             <div class="card-body">
               <form action="domain/post_data.php" method="POST" enctype="multipart/form-data">
                   <div class="form-group">
                       <label>NPM</label>
                       <input type="text" id="tnpm" name="tnpm" class="form-control" placeholder="Input NPM anda disini!" required>
                   </div>
               
                   <div class="form-group">
                       <label>Nama</label>
                       <input type="text" id="tnama" name="tnama" class="form-control" placeholder="Input Nama anda disini!" required>
                   </div>
                 
               <div class="form-group">
               <label>Alamat</label>
               <textarea class="form-control" id="talamat" name="talamat" placeholder="Input Alamat anda disini!"></textarea>
                   </div>
               
               <div class="form-group">
                   <label>Program Studi</label>
                   <select class="form-control" id="tprodi" name="tprodi">
                       <option></option>
                       <option value="Teknik Informatika">Teknik Informatika</option>
                       <option value="Sistem Informasi">Sistem Informasi</option>
                </select>
               </div>
               <div class="form-group">
                   <label>Mata Kuliah Yang Diambil</label>
                   <select class="form-control" id="tmk" name="tmk">
                       <option></option>
                       <option value="Basis Data">Basis Data</option>
                       <option value="Pemrograman Web">Pemrograman Web</option>
                       <option value="Algoritma Pemrograman">Algoritma Pemrograman</option>
                       <option value="Kecerdasan Buatan">Kecerdasan Buatan</option>
                </select>
               </div>
               <div class="form-group">
                   <label>Jumlah SKS</label>
                   <select class="form-control" id="tsks" name="tsks">
                       <option></option>
                       <option value="3">3</option>
               </select>
               </div>
               <br>  
               <button type="Input Data" class="btn btn-success" name="binput">Input Data</button>
             </div>
</form>
</div>

          <div class="container">

         <?php
    if (isset($_GET['message'])) {
    $message = $_GET['message'];
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';
    echo  $message;
    echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
    echo '</div>';
}
?>

</div>

<!-- AKHIR card form-->

<!-- Awal Card tabel -->
<div class="card">
    <div class="card-header bg-success text-white">
           Daftar Mahasiswa
        </div>
             <div class="card-body">
             <table class="table table-striped" id='table-data'>
                        <thead>
                            <tr>
                                <th scope="col" >No</th>
                                <th scope="col" >Nama Lengkap</th>
                                <th scope="col" >Mata Kuliah</th>
                                <th scope="col" >Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!isset($query)) {
                                echo "Belum ada yang mengisi KRS";
                            } else {
                                while ($row = mysqli_fetch_assoc($run)){
                                    echo '<tr>
                                    <td>' . $row['id'] . '</td>
                                    <td>' . $row['nama'] . '</td>
                                    <td>' . $row['nama_mk'] . '</td>
                                    <td>' . "<span style='color:palevioletred;font-weight:bolder;'>".$row['nama']."</span>". ' Mengambil Mata Kuliah ' . "<span style='color:palevioletred;font-weight:bolder;'>" . $row['nama_mk'] ."</span>". " ( ".$row['jumlah_sks'] . ' SKS )' . '</td> 
                                    </tr>';
                                }
                            } ?>
                        </tbody>
                    </table>
             </div>
          </div>
<!-- AKHIR card tabel -->

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>