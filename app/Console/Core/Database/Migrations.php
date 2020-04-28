<?php

namespace Avanciro\Skel\Console\Core\Database;
use Illuminate\Database\Capsule\Manager as DB;

class Migrations {
    public $Schema = null;
    public function __construct() {
        $DB = new DB;
        $this->Schema = $DB->Schema();
    }
}

?>