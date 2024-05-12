<?php
class Controller {
    public $load;
    public $model;

    function __construct($pageMethod = null) {
        $this->load = new Load();
        $this->model = new Model();
        if (method_exists($this, $pageMethod)) {
            $this->$pageMethod();
        } else {
            $this->$home();
        }
    }

    function home() {
        
    }

}
?>