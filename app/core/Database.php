<?php 

Trait Database
{

	private function connect()
	{
		$string = "mysql:hostname=".DBHOST.";dbname=".DBNAME;
		$con = new PDO($string,DBUSER,DBPASS);
		return $con;
	}

	public function query($query, $data = [])
	{
		$con = $this->connect();
		$stm = $con->prepare($query);
		$check = $stm->execute($data);
		if($check)
		{
			$result = $stm->fetchAll(PDO::FETCH_OBJ);
			if(is_array($result) && count($result))
			{
				return $result;
			}
		}

		return false;
	}

	public function singlePhoto($query,$POST = [], $Fiels=[])
	{
		$dbpath = '';
		$errors = [];
		$require = ['title', 'brand', 'price', 'parent', 'child', 'sizes'];
		$allowed = ['png', 'jpg', 'jpeg', 'gif'];
		$tmpLoc = [];
		$uploadPath = [];
		if($_FILES["photo"]["error"][0] != 4){
			$photoCount = count($_FILES['photo']['name']);
			$values =	 makePhoto($photoCount,$dbpath,$allowed,$errors);
			extract($values);

			// Upload file and insert into database
			for ($i=0; $i < $photoCount; $i++) {
				move_uploaded_file($tmpLoc[$i], $uploadPath[$i]);
			}
		}

		$con = $this->connect();
		$stm = $con->prepare($query);

		$check = $stm->execute([
			'image' => $dbpath,
			'user_id' => $POST['user_id']
		]);

		if($check)
		{
			$result = $stm->fetchAll(PDO::FETCH_OBJ);
			if(is_array($result) && count($result))
			{
				return $result;
			}
		}

		return false;
	}


	public function singlePhotoUser($query,$POST = [], $Fiels=[])
	{
		$dbpath = '';
		$errors = [];
		$require = ['title', 'brand', 'price', 'parent', 'child', 'sizes'];
		$allowed = ['png', 'jpg', 'jpeg', 'gif'];
		$tmpLoc = [];
		$uploadPath = [];
		if($_FILES["photo"]["error"][0] != 4){
			$photoCount = count($_FILES['photo']['name']);
			$values =	 makePhoto($photoCount,$dbpath,$allowed,$errors);
			extract($values);

			// Upload file and insert into database
			for ($i=0; $i < $photoCount; $i++) {
				move_uploaded_file($tmpLoc[$i], $uploadPath[$i]);
			}
		}

		$con = $this->connect();
		$stm = $con->prepare($query);

		$check = $stm->execute([
			'first_name'=>$POST['first_name'],
			'last_name'=>$POST['last_name'],
			'email'=>$POST['email'],
			'password'=>$POST['password'],
			'user_image' => $dbpath
		]);

		if($check)
		{
			$result = $stm->fetchAll(PDO::FETCH_OBJ);
			if(is_array($result) && count($result))
			{
				return $result;
			}
		}

		return false;
	}

	public function queryImage($query, $POST= [], $FILES = [] )
	{	
		
		$dbpath = '';
		$errors = [];
		$require = ['title', 'brand', 'price', 'parent', 'child', 'sizes'];
		$allowed = ['png', 'jpg', 'jpeg', 'gif'];
		$tmpLoc = [];
		$uploadPath = [];

		if($_FILES["photo"]["error"][0] != 4){
				$photoCount = count($_FILES['photo']['name']);
				$values =	 makePhoto($photoCount,$dbpath,$allowed,$errors);
				extract($values);

				// Upload file and insert into database
				for ($i=0; $i < $photoCount; $i++) {
					move_uploaded_file($tmpLoc[$i], $uploadPath[$i]);
				}
			}
		
		$con = $this->connect();
		$stm = $con->prepare($query);

		$check = $stm->execute([
			'title' => $POST['title'],
			'image' => $dbpath, 
			'user_id' => $POST['user_id'],
			'status' => $POST['status']
		]);

		if($check)
		{
			$result = $stm->fetchAll(PDO::FETCH_OBJ);
			if(is_array($result) && count($result))
			{
				return $result;
			}
		}

		return false;
	}

	public function get_row($query, $data = [])
	{

		$con = $this->connect();
		$stm = $con->prepare($query);

		$check = $stm->execute($data);
		if($check)
		{
			$result = $stm->fetchAll(PDO::FETCH_OBJ);
			if(is_array($result) && count($result))
			{
				return $result[0];
			}
		}

		return false;
	}
	
}


