<?php

namespace Avanciro\Skel\Console;
use Avanciro\Skel\Console\Command;

class System extends Command {

    public function __construct($arg, $flags) {
        if ( method_exists($this, $arg) ):
            self::$arg($flags);
        else:
            self::help();
        endif;
    }


    public function update($flags) {
        if ( isset($flags[0]) == '--force' ):
            echo "UPDATING ... ".PHP_EOL;
        else:
            echo "Please use --force flag to force update.".PHP_EOL;
        endif;
    }


    private function help() {
        echo "Controller::help()".PHP_EOL;
    }
}

?>