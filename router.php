<?php

class Router {
    private $allowedPages = ['home', 'gallery', 'team', 'form'];
    const DEFAULT_PAGE = 'home';

    public function getPageName() {
        return isset($_GET['page']) ? $_GET['page'] : Router::DEFAULT_PAGE;
    }

    public function route($pageName) {
        if ($this->isAllowedPage($pageName)) {
            include("./pages/{$pageName}/{$pageName}.controller.php");
        } else {
            die("404 Not Found \n escapowanie");
        }
    }

    private function isAllowedPage($pageName) {
        return in_array($pageName, $this->allowedPages);
    }

}

?>