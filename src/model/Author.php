<?php

namespace model;

class Author
{
    private int $id;
    private string $name;
    private string $surname;
    private array $books;

    /**
     * @param int $id
     * @param string $name
     * @param string $surname
     * @param array $books
     */
    public function __construct(int $id, string $name, string $surname, array $books)
    {
        $this->id = $id;
        $this->name = $name;
        $this->surname = $surname;
        $this->books = $books;
    }


    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getSurname(): string
    {
        return $this->surname;
    }

    /**
     * @param string $surname
     */
    public function setSurname(string $surname): void
    {
        $this->surname = $surname;
    }

    /**
     * @return array
     */
    public function getBooks(): array
    {
        return $this->books;
    }

    /**
     * @param array $books
     */
    public function setBooks(array $books): void
    {
        $this->books = $books;
    }




}