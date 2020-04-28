<?php

namespace App\Database\Migrations;
use Illuminate\Database\Schema\Blueprint;

class Example extends \Avanciro\Skel\Console\Core\Database\Migrations {
    public function up() {
        $this->Schema->create('example', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->bigInteger('created_at');
            $table->bigInteger('updated_at');
            $table->bigInteger('deleted_at');
        });
    }
}

?>