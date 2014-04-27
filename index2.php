<?php 

require_once "RepositoryMakul.php";

$repo = new RepositoryMakul();


if (isset($_GET['aksi']) and $_GET['aksi'] == 'hapus') 
	{
		if ($repo->delete($_GET['id'])) 
		{
			header("location:index2.php");
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
	<title>Mata Kuliah</title>
</head>
<body>
<h1>Data Mata Kuliah</h1>
	<form name="cari" method="get" action="index2.php">
		<label>Cari Matakuliah</label>
		<input name="q" type="text">
		<input type="submit" value="Cari">
	</form>
	<a href="insert_makul.php">Tambah Data</a>
	<table border="1">
		<tr>
			<th>No.</th>
			<th>Kode Makul</th>
			<th>Nama Makul</th>
			<th>sks</th>
			<th>Aksi</th>
		</tr>
		<?php
			$no = 1;
			foreach ($result as $row) 
			{
		?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $row->kode_makul; ?></td>
			<td><?php echo $row->nama_makul; ?></td>
			<td><?php echo $row->sks; ?></td>
			<td>
				<a href="edit_makul.php?id=<?php echo $row->id; ?>">Edit</a>
				<a href="index2.php?id=<?php echo $row->id;?>&aksi=hapus" onclick="return confirm('Yakin akan di hapus');">Hapus</a>
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