<?php

namespace App\Controller;
use App\Model\Example;

class Home extends \Avanciro\Skel\Core\Controller {
    public function index() {
        $this->load->view('index', $this->data);
    }
}

?>