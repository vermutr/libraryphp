<?php

namespace model;

class AccountBook
{
    private int $account_id;

    private int $book_id;

    /**
     * @param int $account_id
     * @param int $book_id
     */
    public function __construct(int $account_id, int $book_id)
    {
        $this->account_id = $account_id;
        $this->book_id = $book_id;
    }

    /**
     * @return int
     */
    public function getAccountId(): int
    {
        return $this->account_id;
    }

    /**
     * @param int $account_id
     */
    public function setAccountId(int $account_id): void
    {
        $this->account_id = $account_id;
    }

    /**
     * @return int
     */
    public function getBookId(): int
    {
        return $this->book_id;
    }

    /**
     * @param int $book_id
     */
    public function setBookId(int $book_id): void
    {
        $this->book_id = $book_id;
    }




}