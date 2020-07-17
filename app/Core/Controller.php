<?php

namespace Avanciro\Skel\Core;
use Avanciro\Skel\Core\Registry;

class Controller {

    public $data = null;
    protected $_registry = null;

    public function __construct(Registry $Registry) {
        $this->_registry = $Registry;
        $this->data = array();

        /**
         * We need to pass some additional parameters into
         * child controllers & twig files.
         */
		$this->data['app']['url']   = $this->request->server['REQUEST_SCHEME'].'://'.$this->request->server['HTTP_HOST'];

		/**
		 * Append cookies to data payload to access from the twig
		 * to manage template behaviours based on cookie values.
		 */
		$this->data['app']['request']['cookie'] = (Object)$_COOKIE;

    }

    public function __get($key) {
        return $this->_registry->$key;
    }

}

?>