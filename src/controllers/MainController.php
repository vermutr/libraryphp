<?php

require_once 'AppController.php';

class MainController extends AppController {

    public function main() {
        $this->checkCookie(null, false);
        $this->render('main');
    }

}