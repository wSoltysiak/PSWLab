<?php
include_once('user.model.php');
include_once('pages/controller.interface.php');

class UserController implements Controller {
    const view = 'user.view.php';
    private $model;

    public function start() {
        $this->model = new UserModel();
        $this->model->autoReset();
        $this->model->read();
        $css = $this->model->generateCSS();
        $this->render();
        print_r($_POST);
        echo $css;
    }

    public function render() {
        include_once('./utils/head.php');
        include_once('./components/header/header.view.php');
        include_once(UserController::view);
    }
}

$controller = new UserController();
$controller->start();