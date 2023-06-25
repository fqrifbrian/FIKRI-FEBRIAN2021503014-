<?php
$host ="localhost";
$user ="root";
$pass ="";
$db = "rekapskor";

$koneksi = mysqli_connect($host, $user, $pass, $db);
if(!$koneksi){
    die("tidak bisa terkoneksi ke database");
}
$nis            = "";
$nm_siswa       = "";
$id_kelas       = "";
$id_jenjang     = "";
$id_bp          = "";
$sukses         = "";
$error          = "";

if(isset($_POST['simpan'])){
    $nis            = $_POST['nis'];
    $nm_siswa       = $_POST['nm_siswa'];
    $id_kelas       = $_POST['id_kelas'];
    $id_jenjang     = $_POST['id_jenjang'];
    $id_bp          = $_POST['id_bp'];

    if($nis && $nm_siswa && $id_kelas && $id_jenjang && $id_bp){
        $sql1   = "insert into skorsiswa(nis, nm_siswa, id_kelas, id_jenjang, id_bp) values ('$nis', '$nm_siswa', '$id_kelas', '$id_jenjang', $id_bp)";
        $q1     = mysqli_query($koneksi, $sql1);
        if($q1){
            $sukses     ="berhasil memasukkan data baru";
        }else{
            $error      ="gagal memasukkan data";
        }
    }else{
        $error = "sorry masszeh silahkan masukkan data terlebih dahulu";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekap Skor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .mx-auto {width: 800px;}
        .card {margin-top: 10px;}
    </style>
</head>
<body>
    <div class="mx-auto">
        <!--untuk memasukkan data-->
        <div class="card">
            <div class="card-header ">
            <div class="card-header">
                Create / edit data
            </div>
            <div class="card-body">
                <?php
                if($error){
                    ?>
                    <div class="alert alert-danger" role="alert">
                      <?php  echo  $error ?>
                </div>
                    <?php
                }
                ?>
                <?php
                if($sukses){
                    ?>
                    <div class="alert alert-sukses" role="alert">
                      <?php  echo  $sukses ?>
                </div>
                    <?php
                }
                ?>
                <form action="" method="POST">
                <div class="mb-3 row">
                    <label for="nis" class="col-sm-2 col-form-label">nis</label>
                    <div class="col-sm-10">
                        <input type="text"  class="form-control" id="nis" name="nis" value="<?php echo $nis ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nm_siswa" class="col-sm-2 col-form-label">nama siswa</label>
                    <div class="col-sm-10">
                        <input type="text"  class="form-control" id="nm_siswa" name="nm_siswa" value="<?php echo $nm_siswa ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="id_kelas" class="col-sm-2 col-form-label">ID kelas</label>
                    <div class="col-sm-10">
                        <input type="text"  class="form-control" id="id_kelas" name="id_kelas" value="<?php echo $id_kelas ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="id_jenjang" class="col-sm-2 col-form-label">ID jenjang</label>
                    <div class="col-sm-10">
                        <input type="text"  class="form-control" id="id_jenjang" name="id_jenjang" value="<?php echo $id_jenjang ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="id_bp" class="col-sm-2 col-form-label">ID BP</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="id_bp" id="id_bp">
                            <option value=""> -Pilih bp-</option>
                            <option value="ust.Misbah" <?php if($id_bp == "ust.misbah") echo "selected"?>>Ust.Misbah</option>
                            <option value="ust.hafidz" <?php if($id_bp == "ust.hafidz") echo "selected"?>>Ust.Hafidz</option>
                        </select>
                    </div>
                </div>
                <div class="col-12">
                    <input type="submit" name="simpan" value="simpan data" class="btn btn-primary"/>
                </div>
                </form>
            </div>

        <!--untuk mengeluarkan data-->
        <div class="card">
            <div class="card-header text-white bg-secondary">
                Data siswa
            </div>
            <div class="card-body">
        
        </div>
</body>
</html>


