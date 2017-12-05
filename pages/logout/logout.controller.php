<?php

include_once('pages/controller.interface.php');
include_once('logout.model.php');

class LogoutController implements Controller {
    private $model;

    public function start() {
        $this->model = new LogoutModel();
        $this->model->logoutUser();
    }

    public function render() {
    }
}

$controller = new LogoutController();
$controller->start();