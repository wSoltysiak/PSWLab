<?php

include_once('utils/controller.abstract.php');
include_once('form.model.php');

class FormController extends Controller {
    const view = 'form.view.php';
    private $model;

    public function start() {
        parent::start();
        $this->model = new FormModel();
        $this->model->getPostData();
        print_r($this->model->isAllValid());
        $this->model->isUniqueError = $this->model->isLoginUnique();
        if ($this->model->isAllValid() && $this->model->isUniqueError) {
            $this->model->createUser();
        }
        $this->render();
    }

    protected function render() {
        parent::render();
        include_once(FormController::view);
    }
}

$controller = new FormController();
$controller->start();