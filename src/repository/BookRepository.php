<?php

namespace repository;

use model\Account;
use model\Author;
use PDO;

require_once 'Repository.php';

require_once __DIR__ . '/../model/Book.php';
require_once __DIR__ . '/../model/Author.php';

class BookRepository extends Repository
{
    public function getAllBooks()
    {
        $allBooks = [];
        $stmt = $this->database->connect()->prepare('
            select b.id as id, b.img as img, b.bookname as bookname, b.price as price, a.name as name, a.surname as surname 
                   from books b inner join authors a on a.id = b.author_id;
        ');
        $stmt->execute();

        $books = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($books as $book) {
            $author = new Author(
                (int)null,
                $book['name'],
                $book['surname'],
                (array)null
            );

            $allBooks[] = new \model\Book(
                $book['id'],
                $book['img'],
                $book['bookname'],
                $book['price'],
                $author
            );
        }


        return $allBooks;
    }
}