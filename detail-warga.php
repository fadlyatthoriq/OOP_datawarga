<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Detail Data Warga</title>
  </head>
  <body>
      <?php
        include ('myLib/myDB.php');
        $Db = new myDb();
        $id = $_GET['id'];
        $data=$Db->get_by_id($id);
      ?>
    <div class="container">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-10">
                <h2>Detail Data Warga</h2>
                <hr>
                <table class="table table-stripped table-bordered">
                    <tr>
                        <td>ID</td>
                        <td><?php echo $data['id'];?></td>
                    </tr>
                    <tr>
                        <td>Nomor KTP</td>
                        <td><?php echo $data['no_ktp'];?></td>
                    </tr>
                    <tr>
                        <td>Nama Lengkap</td>
                        <td><?php echo $data['nama_lengkap'];?></td>
                    </tr>
                    <tr>
                        <td>Alamat Lengkap</td>
                        <td><?php echo $data['alamat_lengkap'];?></td>
                    </tr>
                    <tr>
                        <td>Nomor Handphone</td>
                        <td><?php echo $data['no_hp'];?></td>
                    </tr>
                    <tr>
                        <td><a href="index.php" class="btn btn-primary">Kembali</a></td>
                        <td></td>
                    </tr>
                </table>
            </div>
            <div class="col-1"></div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>