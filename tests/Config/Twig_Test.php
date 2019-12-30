<?php

namespace Avanciro\Skel\Tests\Config;
use PHPUnit\Framework\TestCase;

use Avanciro\Skel\Core\Registry;
use Avanciro\Skel\Core\Config;

class Twig extends TestCase {

	// PROPS
	protected $config;


	// SETUP
	protected function setUp(): void {
		$this->config = new Config(new Registry);
	}


	public function test_Instance() {
		$this->assertInstanceOf(Config::class, $this->config);
	}

	public function test_hasConfig() {
		$this->assertIsObject($this->config->twig);

	}

}

?>