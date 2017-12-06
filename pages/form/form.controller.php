<?php

include_once('pages/controller.interface.php');
include_once('form.model.php');

class FormController implements Controller {
    const view = 'form.view.php';
    private $model;

    public function start() {
        $this->model = new FormModel();
        $this->model->getPostData();
        $this->render();
    }

    public function render() {
        include_once('./utils/head.php');
        include_once('./components/header/header.view.php');
        include_once(FormController::view);
    }
}

$controller = new FormController();
$controller->start();
?>