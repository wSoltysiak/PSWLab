<?php
    session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

    include_once('./router.php');
    $router = new Router();
    $pageName = $router->getPageName();

    $router->route($pageName);
    include_once('./utils/footer.php');
?>