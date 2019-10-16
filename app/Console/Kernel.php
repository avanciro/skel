<?php
namespace Avanciro\Skel\Console;
use Avanciro\Skel\Console\Route;
use Avanciro\Skel\Console\Controller;

class Kernel {

    protected $map = array(
        'route'         => 'Route',
        'controller'    => 'Controller',
        'system'        => 'System'
    );

    public function __construct() {
    }

    public function dispatch($args) {
        self::resolveArgs($args);
    }

    private function help() {
        echo "################################################".PHP_EOL;
        echo "#                      TEST                    #".PHP_EOL;
        echo "################################################".PHP_EOL;
    }

    private function resolveArgs($args) {
        $arg = explode(":", $args[1]);
        if ( array_key_exists($arg[0], $this->map) ):
            include_once dirname(__DIR__).'/Console/'.$this->map[$arg[0]].'.php';
            $Object = 'Avanciro\Skel\Console\\'.$this->map[$arg[0]];
            unset( $args[0] );
            unset( $args[1] );
            new $Object($arg[1], array_values($args));
        else:
            self::help();
        endif;
    }
}

?>