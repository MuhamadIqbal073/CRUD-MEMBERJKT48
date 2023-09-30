<?php
require('koneksi.php');
if(isset($_GET['kode'])){
	$sql_cek = "SELECT * FROM tb_siswa WHERE nis='".$_GET['kode']."'";
	$query_cek = mysqli_query($koneksi, $sql_cek);
	$data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
}
?>

<?php
    $foto= $data_cek['foto'];
    if (file_exists("foto/$foto")){
        unlink("foto/$foto");
    }

    $sql_hapus = "DELETE FROM tb_siswa WHERE nis='".$_GET['kode']."'";
    $query_hapus = mysqli_query($koneksi, $sql_hapus);
    if ($query_hapus) {
        echo "<script>alert('Hapus Data Sukses')</script>";
            echo "<meta http-equiv='refresh' content='0; url=index.php'>";
        }else{
            echo "<script>alert('Hapus Data Gagal')</script>";
            echo "<meta http-equiv='refresh' content='0; url=index.php'>";
    }

?>

<!-- end -->