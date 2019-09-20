<?php

class Home_Controller extends Avanciro\Skel\Core\Controller {
    public function index() {
        echo "Home_Controller::index()";
    }

    public function profile($id) {
        echo "Home_Controller::test()<br>";
        echo $id;
    }
}

?>