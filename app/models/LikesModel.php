<?php 

class LikesModel
{
	use Model;

	protected $table = 'likes_album';

	protected $allowedColumns = [
		'id',
		'user',
		'album',
		'likes',
	];
}