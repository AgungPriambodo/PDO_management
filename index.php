<?php 

require_once "RepositoryMahasiswa.php";

$repo = new RepositoryMahasiswa();


if (isset($_GET['aksi']) and $_GET['aksi'] == 'hapus') 
	{
		if ($repo->delete($_GET['id'])) 
		{
			header("location:index.php");
		}
		else
		{
			echo "Data gagal di hapus";
		}
	}

if (isset($_GET['q'])) 
	{
		
		$result = $repo->getByKatakunci($_GET['q']);
	}
	else
	{
		$result= $repo->getAll();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Management</title>
</head>
<body>
	<h1>Data Mahasiswa</h1>

	<form method="get" action="index.php" name="formPencarian">
		<label>Cari mahasiswa</label>
		<input name="q" type="text">
		<input type="submit" value="Cari">
	</form><br>
	<a href="insert_mahasiswa.php">Tambah Data</a>
	<table border="1">
		<tr>
			<th>No.</th>
			<th>Nim</th>
			<th>Nama</th>
			<th>Inisial</th>
			<th>Aksi</th>
		</tr>
		<?php
			$no = 1;
			foreach ($result as $row) 
			{
		?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $row->nim; ?></td>
			<td><?php echo $row->nama; ?></td>
			<td><?php echo $row->inisial; ?></td>
			<td>
				<a href="edit_mahasiswa.php?id=<?php echo $row->id; ?>">Edit</a>		
				<a href="index.php?id=<?php echo $row->id;?>&aksi=hapus" onclick="return confirm('Yakin akan di hapus');">Hapus</a>
			</td>
		</tr>
		<?php 
			}
		?>
		<tr>
			<td colspan="5"><?php echo "Total data : ".$repo->rowCount(); ?></td>
		</tr>
	</table>

</body>
</html>