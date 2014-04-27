<?php 
	class DBH {
		private static $dns="mysql:dbname=universitas;host=localhost;";
		private static $user = "root";
		private static $pass= "";


		public static function createConnection()
		{
			return new PDO(self::$dns,self::$user,self::$pass);
		}
	}

?>