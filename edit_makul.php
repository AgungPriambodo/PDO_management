<?php
	require_once "RepositoryMakul.php";
	$repo = new RepositoryMakul();
	$rows = $repo->getById($_GET['id']);
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tambah Data Matakuliah</title>
</head>
<body>
<h1>Masukkan Data Matakuliah</h1>
	<form method="post">
	<input type="hidden" name="id" value="<?php echo $rows->id; ?>" />
		<div>

			<label>Kode Matakuliah</label>
			<input type="tex" name="kode_makul" value="<?php echo $rows->kode_makul; ?>">
		</div><br>
		<div>
			<label>Nama Matakuliah</label>
			<input type="text" name="nama_makul" value="<?php echo $rows->nama_makul; ?>">
		</div><br>
		<div>
			<label>SKS</label>
			<input type="text" name="sks" value="<?php echo $rows->sks; ?>">
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
		$kode_makul = $_POST['kode_makul'];
		$nama_makul = $_POST['nama_makul'];
		$sks = $_POST['sks'];
		
		$result = $repo->Update($kode_makul,$nama_makul,$sks,$id);
			if ($result) 
			{
				header("location:index2.php");
			}
			else
			{
				echo "Data Gagal disimpan !!";
			}
	}
?>