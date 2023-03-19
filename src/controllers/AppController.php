<?php

require_once 'AppController.php';
require_once __DIR__ . '/../model/Account.php';
require_once __DIR__ . '/../repository/AccountRepository.php';

class AppController {
    private $request;

    private \repository\AccountRepository $accountRepository;

    public function __construct()
    {
        $this->request = $_SERVER['REQUEST_METHOD'];
        $this->accountRepository = new \repository\AccountRepository();
    }

    protected function isGet(): bool
    {
        return $_SERVER['REQUEST_METHOD'] === 'GET';
    }

    protected function isPost(): bool
    {
        return $_SERVER['REQUEST_METHOD'] === 'POST';
    }

    protected function render(string $template = null, array $variables = []) {
        $templatePath = 'public/views/'.$template.'.php';
        $output = 'File not found';
        if(file_exists($templatePath)) {
            extract($variables);
            ob_start();
            include $templatePath;
            $output = ob_get_clean();
        }

        print $output;
    }

    public function checkCookie($page, bool $redirect): void
    {
        $emailFromCookie = $_COOKIE['email'];
        $passwordFromCookie = $_COOKIE['password'];
        if (isset($emailFromCookie) && isset($passwordFromCookie)) {
            $user = $this->accountRepository->verifyUser($emailFromCookie, $passwordFromCookie);
            if($user === null) {
                $this->redirectToPage("/login");
            }
            if ($user && $redirect) {
                $this->redirectToPage($page);
            }
        } else {
            $this->redirectToPage("/login");
        }
    }

    public function redirectToPage(string $page)
    {
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}$page");
    }

}