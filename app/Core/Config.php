<?php

namespace Avanciro\Skel\Core;
use Avanciro\Skel\Core\Registry;

class Config {
    public function __get($key) {
        if ( file_exists(dirname(dirname(__DIR__)).'/config/'.ucfirst($key).'.php') ):
            return (Object)(include dirname(dirname(__DIR__)).'/config/'.ucfirst($key).'.php');
        else:
            throw new \Exception("Configuration file not found");
        endif;
    }
}

?>