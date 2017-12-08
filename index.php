<?php
    session_start();

    include_once('./router.php');
    $router = new Router();
    $pageName = $router->getPageName();

    $router->route($pageName);
    include_once('./utils/footer.php');
?>