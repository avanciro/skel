<?php

namespace Avanciro\Skel\Core;
use Avanciro\Skel\Core\Registry;

class Controller {

    protected $_registry = null;

    public function __construct(Registry $Registry) {
        $this->_registry = $Registry;
    }

    public function __get($key) {
        return $this->_registry->$key;
    }

}

?>