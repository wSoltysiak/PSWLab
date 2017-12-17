<?php

include_once('utils/post-helpers.php');
include_once('utils/database-helpers.php');

class LoginModel {
    public $loginError = false;
    private $dbConnection;

    public function login() {
        if (isPostRequest()) {
            $this->dbConnection = connectToDatabase();
            $isCorrectLogin = isPostRequest() && $this->isCorrectCredentials();
            closeDatabaseConnection($this->dbConnection);

            if ($isCorrectLogin) {
                $this->setUpSession();
                $this->setUpCookie();
                $this->redirectToProtectedPage();
            } else {
                $this->loginError = true;
            }
        }
    }

    private function isCorrectCredentials() {
        $login = $_POST['login'];
        if ($this->isCorrectLogin($login)) {
            $result = $this->dbConnection->query("SELECT password FROM users WHERE login='{$login}'");
            $passwordToMatch = mysqli_fetch_row($result)[0];
            return $this->isCorrectPassword($passwordToMatch);
        }

        return false;
    }

    private function isCorrectLogin($login) {
        if (isset($login)) {
            $result = $this->dbConnection->query("SELECT count(id) FROM users WHERE login='{$login}'");
            return mysqli_fetch_row($result)[0];
        }
        return false;
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