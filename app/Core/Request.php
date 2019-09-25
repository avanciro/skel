<?php

namespace Avanciro\Skel\Core;
use Avanciro\Skel\Core\Registry;

class Request {

    // PROPS
    protected $_registry = null;


    public function __construct(Registry $Registry) {
        $this->_registry = $Registry;
    }
}

?>