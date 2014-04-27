<?php
	require_once "RepositoryMakul.php";
	$repo = new RepositoryMakul();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tambah Data Matakuliah</title>
</head>
<body>
<h1>Masukkan Data Matakuliah</h1>
	<form method="post" action="insert_makul.php">
		<div>

			<label>Kode Matakuliah</label>
			<input type="tex" name="kode_makul">
		</div><br>
		<div>
			<label>Nama Matakuliah</label>
			<input type="text" name="nama_makul">
		</div><br>
		<div>
			<label>SKS</label>
			<input type="text" name="sks" placeholder="masukkan angka">
		</div><br>
		<div>
			<input type="submit" name="btn_simpan" value="Simpan">
		</div>
	</form>

</body>
</html>
<?php 
	if ($_POST) 
	{
		$kode_makul = $_POST['kode_makul'];
		$nama_makul = $_POST['nama_makul'];
		$sks = $_POST['sks'];
		if ($kode_makul !=null && $nama_makul != null && $sks != null) 
		{
			$result = $repo->Save($kode_makul,$nama_makul,$sks);
			if ($result) 
			{
				header("location:index2.php");
			}
			else
			{
				echo "Data Gagal disimpan !!";
			}	
		}
		else
		{
			echo "Data belum di lengkapi !!";
		}
	}
?>