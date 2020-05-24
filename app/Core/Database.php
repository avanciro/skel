<?php

namespace Avanciro\Skel\Core;
use Avanciro\Skel\Core\Registry;
use Illuminate\Database\Capsule\Manager as Capsule;

class Database {

    protected $_registry = null;

    public function __construct(Registry $Registry) {
        $this->_registry = $Registry;

        /**
         * We need to get the configuration for the
         * database using the configuration file.
         */
        $dbConfig = $this->_registry->config->database;
        if ( $dbConfig->enable ):

            $Capsule = new Capsule;
            $Capsule->addConnection([
                'driver'    => $dbConfig->connections[$dbConfig->default]['driver'],
                'host'      => $dbConfig->connections[$dbConfig->default]['host'],
                'port'      => $dbConfig->connections[$dbConfig->default]['port'],
                'database'  => $dbConfig->connections[$dbConfig->default]['database'],
                'username'  => $dbConfig->connections[$dbConfig->default]['username'],
                'password'  => $dbConfig->connections[$dbConfig->default]['password'],
                'charset'   => $dbConfig->connections[$dbConfig->default]['charset'],
                'collation' => $dbConfig->connections[$dbConfig->default]['collation'],
                'prefix'    => $dbConfig->connections[$dbConfig->default]['prefix']
            ]);

            /**
             * Make this Capsule instance available globally
             */
            $Capsule->setAsGlobal();

            /**
             * Bootstrap Eloquent to make it ready.
             */
            $Capsule->bootEloquent();

        endif;
    }
}

?>