<?php

include_once('pages/controller.interface.php');
include_once('gallery.model.php');

class GalleryController implements Controller {
    const view = 'gallery.view.php';
    private $model;

    public function start() {
        $this->model = new GalleryModel();
        $this->render();
    }

    public function render() {
        $viewToLoad = $this->model->isPermissionGranted() ? GalleryController::view : 'pages/errors/403.view.php';
        include_once($viewToLoad);
    }
}

$controller = new GalleryController();
$controller->start();