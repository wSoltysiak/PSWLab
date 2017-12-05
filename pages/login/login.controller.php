<?php

include_once('pages/controller.interface.php');
include_once('login.model.php');

class LoginController implements Controller {
    const view = 'login.view.php';
    private $model;

    public function start() {
        $this->model = new LoginModel();
        $this->model->login();
        $this->render();
    }

    public function render() {
        include_once(LoginController::view);
    }
}

$controller = new LoginController();
$controller->start();