<?php include("inc_header.php") ?>
<?php
$judul        = "";
$kutipan      = "";
$isi          = "";
$error        = "";
$sukses       = "";

if (isset($_POST['simpan'])) {
    $judul      = $_POST['judul'];
    $isi        = $_POST['isi'];
    $kutipan    = $_POST['kutipan'];

    if ($judul == '' or $isi == '') {
        $error  = "silahkan masukkan data yang diinginkan";
    }

    if (empty($error)) {
        $sql1       = "Insert Into Halaman(Judul, Isi ,Kutipan) values ('$judul' , '$isi' , '$kutipan')";
        $q1         = mysqli_query($koneksi, $sql1);
        if ($q1) {
            $sukses         = "Sukses memasukkan data";
        } else {
            $error          = "Gagal Memasukkan data";
        }
    }
}

?>

<h1>Halaman Admin Input Data</h1>
<div class="mb-3 row">
    <a href="halaman.php">
        << kembali ke halaman admin </a>
</div>

<?php
if ($error) { ?>
    <div class="alert alert-danger" role="alert">
        <?php echo $error ?>
    </div>
<?php
}
?>

<?php
if ($sukses) { ?>
    <div class="alert alert-primary" role="alert">
        <?php echo $sukses ?>
    </div>
<?php
}
?>


<form action="" method="post">

    <div class="mb-3 row">
        <label for="judul" class="col-sm-2 form-label">Judul</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="judul" placeholder="Masukkan Judul" name="judul" value="<?php echo $judul ?>">
        </div>

    </div>
    <div class="mb-3 row">
        <label for="kutipan" class="col-sm-2 form-label">kutipan</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="kutipan" placeholder="Masukkan kutipan" name="kutipan" value="<?php echo $kutipan ?>">
        </div>

    </div>

    <div class="mb-3 row">
        <label for="isi" class="col-sm-2 form-label">Isi</label>
        <div class="col-sm-10">
            <textarea name="isi" class="form-control" id="summernote"><?php echo $isi ?></textarea>
        </div>

    </div>
    <div class="mb-3 row">
        <div class="col-sm-2"></div>
        <div class="col-sm-10">
            <input type="submit" name="simpan" value="Simpan data" class="btn btn-primary" />
        </div>
    </div>
</form>
<?php include("inc_footer.php") ?>