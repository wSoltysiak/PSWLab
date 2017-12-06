<?php

include_once('utils/controller.abstract.php');
include_once('login.model.php');

class LoginController extends Controller {
    const view = 'login.view.php';
    private $model;

    public function start() {
        parent::start();
        $this->model = new LoginModel();
        $this->model->login();
        $this->render();
    }

    public function render() {
        parent::render();
        include_once(LoginController::view);
    }
}

$controller = new LoginController();
$controller->start();