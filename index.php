<?php
    include('./router.php');
    $router = new Router();
    $pageName = $router->getPageName();
    $router->route($pageName);
?>