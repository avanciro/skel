<?php

namespace Avanciro\Skel\Console;

class Updator {

	// PROPS
	private $file = array();


	public function __construct() {
		$this->file['local'] = json_decode(file_get_contents(dirname(dirname(dirname(__DIR__))).'/.skel.json'), true);
	}



	public function files() {
		return json_decode(file_get_contents($this->file['local']['skel']['update']['mirror'].'.skel.json'), true)['files'];
	}



	public function __destruct() {
		unset( $this->file );
	}
}

?>