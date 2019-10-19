<?php

namespace Avanciro\Skel\Core;
use Avanciro\Skel\Core\Registry;

class Request {

    // PROPS
    protected $_registry = null;
    
    public $get     = array();
    public $post    = array();
    public $files   = array();
    public $server  = array();


    public function __construct(Registry $Registry) {
        $this->_registry = $Registry;

        // REQUEST PARAMS
        $this->get      = (Object)$_GET;
        $this->post     = (Object)$_POST;
        $this->files    = (Object)$_FILES;
        $this->server   = (Object)$_SERVER;
    }
}

?>