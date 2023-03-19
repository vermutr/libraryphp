<?php

require_once 'AppController.php';
require_once __DIR__ . '/../model/Account.php';
require_once __DIR__ . '/../repository/AccountRepository.php';

class LoginController extends AppController
{

    private \repository\AccountRepository $accountRepository;

    public function __construct()
    {
        $this->accountRepository = new \repository\AccountRepository();;
    }


    public function login()
    {
        unset($_COOKIE["email"]);
        unset($_COOKIE["password"]);
        if ($this->isGet()) {
            return $this->render('login');
        }

        session_start();
        $email = $_POST["email"];
        $registered = $_POST["registered"];
        $hashed_password = md5(md5($_POST["password"]));

        if ($registered === "true") {
            $accountDb = $this->loginAction($email, $hashed_password);
        } else {
            $accountDb = $this->registrationAction($email, $hashed_password);
        }

        $this->setCookieAndSession($accountDb);
        $this->redirectToPage("/main");
    }

    private function loginAction($email, $hashed_password): ?\model\Account
    {
        $user = $this->accountRepository->verifyUser($email, $hashed_password);

        if ($user === null) {
            return $this->render('login', ['messagesSignIn' => ['User does not exist!']]);
        }

        return $user;
    }

    private function registrationAction($email, $hashed_password): ?\model\Account
    {
        $accountDb = $this->accountRepository->getAccount($email);
        if ($accountDb !== null) {
            return $this->render('login', ['messagesSignUp' => ['User with this email already exist!']]);
        }

        $this->accountRepository->createUser($email, $hashed_password);

        return $this->accountRepository->getAccount($email);
    }


    public function setCookieAndSession(\model\Account $accountDb)
    {
        $_SESSION['email'] = $accountDb->getEmail();
        setcookie("email", $accountDb->getEmail(), time() + (60000));
        setcookie("password", $accountDb->getPassword(), time() + (60000));
    }



}