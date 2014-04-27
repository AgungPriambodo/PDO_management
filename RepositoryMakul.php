<?php 
	require_once "dbh.php";

	class RepositoryMakul{
		private $dbh;
		private $rowCount;
		private $query = "SELECT * FROM matakuliah ORDER BY kode_makul";

		public function __construct()
		{
			$this->dbh = DBH::createConnection();
		}
		//mengambil semua data
		public function getAll()
		{
			$query = $this->dbh->prepare($this->query);
			$query->execute();
			$this->rowCount = $query->rowCount();
			return $query->fetchAll(PDO::FETCH_OBJ);
		}

		//menghitung jumlah data
		public function rowCount()
		{
			return $this->rowCount;
		}

		//menghapus data
		public function Delete($id)
		{
			$query = $this->dbh->prepare("DELETE FROM matakuliah WHERE id=? ");
			$query->bindParam(1,$id);
			return $query->execute();
		}

		//mengambil data berdasarkan id
		public function getById($id)
		{
			$query = $this->dbh->prepare("SELECT * FROM matakuliah WHERE id = ?");
			$query->bindParam(1,$id);
			$query->execute();
			return $query->fetch(PDO::FETCH_OBJ);
		}

		//menyimpan data
		public function Save($kode_makul,$nama_makul,$sks)
		{
			$sql = "INSERT INTO matakuliah(kode_makul,nama_makul,sks) VALUES(?,?,?)";
			$query = $this->dbh->prepare($sql);
			$query->bindParam(1,$kode_makul);
			$query->bindParam(2,$nama_makul);
			$query->bindParam(3,$sks);

			return 	$query->execute();
		}

		//menyimpan Edit data
		public function Update($kode_makul,$nama_makul,$sks,$id)
		{
			$sql = "UPDATE matakuliah SET kode_makul=?, nama_makul=?, sks=? WHERE id = ?";
			$query = $this->dbh->prepare($sql);
			$query->bindParam(1,$kode_makul);
			$query->bindParam(2,$nama_makul);
			$query->bindParam(3,$sks);
			$query->bindParam(4,$id);
			return 	$query->execute();
		}

		//cari by katakunci
		public function getByKatakunci($katakunci)
		{
			$query = $this->dbh->prepare("SELECT * FROM matakuliah WHERE kode_makul LIKE ? OR nama_makul LIKE ?");
			$katakunci = "%".$katakunci."%";
			$query->bindParam(1,$katakunci);
			$query->bindParam(2,$katakunci);
			$query->execute();
			$this->rowCount = $query->rowCount();
			return $query->fetchAll(PDO::FETCH_OBJ);
		}

	}
?>