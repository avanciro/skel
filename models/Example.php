<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model as Eloquent_Model;

class Example extends Eloquent_Model {
	protected $table = 'example';
	protected $fillable = [ 'id', 'name', 'email', 'password' ];
	protected $dateFormat = 'U';
}

?>