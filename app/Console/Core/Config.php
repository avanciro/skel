<?php

namespace Avanciro\Skel\Console\Core;

class Config {

	// PROPS
	private $file = null;



	public function __get($key) {
		if ( array_key_exists($key, json_decode(file_get_contents(dirname(dirname(__DIR__)).'/.skel.json'), true)) ):
			return json_decode(file_get_contents(dirname(dirname(__DIR__)).'/.skel.json'), true)[$key];
		else:
			return false;
		endif;
	}
}

?>