<?php
	class Matakuliah{
		private $kode_makul;
		private $nama_makul;
		private $sks;

		public function __construct($kode_makul,$nama_makul,$sks)
		{
			$this->kode_makul=$kode_makul;
			$this->nama_makul=$nama_makul;
			$this->sks = $sks;
		}

		public function __get()
		{

		}
	}
?>