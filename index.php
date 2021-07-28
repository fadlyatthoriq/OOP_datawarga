<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
    <?php
    include ('myLib/myDB.php');
    ?>
  </head>
  <body>
    <?php
        $Db = new myDb();
        $warga = $Db->show();
        if (isset($_POST['daftar'])){
            $noktp = $_POST['no_ktp'];
            $nama = $_POST['nama_lengkap'];
            $alamat = $_POST['alamat_lengkap'];
            $nomor = $_POST['no_hp'];
            $querysimpan = $Db->add_data($noktp, $nama, $alamat, $nomor);

            if($querysimpan==TRUE){
                $pesansimpan = "Data Tersimpan ke Database";
            }else{
                $pesansimpan = "Data Gagal Tersimpan ke Database";
            }
        }
        if (isset($_POST['hapus'])){
            $id = $_GET['hapus'];
            $queryhapus = $Db->delete($id);
            if($queryhapus==TRUE){
                $pesanhapus = "Data Berhasil Di Hapus";
            }else{
                $pesanhapus = "Data Gagal Terhapus";
            }
        }
    ?>

    <div class="container">
        <div class="col-12">
            <div class="py-3">
                <h2>Data Warga</h2>
                <a href="tambahdata.php" class="btn btn-success">Tambah Data Warga</a>
            </div>
            <?php 
                if (isset($_POST['daftar'])){  ?>
                    <div class="alert alert-success"><?php echo $pesansimpan; ?></div>
                    <?php } ?>
            <?php 
                if (isset($_GET['hapus'])){  ?>
                    <div class="alert alert-success"><?php echo $pesanhapus; ?></div>
                    <?php } ?>
            <table class="table table-bordered">
            <tr>
                <td>No</td>
                <td>No KTP</td>
                <td>Nama Lengkap</td>
                <td>Alamat</td>
                <td>No HP</td>
                <td>Action</td>
            </tr>
            
            <?php 
            $i=0;
            foreach($warga as $data){
            $i++;
            ?>
                <tr>
                    <td><?php echo $i;?></td>
                    <td><?php echo $data['no_ktp'];?></td>
                    <td><?php echo $data['nama_lengkap'];?></td>
                    <td><?php echo $data['alamat_lengkap'];?></td>
                    <td><?php echo $data['no_hp'];?></td>
                    <td><a class="badge rounded-pill bg-primary" href="detail-warga.php?id=<?php echo $data['id'];?>">Detail</a> <a class="badge rounded-pill bg-danger" href="index.php?hapus=<?php echo $data['id'];?>">Hapus</a></td>
                </tr>
            <?php } ?>
            </table>
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