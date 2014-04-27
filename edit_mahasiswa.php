<?php
	require_once "RepositoryMahasiswa.php";
	$repo = new RepositoryMahasiswa();
	$rows = $repo->getById($_GET['id']);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tambah Data Mahasiswa</title>
</head>
<body>
<h1>Masukkan Data Mahasiswa</h1>
	<form method="post">
	<input type="hidden" name="id" value="<?php echo $rows->id; ?>" />
		<div>
			<label>Nim</label>
			<input type="tex" name="nim" value="<?php echo $rows->nim ?>">
		</div><br>
		<div>
			<label>Nama</label>
			<input type="text" name="nama" value="<?php echo $rows->nama; ?>">
		</div><br>
		<div>
			<label>Inisial</label>
			<input type="text" name="inisial" value="<?php echo $rows->inisial; ?>">
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
		$id = $_POST['id'];
		$nim = $_POST['nim'];
		$nama = $_POST['nama'];
		$inisial = $_POST['inisial'];

		$result = $repo->Update($nim,$nama,$inisial,$id);
		if ($result) 
		{
			header("location:index.php");
		}
		else
		{
			echo "Data gagal ditambahkan";
		}

	}