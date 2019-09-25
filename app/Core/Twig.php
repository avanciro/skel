<?php

namespace Avanciro\Skel\Core;

use Avanciro\Skel\Core\Registry;
use Twig\Environment as Twig_Environment;
use Twig\Loader\FilesystemLoader as Twig_FSLoader;
use Twig\Extension\DebugExtension as Twig_DebugExtension;

class Twig {

    // PROPS
    protected $_registry = null;


    public function __construct(Registry $Registry) {
        $this->_registry = $Registry;

        /**
         * We need to get the configuration for the
         * twig engine.
         */
        $twigConfig = $this->_registry->config->twig;

        // TWIG FS LOADER
        $TwigFSLoader = new Twig_FSLoader(dirname(dirname(__DIR__)).'/'.$twigConfig->directory);

        if ( $twigConfig->debug === true ):
            $this->_registry->set('twig', new Twig_Environment($TwigFSLoader, array('debug' => true)));
            $this->_registry->twig->addExtension(new Twig_DebugExtension());
        else:
            $this->_registry->set('twig', new Twig_Environment($TwigFSLoader));
        endif;
    }

}

?>