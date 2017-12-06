<?php

include_once('utils/controller.abstract.php');
include_once('logout.model.php');

class LogoutController extends Controller {
    private $model;

    public function start() {
        parent::start();
        $this->model = new LogoutModel();
        $this->model->logoutUser();
    }

    public function render() {
    }
}

$controller = new LogoutController();
$controller->start();