<?php

class Controller {
    /*
     * Pass the View to the controller
     */

    public function __construct() {
        $this->view = new View();
    }

    public function loadModel($name, $modelPath) {
//        $name = ucfirst($name);
        $name = $name . 'model';
        $path = $modelPath . $name . '.php';
        if (file_exists($path)) {
            require $path;
            $modelName = $name;
            $this->model = new $modelName;
        }
    }

}
