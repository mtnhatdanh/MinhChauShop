<?php 
	class User {
		public $idUser;
		public $username;
		public $hoten;
		public $pass;
		public $passB;
		function set($i,$u,$h,$p,$g) {
			$this->idUser = $i;
			$this->username = $u;
			$this->hoten = $h;
			$this->pass = $p;
		}
		function sha1pass(){
			$this->passB = sha1($this->pass);
		}
	}
?>