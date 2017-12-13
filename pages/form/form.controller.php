<?php

include_once('utils/controller.abstract.php');
include_once('form.model.php');
include_once('utils/post-helpers.php');

class FormController extends Controller {
    const view = 'form.view.php';
    const filledView = 'form.view.php';
    private $model;

    public function start() {
        parent::start();
        $this->model = new FormModel();
        if (isPostRequest()) {
            $this->model->getPostData();
            if ($this->model->isLogged()) {
                if ($this->model->isAllValid()) {
                    $this->model->success = $this->model->updateUser();
                }
            } else {
                $this->model->isUniqueError = !$this->model->isLoginUnique();
                if ($this->model->isAllValid() && !$this->model->isUniqueError) {
                    $this->model->success = $this->model->createUser();
                }
            }
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