<?php
//memasukkan file config.php
include('../config.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>SI Kependudukan</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	
</head>
<body>
	<nav class="navbar navbar-expand-md navbar-dark bg-dark">
		<div class="container-fluid">
    <img  alt="Penduduk" src="Kependudukan.png" width="42px" style="margin: 1px;padding: 0px color:white;">
    <a href="../main_menu.php" class="nav-item nav-link">Sistem Informasi Kependudukan</a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav">
            <a href="index.php" class="nav-item nav-link active">Home</a>
            <a href="data.php" class="nav-item nav-link active">Data</a>
                        <a href="tambah_data.php" class="nav-item nav-link active">Tambah Data</a>

        </div>
        <form class="form-inline ml-auto">
            <input type="text" class="form-control mr-sm-2" placeholder="Search">
            <button type="submit" class="btn btn-outline-light">Search</button>
        </form>
        <a href="#" class="nav-item nav-link">Admin</a>
        <a href="form_login.php" class="nav-item nav-link">| Logout</a>
    </div>
</nav>
	
	<div class="previous" style="margin-top:20px">
		<h2>Data Kelahiran</h2>
		<hr>
				
		<table class="table table-striped table-hover table-sm table-bordered">
			<thead class="thead-dark">
				<tr>
					<th>NO.</th>
					<th>NAMA</th>
					<th>TEMPAT KELAHIRAN</th>
					<th>HARI LAHIR</th>
					<th>TEMPAT LAHIR</th>
					<th>TANGGAL LAHIR</th>
					<th>JENIS KELAMIN</th>
					<th>IBU</th>
					<th>AYAH</th>
					<th>AKSI</th>
				</tr>
			</thead>
			<tbody>
				<?php
				//query ke database SELECT tabel data_penduduk urut berdasarkan id yang paling besar
				$sql = mysqli_query($koneksi, "SELECT * FROM data_kelahiran ORDER BY id DESC") or die(mysqli_error($koneksi));
				//jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
				if(mysqli_num_rows($sql) > 0){
					//membuat variabel $no untuk menyimpan nomor urut
					$no = 1;
					//melakukan perulangan while dengan dari dari query $sql
					while($data = mysqli_fetch_assoc($sql)){
						//menampilkan data perulangan
						echo '
						<tr>
							<td>'.$no.'</td>
							<td>'.$data['nama'].'</td>
							<td>'.$data['tempat_kelahiran'].'</td>
							<td>'.$data['hari_lahir'].'</td>
							<td>'.$data['tempat_lahir'].'</td>
							<td>'.$data['tanggal_lahir'].'</td>
							<td>'.$data['jenis_kelamin'].'</td>
							<td>'.$data['ayah'].'</td>
							<td>'.$data['ibu'].'</td>
							<td>
								<a href="edit_kelahiran.php?id='.$data['id'].'" class="badge badge-warning">Edit</a>
								<a href="delete_kelahiran.php?id='.$data['id'].'" class="badge badge-danger" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
							</td>
						</tr>
						';
						$no++;
					}
				//jika query menghasilkan nilai 0
				}else{
					echo '
					<tr>
						<td colspan="6">Tidak ada data.</td>
					</tr>
					';
				}
				?>

			<tbody>
		</table>
		<p>Total: <?php echo mysqli_num_rows($sql) ?></p>
	</div>
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</tbody>
</body>
</html>