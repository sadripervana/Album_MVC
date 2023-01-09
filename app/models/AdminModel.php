<?php 

class AdminModel
{
	use Model;

	protected $table = 'album';

	protected $allowedColumns = [
		'title',
		'image',
		'user_id',
		'status',
		'like',
		'dislike'
	];

	public function validatePhoto()
	{
		if($_FILES){
			if($_FILES["photo"]["error"][0] == 4)
			{
				$this->errors['file'] = "File is required";
			}
		}
		if(empty($this->errors))
		{
			return true;
		}

		return false;
	}

	public function validate($data)
	{	
		$this->errors = [];
		if($_FILES){
			if($_FILES["photo"]["error"][0] == 4)
			{
				$this->errors['file'] = "File is required";
			}
		}
		
		if(empty($data['status']))
		{
			$this->errors['status'] = "Status is required";
		}
		
		if(empty($data['title']))
		{
			$this->errors['title'] = "Title is required";
		}

		if(empty($this->errors))
		{
			return true;
		}

		return false;
	}

	public function validateGet($GET)
	{	

		if(empty($_GET['description']))
		{
			$this->errors['description'] = "Description is required";
		}
		if(empty($_GET['status']))
		{
			$this->errors['status'] = "Status is required";
		}
		if(empty($_GET['title']))
		{
			$this->errors['title'] = "Title is required";
		}

		if(empty($this->errors))
		{
			return true;
		}

		return false;
	}
}