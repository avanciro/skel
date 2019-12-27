<?php

use App\Model\Example;

class Home_Controller extends Avanciro\Skel\Core\Controller {
    public function index() {
        $this->load->view('index', $this->data);
    }
}

?>