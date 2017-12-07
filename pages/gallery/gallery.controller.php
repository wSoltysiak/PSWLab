<?php

include_once('utils/controller.abstract.php');
include_once('gallery.model.php');

class GalleryController extends Controller {
    const view = 'gallery.view.php';
    private $model;

    public function start() {
        parent::start();
        $this->model = new GalleryModel();
        $this->render();
    }

    protected function render() {
        parent::render();
        $viewToLoad = $this->model->isPermissionGranted() ? GalleryController::view : 'pages/errors/403.view.php';
        include_once($viewToLoad);
    }
}

$controller = new GalleryController();
$controller->start();