<?php
	require_once "RepositoryMahasiswa.php";
	$repo = new RepositoryMahasiswa();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tambah Data Mahasiswa</title>
</head>
<body>
<h1>Masukkan Data Mahasiswa</h1>

	<form method="post" action="insert_mahasiswa.php">
		<div>
			<label>Nim</label>&nbsp;&nbsp;
			<input type="tex" name="nim">
		</div><br>
		<div>
			<label>Nama</label>
			<input type="text" name="nama">
		</div><br>
		<div>
			<label>Inisial</label>
			<input type="text" name="inisial">
		</div><br>
		<div>
			<input type="submit" name="btn_simpan" value="Simpan">
			<a href="index.php"><input type="reset" value="Batal"></a>
		</div>
	</form>

</body>
</html>

<?php 
	if ($_POST) 
	{
		$nim = $_POST['nim'];
		$nama = $_POST['nama'];
		$inisial = $_POST['inisial'];
		if ($nim !=null && $nama != null && $inisial != null) 
		{
			$result = $repo->save($nim,$nama,$inisial);

			if ($result) 
			{
				header("location:index.php");
			}
			else
			{
				echo "Data gagal ditambahkan";
			}
		}
		else
		{
			echo "Data belum di lengkapi !!";
		}
	}
?>