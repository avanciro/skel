<?php

namespace Avanciro\Skel\Console;
use Avanciro\Skel\Console\Command;

class Route extends Command {
    public function __construct($arg, $flags) {
        if ( method_exists($this, $arg) ):
            self::$arg($flags);
        else:
            self::help();
        endif;
    }

    private function list($flags) {
        echo "LISTING ROUTES".PHP_EOL;
    }


    private function help() {
        echo "Route::help()".PHP_EOL;
    }
}

?>