<?php

namespace Avanciro\Skel\Console;
use Avanciro\Skel\Console\Command;

class Controller extends Command {

    public function __construct($arg, $flags) {
        if ( method_exists($this, $arg) ):
            self::$arg($flags);
        else:
            self::help();
        endif;
    }

    private function list($flags) {
        echo "LISTING CONTROLLERS".PHP_EOL;
    }


    private function help() {
        echo "Controller::help()".PHP_EOL;
    }
}

?>