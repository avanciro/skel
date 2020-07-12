<?php

namespace Avanciro\Skel\Core;

class Config {
    public function __get($key) {
        if ( file_exists(dirname(dirname(__DIR__)).'/config/'.ucfirst($key).'.php') ):
            return (Object)(include dirname(dirname(__DIR__)).'/config/'.ucfirst($key).'.php');
        else:
            throw new \Exception("Configuration file not found");
        endif;
    }


    /**
     * Static method to return configuration file by
     * just checking if it's exists or not.
     */
    public static function get($file) {
        if ( file_exists(dirname(dirname(__DIR__)).'/config/'.ucfirst($file).'.php') ):
            return (Object)(include dirname(dirname(__DIR__)).'/config/'.ucfirst($file).'.php');
        else:
            throw new \Exception("Configuration file not found");
        endif;
    }
}

?>