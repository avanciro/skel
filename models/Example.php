<?php

use Illuminate\Database\Eloquent\Model as Eloquent_Model;

class Example extends Eloquent_Model {
	protected $table = 'users';
	protected $fillable = [ 'id', 'name', 'example' ];
	protected $dateFormat = 'U';
}

?>