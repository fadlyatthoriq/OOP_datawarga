<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
    <script type = "text/JavaScript">
         <!--
            function AutoRefresh() {
               setTimeout("location.reload(true);", 1000);
            }
         //-->
    </script>
    <?php
    include ('myLib/myDB.php');
    ?>
    <?php
        $Db = new myDb();
        $warga = $Db->show();
        if (isset($_GET['hapus'])){
            $id = $_GET['hapus'];
            $queryhapus = $Db->delete($id);
            if($queryhapus == TRUE){
                $pesanhapus = "Data Terhapus";
                echo "<script>
                        document.location.href = 'index.php';
                    </script>";
            } else {
                $pesanhapus = "Data Gagal Terhapus";
                echo "<script>
                        document.location.href = 'index.php';
                    </script>";
            }
        }
    ?> 
  </head>
  <body>
 

    <div class="container">
        <div class="col-12">
            <div class="py-3">
                <h2>Data Warga</h2>
                <a href="tambahdata.php" class="btn btn-success">Tambah Data Warga</a>
                <?php if(isset($_POST['hapus'])){ ?>
                    <div class="alert alert-danger"><?php echo $pesanhapus; ?></div>
                <?php } ?>
            </div>
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
            foreach($warga as $q){
            $i++;
            ?>
                <tr>
                    <td><?php echo $i;?></td>
                    <td><?php echo $q['no_ktp'];?></td>
                    <td><?php echo $q['nama_lengkap'];?></td>
                    <td><?php echo $q['alamat_lengkap'];?></td>
                    <td><?php echo $q['no_hp'];?></td>
                    <td><a class="badge rounded-pill bg-primary" href="detail-warga.php?id=<?php echo $q['id'];?>">Detail</a> 
                    <a class="badge rounded-pill bg-danger" href="index.php?hapus=<?php echo $q['id'];?>">Hapus</a></td>
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