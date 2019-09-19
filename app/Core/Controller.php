<?php

namespace Avanciro\Skel\Core;

class Controller {

    public function __get($key) {
        return $this->_registry->get($key);
    }

}

?>