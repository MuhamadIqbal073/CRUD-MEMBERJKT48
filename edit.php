<!DOCTYPE html>
<html>
<?php
require('koneksi.php');
if(isset($_GET['kode'])){
	$sql_cek = "SELECT * FROM tb_siswa WHERE nis='".$_GET['kode']."'";
	$query_cek = mysqli_query($koneksi, $sql_cek);
	$data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
}
?>

<head>
	<title>APLIKASI CRUD</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>

<body>

	<div class="container">
		<div class="col-lg-8">
			<div class="page-header">
				<br>
				<br>
				<h2>UBAH DATA SISWA</h2>
			</div>
			<br>
			<form method="POST" enctype="multipart/form-data">

				<div class="form-group">
					<label>NIS</label>
					<input type="text" name="nis" class="form-control" value="<?php echo $data_cek['nis']; ?>"
					 readonly/>
				</div>

				<div class="form-group">
					<label>NAMA</label>
					<input type="text" name="nama" class="form-control" value="<?php echo $data_cek['nama']; ?>"
					/>
				</div>

				<div class="form-group">
					<label>JENIS KELAMIN</label>
					<select name="jekel" id="jekel" class="form-control">
						<option value="">-- Pilih jekel --</option>
						<?php
							//menhecek data yg dipilih sebelumnya
							if ($data_cek['jekel'] == "Laki-laki") echo "<option value='Laki-laki' selected>Laki-laki</option>";
							else echo "<option value='Laki-laki'>Laki-laki</option>";

							if ($data_cek['jekel'] == "Perempuan") echo "<option value='Perempuan' selected>Perempuan</option>";
							else echo "<option value='Perempuan'>Perempuan</option>";
						?>
					</select>
				</div>

				<div class="form-group">
					<label>JURUSAN</label>
					<input type="text" name="jurusan" class="form-control" value="<?php echo $data_cek['jurusan']; ?>"
					/>
				</div>

				<div class="form-group">
					<label>FOTO</label>
					<br>
					<img src="foto/<?php echo $data_cek['foto']; ?>" width="70px" />
					<br>
					<br>
					<input type="file" name="foto">
				</div>
				<br>

				<div class="form-group">
					<input type="submit" name="Simpan" value="Ubah Data" class="btn btn-primary">
					<a href="index.php" class="btn btn-warning">Batal</a>
				</div>
			</form>
		</div>
	</div>

</body>

<?php	
    if (isset ($_POST['Simpan'])){

	$sumber = $_FILES['foto']['tmp_name'];
	$nama_file = $_FILES['foto']['name'];
	

	if(!empty($sumber)){
        $foto= $data_cek['foto'];
            if (file_exists("foto/$foto")){
            unlink("foto/$foto");}

        $sql_ubah = "UPDATE tb_siswa SET
			nama='".$_POST['nama']."',
			jekel='".$_POST['jekel']."',
			jurusan='".$_POST['jurusan']."',
			foto='".$nama_file."'		
            WHERE nis='".$_POST['nis']."'";
		$query_ubah = mysqli_query($koneksi, $sql_ubah);
		$pindah = move_uploaded_file($sumber, 'foto/'.$nama_file);

    }elseif(empty($sumber)){
		$sql_ubah = "UPDATE tb_siswa SET
			nama='".$_POST['nama']."',
			jekel='".$_POST['jekel']."',
			jurusan='".$_POST['jurusan']."'	
			WHERE nis='".$_POST['nis']."'";
		$query_ubah = mysqli_query($koneksi, $sql_ubah);
        }

    if ($query_ubah) {
        echo "<script>alert('Ubah Data Sukses')</script>";
            echo "<meta http-equiv='refresh' content='0; url=index.php'>";
        }else{
            echo "<script>alert('Ubah Data Gagal')</script>";
            echo "<meta http-equiv='refresh' content='0; url=edit.php'>";
        }
        }
?>

</html>
<!-- Elseif Channel -->