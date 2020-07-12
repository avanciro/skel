<?php

namespace Avanciro\Skel\Core;

use Avanciro\Skel\Core\Registry;
use Twig\TwigFunction;
use Twig\Environment as Twig_Environment;
use Twig\Loader\FilesystemLoader as Twig_FSLoader;
use Twig\Extension\DebugExtension as Twig_DebugExtension;

class Twig {

    // PROPS
    protected $_registry = null;


    public function __construct(Registry $Registry) {
        $this->_registry = $Registry;

        /**
         * Get configuration data for the Twig Engine
         * and Localization to load next components.
         */
        $twig_config = $this->_registry->config->twig;
        $localization_config = $this->_registry->config->localization;

        // TWIG FS LOADER
        $TwigFSLoader = new Twig_FSLoader(dirname(dirname(__DIR__)).'/'.$twig_config->directory);

        if ( $twig_config->debug === true ):
            $this->_registry->set('twig', new Twig_Environment($TwigFSLoader, array('debug' => true)));
            $this->_registry->twig->addExtension(new Twig_DebugExtension());
        else:
            $this->_registry->set('twig', new Twig_Environment($TwigFSLoader));
        endif;


        /**
         * We need to check if localization is enabled or not in
         * the configuration and bootstrap the localization
         * methods.
         */
        if ( $localization_config->enable ):
            $func_localization = new TwigFunction('_', function($file, $string) {

                /**
                 * Load Localization core module to handle file loading
                 * and in memory cache mechanisam for execute time to
                 * avoid multiple load.
                 */
                $Localization = new Localization;
                return $Localization->query($file, $string);

            });
            $this->_registry->twig->addFunction($func);
        endif;

    }

}

?>