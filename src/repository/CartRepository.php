<?php

namespace repository;

use model\Author;
use PDO;

require_once 'Repository.php';

require_once __DIR__ . '/../model/Account.php';
require_once __DIR__ . '/BookRepository.php';
require_once __DIR__ . '/AccountRepository.php';

require_once __DIR__ . '/../model/Book.php';
require_once __DIR__ . '/../model/Author.php';


class CartRepository extends Repository
{

    private AccountRepository $accountRepository;

    public function __construct()
    {
        parent::__construct();
        $this->accountRepository = new \repository\AccountRepository();
    }

    public function saveCartBook(string $bookId)
    {
        $account = $this->accountRepository->getAccount($_COOKIE['email']);

        if ($account === null) {
            return null;
        }

        $stmt = $this->database->connect()->prepare('
            INSERT INTO cart(book_id, account_id)
            VALUES (?, ?)
        ');

        $stmt->execute([
            $bookId,
            $account->getId()
        ]);
    }

    public function saveOrder(array $books)
    {
        $account = $this->accountRepository->getAccount($_COOKIE['email']);

        if ($account === null) {
            return null;
        }

        foreach ($books as $book) {
            $stmt = $this->database->connect()->prepare('
            INSERT INTO tb_order(book_id, account_id)
            VALUES (?, ?)
            ');

            $stmt->execute([
                $book,
                $account->getId()
            ]);
        }

        $this->deleteCartBookByAccountId();

    }

    public function deleteCartBookByAccountId() {
        $account = $this->accountRepository->getAccount($_COOKIE['email']);
        if ($account === null) {
            return null;
        }
        $stmt = $this->database->connect()->prepare('
            DELETE FROM cart WHERE account_id = :account_id
        ');

        $accountId = $account->getId();

        $stmt->bindParam(':account_id', $accountId, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function deleteCartBook(string $bookId)
    {
        $account = $this->accountRepository->getAccount($_COOKIE['email']);
        if ($account === null) {
            return null;
        }
        $stmt = $this->database->connect()->prepare('
            DELETE FROM cart WHERE book_id = :book_id and account_id = :account_id
        ');
        $accountId = $account->getId();

        $stmt->bindParam(':book_id', $bookId, PDO::PARAM_STR);
        $stmt->bindParam(':account_id', $accountId, PDO::PARAM_STR);
        $stmt->execute();

    }

    public function getAllCartBook(): array
    {
        $allCartBooks = [];
        $stmt = $this->database->connect()->prepare('
            select b.id as id, a.name as name, a.surname as surname, b.price as price, b.bookname as bookname, b.img as img 
            from accounts ac inner join cart ab on ac.id = ab.account_id
            inner join books b on b.id = ab.book_id 
            inner join authors a on a.id = b.author_id
            where ac.email = :email
        ');

        $stmt->bindParam(':email', $_COOKIE['email'], PDO::PARAM_STR);
        $stmt->execute();

        $cartBooks = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (!$cartBooks) {
            return $allCartBooks;
        }

        foreach ($cartBooks as $accountBook) {
            $author = new Author(
                (int)null,
                $accountBook['name'],
                $accountBook['surname'],
                (array)null
            );


            $allCartBooks[] = new \model\Book(
                $accountBook['id'],
                $accountBook['img'],
                $accountBook['bookname'],
                $accountBook['price'],
                $author
            );
        }
        return $allCartBooks;
    }

}