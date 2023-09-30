<!DOCTYPE html>
<html>
<?php
require('koneksi.php');
session_start();

// model Auth
if (!isset($_SESSION['username'])) {
    header("Location: auth.php");
	header("Location: login.php");
}
?>
<head>
	<title>APLIKASI CRUD</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="col-lg-12">
			<div class="page-header">
				<br>
				<br>
				<h2>DATA MEMBER JKT-48
					<a href="add.php" class="btn btn-success">Tambah Data</a>
					<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#logout"></i><i class="bi bi-box-arrow-left"></i> Logout</button>

                    <!-- Modal hapus data-->
                    <div class="modal fade" id="logout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Yakin mau logout?</h1>
                                <div class="modal-body">
                                    <div class="modal-footer justify-content-end">
                                    <button type="button" class="btn btn-primary " data-bs-dismiss="modal"><i class="bi bi-x-lg"></i></button>
                                    <a href="logout.php"><button type="button" class="btn btn-danger"><i class="bi bi-check-lg"></i></button> </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
				</h2>
			</div>
			<br>
			<div>
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>NO</th>
							<th>NIS</th>
							<th>NAMA SISWA</th>
							<th>JENIS KELAMIN</th>
							<th>JURUSAN</th>
							<th>FOTO</th>
							<th>AKSI</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$sql_tampil = "SELECT * FROM tb_siswa";
							$query_tampil = mysqli_query($koneksi, $sql_tampil);
							$no=1;
							while ($data = mysqli_fetch_array($query_tampil,MYSQLI_BOTH)) {
						?>
						<tr>
							<td>
								<?php echo $no; ?>
							</td>
							<td>
								<?php echo $data['nis']; ?>
							</td>
							<td>
								<?php echo $data['nama']; ?>
							</td>
							<td>
								<?php echo $data['jekel']; ?>
							</td>
							<td>
								<?php echo $data['jurusan']; ?>
							</td>
							<td>
								<img src="foto/<?php echo $data['foto']; ?>" width="70px" />
							</td>
							<td>
								<a href="edit.php?kode=<?php echo $data['nis']; ?>" class='btn btn-warning btn-sm'>Ubah</a>
								<a href="del.php?kode=<?php echo $data['nis']; ?>" onclick="return confirm('Hapus Data Ini ?')"
								 class='btn btn-danger btn-sm'>Hapus</a>
							</td>
						</tr>
						<?php
							$no++;
							}
						?>
					</tbody>
				</table>

			</div>
		</div>
	</div>

</body>

</html>
<!-- Elseif Channel -->