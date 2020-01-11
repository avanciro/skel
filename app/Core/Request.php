<?php

namespace Avanciro\Skel\Core;
use Avanciro\Skel\Core\Registry;

class Request {

	public $_registry = array();


    public function __construct() {
		$this->_registry['get']		= $_GET;
        $this->_registry['post']	= $_POST;
        $this->_registry['files']	= $_FILES;
		$this->_registry['server']	= $_SERVER;
	}



	public function __get($key) {
		if ( array_key_exists($key, $this->_registry) ):
			return $this->_registry[$key];
		else:
			return false;
		endif;
	}
}

?>