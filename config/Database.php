<?php

return [

    /**
     * This switch will tell Skel to load the ORM
     * into framework or not. You can leave this
     * as false if you don't wish to connect  your
     * application to any database.
     */
    'enable' => false,

    /**
     * Here you can set the default connection you
     * wish use in this application. You can define
     * any number of connection in the connections
     * block.
     */
    'default' => 'mysql',

    /**
     * Here you can define the connections you need
     * to use in your application. Each connection need
     * to contain the following details.
     *    - driver (  )
     */
    'connections' => [
        'mysql' => [
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'port'      => '3306',
            'database'  => 'test',
            'username'  => 'test',
            'password'  => 'test',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => ''
        ]
    ]
]

?>