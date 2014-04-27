<?php 
	class mahasiswa{
		private $db;
		private $rowCount;

		function __construct()
		{
			$this->db = new PDO("mysql:dbname=universitas;host=localhost;","root","");
		}

		function getALL($katakunci = null)
		{	


			if (is_null($katakunci)) 
			{
				$query = $this->db->prepare("SELECT * FROM mahasiswa");	
			}
			else
			{
				$query = $this->db->prepare("SELECT * FROM mahasiswa WHERE nama LIKE ?");
				$katakunci = "%".$katakunci."%";
				$query->bindParam(1,$katakunci);
			}
			
			$query->execute();
			$this->rowCount = $query->rowCount();
			return $query->fetchAll(PDO::FETCH_OBJ);
		}

		function getRowCount()
		{
			return $this->rowCount;
		}

		function delete($id)
		{
			$query = $this->db->prepare("DELETE FROM mahasiswa WHERE id=? ");
			$query->bindParam(1,$id);
			return $query->execute();
		}

		//fungsi untuk insert

		function save($nim,$nama,$inisial,$id = null)
		{
			$sql = "INSERT INTO mahasiswa (nim,nama,inisial) VALUES (?,?,?)";
			if ($id) 
			{
				$sql = "UPDATE mahasiswa SET nim = ?, nama = ?, inisial = ?";
			}

			$query = $this->db->prepare($sql);
			$query->bindParam(1, $nim);
			$query->bindParam(2, $nama);
			$query->bindParam(3, $inisial);
			if ($id) 
			{
				$query->bindParam(4,$id);
			}
			return $query->execute();
		}

		function getById($id)
		{
			$query = $this->db->prepare("SELECT * FROM mahasiswa WHERE id = ?")
			$query->bindParam(1,$id);
			$query->execute();
			return $query->fetch(PDO::FETCH_OBJ);
		}

	}
?>