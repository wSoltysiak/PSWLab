<?php

class LogoutModel {
    public function logoutUser() {
        $this->deleteCookie();
        $this->destroySession();
        $this->redirectToHome();
    }

    private function deleteCookie() {
        if (isset($_COOKIE['SessionID'])) {
            setcookie("SessionID", "", time() - 42000);
        }

        if (isset($_COOKIE[session_name()])) {
            setcookie(session_name(), '', time() - 42000, '/');
        }
    }

    private function destroySession() {
        unset($_SESSION['isLogged']);
        unset($_SESSION['login']);
        session_destroy();
    }

    private function redirectToHome() {
        header('Location: index.php?page=home');
    }
}