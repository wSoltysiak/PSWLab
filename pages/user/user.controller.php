<?php

include_once('utils/controller.abstract.php');
include_once('user.model.php');

class UserController extends Controller {
    const view = 'user.view.php';
    private $model;

    public function start() {
        parent::start();
        $this->model = new UserModel();
        $this->model->resetCookie();
        $css = $this->model->generateCSS();
        $this->render();
        echo $css;
    }

    public function render() {
        parent::render();
        include_once(UserController::view);
    }
}

$controller = new UserController();
$controller->start();