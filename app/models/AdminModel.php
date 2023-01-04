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
	];

	public function validate($data)
	{	
		$this->errors = [];
		if($_FILES["photo"]["error"][0] == 4)
		{
			$this->errors['file'] = "File is required";
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
}