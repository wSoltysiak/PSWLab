<?php
    include('./router.php');
    $router = new Router();
    $pageName = $router->getPageName();

    include_once('./utils/head.php');
    include_once('./components/header/header.view.php');
    $router->route($pageName);
    include_once('./utils/footer.php');
?>