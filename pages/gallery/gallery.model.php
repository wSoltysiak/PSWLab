<?php

class GalleryModel {
    public function isPermissionGranted() {
        return isset($_SESSION['isLogged']);
    }
}