<?php

require_once 'AppController.php';
require_once __DIR__ . '/../repository/BookRepository.php';
require_once __DIR__ . '/../repository/AccountBookRepository.php';
require_once __DIR__ . '/../repository/CartRepository.php';


class BooksController extends AppController
{
    private \repository\AccountBookRepository $accountBookRepository;
    private \repository\CartRepository $cartRepository;
    private \repository\BookRepository $bookRepository;

    public function __construct()
    {
        parent::__construct();
        $this->bookRepository = new \repository\BookRepository();
        $this->accountBookRepository = new \repository\AccountBookRepository();
        $this->cartRepository = new \repository\CartRepository();
    }


    public function books()
    {
        $this->checkCookie(null, false);
        $this->render('booklist', ['books' => $this->bookRepository->getAllBooks()]);
    }

    public function addBook()
    {
        $this->checkCookie(null, false);
        $this->accountBookRepository->saveAccountBook($_POST["book"]);
        $this->render('booklist', ['books' => $this->bookRepository->getAllBooks()]);
    }

    public function buyBook()
    {
        $this->checkCookie(null, false);
        $this->cartRepository->saveCartBook($_POST["book"]);
        $this->render('booklist', ['books' => $this->bookRepository->getAllBooks()]);
    }


}