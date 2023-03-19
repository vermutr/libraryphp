<?php

namespace model;

class Book
{
    private int $id;

    private string $img;

    private string $bookName;

    private float $price;

    private Author $author;

    /**
     * @param int $id
     * @param string $img
     * @param string $bookName
     * @param float $price
     * @param Author $author
     */
    public function __construct(int $id, string $img, string $bookName, float $price, Author $author)
    {
        $this->id = $id;
        $this->img = $img;
        $this->bookName = $bookName;
        $this->price = $price;
        $this->author = $author;
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
    public function getImg(): string
    {
        return $this->img;
    }

    /**
     * @param string $img
     */
    public function setImg(string $img): void
    {
        $this->img = $img;
    }

    /**
     * @return string
     */
    public function getBookName(): string
    {
        return $this->bookName;
    }

    /**
     * @param string $bookName
     */
    public function setBookName(string $bookName): void
    {
        $this->bookName = $bookName;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    /**
     * @return Author
     */
    public function getAuthor(): Author
    {
        return $this->author;
    }

    /**
     * @param Author $author
     */
    public function setAuthor(Author $author): void
    {
        $this->author = $author;
    }


}