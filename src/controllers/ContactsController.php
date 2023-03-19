<?php

require_once 'AppController.php';

class ContactsController extends AppController {

    public function contacts() {
        $this->checkCookie(null, false);
        $this->render('contacts');
    }

}