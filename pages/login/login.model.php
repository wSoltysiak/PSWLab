<?php

include_once('utils/post-helpers.php');

class LoginModel {
    public $loginError = false;
    private $credentials = [
        'test' => 'c75de8c1b7c3ae5252091267a736a9bf57001d80e82668b3cb3cd09e2f6a43cb',
        'admin' => '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918',
        'kasia' => 'd97b0df52b50f024e60b92c3294bb98179276ef4a9740b599cb60f9834b49825'
    ];

    public function login() {
        if (isPostRequest() && $this->isCorrectCredentials()) {
            $this->setUpSession();
            $this->setUpCookie();
            $this->redirectToProtectedPage();
        } else {
            $this->loginError = true;
        }
    }

    private function isCorrectCredentials() {
        $login = $_POST['login'];
        if ($this->isCorrectLogin($login)) {
            return $this->isCorrectPassword($this->credentials[$login]);
        }

        return false;
    }

    private function isCorrectLogin($login) {
        return isset($login) && array_key_exists($login, $this->credentials);
    }

    private function isCorrectPassword($passwordToMatch) {
        $password = $_POST['password'];
        return isset($password) && hash('sha256', $password) === $passwordToMatch;
    }

    private function setUpSession() {
        $_SESSION['isLogged'] = true;
        $_SESSION['login'] = $_POST['login'];
    }

    private function setUpCookie() {
        setcookie("SessionID", session_id());
    }

    private function redirectToProtectedPage() {
        header('Location: index.php?page=gallery');
    }

}