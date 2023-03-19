<?php

namespace repository;

use model\Account;
use PDO;

require_once 'Repository.php';

require_once __DIR__ . '/../model/Account.php';

class AccountRepository extends Repository
{
    public function getAccount(string $email): ?Account
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM accounts WHERE email = :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            return null;
        }

        return new \model\Account(
            $user['id'],
            $user['email'],
            $user['password'],
            $user['role']
        );
    }

    public function verifyUser(string $email, string $hashed_password): ?Account
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM accounts WHERE email = :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            return null;
        }
        if($user['password'] === $hashed_password) {
            return new \model\Account(
                $user['id'],
                $user['email'],
                $user['password'],
                $user['role']
            );
        } else {
            return null;
        }
    }

    public function createUser($email, $hashed_password)
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO accounts(email, password)
            VALUES (?, ?)
        ');

        $stmt->execute([
            $email,
            $hashed_password
        ]);
    }
}