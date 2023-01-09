<?php 

class DislikesModel
{
	use Model;

	protected $table = 'dislikes_album';

	protected $allowedColumns = [
		'id',
		'user',
		'album',
		'likes',
	];
}