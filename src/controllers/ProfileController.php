<?php

require_once 'AppController.php';
require_once __DIR__ . '/../repository/AccountBookRepository.php';

class ProfileController extends AppController {

    private \repository\AccountBookRepository $accountBookRepository;

    public function __construct()
    {
        parent::__construct();
        $this->accountBookRepository = new \repository\AccountBookRepository();
    }

    public function profile() {
        $this->checkCookie(null, false);
        $this->render('profile', ['books' => $this->accountBookRepository->getAllAccountBook()]);
    }

    public function deleteBook() {
        $this->checkCookie(null, false);
        $this->accountBookRepository->deleteAccountBook($_POST["book"]);
        $this->render('profile', ['books' => $this->accountBookRepository->getAllAccountBook()]);
    }

}