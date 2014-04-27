<?php 
	require_once "dbh.php";

	class RepositoryMahasiswa{
		private $dbh;
		private $rowCount;
		private $query = "SELECT * FROM mahasiswa ORDER BY nim";

		public function __construct()
		{
			$this->dbh = DBH::createConnection();
		}

		public function getAll()
		{
			$query = $this->dbh->prepare($this->query);
			$query->execute();
			$this->rowCount = $query->rowCount();
			return $query->fetchAll(PDO::FETCH_OBJ);
		}

		public function rowCount()
		{
			return $this->rowCount;
		}

		public function Delete($id)
		{
			$query = $this->dbh->prepare("DELETE FROM mahasiswa WHERE id=? ");
			$query->bindParam(1,$id);
			return $query->execute();
		}

		public function getById($id)
		{
			$query = $this->dbh->prepare("SELECT * FROM mahasiswa WHERE id = ?");
			$query->bindParam(1,$id);
			$query->execute();
			return $query->fetch(PDO::FETCH_OBJ);
		}

		public function Save($nim,$nama,$inisial)
		{
			$sql = "INSERT INTO mahasiswa(nim,nama,inisial) VALUES(?,?,?)";
			$query = $this->dbh->prepare($sql);
			$query->bindParam(1,$nim);
			$query->bindParam(2,$nama);
			$query->bindParam(3,$inisial);

			return 	$query->execute();
		}

		public function Update($nim,$nama,$inisial,$id)
		{
			$sql = "UPDATE mahasiswa SET nim=?, nama=?, inisial=? WHERE id = ?";
			$query = $this->dbh->prepare($sql);
			$query->bindParam(1,$nim);
			$query->bindParam(2,$nama);
			$query->bindParam(3,$inisial);
			$query->bindParam(4,$id);
			return 	$query->execute();
		}

		public function getByKatakunci($katakunci)
		{
			$query = $this->dbh->prepare("SELECT * FROM mahasiswa WHERE nim LIKE ? OR nama LIKE ? OR inisial LIKE ?");
			$katakunci = "%".$katakunci."%";
			$query->bindParam(1,$katakunci);
			$query->bindParam(2,$katakunci);
			$query->bindParam(3,$katakunci);
			$query->execute();
			$this->rowCount = $query->rowCount();
			return $query->fetchAll(PDO::FETCH_OBJ);
		}

	}
?>