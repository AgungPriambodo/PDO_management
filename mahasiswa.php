<?php
	class Mahasiswa{
		private $nim;
		private $nama;
		private $inisial;
		//private $jeniskelamin;

		public function __construct($nim,$nama,$inisial)
		{
			$this->nim = $nim;
			$this->nama = $nama;
			$this->inisial = $inisial;
		}
		public function __get()
		{

		}
	}
?>