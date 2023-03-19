<?php

require_once 'AppController.php';

class CartController extends AppController {
    private \repository\CartRepository $cartRepository;

    public function __construct()
    {
        parent::__construct();
        $this->cartRepository = new \repository\CartRepository();
    }

    public function cart() {
        $this->checkCookie(null, false);
        $this->render('cart', ['books' => $this->cartRepository->getAllCartBook()]);
    }

    public function deleteFromCart() {
        $this->checkCookie(null, false);
        $this->cartRepository->deleteCartBook($_POST["book"]);
        $this->render('cart', ['books' => $this->cartRepository->getAllCartBook()]);
    }

    public function order() {
        $this->checkCookie(null, false);
        $bookIds = explode(",", $_POST["book"]);
        $this->cartRepository->saveOrder($bookIds);
        $this->render('cart', ['books' => $this->cartRepository->getAllCartBook()]);
    }

}