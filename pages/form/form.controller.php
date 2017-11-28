<?php

include_once('pages/controller.interface.php');
//include_once('./form.model.php');

class FormController implements Controller {
    const view = 'form.view.php';

    public function start() {
        $this->render();
    }

    public function render() {
        include_once(FormController::view);
    }
}

$controller = new FormController();
$controller->start();
?>