<?php 


/**
 * User class
 */
class User
{
	
	use Model;

	protected $table = 'users';

	protected $allowedColumns = [
		'first_name',
		'last_name',
		'email',
		'password',
		'user_image'
	];

	public function validate($data)
	{
		$this->errors = [];

		if(empty($data['first_name']))
		{
			$this->errors['first_name'] = "First Name is required";
		}

		if(empty($data['last_name']))
		{
			$this->errors['last_name'] = "Last Name is required";
		}
		if(empty($data['email']))
		{
			$this->errors['email'] = "Email is required";
		}else
		if(!filter_var($data['email'],FILTER_VALIDATE_EMAIL))
		{
			$this->errors['email'] = "Email is not valid";
		}
		
		if(empty($data['password']))
		{
			$this->errors['password'] = "Password is required";
		}
		

		if(empty($this->errors))
		{
			return true;
		}

		return false;
	}
}